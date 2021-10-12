<?=$arResult['DETAIL_TEXT']?>

<? $APPLICATION->IncludeComponent(
    "bbc:elements.list",
    "doctors-list",
    array(
        "ADD_SECTIONS_CHAIN" => "Y",
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
        "SELECT_PROPS" => array("POST", "ANOUNCE"),
        "SET_404" => "N",
        "SET_SEO_TAGS" => "Y",
        "SORT_BY_1" => "SORT",
        "SORT_BY_2" => "SHOWS",
        "SORT_ORDER_1" => "ASC",
        "SORT_ORDER_2" => "ASC",
        "USE_AJAX" => "Y",
        "WITH_TITLE" => "Y"
    )
); ?>

<?=$arResult['PREVIEW_TEXT']?>