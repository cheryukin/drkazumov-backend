
<ul class="nav">
    <? foreach ($arResult['SECTIONS']['CHILD'] as $section):?>
    <li class="nav__item <?if ($section['CHILD']):?>nav__item_parent<?endif;?>">
        <a href="<?=$section['CODE']?>" class="nav__link"><?=$section['NAME']?></a>
        <?if ($section['CHILD']):?>
            <ul class="subnav">
                <?foreach ($section['CHILD'] as $subSection):?>
                <li class="subnav__item">
                    <a href="<?=$subSection['CODE']?>" class="subnav__link"><?=$subSection['NAME']?></a>
                </li>
                <?endforeach;?>
            </ul>
        <?endif;?>
    </li>
    <?endforeach;?>
</ul>