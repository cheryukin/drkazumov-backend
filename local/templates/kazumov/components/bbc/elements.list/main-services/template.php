<?
use Bitrix\Main\Localization\Loc;
?>
<section class="section section_p_top">
    <div class="wrapper">
        <div class="title-box">
            <h2 class="title"><?=Loc::getMessage("SERVICE_BLOCK_TITLE")?></h2>
            <a href="/services/" class="button button_border">
                <?=Loc::getMessage("SERVICE_BLOCK_SHOW_ALL")?>
            </a>
        </div>

        <div class="services">
            <div class="y-row">
                <?foreach ($arResult['ELEMENTS'] as $element):?>
                <div class="y-col y-col-4">
                    <div class="services-item">
                        <a href="<?=$element['DETAIL_PAGE_URL']?>" class="services-item__top">
                            <div class="services-item__img">
                                <img src="<?=CFile::GetPath($element['PROPERTY_ICON_VALUE'])?>" alt="">
                            </div>
                            <div class="services-item__name text-22">
                                <?=$element['NAME']?>
                            </div>
                        </a>
                        <div class="services-item__text text">
                            <?=$element['PREVIEW_TEXT']?>
                        </div>
                        <div class="services-item__bottom">
                            <div class="services-item__price  text-22">
                                <?=$element['PROPERTY_PRICE_VALUE']?>
                            </div>
                            <?if (!$element['PROPERTY_SHOW_RECORD_BUTTON']):?>
                            <a href="<?=$element['DETAIL_PAGE_URL']?>" class="button button_border button_sm button_font_16">
                                <?=Loc::getMessage("SERVICE_BLOCK_MORE")?>
                            </a>
                            <?else:?>
                                <a href="#popup-request" class="button button_shadow button_sm button_font_16" data-fancybox>
                                    <?=Loc::getMessage("SERVICE_BLOCK_RECORD")?>
                                </a>
                            <?endif;?>
                        </div>
                    </div>
                </div>
                <?endforeach;?>
            </div>
        </div>

        <div class="more">
            <a href="/services/" class="button button_lg button_border">
                <?=Loc::getMessage("SERVICE_BLOCK_SHOW_ALL")?>
            </a>
        </div>
    </div>
</section>