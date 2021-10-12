<?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetPageProperty("title", "Клиника доктора Казумова в Санкт-Петербурге, стоматология на Дальневосточный пр., 12, Невский район");
$APPLICATION->SetTitle("Главная");
?>

<?
global $mainFilter;
$mainFilter = ['PROPERTY_SHOW_IN_MAIN' => true];
?>

<?
$APPLICATION->IncludeComponent(
    "bbc:elements.detail",
    "main-banner",
    array(
        "ADD_ELEMENT_CHAIN" => false,
        "ADD_SECTIONS_CHAIN" => false,
        "CACHE_GROUPS" => "N",
        "CACHE_NOTES" => "",
        "CACHE_TIME" => "360000",
        "CACHE_TYPE" => "A",
        "DATE_FORMAT" => "d.m.Y",
        "ELEMENT_CODE" => "main-banner",
        "ELEMENT_ID" => "",
        "IBLOCK_ID" => "1",
        "IBLOCK_TYPE" => "content",
        "OG_TAGS_DESCRIPTION" => "0",
        "OG_TAGS_IMAGE" => "0",
        "OG_TAGS_TITLE" => "0",
        "OG_TAGS_URL" => "0",
        "RESULT_PROCESSING_MODE" => "DEFAULT",
        "SELECT_FIELDS" => array("PREVIEW_PICTURE", "PREVIEW_TEXT"),
        "SELECT_PROPS" => array("", ""),
        "SET_404" => "N",
        "SET_SEO_TAGS" => false
    )
);
?>

<? $APPLICATION->IncludeComponent(
    "bbc:elements.list",
    "reasons",
    array(
        "ADD_SECTIONS_CHAIN" => false,
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
        "IBLOCK_ID" => "2",
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
        "SELECT_PROPS" => array("ICON", ""),
        "SET_404" => "N",
        "SET_SEO_TAGS" => false,
        "SORT_BY_1" => "SORT",
        "SORT_BY_2" => "SHOWS",
        "SORT_ORDER_1" => "ASC",
        "SORT_ORDER_2" => "ASC",
        "USE_AJAX" => "Y"
    )
); ?>

<?
$APPLICATION->IncludeComponent(
    "internal:forms",
    "callback",
    [],
    false
);?>

<? $APPLICATION->IncludeComponent(
    "bbc:elements.list",
    "main-services",
    array(
        "ADD_SECTIONS_CHAIN" => false,
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
        "EX_FILTER_NAME" => "mainFilter",
        "IBLOCK_ID" => "4",
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
        "SELECT_FIELDS" => array("PREVIEW_TEXT", "PREVIEW_PICTURE", "NAME", 'DETAIL_TEXT'),
        "SELECT_PROPS" => array("ICON", "PRICE", "SHOW_RECORD_BUTTON",),
        "SET_404" => "N",
        "SET_SEO_TAGS" => false,
        "SORT_BY_1" => "SORT",
        "SORT_BY_2" => "SHOWS",
        "SORT_ORDER_1" => "ASC",
        "SORT_ORDER_2" => "ASC",
        "USE_AJAX" => "Y"
    )
); ?>

<?SiteHelper::showArea('include/main-advantages');?>

<?
$APPLICATION->IncludeComponent(
    "bbc:elements.detail",
    "main-about",
    array(
        "ADD_ELEMENT_CHAIN" => false,
        "ADD_SECTIONS_CHAIN" => false,
        "CACHE_GROUPS" => "N",
        "CACHE_NOTES" => "",
        "CACHE_TIME" => "360000",
        "CACHE_TYPE" => "A",
        "DATE_FORMAT" => "d.m.Y",
        "ELEMENT_CODE" => "main-about",
        "ELEMENT_ID" => "",
        "IBLOCK_ID" => "1",
        "IBLOCK_TYPE" => "content",
        "OG_TAGS_DESCRIPTION" => "0",
        "OG_TAGS_IMAGE" => "0",
        "OG_TAGS_TITLE" => "0",
        "OG_TAGS_URL" => "0",
        "RESULT_PROCESSING_MODE" => "DEFAULT",
        "SELECT_FIELDS" => array("PREVIEW_PICTURE", "PREVIEW_TEXT", "DETAIL_PICTURE", "DETAIL_TEXT"),
        "SELECT_PROPS" => array("", ""),
        "SET_404" => "N",
        "SET_SEO_TAGS" => false
    )
);
?>

<? $APPLICATION->IncludeComponent(
    "bbc:elements.list",
    "main-doctors",
    array(
        "ADD_SECTIONS_CHAIN" => false,
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
        "EX_FILTER_NAME" => "mainFilter",
        "IBLOCK_ID" => "5",
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
        "SELECT_PROPS" => array("POST"),
        "SET_404" => "N",
        "SET_SEO_TAGS" => false,
        "SORT_BY_1" => "SORT",
        "SORT_BY_2" => "SHOWS",
        "SORT_ORDER_1" => "ASC",
        "SORT_ORDER_2" => "ASC",
        "USE_AJAX" => "Y"
    )
); ?>

<?
$APPLICATION->IncludeComponent(
    "internal:forms",
    "callback",
    [],
    false
);?>

<? $APPLICATION->IncludeComponent(
    "bbc:elements.list",
    "main-reviews",
    array(
        "ADD_SECTIONS_CHAIN" => false,
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
        "EX_FILTER_NAME" => "mainFilter",
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
        "SET_SEO_TAGS" => false,
        "SORT_BY_1" => "SORT",
        "SORT_BY_2" => "SHOWS",
        "SORT_ORDER_1" => "ASC",
        "SORT_ORDER_2" => "ASC",
        "USE_AJAX" => "Y"
    )
); ?>

<? $APPLICATION->IncludeComponent(
    "bbc:elements.list",
    "main-works",
    array(
        "ADD_SECTIONS_CHAIN" => false,
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
        "EX_FILTER_NAME" => "mainFilter",
        "IBLOCK_ID" => "7",
        "IBLOCK_TYPE" => "content",
        "INCLUDE_SUBSECTIONS" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SAVE_SESSION" => "N",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "",
        "RESULT_PROCESSING_MODE" => "EXTENDED",
        "SECTION_CODE" => "",
        "SECTION_ID" => "0",
        "SELECT_FIELDS" => array("PREVIEW_TEXT", "PREVIEW_PICTURE", "NAME", "DETAIL_PICTURE", "DETAIL_TEXT"),
        "SELECT_PROPS" => array("REASON", "DIAGNOSE", "SERVICES", "RESULT", "DOCTOR", "RESEARCH"),
        "SET_404" => "N",
        "SET_SEO_TAGS" => false,
        "SORT_BY_1" => "SORT",
        "SORT_BY_2" => "SHOWS",
        "SORT_ORDER_1" => "ASC",
        "SORT_ORDER_2" => "ASC",
        "USE_AJAX" => "Y"
    )
); ?>

<?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
?>