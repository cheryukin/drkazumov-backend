<?
use Bitrix\Main\Localization\Loc;
?>
<div class="popup popup_sm" id="popup-call">
    <div class="popup__title title title_white">
        <?=Loc::getMessage("CALLBACK_MODAL_TITLE")?>
    </div>
    <form class="form form-call" data-position="Заказ обратного звонка в шапке" autocomplete="off">
        <div class="y-row">
            <div class="y-col">
                <input type="text" name="name" class="form-input form-input-2" placeholder="Имя">
            </div>
            <div class="y-col">
                <input type="text" name="phone" class="form-input form-input-2 input-phone" placeholder="Телефон">
            </div>
            <div class="y-col y-col_center">
                <a target="_blank" href="/privacy-policy/" class="form-link"><?=Loc::getMessage("CALLBACK_MODAL_PRIVACY")?></a>
            </div>
            <div class="y-col y-col_button">
                <button class="button button_white"><?=Loc::getMessage("CALLBACK_MODAL_BUTTON")?></button>
            </div>
        </div>
    </form>
</div>


<div class="popup popup_thank" id="popup-call-thank">
    <div class="popup__title title title_white"><?=Loc::getMessage("CALLBACK_MODAL_SUCCESS")?></div>
    <div class="popup__text">Подпишитесь на рассылку, что бы получать информацию про акции и новости нашей клиники</div>
    <form class="form form-subscribe" autocomplete="off">
        <div class="y-row">
            <div class="y-col">
                <input type="text" name="email" class="form-input form-input-2" placeholder="Почта">
            </div>
<!--            <div class="y-col">-->
<!--                <div class="custom-checkbox">-->
<!--                    <input name="agree" class="styled-checkbox" id="agree" type="checkbox" value="value1" checked>-->
<!--                    <label for="agree">Согласие на рассылку</label>-->
<!--                </div>-->
<!--            </div>-->
            <div class="y-col y-col_center">
                <a href="#" class="form-link">Заполнив данную форму я даю согласие на обработку персональных данных и принимаю условия политики</a>
            </div>
            <div class="y-col y-col_button">
                <button class="button button_white">Отправить</button>
            </div>
        </div>
    </form>
</div>