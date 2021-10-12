<?php
/**
 * @link http://bbc.bitrix.expert
 * @copyright Copyright © 2014-2015 Nik Samokhvalov
 * @license MIT
 */

namespace Bex\Bbc\Components;

use Bex\Bbc;

if(!defined('B_PROLOG_INCLUDED')||B_PROLOG_INCLUDED!==true)die();

if (!\Bitrix\Main\Loader::includeModule('bex.bbc')) return false;

/**
 * Component for show sections list
 *
 * @author Nikolay Kisluhin
 */
class SectionsList extends Bbc\Basis
{
    use Bbc\Traits\Elements;

    protected $needModules = ['iblock'];

    protected $checkParams = [
        'IBLOCK_TYPE' => ['type' => 'string'],
        'IBLOCK_ID' => ['type' => 'int']
    ];

    protected function executeMain()
    {

        $arFilter = [];
        $sectionId = 0;
        if (!empty($this->arParams['SECTION_ID'])) {
            $arFilter = ['SECTION_ID' => $this->arParams['SECTION_ID']];
            $sectionId = $this->arParams['SECTION_ID'];
        }
        $filter = array_merge($arFilter, $this->getParamsFilters());
        $rsSections = \CIBlockSection::GetList(
            ['DEPTH_LEVEL'=>'ASC','SORT'=>'ASC'],
            $filter,
            $this->arParams['ELEMENT_COUNT'],
            $this->getParamsSelected([
               'DETAIL_PICTURE', 'UF_*', 'IBLOCK_ID','ID','NAME','DEPTH_LEVEL','IBLOCK_SECTION_ID', 'PICTURE', 'SECTION_PAGE_URL', 'LIST_PAGE_URL'
            ]),
            $this->getParamsNavStart()
        );
        
        if (!isset($this->arResult['SECTIONS']))
        {
            $this->arResult['SECTIONS'] = [];
        }



        $sectionLink = [];
        $arResult = [];
        $sectionLink[$sectionId] = &$arResult;

        while ($arSection = $rsSections->GetNext())
        {
            $sectionLink[intval($arSection['IBLOCK_SECTION_ID'])]['CHILD'][$arSection['ID']] = $arSection;
            $sectionLink[$arSection['ID']] = &$sectionLink[intval($arSection['IBLOCK_SECTION_ID'])]['CHILD'][$arSection['ID']];
        }

        $this->arResult['SECTIONS'] = $arResult;
        unset($sectionLink);

      
        if ($this->arParams['SET_404'] === 'Y' && empty($this->arResult['SECTIONS']))
        {
            $this->return404();
        }

        $this->generateNav($rsSections);
        $this->setResultCacheKeys(['NAV_CACHED_DATA']);
    }
}