<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Услуги стоматологии в Невском районе на Дальневосточном проспекте д. 12 к. 2 - Клиника доктора Казумова в СПб ");
$APPLICATION->SetTitle("Услуги");
?>

<?$APPLICATION->IncludeComponent(
	"bbc:elements", 
	"services", 
	array(
		"ADD_ELEMENT_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_COMPONENT_ID" => "",
		"AJAX_HEAD_RELOAD" => "N",
		"AJAX_TEMPLATE_PAGE" => "",
		"AJAX_TYPE" => "DEFAULT",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "360000",
		"CACHE_TYPE" => "A",
		"CHECK_PERMISSIONS" => "Y",
		"DETAIL_DATE_FORMAT" => "d.m.Y",
		"DETAIL_OG_TAGS_DESCRIPTION" => "0",
		"DETAIL_OG_TAGS_IMAGE" => "0",
		"DETAIL_OG_TAGS_TITLE" => "0",
		"DETAIL_OG_TAGS_URL" => "0",
		"DETAIL_RESULT_PROCESSING_MODE" => "EXTENDED",
		"DETAIL_SELECT_FIELDS" => array(
			0 => "DETAIL_TEXT",
			1 => "NAME",
		),
		"DETAIL_SELECT_PROPS" => array(
			0 => "ICON",
			1 => "PRICE",
			2 => "PRICE_LIST",
			3 => "DOCTOR",
			4 => "PRICE",
			5 => "CATEGORY",
			6 => "WORKS",
			7 => "POPULAR_SERVICES",
			8 => "STOCK"
		),
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENTS_COUNT" => "10",
		"EX_FILTER_NAME" => "mainFilter",
		"IBLOCK_ID" => "4",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_SUBSECTIONS" => "N",
		"LIST_DATE_FORMAT" => "d.m.Y",
		"LIST_RESULT_PROCESSING_MODE" => "DEFAULT",
		"LIST_SELECT_FIELDS" => array(
			0 => "NAME",
			1 => "TAGS",
			2 => "PREVIEW_TEXT",
			3 => "PREVIEW_PICTURE",
			4 => "DETAIL_TEXT",
			5 => "",
		),
		"LIST_SELECT_PROPS" => array(
			0 => "ICON",
			1 => "PRICE",
			2 => "SHOW_RECORD_BUTTON",
		),
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SAVE_SESSION" => "N",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "custom",
		"PAGER_TITLE" => "",
		"SEF_FOLDER" => "/services/",
		"SEF_MODE" => "Y",
		"SET_404" => "N",
		"SET_SEO_TAGS" => "Y",
		"SORT_BY_1" => "SHOWS",
		"SORT_BY_2" => "SHOWS",
		"SORT_ORDER_1" => "ASC",
		"SORT_ORDER_2" => "ASC",
		"USE_AJAX" => "Y",
		"USE_SEARCH" => "N",
		"COMPONENT_TEMPLATE" => "services",
		"SEF_URL_TEMPLATES" => array(
			"index" => "/services/",
			"section" => "#SECTION_CODE#/",
			"detail" => "#SECTION_CODE#/#ELEMENT_CODE#/",
		)
	),
	false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>