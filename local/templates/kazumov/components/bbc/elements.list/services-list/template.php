<?
use Bitrix\Main\Localization\Loc;
?>

<div class="services services_all">
    <div class="y-row">
        <?foreach ($arResult['ELEMENTS'] as $element):?>
            <div class="y-col y-col-6">
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
                        <div class="services-item__price  text-22">  <?=$element['PROPERTY_PRICE_VALUE']?></div>
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

<?if ($arParams['DISPLAY_BOTTOM_PAGER'] === 'Y') {?>
    <?=$arResult['NAV_STRING']?>
<?}?>
