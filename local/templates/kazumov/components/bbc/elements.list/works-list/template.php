<?
use Bitrix\Main\Localization\Loc;
?>

<?if ($arResult['ELEMENTS']):?>
<div class="works works-list">
    <div class="y-row">
    <? foreach ($arResult['ELEMENTS'] as $element): ?>
        <div class="y-col">
            <div class="works-item">
                <?if ($element['SERVICES']):?>
                <div class="works-item__title">
                    <span class="text-22"><?= Loc::getMessage("WORKS_BLOCK_COMPLETE_WORKS") ?></span>
                    <?foreach ($element['SERVICES'] as $serviceIdx => $service):?>
                        <a href="<?=$service['fields']['DETAIL_PAGE_URL']?>" class="link">
                            <?$postfix = ($serviceIdx !== (count($element['SERVICES'])-1)) ? "," : ''?>
                            <?=trim($service['fields']['NAME'].$postfix)?>
                        </a>
                    <?endforeach;?>
                </div>
                <?endif;?>
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
                            <?if (trim($element['PROPERTY_REASON_VALUE']['TEXT'])):?>
                                <div class="works-item__title text-22"><?= Loc::getMessage("WORKS_BLOCK_PROBLEMS") ?></div>
                                <div class="works-item__text text">
                                    <p><?=$element['PROPERTY_REASON_VALUE']['TEXT']?></p>
                                </div>
                            <?endif;?>
                            <?if (trim($element['PROPERTY_RESEARCH_VALUE']['TEXT'])):?>
                                <div class="works-item__title text-22"><?= Loc::getMessage("WORKS_BLOCK_RESEARCH") ?></div>
                                <div class="works-item__text text">
                                    <p><?=$element['PROPERTY_RESEARCH_VALUE']['TEXT']?></p>
                                </div>
                            <?endif;?>
                            <?if (trim($element['PROPERTY_DIAGNOSE_VALUE']['TEXT'])):?>
                                <div class="works-item__title text-22"><?= Loc::getMessage("WORKS_BLOCK_DIAGNOSE") ?></div>
                                <div class="works-item__text text">
                                    <p><?=$element['PROPERTY_DIAGNOSE_VALUE']['TEXT']?></p>
                                </div>
                            <?endif;?>
                        </div>
                        <div class="y-col y-col-6">
                            <div class="works-item__title text-22"><?= Loc::getMessage("WORKS_BLOCK_COMPLETE_WORKS") ?></div>
                            <div class="works-item__text text">
                                <?=$element['DETAIL_TEXT']?>
                            </div>
                        </div>
                        <div class="y-col">
                            <?if (trim($element['PROPERTY_RESULT_VALUE']['TEXT'])):?>
                            <div class="works-item__title text-22"><?= Loc::getMessage("WORKS_BLOCK_RESULT") ?></div>
                            <div class="works-item__text text">
                                <p><?=$element['PROPERTY_RESULT_VALUE']['TEXT']?></p>
                            </div>
                            <?endif;?>
                        </div>
                    </div>
                </div>

                <?if ($element['DOCTOR']['fields']):?>
                    <div class="works-item__bottom">
                        <div class="works-item__title">
                            <span><?= Loc::getMessage("WORKS_BLOCK_DOCTOR") ?></span>
                            <a href="<?=$element['DOCTOR']['fields']['DETAIL_PAGE_URL']?>" class="link">
                                <?=SiteHelper::deleteSpaces($element['DOCTOR']['fields']['NAME'])?>
                            </a>
                        </div>
                        <div class="works-item__date"><?=$element['PROPERTY_DATE_VALUE']?> г</div>
                    </div>
                <?endif;?>
            </div>
        </div>
    <? endforeach; ?>
    </div>
</div>
<?endif;
?>
<?if ($arParams['DISPLAY_BOTTOM_PAGER'] === 'Y') {?>
    <?=$arResult['NAV_STRING']?>
<?}?>