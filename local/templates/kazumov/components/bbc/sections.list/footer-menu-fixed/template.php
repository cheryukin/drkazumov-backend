<?
use Bitrix\Main\Localization\Loc;
?>
<div class="fixed-panel-about">
    <div class="fixed-panel__title"><?=$arParams['TITLE']?></div>
    <ul class="fixed-nav">
        <?foreach ($arResult['SECTIONS']['CHILD'] as $section):?>
            <li class="footer-nav-item">
                <a href="<?=$arParams['USE_CODE'] == 'Y' ? $section['CODE'] : $section['SECTION_PAGE_URL']?>" class="footer-nav-item__link"><?=$section['NAME']?></a>
            </li>
        <?endforeach;?>
    </ul>
    <a href="#" class="button-back js-fixed-panel-menu">
        <span class="icon-arrow-down"></span>
        <?= Loc::getMessage("MENU_BACK") ?>
    </a>
</div>