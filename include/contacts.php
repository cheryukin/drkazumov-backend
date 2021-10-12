<section class="section-contact" id="section-contact">
    <div class="wrapper">
        <?
        global $isMainPage;
        if ($isMainPage) {
            echo '<h2 class="title">Контакты</h2>';
        }
        ?>
        <div class="block-contact">
            <div class="block-contact__left">
                <div class="contact">
                    <div class="contact-item">
                        <div class="contact-item__title text-22">Адрес:</div>
                        <div class="contact-item__text text">
                            <p>г. Санкт-Петербург</p>
                            <p><? echo SiteHelper::showOption('ADDRESS') ?></p>
                        </div>
                        <div class="contact-item__title text-22">График работы:</div>
                        <div class="contact-item__text text">
                            <p><? echo SiteHelper::showOption('SCHEDULE') ?></p>
                        </div>
                        <div class="contact-item__title text-22">Телефон:</div>
                        <div class="contact-item__text text">
                            <p>
                                <a href="tel:<?=str_replace(['-', '(', ')', ' '], '', SiteHelper::showOption("PHONE"))?>" >
                                    <?=SiteHelper::showOption("PHONE")?>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <a href="#popup-request" class="button button_shadow button_lg" data-fancybox>Записаться на прием</a>
            </div>
            <div class="block-contact__right">
                <div class="map" id="ya_map">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:map.yandex.view",
                        ".default",
                        array(
                            "API_KEY" => "88a0bfbe-9e56-4463-956e-b8c7b9b1c72d",
                            "CONTROLS" => array(
                                0 => "TYPECONTROL",
                                1 => "SCALELINE",
                            ),
                            "INIT_MAP_TYPE" => "MAP",
                            "MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:59.91381179999101;s:10:\"yandex_lon\";d:30.439366999999955;s:12:\"yandex_scale\";i:17;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:30.43922752513094;s:3:\"LAT\";d:59.91354245984896;s:4:\"TEXT\";i:2;}}}",
                            "MAP_HEIGHT" => "620",
                            "MAP_ID" => "map",
                            "MAP_WIDTH" => "600",
                            "OPTIONS" => array(
                                0 => "ENABLE_SCROLL_ZOOM",
                                1 => "ENABLE_DBLCLICK_ZOOM",
                                2 => "ENABLE_DRAGGING",
                            ),
                            "COMPONENT_TEMPLATE" => ".default"
                        ),
                        false
                    ); ?>
                </div>
            </div>
        </div>
    </div>
</section>