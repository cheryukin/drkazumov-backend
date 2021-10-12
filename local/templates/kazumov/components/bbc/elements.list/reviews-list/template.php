<?

use Bitrix\Main\Localization\Loc;

?>
<?if (count($arResult['ELEMENTS']) > 0):?>
<div class="reviews reviews-list">
    <div class="y-row">
        <?foreach ($arResult['ELEMENTS'] as $element):?>
            <div class="y-col">
                <div class="reviews-item">
                    <div class="reviews-item__img">
                        <img src="<?= CFile::GetPath($element['PREVIEW_PICTURE']) ?>" alt="">
                    </div>
                    <div class="reviews-item__name text-22"><?=$element['NAME']?></div>
                    <div class="reviews-item__text text">
                        <?if ($element['SERVICE']['fields']):?>
                            <p class="reviews-item__title">
                                <b> <?= Loc::getMessage("REVIEWS_BLOCK_SERVICE") ?>:</b> <a href="<?=$element['SERVICE']['fields']['DETAIL_PAGE_URL']?>"><?=$element['SERVICE']['fields']['NAME']?></a></p>
                        <?endif;?>
                        <p><?=$element['PREVIEW_TEXT']?></p>
                    </div>
                    <?if ($element['DETAIL_PICTURE']):?>
                        <a href="<?= CFile::GetPath($element['DETAIL_PICTURE']) ?>" class="reviews-item__link link">
                            <?= Loc::getMessage("REVIEWS_BLOCK_SHOW_COPY") ?>
                        </a>
                    <?endif;?>
                </div>
            </div>
        <?endforeach;?>
    </div>
</div>
<?endif;?>

<?if ($arParams['DISPLAY_BOTTOM_PAGER'] === 'Y') {?>
    <?=$arResult['NAV_STRING']?>
<?}?>

