<?
foreach ($arResult['ELEMENTS'] as &$element) {
    if ($element['PROPERTY_SERVICE_VALUE']) {
        $element['SERVICE'] = SiteHelper::getElementById($element['PROPERTY_SERVICE_VALUE']);
    }
}