<?php

use Bitrix\Highloadblock\HighloadBlockTable;
use Bitrix\Main\Service\GeoIp\Manager;
use Bitrix\Sale\Location\GeoIp;
use Bitrix\Main\Loader;

class SiteHelper
{
    /**
     * @param $name
     * Рендерит иконку по названию
     */
    public static function showIcon($name)
    {
        global $APPLICATION;

        $APPLICATION->IncludeComponent("bitrix:main.include", ".default",
            [
                "AREA_FILE_SHOW" => "file",
                "PATH" => SITE_TEMPLATE_PATH . '/assets/img/svg/' . $name . '.svg',
                "EDIT_TEMPLATE" => ""
            ],
            false,
            ['HIDE_ICONS' => 'Y']
        );
    }

    /**
     * @param string $path
     * @param string $name
     * Включаемая область, с редактированием в php
     */
    public static function showArea(string $path, string $name = "Редактировать область")
    {
        global $APPLICATION;
        $postfix = '.php';
        $APPLICATION->IncludeFile(SITE_DIR . $path . $postfix, array(), array(
            "MODE" => "php",
            "NAME" => $name,
        ));
    }

    public static function getElementById($elemId)
    {
        $filter = ['ID' => $elemId];
        $element = self::getElements($filter);
        return array_shift($element);
    }


    public static function getElementsCount($iblockId, $sectionId = '')
    {

        $cache_id = "elemCount" . $iblockId . $sectionId;
        $obCache = new CPHPCache;
        $filter = ['IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y'];
        if (!empty($sectionId)) {
            $filter['SECTION_ID'] = $sectionId;
        }

        if ($obCache->InitCache(36000, $cache_id, '/' . $cache_id)) {
            $vars = $obCache->GetVars();
            $count = $vars['count'];
        } else {
            $count = CIBlockElement::GetList([], $filter, [], false, ['ID']);
            $obCache->EndDataCache(['count' => $count]);
        }

        return $count;
    }

    public static function write2Log($data, $filename = 'test.log')
    {
        $fp = fopen($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/' . $filename, "a");
        fwrite($fp, "\r\n=================" . date('Y-m-d h:i') . "=====================\r\n");
        fwrite($fp, print_r($data, true));
        fclose($fp);
    }

    /**
     * @return array
     * Информация о местоположении по IP
     */
    public static function getDefaultLocation()
    {
        $arResult = [];
        if (Loader::includeModule('sale')) {
            $ipAddress = Manager::getRealIp();
            $result = Manager::getDataResult($ipAddress, "ru");
            $cityId = GeoIp::getLocationId($ipAddress, "ru");
            $arResult = [
                'name' => $result->getGeoData()->cityName,
                'id' => $cityId,
            ];

        }
        return $arResult;
    }

    public static function getHighloadInfo(int $hlblockId, string $code)
    {
        Loader::includeModule('highloadblock');
        $hlblock = HighloadBlockTable::getList(
            [
                "select" => ["*"],
                "filter" => ['ID' => $hlblockId]
            ]
        )->fetch();
        $entity = HighloadBlockTable::compileEntity($hlblock);
        $entity_data_class = $entity->getDataClass();
        $rsData = $entity_data_class::getList([
            "select" => ["*"],
            "filter" => ['UF_XML_ID' => $code]
        ]);
        return $rsData->Fetch();
    }

    public static function showOption(string $optionName)
    {
        return \Bitrix\Main\Config\Option::get("askaron.settings", "UF_" . $optionName);
    }

    public function getSectionProps( $iblockId, $sectionId)
    {
        return \CIBlockSection::GetList([], ["IBLOCK_ID" => $iblockId, "ID" => $sectionId], false, ['UF_*'])->GetNext();
    }

    public function getIblockDescription(int $iblockId)
    {
        $iblockInfo = Bitrix\Iblock\IblockTable::getList([
            'select' => ['DESCRIPTION'],
            'filter' => ['ID' => $iblockId]
        ])->fetch();

        return $iblockInfo['DESCRIPTION'];
    }

    public static function deleteSpaces($string)
    {
        return str_replace("&lt;br&gt;", ' ', $string);
    }

    public static function getElements($filter = [])
    {
        $arSelect = ["ID", "IBLOCK_ID", "NAME", "SORT", "PROPERTY_*", 'DETAIL_PAGE_URL', 'SECTION_PAGE_URL'];
        $result = [];
        $res = CIBlockElement::GetList([], $filter, false, false, $arSelect);

        while ($ob = $res->GetNextElement()) {
            $arProps = $ob->GetProperties();
            $fields = $ob->GetFields();
            $result[$fields['ID']]['fields'] = $ob->GetFields();
            foreach ($arProps as $arProp) {
                $result[$fields['ID']]['props'][$arProp['CODE']] = $arProp['VALUE'];
            }
        }

        return $result;
    }

    public static function getIblockIdByCode($code)
    {
        $iblockInfo = Bitrix\Iblock\IblockTable::getList([
            'select' => ['ID'],
            'filter' => ['CODE' => $code]
        ])->fetch();

        return $iblockInfo['ID'];
    }
}