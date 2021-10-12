<?if ($arResult['SECTIONS']['CHILD']):?>
    <div class="y-col">
        <div class="footer__title text-22"><?=$arParams['TITLE']?></div>
        <ul class="footer-nav">
            <?foreach ($arResult['SECTIONS']['CHILD'] as $item):?>
            <li class="footer-nav-item">
                <a href="<?=$item['fields']['DETAIL_PAGE_URL']?>" class="footer-nav-item__link"><?=$item['fields']['NAME']?></a>
            </li>
           <?endforeach;?>
        </ul>
    </div>
<?endif;?>