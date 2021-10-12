<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Currency\CurrencyManager;
use Bitrix\Main;
use Bitrix\Main\Context;
use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Engine\Response\AjaxJson;
use Bitrix\Main\Loader;
use Bitrix\Main\ErrorCollection;
use Bitrix\Main\Error;
use Bitrix\Main\Mail\Event;
use Bitrix\Sale\Order,
    Bitrix\Sale\Basket,
    Bitrix\Sale\Delivery,
    Bitrix\Sale\PaySystem;

class Forms extends CBitrixComponent implements Controllerable
{
    private $iblockCode;
    const IBLOCK_TYPE_CODE = 'feedback';
    const CATALOG_IBLOCK_ID = 8;
    const UNISENDER_API_URL = 'https://api.unisender.com/ru/api/subscribe';
    const EMAIL_AUTO_TEMPLATE = '@autouser.autouser';
    const PRE_ORDER_MESSAGE_ID = 69;
    const FAST_ORDER_MESSAGE_ID = 42;

    /**
     * подготавливает входные параметры
     * @param $params
     * @return array
     */
    public function onPrepareComponentParams($params)
    {
        return [
            'UNISENDER_API_KEY' => trim($params['UNISENDER_API_KEY']),
            'UNISENDER_LIST_IDS' => (int)$params['UNISENDER_LIST_IDS'],
            'COMPONENT_ID' => $params['COMPONENT_ID'],
            'EMAIL_EVENT_NAME' => trim($params['EMAIL_EVENT_NAME'])
        ];
    }

    /**
     * выполняет логику работы компонента
     */
    public function executeComponent()
    {
        try {
            $this->includeComponentTemplate();
        } catch (Exception $e) {
            ShowError($e->getMessage());
        }
    }

    public function sendFormAction($formType, $data)
    {
        $this->iblockCode = $formType;
        switch ($formType) {
            case "callback":
                return $this->addCallBackFormItem($data);
            case "request":
                return $this->addRequestFormItem($data);
            default:
                return false;
        }
    }

    public function addEmailAction($email, $agree, $id)
    {
        $isAgree = filter_var($agree, FILTER_VALIDATE_BOOLEAN);
        CIBlockElement::SetPropertyValuesEx($id, false, ["AGREE" => $isAgree ? 1 : 0]);
        CIBlockElement::SetPropertyValuesEx($id, false, ["EMAIL" => $email]);
        return $this->prepareResponse([
            'id' =>  $id,
            'msg' => 'Мы приняли вашу заявку и скоро вам перезвоним.'
        ]);
    }

    private function addRequestFormItem($data)
    {
        $props = $this->prepareProps($data, true);
        $newFormItemId = $this->addFormItem($props);

        if (!$newFormItemId) {
            return $this->prepareResponse([], $newFormItemId->LAST_ERROR);
        }

        $this->sendEmail('NEW_REQUEST', $data);

        return $this->prepareResponse([
            'id' =>  $newFormItemId,
            'msg' => 'Мы приняли вашу заявку и скоро вам перезвоним.'
        ]);
    }

    private function addCallBackFormItem($data)
    {
        $props = $this->prepareProps($data, true);
        $newFormItemId = $this->addFormItem($props);

        if (!$newFormItemId) {
            return $this->prepareResponse([], $newFormItemId->LAST_ERROR);
        }

        $this->sendEmail('NEW_REQUEST', $data);

        return $this->prepareResponse([
            'id' =>  $newFormItemId,
            'msg' => 'Мы приняли вашу заявку и скоро вам перезвоним.'
        ]);
    }

    public function prepareProps($data, $setUtm = false)
    {
        $props = $this->prepareFileProps();
        foreach ($data as $fieldCode => $fieldValue) {
            if ($fieldValue == 'true' || $fieldValue == 'false') {
                $isEnabled = filter_var($fieldValue, FILTER_VALIDATE_BOOLEAN);
                $props[mb_strtoupper($fieldCode)] = $isEnabled ? 1 : 0;
            } else {
                $props[mb_strtoupper($fieldCode)] = strip_tags($fieldValue);
            }
        }
        if ($setUtm) {
            $props = array_merge($props, $this->getUtmData());
        }

        return $props;
    }

    private function addFormItem($props)
    {
        $obItem = new CIBlockElement();

        return $obItem->Add([
            'NAME' => 'Заявка от ' . date('d.m.Y'),
            'PROPERTY_VALUES' => $props,
            'ACTIVE' => 'N',
            'IBLOCK_ID' => $this->getIblockId()
        ]);
    }

    /**
     * Загрузка файлов
     * @return array
     */
    private function prepareFileProps()
    {
        $files = [];
        if (count($_FILES)) {
            foreach ($_FILES as $propName => $fileProp) {
                $total = count($fileProp);
                for ($i = 0; $i < $total; $i++) {
                    $file = [
                        'name' => $fileProp['name'][$i],
                        'type' => $fileProp['type'][$i],
                        'tmp_name' => $fileProp['tmp_name'][$i],
                        'error' => $fileProp['error'][$i],
                        'size' => $fileProp['size'][$i],
                    ];
                    $files[mb_strtoupper($propName)][] = [
                        "VALUE" => $file,
                        "DESCRIPTION" => ""
                    ];
                }
            }
        }
        return $files;
    }

