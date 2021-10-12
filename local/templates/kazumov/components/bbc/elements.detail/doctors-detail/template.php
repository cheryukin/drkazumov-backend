<?
use Bitrix\Main\Localization\Loc;
?>
<div class="service-info service-info_doctor">
    <div class="service-info__text text">
        <img src="<?=CFile::GetPath($arResult['DETAIL_PICTURE'])?>" alt="">
        <p><?=$arResult['PROPERTY_POST_VALUE']?></p>
    </div>
</div>

<?if (trim($arResult['PROPERTY_EDUCATIONS_VALUE']['TEXT'])):?>
<div class="service-info">
    <div class="service-info__title text-22">
        <?= Loc::getMessage("DOCTORS_EDUCATION_TITLE") ?>
    </div>
    <div class="service-info__text text">
        <?=html_entity_decode($arResult['PROPERTY_EDUCATIONS_VALUE']['TEXT'])?>
    </div>
</div>
<?endif;?>
<?if (trim($arResult['DETAIL_TEXT'])):?>
<div class="service-info">
    <div class="service-info__title text-22">
        <?= Loc::getMessage("DOCTORS_BIO_TITLE") ?>
    </div>
    <div class="list-doctors list-doctors_single">
        <div class="y-row">
            <div class="y-col">
                <div class="list-doctors-item">
                    <?if ($arResult['PROPERTY_BIO_PHOTO_VALUE']):?>
                    <div class="list-doctors-item__image">
                        <img src="<?=CFile::GetPath($arResult['PROPERTY_BIO_PHOTO_VALUE'])?>" alt="">
                    </div>
                    <?endif;?>
                    <??>
                    <div class="list-doctors-item__info">
                        <div class="list-doctors-item__text text">
                           <?=$arResult['DETAIL_TEXT']?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?endif;?>
<?if (trim($arResult['PROPERTY_AWARDS_VALUE']['TEXT'])):?>
<div class="service-info">
    <div class="service-info__title text-22">
        <?= Loc::getMessage("DOCTORS_AWARDS_TITLE") ?>
    </div>
    <div class="service-info__text text">
        <?=html_entity_decode($arResult['PROPERTY_AWARDS_VALUE']['TEXT'])?>
    </div>
</div>
<?endif;?>

<?if ($arResult['PROPS']['CERTS']['VALUE']):?>
<div class="service-info">
    <div class="sertificates js-slider-sertificates">
        <div class="y-row">
            <?foreach ($arResult['PROPS']['CERTS']['VALUE'] as $cert):?>
            <div class="y-col y-col-3">
                <a href="<?=CFile::GetPath($cert)?>" class="sertificates-item" data-fancybox="images">
                    <img src="<?=CFile::GetPath($cert)?>" alt="">
                </a>
            </div>
            <?endforeach;?>
        </div>
        <div class="sertificates-nav-wrapper hidden">
            <div class="sertificates-nav"></div>
        </div>
    </div>
</div>
<?endif;?>