<?
if ($arParams['SECTION_ID']) {
    $arResult['SECTION_PROP'] = SiteHelper::getSectionProps($arParams['IBLOCK_ID'], $arParams['SECTION_ID']);
}

$serviceIblockId = SiteHelper::getIblockIdByCode('services');

foreach ($arResult['ELEMENTS'] as &$element) {
    $servicesFilter = ['IBLOCK_ID' => $serviceIblockId, 'PROPERTY_WORKS' => $element['IBLOCK_SECTION_ID']];
    $element['SERVICES'] = array_values(SiteHelper::getElements($servicesFilter));

    if ($element['PROPS']['DOCTOR']['VALUE']) {
        $element['DOCTOR'] = SiteHelper::getElementById($element['PROPS']['DOCTOR']['VALUE']);
    }
    $element['AVATAR'] = $element['PREVIEW_PICTURE'] ? CFile::GetPath($element['PREVIEW_PICTURE']) : SITE_TEMPLATE_PATH.'/assets/img/image-review.png';
}
