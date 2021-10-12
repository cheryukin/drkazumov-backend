<div class="blog">
    <div class="y-row">
        <?foreach ($arResult['ELEMENTS'] as $element):?>
        <div class="y-col y-col-6">
            <div class="blog-item">
                <a href="<?=$element['DETAIL_PAGE_URL']?>" class="blog-item__img" style="background-image: url('<?=CFile::GetPath($element['PREVIEW_PICTURE'])?>')"></a>
                <div class="blog-item__name text-22">
                    <a href="<?=$element['DETAIL_PAGE_URL']?>"><?=$element['NAME']?></a>
                </div>
                <div class="blog-item__text text">
                    <?=$element['PREVIEW_TEXT']?>
                </div>
                <a href="<?=$element['DETAIL_PAGE_URL']?>" class="blog-item__link">
                    <span class="icon-arrow-more"></span>
                </a>
            </div>
        </div>
        <?endforeach;?>
    </div>
</div>

<?if ($arParams['DISPLAY_BOTTOM_PAGER'] === 'Y') {?>
    <?=$arResult['NAV_STRING']?>
<?}?>