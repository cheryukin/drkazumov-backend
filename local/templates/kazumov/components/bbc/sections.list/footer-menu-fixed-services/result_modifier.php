<?
foreach ($arResult['SECTIONS']['CHILD'] as &$section) {
     $elements = Bitrix\Iblock\ElementTable::getList([
        'select' => ['NAME', 'CODE'],
        'filter' => ['IBLOCK_SECTION_ID' => $section['ID']]
    ])->fetchAll();
    $section['ELEMENTS'] = array_chunk($elements, ceil(count($elements)/2));
}
