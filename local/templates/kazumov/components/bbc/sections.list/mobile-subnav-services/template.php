<div class="fixed-panel-subnav fixed-panel-subnav_services">
    <div class="fixed-panel__title">Услуги</div>
    <ul class="main-subnav">
        <?foreach ($arResult['SECTIONS']['CHILD'] as $section):?>
            <?if ($section['UF_HIDE_MENU'] || $section['props']['HIDE_IN_MENU']) continue;?>
        <li  class="main-subnav__item">
            <?if ($section['ELEMENTS']):?>
            <a href="<?=$section['UF_LINK'] ?? $section['fields']['DETAIL_PAGE_URL']?>" class="main-subnav__link">
                <?=$section['NAME']?>
                <span class="icon-arrow-down"></span>
            </a>
            <?else:?>
                <a class="main-subnav__link" href="<?=$section['SECTION_PAGE_URL'] ?? $section['fields']['DETAIL_PAGE_URL']?>">
                    <?=$section['NAME'] ?? $section['fields']['NAME']?>
                </a>
            <?endif;?>
            <?if ($section['ELEMENTS']):?>
            <div class="main-subnav-wrapper">
                <?foreach ($section['ELEMENTS'] as $elementList):?>
                <ul class="main-subnav-list">
                    <?foreach ($elementList as $element):?>
                        <li class="main-subnav-list__item">
                            <a href="/services/<?=$section['CODE']?>/<?=$element['CODE']?>/" class="main-subnav-list__link">
                                <?=$element['NAME']?>
                            </a>
                        </li>
                    <?endforeach;?>
                </ul>
                <?endforeach;?>
            </div>
            <?endif;?>
        </li>
        <?endforeach;?>
    </ul>
    <a href="#" class="button-back js-fixed-panel-menu"><span class="icon-arrow-down"></span>Назад</a>
</div>