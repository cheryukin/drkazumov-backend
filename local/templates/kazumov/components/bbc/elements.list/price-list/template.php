<div class="price-block">
    <? foreach ($arResult['ELEMENTS'] as $element):?>
        <div class="service-info">
            <div class="service-info__title text-22"><?=$element['NAME']?></div>
            <div class="service-info__text text">
                <?=$element['DETAIL_TEXT']?>
            </div>
        </div>
    <?endforeach;?>
</div>