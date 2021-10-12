<?
include_once $_SERVER['DOCUMENT_ROOT'].'/local/php_interface/service/siteHelper.php';

AddEventHandler("main", "OnBeforeProlog", "MyOnBeforePrologHandler");

function MyOnBeforePrologHandler()
{
    global $USER;
    Bitrix\Main\Diag\Debug::dumpToFile($USER->IsAdmin());
}