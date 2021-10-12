<!-- BEGIN FOOTER -->
<footer class="footer">
    <div class="wrapper">

        <div class="footer__nav">
            <div class="y-row">
                <?
                $APPLICATION->IncludeComponent(
                    "bbc:sections.list",
                    "footer-menu-service",
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
                        "SORT_BY_1" => "SORT",
                        "SORT_BY_2" => "SHOWS",
                        "SORT_ORDER_1" => "ASC",
                        "SORT_ORDER_2" => "ASC",
                        "SET_SEO_TAGS" => false,
                        'TITLE' => 'Услуги'
                    )
                );
                ?>
                <?
                $APPLICATION->IncludeComponent(
                    "bbc:sections.list",
                    "footer-menu",
                    array(
                        "ADD_ELEMENT_CHAIN" => false,
                        "ADD_SECTIONS_CHAIN" => false,
                        "CACHE_GROUPS" => "N",
                        "CACHE_NOTES" => "",
                        "CACHE_TIME" => "360000",
                        "CACHE_TYPE" => "A",
                        "DATE_FORMAT" => "d.m.Y",
                        "IBLOCK_ID" => "9",
                        "IBLOCK_TYPE" => "menu",
                        "OG_TAGS_DESCRIPTION" => "0",
                        "OG_TAGS_IMAGE" => "0",
                        "OG_TAGS_TITLE" => "0",
                        "OG_TAGS_URL" => "0",
                        "RESULT_PROCESSING_MODE" => "DEFAULT",
                        "SELECT_FIELDS" => array("NAME"),
                        "SELECT_PROPS" => array("", ""),
                        "SET_404" => "N",
                        "SET_SEO_TAGS" => false,
                        "SORT_BY_1" => "SORT",
                        "SORT_BY_2" => "SHOWS",
                        "SORT_ORDER_1" => "ASC",
                        "SORT_ORDER_2" => "ASC",
                        'TITLE' => 'О нас',
                        'USE_CODE' => 'Y'
                    )
                );
                ?>
            </div>
        </div>

        <div class="footer__bottom">
            <div class="y-row">
                <div class="y-col">
                    <div class="footer__contact">
                        <div class="footer-phone-block">
                            <a href="tel:<?= str_replace(['-', '(', ')', ' '], '', SiteHelper::showOption("PHONE")) ?>"
                               class="footer__phone text-22"><?= SiteHelper::showOption("PHONE") ?></a>
                            <a href="tel:<?= str_replace(['-', '(', ')', ' '], '', SiteHelper::showOption("PHONE_2")) ?>"
                               class="footer__phone text-22"><?= SiteHelper::showOption("PHONE_2") ?></a>
                        </div>
                        
                        <div class="footer-social-block">
                            <a href="mailto:<?= SiteHelper::showOption("EMAIL") ?>"
                               class="footer__mail"><?= SiteHelper::showOption("EMAIL") ?></a><br>
                            <ul class="social">
                                <? if ($instaLink = SiteHelper::showOption("INSTAGRAM")): ?>
                                    <li class="social__item">
                                        <a href="<?= $instaLink ?>" class="social__link">
                                            <span class="icon-instagram"></span>
                                        </a>
                                    </li>
                                <? endif; ?>
                                <? if ($vkLink = SiteHelper::showOption("VK")): ?>
                                    <li class="social__item">
                                        <a href="<?= $vkLink ?>" class="social__link">
                                            <span class="icon-vk"></span>
                                        </a>
                                    </li>
                                <? endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="y-col">
                    <div class="footer__copy">&copy; <?= date('Y') ?> Доктор Казумов<br>Все права защищены</div>
                </div>
            </div>
        </div>

    </div>
</footer>
<!-- FOOTER EOF   -->
<span id="dateTime" style="display: none"><?= date("Y.m.d H:i:s") ?></span>