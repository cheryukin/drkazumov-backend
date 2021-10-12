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

class Tags extends CBitrixComponent implements Controllerable
{
    public $returned;

    /**
     * подготавливает входные параметры
     * @param $params
     * @return array
     */
    public function onPrepareComponentParams($params)
    {
        return [
            'IBLOCK_ID' => (int)$params['IBLOCK_ID'],
            'SECTION_CODE' => $params['SECTION_CODE'],
            'SECTION_ID' => (int)$params['SECTION_ID'],
        ];
    }

    /**
     * выполняет логику работы компонента
     */
    public function executeComponent()
    {
        try {
            $this->getResult();

            $this->includeComponentTemplate();
            return $this->arResult['ACTIVE_TAGS'];
        } catch (Exception $e) {
            ShowError($e->getMessage());
        }
    }

    private function getResult()
    {
        $filter = ['IBLOCK_ID' => $this->arParams['IBLOCK_ID'], 'ACTIVE' => 'Y'];
        if ($this->arParams['SECTION_ID']) {
            $filter['SECTION_ID'] = $this->arParams['SECTION_ID'];
        } elseif ($this->arParams['SECTION_CODE']) {
            $sectionInfo = Bitrix\Iblock\ElementTable::getList([
                'select' => ['ID'],
                'filter' => ['CODE' => $this->arParams['SECTION_CODE']]
            ])->fetch();
            $filter['SECTION_ID'] = $sectionInfo['ID'];
        }
        $elements = Bitrix\Iblock\ElementTable::getList([
            'select' => ['TAGS'],
            'filter' => $filter
        ])->fetchAll();

        $tags = $this->prepareTags($elements);
        $request = Bitrix\Main\Context::getCurrent()->getRequest();
        $activeTags = $request->get('tags');
        $this->arResult['ACTIVE_TAGS'] = $activeTags ? explode(",", $activeTags) : null;
        $this->arResult['TAGS'] = $tags;
    }

    private function prepareTags($elements)
    {
        $tags = [];
        foreach ($elements as $element) {
            $elementTags = explode(',', $element['TAGS']);
            foreach ($elementTags as $tag) {
                if ($tag) {
                    $tags[] = trim($tag);
                }
            }
        }
        return array_values(array_unique($tags));
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
     * @return array
     */
    public function configureActions()
    {
        Loader::includeModule('iblock');
        return [
            'sendForm' => [
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