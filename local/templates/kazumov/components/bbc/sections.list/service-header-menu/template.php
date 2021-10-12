<?
use Bitrix\Main\Localization\Loc;
?>
<ul class="main-nav <?= !$arParams['ACTIVE'] ? 'main-nav-closed' : '';?>">
    <li class="main-nav__item">
        <a href="#" class="main-nav__link"> <?=Loc::getMessage("HEAD_MENU_SERVICE_TITLE")?></a>
        <ul class="main-subnav">
            <?foreach ($arResult['SECTIONS']['CHILD'] as $section):?>
                <?if ($section['UF_HIDE_MENU'] || $section['props']['HIDE_IN_MENU']) continue;?>
                <li  class="main-subnav__item">
                    <?if ($section['ELEMENTS']):?>
                        <a href="<?=$section['UF_LINK']?>" class="main-subnav__link">
                            <?=$section['NAME']?>
                            <span class="icon-arrow-down"></span>
                        </a>
                    <?else:?>
                        <a href="<?=$section['SECTION_PAGE_URL'] ?? $section['fields']['DETAIL_PAGE_URL']?>" class="main-subnav__link">
                            <?=$section['fields']['NAME']?>
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
    </li>
</ul>