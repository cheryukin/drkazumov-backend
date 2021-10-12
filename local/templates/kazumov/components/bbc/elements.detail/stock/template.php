<div class="service-main">
    <div class="service-main__img">
        <?if (!$arResult['PROPERTY_HIDE_TOP_VALUE']):?>
        <div class="top__service-main">
            <div class="text__top">
                <div class="caption__top">Акция</div>
                <p><?= $arResult['PREVIEW_TEXT'] ?></p>
            </div>
            <? if ($arResult['PROPERTY_LINK_VALUE']): ?>
                <a href="<?= $arResult['PROPERTY_LINK_VALUE'] ?>" class="header-phone__link">Подробнее</a>
            <? endif; ?>
        </div>
        <?endif;?>
        <div class="box__service-main">
            <div class="left__box">
                <div class="title__box"><?= $arResult["NAME"] ?></div>
                <div class="content__box">
                    <div class="left_content">
                        <div class="list__box">
                            <? if ($arResult["PROPS"]['ADVANTAGES']['VALUE']): ?>
                                <ul>
                                    <? foreach ($arResult["PROPS"]['ADVANTAGES']['VALUE'] as $advantage): ?>
                                        <li><?= $advantage ?></li>
                                    <? endforeach; ?>
                                </ul>
                            <? endif; ?>
                            <img src="<?= CFile::GetPath($arResult['DETAIL_PICTURE']) ?>" alt="service-main" class="img__mobile_banner">
                        </div>

                        <div class="cost__service-main">
                            <? if ($arResult['PROPS']['PRICE']['VALUE']): ?>
                                <div class="new__cost"><?= $arResult['PROPS']['PRICE']['VALUE'] ?></div>
                            <? endif; ?>
                            <? if ($arResult['PROPS']['PRICE']['DESCRIPTION']): ?>
                                <div class="old__cost"><?= $arResult['PROPS']['PRICE']['DESCRIPTION'] ?></div>
                            <? endif; ?>
                        </div>

                        <a href="#popup-call" class="button button--mobile" data-fancybox="">Заказать звонок</a>
                        <a href="#service-info--cost" class="header-phone__link service-link_cost anchor">Посмотреть
                            цены</a>
                    </div>
                    <img src="<?= CFile::GetPath($arResult['PREVIEW_PICTURE']) ?>" alt="service" class="img__service-main">
                </div>
            </div>
            <div class="right__box">
                <div class="sale__box">
                    <?foreach ($arResult['PROPS']['LABELS']['VALUE'] as $key => $label):?>
                    <?$backgroundColor = trim($arResult['PROPS']['LABELS']['DESCRIPTION'][$key]);?>
                    <span <?if ($backgroundColor):?>style="background-color: <?=$backgroundColor?>"<?endif;?>>
                        <?=$label?>
                    </span>
                    <?endforeach;?>
                </div>
                <form class="form form-call form__service-main" autocomplete="off" novalidate="novalidate">
                    <input type="text" name="name" class="form-input" placeholder="Имя">
                    <input type="text" name="phone" class="form-input input-phone" placeholder="Телефон">
                    <button class="button">Заказать звонок</button>
                    <a target="_blank" href="/privacy-policy/" class="form-link agree__form">Согласен с политикой конфиденциальности </a>
                </form>
            </div>
        </div>
    </div>
    <?if ($arResult['DETAIL_TEXT']):?>
    <div class="service-main__text text">
        <?=$arResult['DETAIL_TEXT']?>
    </div>
    <?endif;?>
</div>
