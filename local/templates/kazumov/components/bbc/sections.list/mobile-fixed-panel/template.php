<div class="fixed-panel" id="fixed-panel">
    <div class="fixed-panel__inner">
        <div class="fixed-panel-menu">
            <div class="fixed-panel__title">Меню</div>
            <ul class="fixed-nav">
                <li class="fixed-nav__item">
                    <a href="#" class="fixed-nav__link fixed-nav__link_parent js-fixed-panel" data-subnav="services">
                        Наши услуги
                        <span class="icon-arrow-down"></span>
                    </a>
                </li>
                <?foreach ($arResult['SECTIONS']['CHILD'] as $section):?>
                <li class="fixed-nav__item">
                    <?if ($section['CHILD']):?>
                        <a href="#" class="fixed-nav__link fixed-nav__link_parent  js-fixed-panel" data-subnav="<?=str_replace('/', '', $section['CODE'])?>">
                            <?=$section['NAME']?>
                            <span class="icon-arrow-down"></span>
                        </a>
                    <?else:?>
                        <a href="<?=$section['CODE']?>" class="fixed-nav__link"><?=$section['NAME']?></a>
                    <?endif;?>
                </li>
                <?endforeach;?>
            </ul>
            <div class="fixed-nav__bottom">
                <div>
                    СПБ Дальневосточный <br />
                    пр. 12 к2 строение 1, 2 эт
                </div>
                <div class="fixed-nav__small">
                    Ежедневно с 12:00 до 21:00
                </div>
            </div>
        </div>
        <?
        $APPLICATION->IncludeComponent(
            "bbc:sections.list",
            "mobile-subnav-services",
            array(
                "ADD_ELEMENT_CHAIN" => false,
                "ADD_SECTIONS_CHAIN" => false,
                "CACHE_GROUPS" => "N",
                "CACHE_NOTES" => "",
                "CACHE_TIME" => "360000",
                "CACHE_TYPE" => "A",
                "DATE_FORMAT" => "d.m.Y",
                "IBLOCK_ID" => "4",
                "IBLOCK_TYPE" => "content",
                "OG_TAGS_DESCRIPTION" => "0",
                "OG_TAGS_IMAGE" => "0",
                "OG_TAGS_TITLE" => "0",
                "OG_TAGS_URL" => "0",
                "RESULT_PROCESSING_MODE" => "DEFAULT",
                "SELECT_FIELDS" => array("NAME"),
                "SELECT_PROPS" => array("", ""),
                "SET_404" => "N",
                "SET_SEO_TAGS" => false,
                'TITLE' => 'О нас',
                'USE_CODE' => 'Y'
            )
        );
        ?>
        <?foreach ($arResult['SECTIONS']['CHILD'] as $section):?>
            <?if ($section['CHILD']):?>
                <div class="fixed-panel-subnav fixed-panel-subnav_<?=str_replace('/', '', $section['CODE'])?>">
                    <div class="fixed-panel__title"><?=$section['NAME']?></div>
                    <ul class="fixed-nav">
                        <?foreach ($section['CHILD'] as $childSection):?>
                        <li class="fixed-nav__item">
                            <a href="<?=$childSection['CODE']?>" class="fixed-nav__link"><?=$childSection['NAME']?></a>
                        </li>
                        <?endforeach;?>
                    </ul>
                    <a href="#" class="button-back js-fixed-panel-menu">
                        <span class="icon-arrow-down"></span>
                        Назад
                    </a>
                </div>
            <?endif;?>
        <?endforeach;?>
        <a href="#popup-request" class="button button_shadow fixed-panel__button" data-fancybox>Записаться на прием</a>
    </div>
</div>
