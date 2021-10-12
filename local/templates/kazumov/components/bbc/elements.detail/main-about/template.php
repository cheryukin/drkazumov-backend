<?

use Bitrix\Main\Localization\Loc;

?>
<section class="section section_p_top_lg">
    <div class="wrapper">
        <div class="title-box">
            <h2 class="title"><?= Loc::getMessage("ABOUT_BLOCK_TITLE") ?></h2>
            <a href="/about/" class="button button_border">
                <?= Loc::getMessage("ABOUT_BLOCK_MORE") ?>
            </a>
        </div>
        <div class="about">
            <div class="about-row">
                <div class="y-row">
                    <div class="y-col y-col-6">
                        <div class="about__text text">
                            <?= $arResult['PREVIEW_TEXT'] ?>
                        </div>
                    </div>
                    <div class="y-col y-col-6">
                        <div class="about__img">
                            <img src=" <?= CFile::GetPath($arResult['PREVIEW_PICTURE']) ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-row about-row_reverse">
                <div class="y-row">
                    <div class="y-col y-col-6">
                        <div class="about__text text">
                            <?= $arResult['DETAIL_TEXT'] ?>
                        </div>
                    </div>
                    <div class="y-col y-col-6">
                        <div class="about__img">
                            <img src=" <?= CFile::GetPath($arResult['DETAIL_PICTURE']) ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="more">
            <a href="/about/" class="button button_lg button_border"> <?= Loc::getMessage("ABOUT_BLOCK_MORE") ?></a>
        </div>
    </div>
</section>