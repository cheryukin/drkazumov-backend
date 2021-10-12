<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Наши работы");
?>

<?$APPLICATION->IncludeComponent(
	"bbc:elements", 
	"works",
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
			0 => "",
			1 => "",
		),
		"DETAIL_SELECT_PROPS" => array(
			0 => "",
			1 => "",
		),
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENTS_COUNT" => "6",
		"EX_FILTER_NAME" => "worksFilter",
		"IBLOCK_ID" => "7",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_SUBSECTIONS" => "N",
		"LIST_DATE_FORMAT" => "d.m.Y",
		"LIST_RESULT_PROCESSING_MODE" => "EXTENDED",
		"LIST_SELECT_FIELDS" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "PREVIEW_PICTURE",
			3 => "DETAIL_TEXT",
			4 => "DETAIL_PICTURE",
			5 => "",
		),
		"LIST_SELECT_PROPS" => array(
			0 => "DOCTOR",
			1 => "SERVICES",
			2 => "DIAGNOSE",
			3 => "RESEARCH",
			4 => "REASON",
			5 => "RESULT",
			6 => "DATE",
		),
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SAVE_SESSION" => "N",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "custom",
		"PAGER_TITLE" => "",
		"SEF_FOLDER" => "/works/",
		"SEF_MODE" => "Y",
		"SET_404" => "N",
		"SET_SEO_TAGS" => "Y",
		"SORT_BY_1" => "SORT",
		"SORT_BY_2" => "SORT",
		"SORT_ORDER_1" => "ASC",
		"SORT_ORDER_2" => "ASC",
		"USE_AJAX" => "Y",
		"USE_SEARCH" => "N",
		"COMPONENT_TEMPLATE" => "works",
		"SEF_URL_TEMPLATES" => array(
			"index" => "/works/",
			"section" => "/works/",
			"detail" => "/works/",
		)
	),
	false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>