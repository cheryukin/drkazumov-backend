<div class="hidden">
    <?
    $APPLICATION->IncludeComponent(
        "internal:forms",
        "request-modal",
        [],
        false
    );?>

    <?
    $APPLICATION->IncludeComponent(
        "internal:forms",
        "callback-modal",
        [],
        false
    );?>
</div>


<?
$APPLICATION->IncludeComponent(
    "bbc:sections.list",
    "mobile-fixed-panel",
    array(
        "ADD_ELEMENT_CHAIN" => false,
        "ADD_SECTIONS_CHAIN" => false,
        "CACHE_GROUPS" => "N",
        "CACHE_NOTES" => "",
        "CACHE_TIME" => "360000",
        "CACHE_TYPE" => "A",
        "DATE_FORMAT" => "d.m.Y",
        "IBLOCK_ID" => "8",
        "IBLOCK_TYPE" => "menu",
        "OG_TAGS_DESCRIPTION" => "0",
        "OG_TAGS_IMAGE" => "0",
        "OG_TAGS_TITLE" => "0",
        "OG_TAGS_URL" => "0",
        "RESULT_PROCESSING_MODE" => "DEFAULT",
        "SELECT_FIELDS" => array("NAME"),
        "SELECT_PROPS" => array("", ""),
        "SET_404" => "N",
        "SET_SEO_TAGS" => false,
        'TITLE' => 'О нас',
        'USE_CODE' => 'Y'
    )
);
?>