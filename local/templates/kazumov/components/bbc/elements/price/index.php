<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>


<?
$activeTags = $APPLICATION->IncludeComponent(
    "internal:tags",
    "",
    [
        'IBLOCK_ID' => $arParams['IBLOCK_ID'],
    ],
    false
);
if ($activeTags) {
    $GLOBALS[$arParams['EX_FILTER_NAME']]['?TAGS'] = $activeTags;
}
?>

<? $APPLICATION->IncludeComponent('bbc:elements.list', 'price-list', array(
    'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
    'IBLOCK_ID' => $arParams['IBLOCK_ID'],
    'INCLUDE_SUBSECTIONS' => $arParams['INCLUDE_SUBSECTIONS'],
    'SORT_BY_1' => $arParams['SORT_BY_1'],
    'SORT_ORDER_1' => $arParams['SORT_ORDER_1'],
    'SORT_BY_2' => $arParams['SORT_BY_2'],
    'SORT_ORDER_2' => $arParams['SORT_ORDER_2'],
    'SELECT_FIELDS' => $arParams['LIST_SELECT_FIELDS'],
    'SELECT_PROPS' => $arParams['LIST_SELECT_PROPS'],
    'RESULT_PROCESSING_MODE' => $arParams['LIST_RESULT_PROCESSING_MODE'],
    'ADD_SECTIONS_CHAIN' => $arParams['ADD_SECTIONS_CHAIN'],
    'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
    'CACHE_TYPE' => $arParams['CACHE_TYPE'],
    'CACHE_TIME' => $arParams['CACHE_TIME'],
    'SET_404' => $arParams['SET_404'],
    'CHECK_PERMISSIONS' => $arParams['CHECK_PERMISSIONS'],
    'DATE_FORMAT' => $arParams['LIST_DATE_FORMAT'],
    'SET_SEO_TAGS' => $arParams['SET_SEO_TAGS'],
    'PAGER_SAVE_SESSION' => $arParams['PAGER_SAVE_SESSION'],
    'ELEMENTS_COUNT' => $arParams['ELEMENTS_COUNT'],
    'USE_SEARCH' => $arParams['USE_SEARCH'],
    'EX_FILTER_NAME' => $arParams['EX_FILTER_NAME'],
    'USE_AJAX' => $arParams['USE_AJAX'],
    'AJAX_TYPE' => $arParams['AJAX_TYPE'],
    'AJAX_HEAD_RELOAD' => $arParams['AJAX_HEAD_RELOAD'],
    'AJAX_TEMPLATE_PAGE' => $arParams['AJAX_TEMPLATE_PAGE'],
    'PAGER_TEMPLATE' => $arParams['PAGER_TEMPLATE'],
    'DISPLAY_TOP_PAGER' => $arParams['DISPLAY_TOP_PAGER'],
    'DISPLAY_BOTTOM_PAGER' => $arParams['DISPLAY_BOTTOM_PAGER'],
    'PAGER_TITLE' => $arParams['PAGER_TITLE'],
    'PAGER_SHOW_ALWAYS' => $arParams['PAGER_SHOW_ALWAYS'],
    'PAGER_DESC_NUMBERING' => $arParams['PAGER_DESC_NUMBERING'],
    'PAGER_DESC_NUMBERING_CACHE_TIME' => $arParams['PAGER_DESC_NUMBERING_CACHE_TIME'],
    'PAGER_SHOW_ALL' => $arParams['PAGER_SHOW_ALL']
),
    $component
); ?>

<?
$APPLICATION->IncludeComponent(
    "internal:forms",
    "consult",
    [],
    false
);?>
