<?
use Bitrix\Main\Localization\Loc;
?>
<div class="fixed-panel-services">
    <div class="fixed-panel__title"><?=$arParams['TITLE']?></div>
    <ul class="fixed-nav">
        <?foreach ($arResult['SECTIONS']['CHILD'] as $section):?>
            <ul class="main-subnav">
                    <li  class="main-subnav__item">
                        <a href="#" class="main-subnav__link">
                            <?=$section['SECTION_PAGE_URL']?>
                            <span class="icon-arrow-down"></span>
                        </a>
                        <?if ($section['CHILD']):?>
                                    <ul class="main-subnav-list">
                                        <?foreach ($section['ELEMENTS'] as $element):?>
                                            <li class="main-subnav-list__item">
                                                <a href="/services/<?=$section['CODE']?>/<?=$element['CODE']?>/" class="main-subnav-list__link">
                                                    <?=$element['NAME']?>
                                                </a>
                                            </li>
                                        <?endforeach;?>
                                    </ul>
                        <?endif;?>
                    </li>
                </ul>
        <?endforeach;?>
    </ul>
    <a href="#" class="button-back js-fixed-panel-menu">
        <span class="icon-arrow-down"></span>
        <?= Loc::getMessage("MENU_BACK") ?>
    </a>
</div>