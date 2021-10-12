<?if ($arResult['SECTIONS']['CHILD']):?>
    <div class="y-col">
        <div class="footer__title text-22"><?=$arParams['TITLE']?></div>
        <ul class="footer-nav">
            <?foreach ($arResult['SECTIONS']['CHILD'] as $section):?>
            <li class="footer-nav-item">
                <a href="<?=$arParams['USE_CODE'] == 'Y' ? $section['CODE'] : $section['SECTION_PAGE_URL']?>" class="footer-nav-item__link"><?=$section['NAME']?></a>
            </li>
           <?endforeach;?>
        </ul>
    </div>
<?endif;?>