    private function sendEmail($eventName, $data)
    {
        $text = '';

        $properties = \CIBlockProperty::GetList([], ["IBLOCK_ID" => $this->getIblockId()]);
        while ($propFields = $properties->GetNext()) {
            if ($propFields['CODE'] === 'ITEM') continue;
            $propCode = strtolower($propFields['CODE']);
            $value = $data[$propCode] ?? null;
            if ($isEnabled = filter_var($value, FILTER_VALIDATE_BOOLEAN)) {
                $value = $isEnabled ? 'Да' : 'Нет';
            }
            if (isset($value)) {
                $text .= "\n" . $propFields["NAME"] . ': ' . '<b>' . $value . '</b><br>';
            }
        }

        if ($data['page']) {
            $text .= "\n" . 'Страница: ' . $data['page'];
        }

        if ($goodId = (int)$data['item']) {
            $text .= "Наименование: " . $this->getGoodText($goodId);
        }

        $messageParams = [
            "EVENT_NAME" => $eventName,
            "LID" => "s1",
            "C_FIELDS" => ["TEXT" => $text, "EMAIL" => $data['email'] ?? $data['EMAIL']],
        ];
        if (!empty($files)) {
            $messageParams['FILES'] = $files;
        }

        return Event::send($messageParams);
    }

    private function getGoodText($itemId)
    {
        $text = '';
        $dbItems = CIBlockElement::GetList(
            [],
            ['ID' => $itemId],
            false,
            false,
            ['ID', 'IBLOCK_ID', 'NAME', 'DETAIL_PAGE_URL']
        );

        if ($arItem = $dbItems->GetNext()) {
            $arItem['DETAIL_PAGE_URL'] = str_replace('%2F', '/', $arItem['DETAIL_PAGE_URL']);
            if ($arItem['DETAIL_PAGE_URL']) {
                $url = 'https://' . SITE_SERVER_NAME . $arItem['DETAIL_PAGE_URL'];
            }
            $text .= "\n" . sprintf("<a href='%s'>%s</a>", $url ?? "", $arItem['NAME']);
        }

        return $text;
    }

    private function getUtmData()
    {
        $utms = [];
        if ($_SESSION['utm_source']) { // init.php
            $utms['UTM_SOURCE'] = $_SESSION['utm_source'];
        }
        if ($_SESSION['utm_medium']) {
            $utms['UTM_MEDIUM'] = $_SESSION['utm_medium'];
        }
        if ($_SESSION['utm_campaign']) {
            $utms['UTM_CAMPAIGN'] = $_SESSION['utm_campaign'];
        }

        return $utms;
    }

    private function getIblockId()
    {
        $iblockInfo = \Bitrix\Iblock\IblockTable::getList([
            'select' => ['ID'],
            'filter' => [
                "CODE" => $this->iblockCode,
                "IBLOCK_TYPE_ID" => self::IBLOCK_TYPE_CODE
            ]
        ])->fetch();
        return $iblockInfo['ID'];
    }

    /**
     * Добавляем подписки
     * @param $receiver
     * @return array|mixed
     */
    public function addToSubscribe(string $receiver, string $list = '19366189,20624783')
    {
        $uniSenderResult = SiteHelper::addUnisenderSubscribe($receiver, '', $list);
        return json_decode($uniSenderResult);
    }

    /**
     * @param $result
     * @param false $error
     * @return AjaxJson
     */
    private function prepareResponse($result, $error = false)
    {
        if ($error) {
            $errorCollection = new ErrorCollection();
            $error = new Error($error, '100');
            $errorCollection->setError($error);
            return AjaxJson::createError($errorCollection);
        } else {
            return AjaxJson::createSuccess(array_merge(['success' => true], $result));
        }
    }

    /**
     * @param string $email
     * @return AjaxJson|false|int|string
     * @throws Main\ArgumentException
     * @throws Main\ObjectPropertyException
     * @throws Main\SystemException
     */
    private function getUserId(string $email)
    {
        global $USER;

        $user = \Bitrix\Main\UserTable::getRow([
            'select' => ['ID'],
            'filter' => [
                '=EMAIL' => $email
            ]
        ]);
        if ($user['ID']) {
            $userId = $user['ID'];
        } else {
            $USER->SimpleRegister($email);
            $userId = $USER->GetID();
            if (!$userId) {
                return false;
            }
        }

        return $userId;
    }

    /**
     * @return array
     */
    public function configureActions()
    {
        Loader::includeModule('iblock');
        return [
            'sendForm' => [
                'prefilters' => []
            ],
            'addEmail' => [
                'prefilters' => []
            ],
            'addOrder' => [
                'prefilters' => []
            ],
        ];
    }

    /**
     * @param $signedParameters
     * @throws Main\ArgumentTypeException
     * @throws Main\Security\Sign\BadSignatureException
     */
    private function initParams($signedParameters)
    {
        $signer = new \Bitrix\Main\Component\ParameterSigner;
        $this->arParams = $signer->unsignParameters($this->__name, $signedParameters);
    }

    /**
     * массива параметров которые надо брать из параметров компонента
     * @return string[]
     */
    protected function listKeysSignedParameters()
    {
        return [

        ];
    }
}