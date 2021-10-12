<?

use Bitrix\Main\Localization\Loc;

?>
<?if (count($arResult['ELEMENTS']) > 0):?>
<div class="service-info">
    <div class="service-info__title-box">
        <div class="service-info__title text-22"><?= Loc::getMessage("REVIEWS_BLOCK_TITLE") ?></div>
        <a href="<?=$arParams['URL'] ?? "/works/"?>" class="button button_border">
            <?= Loc::getMessage("REVIEWS_BLOCK_MORE") ?>
        </a>
    </div>

    <div class="reviews reviews-2 js-slider-reviews-2">
        <div class="y-row">
            <? foreach ($arResult['ELEMENTS'] as $element): ?>
                <div class="y-col">
                    <div class="reviews-item">
                        <div class="reviews-item__img">
                            <img src="<?= CFile::GetPath($element['PREVIEW_PICTURE']) ?>" alt="">
                        </div>
                        <div class="reviews-item__name text-22"><?=$element['NAME']?></div>
                        <div class="reviews-item__text text">
                            <?if ($element['SERVICE']['fields']):?>
                                <p class="reviews-item__title">
                                    <b> <?= Loc::getMessage("REVIEWS_BLOCK_SERVICE") ?>:</b> <?=$element['SERVICE']['fields']['NAME']?></p>
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
            <? endforeach; ?>
        </div>
        <?if (count($arResult['ELEMENTS']) > 1):?>
            <div class="reviews-nav-wrapper">
                <div class="reviews-nav"></div>
            </div>
        <?endif;?>
    </div>
    <div class="more">
        <a href="<?=$arParams['URL'] ?? "/works/"?>" class="button button_lg button_border">
            <?= Loc::getMessage("REVIEWS_BLOCK_MORE") ?>
        </a>
    </div>
</div>
<?endif;?>