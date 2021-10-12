<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О клинике");
?>

<?
$APPLICATION->IncludeComponent(
    "bbc:elements.detail",
    "about-page",
    array(
        "ADD_ELEMENT_CHAIN" => false,
        "ADD_SECTIONS_CHAIN" => false,
        "CACHE_GROUPS" => "N",
        "CACHE_NOTES" => "",
        "CACHE_TIME" => "360000",
        "CACHE_TYPE" => "A",
        "DATE_FORMAT" => "d.m.Y",
        "ELEMENT_CODE" => "about",
        "ELEMENT_ID" => "",
        "IBLOCK_ID" => "1",
        "IBLOCK_TYPE" => "content",
        "OG_TAGS_DESCRIPTION" => "0",
        "OG_TAGS_IMAGE" => "0",
        "OG_TAGS_TITLE" => "0",
        "OG_TAGS_URL" => "0",
        "RESULT_PROCESSING_MODE" => "DEFAULT",
        "SELECT_FIELDS" => array("DETAIL_TEXT", "PREVIEW_TEXT"),
        "SELECT_PROPS" => array("", ""),
        "SET_404" => "N",
        "SET_SEO_TAGS" => false
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

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>