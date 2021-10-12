<div class="tags">
    <?foreach ($arResult['TAGS'] as $tag):?>
        <a href="#" data-tag="<?=$tag?>"
           class="tags-item <?if (in_array($tag, $arResult['ACTIVE_TAGS'])):?>active<?endif;?>">
            <?=$tag?></a>
    <?endforeach;?>
</div>
