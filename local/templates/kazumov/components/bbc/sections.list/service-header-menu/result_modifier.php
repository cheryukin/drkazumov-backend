<?
$elementsList = SiteHelper::getElements(['IBLOCK_ID' => $arParams['IBLOCK_ID'], 'SECTION_ID' => false]);
foreach ($arResult['SECTIONS']['CHILD'] as &$section) {
    $elements = Bitrix\Iblock\ElementTable::getList([
        'select' => ['NAME', 'CODE'],
        'filter' => ['IBLOCK_SECTION_ID' => $section['ID']],
        'order' => ['SORT' => 'ASC']
    ])->fetchAll();
    $section['ELEMENTS'] = array_chunk($elements, ceil(count($elements) / 2));
}

function cmp($a, $b)
{
    if ($a['fields']['SORT'] == $b['fields']['SORT']) {
        return 0;
    }
    return ($a['fields']['SORT'] < $b['fields']['SORT']) ? -1 : 1;
}
usort($elementsList, "cmp");
foreach ($elementsList as $element) {
    $arResult['SECTIONS']['CHILD'][] = $element;
}
