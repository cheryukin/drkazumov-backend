<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arResult
 * @var array $arParam
 * @var CBitrixComponentTemplate $this
 */

$this->setFrameMode(true);

if (!$arResult["NavShowAlways"]) {
    if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
        return;
}
?>
<ul class="pagination">

    <?if ($arResult["NavPageNomer"] > 1):?>
        <?if($arResult["bSavePage"]):?>
            <li class="pagination__prev">
                <a class="pagination__link_prev" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">
                    <span class="icon-arrow-left"></span>
                </a>
            </li>
        <?else:?>
            <?if ($arResult["NavPageNomer"] > 2):?>
                <li class="pagination__prev">
                    <a class="pagination__link_prev" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">
                        <span class="icon-arrow-left"></span>
                    </a>
                </li>
            <?else:?>
                <li class="pagination__prev">
                    <a class="pagination__link_prev" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">
                        <span class="icon-arrow-left"></span>
                    </a>
                </li>
            <?endif?>
        <?endif?>
    <?endif?>

    <?
    if ($arResult["NavPageNomer"] > 1):
        if ($arResult["nStartPage"] > 1):
            if ($arResult["bSavePage"]):
                ?>
                <li class="pagination__item">
                <a class="pagination__link"
                   href="<?= $arResult["sUrlPath"] ?>?
                       <?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=1">1
                </a>
                </li><?
            else:
                ?>
                <li class="pagination__item">
                <a class="pagination__link"
                   href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>">1</a>
                </li><?
            endif;
        endif;
    endif;

    do {
        if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
            ?>
            <li class="pagination__item">
            <a class="pagination__link active"><?= $arResult["nStartPage"] ?></a>
            </li><?
        elseif ($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):
            ?>
            <li class="pagination__item">
            <a class="pagination__link"
               href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"><?= $arResult["nStartPage"] ?></a>
            </li><?
        else:
            ?>
            <li class="pagination__item"><a class="pagination__link"
                                            href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>"><?= $arResult["nStartPage"] ?></a>
            </li><?
        endif;
        $arResult["nStartPage"]++;
    } while ($arResult["nStartPage"] <= $arResult["nEndPage"]);

    if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
        if ($arResult["nEndPage"] < $arResult["NavPageCount"]):
            ?>
            <li class="pagination__item"><a class="pagination__link"
                                            href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["NavPageCount"] ?>"><?= $arResult["NavPageCount"] ?></a>
            </li><?
        endif;
    endif;

    ?>

    <?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
        <li class="pagination__next">
            <a class="pagination__link_next" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">
                <span class="icon-arrow-right"></span>
            </a>
        </li>
    <?endif?>
</ul>
