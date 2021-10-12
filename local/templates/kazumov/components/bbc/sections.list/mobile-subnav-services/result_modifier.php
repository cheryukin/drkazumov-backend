<?
$elementsList = SiteHelper::getElements(['IBLOCK_ID' => $arParams['IBLOCK_ID'], 'SECTION_ID' => false]);
foreach ($arResult['SECTIONS']['CHILD'] as &$section) {
     $elements = Bitrix\Iblock\ElementTable::getList([
        'select' => ['NAME', 'CODE'],
        'filter' => ['IBLOCK_SECTION_ID' => $section['ID']]
    ])->fetchAll();
    $section['ELEMENTS'] = array_chunk($elements, ceil(count($elements)/2));
}
foreach ($elementsList as $element) {
    $arResult['SECTIONS']['CHILD'][] = $element;
}
