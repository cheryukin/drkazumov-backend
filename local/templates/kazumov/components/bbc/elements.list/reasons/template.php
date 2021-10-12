<?
use Bitrix\Main\Localization\Loc;
?>
<section class="section">
    <div class="wrapper">
        <h2 class="title"><?=Loc::getMessage("REASON_BLOCK_TITLE")?></h2>
        <div class="reasons">
           <?foreach ($arResult['ELEMENTS'] as $element):?>
            <div class="reasons-item">
                <div class="reasons-item__img">
                    <img src="<?=CFile::GetPath($element['PROPERTY_ICON_VALUE'])?>" alt="">
                </div>
                <div class="reasons-item__text">
                    <div class="reasons-item__title"><?=$element['NAME']?></div>
                    <?=$element['PREVIEW_TEXT']?>
                </div>
            </div>
            <?endforeach;?>
        </div>
    </div>
</section>