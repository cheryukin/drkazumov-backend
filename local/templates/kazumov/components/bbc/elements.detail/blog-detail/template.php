<?
use Bitrix\Main\Localization\Loc;
?>

<div class="article">
    <div class="article-top">
        <a href="/blog/" class="back-link">
            <span class="icon-arrow-more"></span>
            <?=Loc::getMessage('ALL_ARTICLES')?>
        </a>
        <div class="article__date text"> <?=$arResult['DATE_ACTIVE_FROM']?></div>
    </div>
    <div class="article__image">
        <img src="<?=CFile::GetPath($arResult['DETAIL_PICTURE'])?>" alt="">
    </div>


    <?=$arResult['DETAIL_TEXT']?>

    <?if (isset($arResult['DOCTOR'])):?>
        <div class="service-info" id="block4">
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
                    <?=SiteHelper::deleteSpaces($arResult['DOCTOR']['fields']['NAME'])?>
                </p>
                <?if ($arResult['DOCTOR']['props']['EXPERIENCE']):?>
                    <p>
                        <?=Loc::getMessage("DOCTOR_EXPERIENCE_TITLE")?> <?=$arResult['DOCTOR']['props']['EXPERIENCE']?>
                    </p>
                <?endif;?>
            </div>
        </div>
    <?endif;?>

    <div class="article-bottom-nav">
        <?if ($arResult['PREV_ITEM']):?>
            <a href="<?=$arResult['PREV_ITEM']['URL']?>" class="article-bottom-nav__prev">
                <span class="icon-arrow-left"></span>
            </a>
        <?endif;?>
        <a href="/blog/" class="article-bottom-nav__all">
            <?=Loc::getMessage("OTHER_ARTICLES")?>
        </a>
        <?if ($arResult['NEXT_ITEM']):?>
                <a href="<?=$arResult['NEXT_ITEM']['URL']?>" class="article-bottom-nav__next">
                    <span class="icon-arrow-right"></span>
                </a>
            </div>
        <?endif;?>
</div>

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
        "SET_SEO_TAGS" => "Y",
        "SORT_BY_1" => "SORT",
        "SORT_BY_2" => "SHOWS",
        "SORT_ORDER_1" => "ASC",
        "SORT_ORDER_2" => "ASC",
        "USE_AJAX" => "Y",
        'URL' => '/works/?tags='.$arResult['SECTION']['PATH'][0]['NAME'],
    )
); ?>

<?endif;?>