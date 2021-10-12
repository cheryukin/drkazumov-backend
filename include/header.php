<!-- BEGIN HEADER -->
<header class="header" id="header">
    <div class="header__top">
        <div class="wrapper">
            <div class="header__left">
                <a href="/" class="logo">
                    <img src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo.png" alt="">
                </a>
                <a href="#section-contact" class="header__address">
                    СПб  <?=SiteHelper::showOption("ADDRESS")?>
                    <span><?=SiteHelper::showOption("SCHEDULE")?></span>
                </a>
            </div>
            <div class="header__right">
                <div class="header__phone header-phone">
                    <a href="tel:<?=str_replace(['-', '(', ')', ' '], '', SiteHelper::showOption("PHONE"))?>" class="header-phone__number">
                        <?=SiteHelper::showOption("PHONE")?>
                    </a>
                    <br>
                    <a href="#popup-call" class="header-phone__link" data-fancybox>Заказать звонок</a>
                </div>
                <div class="header__buttons">
                    <ul class="social">
                        <?if ($instaLink = SiteHelper::showOption("INSTAGRAM")):?>
                            <li class="social__item">
                                <a href="<?=$instaLink?>" class="social__link">
                                    <span class="icon-instagram"></span>
                                </a>
                            </li>
                        <?endif;?>
                        <?if ($vkLink = SiteHelper::showOption("VK")):?>
                            <li class="social__item">
                                <a href="<?=$vkLink?>" class="social__link">
                                    <span class="icon-vk"></span>
                                </a>
                            </li>
                        <?endif;?>
                    </ul>
                    <a href="#popup-request-header" class="button button_font_16 button_blue" data-fancybox>
                        Записаться на прием
                    </a>
                </div>
            </div>
            <div class="header__mobile">
                <a href="#section-contact" class="header__mobile-button">
                    <span class="icon-address"></span>
                </a>
                <a href="#popup-call" class="header__mobile-button" data-fancybox>
                    <span class="icon-phone"></span>
                </a>
                <div class="header-open-menu">
                    <a href="tel:<?=str_replace(['-', '(', ')', ' '], '', SiteHelper::showOption("PHONE"))?>"><?=SiteHelper::showOption("PHONE")?></a>
                </div>
                <a href="#" class="header-menu js-aside-menu">
                    <span class="hamburger hamburger--collapse">
                       <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </span>
                </a>
            </div>
        </div>
    </div>

    <div class="header__nav">
        <div class="wrapper">
            <?
            global $isMainPage;

            $APPLICATION->IncludeComponent(
                "bbc:sections.list",
                "service-header-menu",
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
                    'ACTIVE' => !$isMainPage
                )
            );
            ?>
            <?
            $APPLICATION->IncludeComponent(
                "bbc:sections.list",
                "header-menu",
                array(
                    "ADD_ELEMENT_CHAIN" => false,
                    "ADD_SECTIONS_CHAIN" => false,
                    "CACHE_GROUPS" => "N",
                    "CACHE_NOTES" => "",
                    "CACHE_TIME" => "360000",
                    "CACHE_TYPE" => "A",
                    "DATE_FORMAT" => "d.m.Y",
                    "IBLOCK_ID" => "8",
                    "IBLOCK_TYPE" => "menu",
                    "OG_TAGS_DESCRIPTION" => "0",
                    "OG_TAGS_IMAGE" => "0",
                    "OG_TAGS_TITLE" => "0",
                    "OG_TAGS_URL" => "0",
                    "SORT_BY_1" => "SORT",
                    "SORT_BY_2" => "SHOWS",
                    "SORT_ORDER_1" => "ASC",
                    "SORT_ORDER_2" => "ASC",
                    "RESULT_PROCESSING_MODE" => "DEFAULT",
                    "SELECT_FIELDS" => array("NAME"),
                    "SELECT_PROPS" => array("", ""),
                    "SET_404" => "N",
                    "SET_SEO_TAGS" => false
                )
            );
            ?>
        </div>
    </div>
</header>
<!-- HEADER EOF   -->