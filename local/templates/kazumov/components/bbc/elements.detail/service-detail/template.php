<?
use Bitrix\Main\Localization\Loc;
?>
<?if ($arResult['PROPS']['STOCK']['VALUE']):?>
    <?
    $APPLICATION->IncludeComponent(
        "bbc:elements.detail",
        "stock",
        array(
            "ADD_SECTIONS_CHAIN" => false,
            "CACHE_GROUPS" => "N",
            "CACHE_NOTES" => "",
            "CACHE_TIME" => "360000",
            "CACHE_TYPE" => "A",
            "DATE_FORMAT" => "d.m.Y",
            "ELEMENT_CODE" => "",
            "ELEMENT_ID" => $arResult['PROPS']['STOCK']['VALUE'],
            "IBLOCK_ID" => "14",
            "IBLOCK_TYPE" => "content",
            "OG_TAGS_DESCRIPTION" => "0",
            "OG_TAGS_IMAGE" => "0",
            "OG_TAGS_TITLE" => "0",
            "OG_TAGS_URL" => "0",
            "RESULT_PROCESSING_MODE" => "EXTENDED",
            "SELECT_FIELDS" => array("PREVIEW_PICTURE", "PREVIEW_TEXT", "DETAIL_PICTURE", "DETAIL_TEXT"),
            "SELECT_PROPS" => array("HIDE_TOP","LINK", "PRICE", "ADVANTAGES", "LABELS", "PRICE"),
            "SET_404" => "N",
            "SET_SEO_TAGS" => false
        )
    );
    ?>
<?endif;?>
<?=$arResult['DETAIL_TEXT']?>

<?if ($arResult['PROPS']['PRICE_LIST']['VALUE']):?>
    <div class="service-info" id="service-info--cost">
        <div class="service-info__title text-22"><?=Loc::getMessage('PRICE_TITLE')?></div>
        <div class="service-info__text text">
            <div class="price-list">
                <?foreach ($arResult['PROPS']['PRICE_LIST']['VALUE'] as $idx => $service):?>
                <div class="price-list__item">
                    <span><?=$service?></span>
                    <span><?=$arResult['PROPS']['PRICE_LIST']['DESCRIPTION'][$idx]?></span>
                </div>
                <?endforeach;?>
            </div>
        </div>
    </div>
<?endif;?>

<?
$APPLICATION->IncludeComponent(
    "internal:forms",
    "consult",
    [],
    false
); ?>

<?if (isset($arResult['DOCTOR'])):?>
    <div class="service-info">
        <div class="service-info__title text-22">
            <?=Loc::getMessage("DOCTOR_BLOCK_TITLE")?>
        </div>
        <div class="service-info__text text">
            <?if ($arResult['DOCTOR']['props']['VIDEO']):?>
            <div class="video">
                <a href="<?=$arResult['DOCTOR']['props']['VIDEO']?>" class="video__play"></a>
            </div>
            <?endif;?>
            <p>
                <?=Loc::getMessage("DOCTOR_DESCRIPTION_TITLE")?>
                <?=str_replace('&lt;br&gt;', ' ', $arResult['DOCTOR']['fields']['NAME'])?>
            </p>
            <?if ($arResult['DOCTOR']['props']['EXPERIENCE']):?>
            <p>
                <?=Loc::getMessage("DOCTOR_EXPERIENCE_TITLE")?> <?=$arResult['DOCTOR']['props']['EXPERIENCE']?>
            </p>
            <?endif;?>
        </div>
    </div>
<?endif;?>

<?
global $workFilter;
$workFilter = ['PROPERTY_SERVICES' => $arResult['ID']];
?>
<?if ($arResult['PROPERTY_WORKS_VALUE']):?>
<!--works-->
<? $APPLICATION->IncludeComponent(
    "bbc:elements.list",
    "works-block-list",
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
        "EX_FILTER_NAME" => "workFilter",
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
        "SECTION_ID" => $arResult['PROPERTY_WORKS_VALUE'],
        "SELECT_FIELDS" => array("PREVIEW_TEXT", "PREVIEW_PICTURE", "NAME", "DETAIL_PICTURE", "DETAIL_TEXT"),
        "SELECT_PROPS" => array("REASON", "DIAGNOSE", "SERVICES", "RESULT", "DOCTOR", "RESEARCH"),
        "SET_404" => "N",
        "SET_SEO_TAGS" => "N",
        "SORT_BY_1" => "SORT",
        "SORT_BY_2" => "SHOWS",
        "SORT_ORDER_1" => "ASC",
        "SORT_ORDER_2" => "ASC",
        "USE_AJAX" => "Y",
        'URL' => '/works/?tags='.$arResult['SECTION']['PATH'][0]['NAME'],
    )
); ?>
<?endif;?>
<!--reviews-->
<? $APPLICATION->IncludeComponent(
    "bbc:elements.list",
    "reviews-block-list",
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
        "EX_FILTER_NAME" => "workFilter",
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
        "USE_AJAX" => "Y",
        'URL' => '/reviews/?tags='.$arResult['SECTION']['PATH'][0]['NAME'],
    )
); ?>

<?=html_entity_decode($arResult['PROPERTY_CATEGORY_VALUE']['TEXT'])?>
