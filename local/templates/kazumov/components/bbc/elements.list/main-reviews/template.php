<?

use Bitrix\Main\Localization\Loc;

?>
<?if (count($arResult['ELEMENTS']) > 0):?>
<section class="section section_p_top_md">
    <div class="wrapper">
        <div class="title-box">
            <h2 class="title"> <?= Loc::getMessage("REVIEWS_BLOCK_TITLE") ?></h2>
            <a href="/reviews/" class="button button_border">
                <?= Loc::getMessage("REVIEWS_BLOCK_MORE") ?>
            </a>
        </div>

        <div class="reviews js-slider-reviews">
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
                    <div class="reviews-nav-wrapper  ">
                        <div class="reviews-nav"></div>
                    </div>
            <?endif;?>
        </div>
        <div class="more">
            <a href="/reviews/" class="button button_lg button_border">
                <?= Loc::getMessage("REVIEWS_BLOCK_MORE") ?>
            </a>
        </div>
    </div>
</section>
<?endif;?>