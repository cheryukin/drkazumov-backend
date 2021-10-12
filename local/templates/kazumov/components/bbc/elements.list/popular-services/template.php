<?
use Bitrix\Main\Localization\Loc;
?>
<?if ($arResult['ELEMENTS']):?>
<div class="block-popular">
    <div class="block-popular__title text-22">
        <?= Loc::getMessage("POPULAR_SERVICE_BLOCK_TITLE") ?>
    </div>
    <ul class="tags-popular">
        <?foreach ($arResult['ELEMENTS'] as $element):?>
        <li class="tags-popular__item">
            <a href="<?=$element['DETAIL_PAGE_URL']?>" class="tags-popular__link">
                <?=$element['NAME']?>
            </a>
        </li>
        <?endforeach;?>
    </ul>
</div>
<?endif;?>