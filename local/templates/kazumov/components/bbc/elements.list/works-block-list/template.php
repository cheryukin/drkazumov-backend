<?

use Bitrix\Main\Localization\Loc;

?>
<div class="service-info">
    <div class="service-info__title-box">
        <div class="service-info__title text-22"><?= Loc::getMessage("DOCTOR_OUR_WORKS_TITLE") . " " . $arResult['SECTION_PROP']['UF_PADEG'] ?? Loc::getMessage("WORKS_BLOCK_TITLE") ?></div>
        <a href="<?= $arParams['URL'] ?? "/works/" ?>" class="button button_border">
            <?= Loc::getMessage("WORKS_BLOCK_MORE") ?>
        </a>
    </div>
    <div class="works works-2 js-slider-works-2">
        <div class="y-row">
            <? foreach ($arResult['ELEMENTS'] as $element): ?>
                <div class="y-col">
                    <div class="works-item">
                        <? if ($element['SERVICES']): ?>
                            <div class="works-item__title">
                                <span class="text-22"><?= Loc::getMessage("WORKS_BLOCK_COMPLETE_WORKS") ?></span>
                                <? foreach ($element['SERVICES'] as $serviceIdx => $service): ?>
                                    <a href="<?= $service['fields']['DETAIL_PAGE_URL'] ?>" class="link">
                                        <? $postfix = ($serviceIdx !== (count($element['SERVICES']) - 1)) ? "," : '' ?>
                                        <?= trim($service['fields']['NAME'] . $postfix) ?>
                                    </a>
                                <? endforeach; ?>
                            </div>
                        <? endif; ?>
                        <div class="works-item-images">
                            <div class="y-row">
                                <?if ($element['PREVIEW_PICTURE']):?>
                                    <div class="y-col y-col-6">
                                        <div class="works-item-images__item">
                                            <div class="works-item-images__title">
                                                <?= Loc::getMessage("WORKS_BLOCK_BEFORE") ?>
                                            </div>
                                            <img src="<?=CFile::GetPath($element['PREVIEW_PICTURE'])?>" alt="">
                                        </div>
                                    </div>
                                <?endif;?>
                                <?if ($element['DETAIL_PICTURE']):?>
                                    <div class="y-col y-col-6">
                                        <div class="works-item-images__item">
                                            <div class="works-item-images__title">
                                                <?= Loc::getMessage("WORKS_BLOCK_AFTER") ?>
                                            </div>
                                            <img src="<?=CFile::GetPath($element['DETAIL_PICTURE'])?>" alt="">
                                        </div>
                                    </div>
                                <?endif;?>
                            </div>
                        </div>
                        <div class="works-item__info">
                            <div class="y-row">
                                <div class="y-col y-col-6">
                                    <? if (trim($element['PROPERTY_REASON_VALUE']['TEXT'])): ?>
                                        <div class="works-item__title text-22"><?= Loc::getMessage("WORKS_BLOCK_PROBLEMS") ?></div>
                                        <div class="works-item__text text">
                                            <p><?= $element['PROPERTY_REASON_VALUE']['TEXT'] ?></p>
                                        </div>
                                    <? endif; ?>
                                    <? if (trim($element['PROPERTY_RESEARCH_VALUE']['TEXT'])): ?>
                                        <div class="works-item__title text-22"><?= Loc::getMessage("WORKS_BLOCK_RESEARCH") ?></div>
                                        <div class="works-item__text text">
                                            <p><?= $element['PROPERTY_RESEARCH_VALUE']['TEXT'] ?></p>
                                        </div>
                                    <? endif; ?>
                                    <? if (trim($element['PROPERTY_DIAGNOSE_VALUE']['TEXT'])): ?>
                                        <div class="works-item__title text-22"><?= Loc::getMessage("WORKS_BLOCK_DIAGNOSE") ?></div>
                                        <div class="works-item__text text">
                                            <p><?= $element['PROPERTY_DIAGNOSE_VALUE']['TEXT'] ?></p>
                                        </div>
                                    <? endif; ?>
                                </div>
                                <div class="y-col y-col-6">
                                    <div class="works-item__title text-22"><?= Loc::getMessage("WORKS_BLOCK_COMPLETE_WORKS") ?></div>
                                    <div class="works-item__text text">
                                        <?= $element['DETAIL_TEXT'] ?>
                                    </div>
                                </div>
                                <div class="y-col">
                                    <? if (trim($element['PROPERTY_RESULT_VALUE']['TEXT'])): ?>
                                        <div class="works-item__title text-22"><?= Loc::getMessage("WORKS_BLOCK_RESULT") ?></div>
                                        <div class="works-item__text text">
                                            <p><?= $element['PROPERTY_RESULT_VALUE']['TEXT'] ?></p>
                                        </div>
                                    <? endif; ?>
                                </div>
                            </div>
                        </div>
                        <? if ($element['DOCTOR']['fields']): ?>
                            <div class="works-item__title">
                                <span><?= Loc::getMessage("WORKS_BLOCK_DOCTOR") ?></span>
                                <a href="<?= $element['DOCTOR']['fields']['DETAIL_PAGE_URL'] ?>" class="link">
                                    <?= str_replace("&lt;br&gt;", ' ', $element['DOCTOR']['fields']['NAME']) ?>
                                </a>
                            </div>
                        <? endif; ?>
                    </div>
                </div>
            <? endforeach; ?>
        </div>
        <? if (count($arResult['ELEMENTS']) > 0): ?>
            <div class="works-nav-wrapper">
                <div class="works-nav"></div>
            </div>
        <? endif; ?>
    </div>
    <div class="more">
        <a href="<?= $arParams['URL'] ?? "/works/" ?>" class="button button_lg button_border">
            <?= Loc::getMessage("WORKS_BLOCK_MORE") ?>
        </a>
    </div>
</div>