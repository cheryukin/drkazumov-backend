<?

use Bitrix\Main\Localization\Loc;

?>
<div class="service-info">
    <? if ($arParams['WITH_TITLE'] == 'Y'): ?>
        <div class="service-info__title text-22"><?= Loc::getMessage("DOCTORS_BLOCK_TITLE") ?></div>
    <? endif; ?>
    <div class="list-doctors js-list-doctors">
        <div class="y-row">
            <? foreach ($arResult['ELEMENTS'] as $element): ?>
                <div class="y-col">
                    <div class="list-doctors-item">
                        <div class="list-doctors-item__image">
                            <img src="<?= CFile::GetPath($element['PREVIEW_PICTURE']) ?>" alt="">
                        </div>
                        <div class="list-doctors-item__info">
                            <div class="list-doctors-item__name">
                                <a href="<?= $element['DETAIL_PAGE_URL'] ?>">
                                    <?= SiteHelper::deleteSpaces($element['NAME']) ?>
                                </a>
                            </div>
                            <div class="list-doctors-item__text text">
                                <?= SiteHelper::deleteSpaces(html_entity_decode($element['PROPERTY_ANOUNCE_VALUE']['TEXT'])) ?>
                            </div>
                            <a href="<?= $element['DETAIL_PAGE_URL'] ?>" class="button button_border">
                                <?= Loc::getMessage("DOCTORS_BLOCK_MORE") ?>
                            </a>
                        </div>
                    </div>
                </div>
            <? endforeach; ?>
        </div>
        <div class="doctors-nav-wrapper hidden">
            <div class="doctors-nav"></div>
        </div>
    </div>
</div>