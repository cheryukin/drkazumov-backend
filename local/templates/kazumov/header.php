<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();

use Bitrix\Main\Page\Asset;

global $isMainPage, $thisPage, $asset, $APPLICATION;
$asset = Asset::getInstance();
$curPage = $APPLICATION->GetCurPage();
$isMainPage = preg_match('/^\/$/', $curPage);
$thisPage = explode("/", $curPage);
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <? $APPLICATION->ShowHead(); ?>
    <title><? $APPLICATION->ShowTitle(); ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico"/>
    <link rel="icon" type="image/png" sizes="192x192" href="/favicon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <?
    $asset->addCss(SITE_TEMPLATE_PATH . "/assets/css/style.css");
    $asset->addJs(SITE_TEMPLATE_PATH . "/assets/js/jquery-3.4.1.min.js?ver1.0");
    $asset->addJs(SITE_TEMPLATE_PATH . "/assets/js/jquery-migrate-1.4.1.min.js?ver1.0");
    $asset->addJs(SITE_TEMPLATE_PATH . "/assets/js/slick.min.js?ver1.0");
    $asset->addJs(SITE_TEMPLATE_PATH . "/assets/js/jquery.validate.min.js?ver1.0");
    $asset->addJs(SITE_TEMPLATE_PATH . "/assets/js/jquery.maskedinput.min.js?ver1.0");
    $asset->addJs(SITE_TEMPLATE_PATH . "/assets/js/jquery.inputmask.min.js?ver1.0");
    $asset->addJs(SITE_TEMPLATE_PATH . "/assets/js/jquery.fancybox.min.js?ver1.0");
    $asset->addJs(SITE_TEMPLATE_PATH . "/assets/js/datepicker.min.js?ver1.0");
    $asset->addJs(SITE_TEMPLATE_PATH . "/assets/js/datepicker.ru-RU.js?ver1.0");
    $asset->addJs(SITE_TEMPLATE_PATH . "/assets/js/custom.js");
    ?>
    <? $APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        array(
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "inc",
            "COMPONENT_TEMPLATE" => ".default",
            "EDIT_TEMPLATE" => "",
            "PATH" => SITE_DIR . "include/counters-head.php"
        )
    ); ?>
</head>
<body>
<? $APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    array(
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "inc",
        "COMPONENT_TEMPLATE" => ".default",
        "EDIT_TEMPLATE" => "",
        "PATH" => SITE_DIR . "include/counters-body.php"
    )
); ?>
<div id="panel">
    <? $APPLICATION->ShowPanel(); ?>
</div>
<div class="main-wrapper">
    <? $APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        array(
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "inc",
            "COMPONENT_TEMPLATE" => ".default",
            "EDIT_TEMPLATE" => "",
            "PATH" => SITE_DIR . "include/header.php"
        )
    ); ?>
    <main class="content">
        <?if (!$isMainPage):?>
        <!-- begin main wrapper-->
        <div class="wrapper">
            <section class="section-inside" id="section-inside">

                <? $APPLICATION->IncludeComponent(
                    "bitrix:breadcrumb",
                    "",
                    array(
                        "PATH" => "",
                        "SITE_ID" => "s1",
                        "START_FROM" => "0"
                    )
                ); ?>

                <h1 class="title"><?$APPLICATION->ShowTitle(false)?></h1>
        <?endif;?>
						