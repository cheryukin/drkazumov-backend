<?
use Bitrix\Main\Localization\Loc;
?>
<div class="block-consult">
    <section class="section-consult">
        <div class="section-consult-inner">
            <h3 class="text-22"><?=Loc::getMessage("CALLBACK_TITLE")?></h3>
            <div class="section-consult-form">
                <form class="form form-call" data-position="Запись на консультацию" autocomplete="off">
                    <div class="y-row">
                        <div class="y-col">
                            <input type="text" name="name" class="form-input" placeholder="Имя">
                        </div>
                        <div class="y-col">
                            <input type="text" name="phone" class="form-input input-phone"
                                   placeholder="Телефон">
                        </div>
                        <div class="y-col y-col_center">
                            <button class="button button_white"><?=Loc::getMessage("CALLBACK_BUTTON")?></button>
                        </div>
                        <div class="y-col y-col_center">
                             <a class="form-link" target="_blank" href="/privacy-policy/">Согласен с политикой конфиденциальности</a>
                        </div>
                    </div>
                </form>
            </div>
            <img src="<?=SITE_TEMPLATE_PATH?>/assets/img/image-section-consult.png" alt="" class="section-consult-inner__img">
        </div>
    </section>
</div>