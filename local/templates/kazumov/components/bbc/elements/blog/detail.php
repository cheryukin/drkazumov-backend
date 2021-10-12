<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>

<? $APPLICATION->IncludeComponent('bbc:elements.detail', 'blog-detail', array(
    'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
    'IBLOCK_ID' => $arParams['IBLOCK_ID'],
    'ELEMENT_ID' => $arResult['VARIABLES']['ELEMENT_ID'],
    'ELEMENT_CODE' => $arResult['VARIABLES']['ELEMENT_CODE'],
    'SELECT_FIELDS' => $arParams['DETAIL_SELECT_FIELDS'],
    'SELECT_PROPS' => $arParams['DETAIL_SELECT_PROPS'],
    'RESULT_PROCESSING_MODE' => $arParams['DETAIL_RESULT_PROCESSING_MODE'],
    'ADD_SECTIONS_CHAIN' => $arParams['ADD_SECTIONS_CHAIN'],
    'ADD_ELEMENT_CHAIN' => $arParams['ADD_ELEMENT_CHAIN'],
    'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
    'CACHE_TYPE' => $arParams['CACHE_TYPE'],
    'CACHE_TIME' => $arParams['CACHE_TIME'],
    'SET_404' => $arParams['SET_404'],
    'DATE_FORMAT' => $arParams['DETAIL_DATE_FORMAT'],
    'SET_SEO_TAGS' => $arParams['SET_SEO_TAGS']
),
    $component
); ?>

<!--reviews-->
<? $APPLICATION->IncludeComponent(
    "bbc:elements.list",
    "reviews-block-list",
    array(
        "ADD_SECTIONS_CHAIN" => "N",
        "AJAX_COMPONENT_ID" => "",
        "AJAX_HEAD_RELOAD" => "N",
        "AJAX_TEMPLATE_PAGE" => "",
        "AJAX_TYPE" => "DEFAULT",
        "CACHE_GROUPS" => "N",
        "CACHE_TIME" => "360000",
        "CACHE_TYPE" => "A",
        "CHECK_PERMISSIONS" => "Y",
        "DATE_FORMAT" => "d.m.Y",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "ELEMENTS_COUNT" => "10",
        "EX_FILTER_NAME" => "",
        "IBLOCK_ID" => "6",
        "IBLOCK_TYPE" => "content",
        "INCLUDE_SUBSECTIONS" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SAVE_SESSION" => "N",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "",
        "RESULT_PROCESSING_MODE" => "DEFAULT",
        "SECTION_CODE" => "",
        "SECTION_ID" => "0",
        "SELECT_FIELDS" => array("PREVIEW_TEXT", "PREVIEW_PICTURE", "NAME"),
        "SELECT_PROPS" => array("SERVICE"),
        "SET_404" => "N",
        "SET_SEO_TAGS" => "N",
        "SORT_BY_1" => "SORT",
        "SORT_BY_2" => "SHOWS",
        "SORT_ORDER_1" => "ASC",
        "SORT_ORDER_2" => "ASC",
        "USE_AJAX" => "Y",
    )
); ?>

<?
global $popularFilter;
$popularFilter = ['UF_IS_POPULAR' => true];
$APPLICATION->IncludeComponent(
    "bbc:sections.list",
    "popular-services",
    array(
        "ADD_ELEMENT_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "CACHE_GROUPS" => "N",
        "CACHE_NOTES" => "",
        "CACHE_TIME" => "360000",
        "CACHE_TYPE" => "A",
        "DATE_FORMAT" => "d.m.Y",
        "EX_FILTER_NAME" => "popularFilter",
        "IBLOCK_ID" => "4",
        "IBLOCK_TYPE" => "content",
        "OG_TAGS_DESCRIPTION" => "0",
        "OG_TAGS_IMAGE" => "0",
        "OG_TAGS_TITLE" => "0",
        "OG_TAGS_URL" => "0",
        "RESULT_PROCESSING_MODE" => "DEFAULT",
        "SELECT_FIELDS" => array("NAME"),
        "SELECT_PROPS" => array("", ""),
        "SET_404" => "N",
        "SET_SEO_TAGS" => "N"
    )
);
?>

<?
$APPLICATION->IncludeComponent(
    "internal:forms",
    "consult",
    [],
    false
);?>

