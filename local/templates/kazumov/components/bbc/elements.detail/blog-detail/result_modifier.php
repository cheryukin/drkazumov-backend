<?
if ($arResult['PROPERTY_DOCTOR_VALUE']) {
    $arResult['DOCTOR'] = SiteHelper::getElementById($arResult['PROPERTY_DOCTOR_VALUE']);
}

// Прыдудущий и следущий элемент
// сортировку берем из параметров компонента
$arSort = [
    $arParams["SORT_BY1"] => $arParams["SORT_ORDER1"],
    $arParams["SORT_BY2"] => $arParams["SORT_ORDER2"]
];
// выбрать нужно id элемента, его имя и ссылку. Можно добавить любые другие поля, например PREVIEW_PICTURE или PREVIEW_TEXT
// выбираем активные элементы из нужного инфоблока. Раскомментировав строку можно ограничить секцией
$arFilter = [
    "IBLOCK_ID" => $arResult["IBLOCK_ID"],
    "ACTIVE" => "Y",
    "CHECK_PERMISSIONS" => "Y",
];
// выбирать будем по 1 соседу с каждой стороны от текущего
$arNavParams = [
    "nPageSize" => 1,
    "nElementID" => $arResult["ID"],
];
$arItems = [];
$rsElement = CIBlockElement::GetList($arSort, $arFilter, false, $arNavParams, ["DETAIL_PAGE_URL", 'NAME']);
$rsElement->SetUrlTemplates($arParams["DETAIL_URL"]);
while ($obElement = $rsElement->GetNextElement()) {
    $arItems[] = $obElement->GetFields();
}
// возвращается от 1го до 3х элементов в зависимости от наличия соседей, обрабатываем эту ситуацию
if (count($arItems) == 3) {
    $arResult["NEXT_ITEM"] = ["NAME" => $arItems[0]["NAME"], "URL" => $arItems[0]["DETAIL_PAGE_URL"]];
    $arResult["PREV_ITEM"] = ["NAME" => $arItems[2]["NAME"], "URL" => $arItems[2]["DETAIL_PAGE_URL"]];
} elseif (count($arItems) == 2) {
    if ($arItems[0]["ID"] != $arResult["ID"]) {
        $arResult["NEXT_ITEM"] = ["NAME" => $arItems[0]["NAME"], "URL" => $arItems[0]["DETAIL_PAGE_URL"]];
    } else {
        $arResult["PREV_ITEM"] = ["NAME" => $arItems[1]["NAME"], "URL" => $arItems[1]["DETAIL_PAGE_URL"]];
    }
}
$arResult["PREV_ITEM"] = $arResult["PREV_ITEM"] ?? $arResult["NEXT_ITEM"];
$arResult["NEXT_ITEM"] = $arResult["NEXT_ITEM"] ?? $arResult["PREV_ITEM"];
// в $arResult["NEXT_ITEM"] и $arResult["PREV_ITEM"] лежат массивы с информацией о соседних элементах