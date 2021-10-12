<?
use Bitrix\Main\Localization\Loc;
?>
<div class="popup" id="popup-request">
    <div class="popup__title title title_white">
        <?=Loc::getMessage("REQUEST_MODAL_TITLE")?>
    </div>
    <form class="form form-request" data-position="Запись на прием" autocomplete="off">
        <div class="y-row">
            <div class="y-col">
                <input type="text" name="name" class="form-input form-input-2" placeholder="Имя">
            </div>
            <div class="y-col">
                <input type="text" name="phone" class="form-input form-input-2 input-phone" placeholder="Телефон">
            </div>
            <div class="y-col">
                <textarea  name="message" class="form-input form-input-2 form-textarea" placeholder="Комментарий"></textarea>
            </div>
            <div class="y-col y-col_center">
                <a href="/privacy-policy/" class="form-link"><?=Loc::getMessage("REQUEST_MODAL_PRIVACY")?></a>
            </div>
            <div class="y-col y-col_button">
                <button class="button button_white"><?=Loc::getMessage("REQUEST_MODAL_BUTTON")?></button>
            </div>
        </div>
    </form>
</div>

<div class="popup" id="popup-request-header">
    <div class="popup__title title title_white">
        <?=Loc::getMessage("REQUEST_MODAL_TITLE")?>
    </div>
    <form class="form form-request" data-position="Запись на прием в шапке"  autocomplete="off">
        <div class="y-row">
            <div class="y-col">
                <input type="text" name="name" class="form-input form-input-2" placeholder="Имя">
            </div>
            <div class="y-col">
                <input type="text" name="phone" class="form-input form-input-2 input-phone" placeholder="Телефон">
            </div>
            <div class="y-col">
                <textarea name="message" class="form-input form-input-2 form-textarea"  placeholder="Комментарий"></textarea>
            </div>
            <div class="y-col y-col_center">
                <a href="/privacy-policy/" class="form-link"><?=Loc::getMessage("REQUEST_MODAL_PRIVACY")?></a>
            </div>
            <div class="y-col y-col_button">
                <button class="button button_white"><?=Loc::getMessage("REQUEST_MODAL_BUTTON")?></button>
            </div>
        </div>
    </form>
</div>


<div class="popup" id="popup-request-footer">
    <div class="popup__title title title_white">
        <?=Loc::getMessage("REQUEST_MODAL_TITLE")?>
    </div>
    <form class="form form-request" data-position="Запись на прием в футере"  autocomplete="off">
        <div class="y-row">
            <div class="y-col">
                <input type="text" name="name" class="form-input form-input-2" placeholder="Имя">
            </div>
            <div class="y-col">
                <input type="text" name="phone" class="form-input form-input-2 input-phone" placeholder="Телефон">
            </div>
            <div class="y-col">
                <textarea name="message" class="form-input form-input-2 form-textarea"  placeholder="Комментарий"></textarea>
            </div>
            <div class="y-col y-col_center">
                <a href="/privacy-policy/" class="form-link"><?=Loc::getMessage("REQUEST_MODAL_PRIVACY")?></a>
            </div>
            <div class="y-col y-col_button">
                <button class="button button_white"><?=Loc::getMessage("REQUEST_MODAL_BUTTON")?></button>
            </div>
        </div>
    </form>
</div>

<div class="popup popup_thank" id="popup-request-thank">
    <div class="popup__title title title_white">
        <?=Loc::getMessage("REQUEST_MODAL_SUCCESS")?>
    </div>
    <div class="popup__text">Подпишитесь на рассылку, что бы получать информацию про акции и новости нашей клиники</div>
    <form class="form form-subscribe" autocomplete="off">
        <div class="y-row">
            <div class="y-col">
                <input type="text" name="email" class="form-input form-input-2" placeholder="Почта">
            </div>
            <div class="y-col">
                <div class="custom-checkbox">
                    <input name="agree" class="styled-checkbox" id="agree1" type="checkbox" checked>
                    <label for="agree1">Согласие на рассылку</label>
                </div>
            </div>
            <div class="y-col y-col_center">
                <a target="_blank" href="/privacy-policy/" class="form-link">Согласен с политикой конфиденциальности </a>
            </div>
            <div class="y-col y-col_button">
                <button class="button button_white">Отправить</button>
            </div>
        </div>
    </form>
</div>