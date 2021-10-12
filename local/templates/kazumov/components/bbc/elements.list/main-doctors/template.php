<?

use Bitrix\Main\Localization\Loc;

?>
<section class="section">
    <div class="wrapper">
        <h2 class="title"><?= Loc::getMessage("DOCTORS_BLOCK_TITLE") ?></h2>
        <div class="block-doctors">
            <div class="doctors js-slider-doctors">
                <div class="y-row">
                    <? foreach ($arResult['ELEMENTS'] as $element): ?>
                        <div class="y-col y-col-4">
                            <div class="doctors-item">
                                <div class="doctors-item__img">
                                    <img src="<?= CFile::GetPath($element['PREVIEW_PICTURE']) ?>" alt="">
                                </div>
                                <div class="doctors-item__name text-22"><?= html_entity_decode($element['NAME']) ?></div>
                                <div class="doctors-item__text text">
                                    <p><?= $element['PROPERTY_POST_VALUE'] ?></p>
                                    <?= $element['PREVIEW_TEXT'] ?>
                                </div>
                                <a href="<?= $element['DETAIL_PAGE_URL'] ?>" class="doctors-item__link link">
                                    <?= Loc::getMessage("DOCTORS_BLOCK_MORE") ?>
                                </a>
                            </div>
                        </div>
                    <? endforeach; ?>
                </div>
                <div class="doctors-nav-wrapper hidden">
                    <div class="doctors-nav"></div>
                </div>
            </div>
        </div>
    </div>
</section>