<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>


<?
$APPLICATION->IncludeComponent(
    "bbc:elements.detail",
    "contacts",
    array(
//        "ADD_ELEMENT_CHAIN" => "Y",
        "ADD_SECTIONS_CHAIN" => false,
        "CACHE_GROUPS" => "N",
        "CACHE_NOTES" => "",
        "CACHE_TIME" => "360000",
        "CACHE_TYPE" => "A",
        "DATE_FORMAT" => "d.m.Y",
        "ELEMENT_CODE" => "contacts",
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

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>