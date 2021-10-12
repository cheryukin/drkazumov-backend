<?
foreach ($arResult['ELEMENTS'] as &$element) {
    if ($element['PROPERTY_SERVICES_VALUE']) {
        $element['SERVICE'] = SiteHelper::getElementById($element['PROPERTY_SERVICES_VALUE']);
    }
    $element['AVATAR'] = $element['PREVIEW_PICTURE'] ? CFile::GetPath($element['PREVIEW_PICTURE']) : SITE_TEMPLATE_PATH.'/assets/img/image-review.png';
}