<div id="<?= $arParams['COMPONENT_ID'] ?>" v-cloak>
    <form ref="form<?= $arParams['COMPONENT_ID'] ?>" v-bind:class="{'more_active' : view === 'extended', 'invalid': !formParams.valid}"
          v-on:submit.prevent
          class="repear_form form_order_block
          <?if (strripos($arParams['COMPONENT_ID'], 'modal') !== false):?>modal_block-form<?endif?>"
          v-observe-visibility="visibilityChanged"
        >
        <?if (strripos($arParams['COMPONENT_ID'], 'modal') !== false):?>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"></span>
        </button>
        <?endif;?>
        <div v-if="successMessage" style="text-align: center; margin: 0 auto;">
            <h3 style="padding: 100px;">{{successMessage}}</h3>
        </div>
        <div class="form" v-if="!successMessage">
            <div class="form-header">
                Оперативно исправим любые поломки вашего гриля
                <p>Оставьте заявку и мы перезвоним в течении 30 минут</p>
            </div>
            <div class="form-body">
                <div class="main_info col-md-4">
                    <input v-bind:class="{'is-invalid' : !formData.name.length, 'is-valid': formData.name.length}"  v-model="formData.name" type="text" placeholder="Как вас зовут">
                    <input type="tel"
                           v-bind:class="{'is-invalid' : !isValid, 'is-valid': isValid}"
                           v-model="formData.phone"
                           v-mask="'+7###  ###  ##  ##'"
                           key=1
                           v-bind:class="{'is-invalid' : !formData.name.length, 'is-valid': formData.name.length}"
                           placeholder="Ваш телефон"/>
                    <input v-if="view === 'extended'" v-model="formData.email" type="email" class="form_email"
                           placeholder="Внесите Ваш email"
                           v-bind:class="{'is-invalid' : !emailValid, 'is-valid': emailValid}"  />
                </div>
                <div v-if="view === 'extended'" class="more_info-block col-md-4">
                    <input v-model="formData.address" type="text" placeholder="Адрес проведения ремонта"
                           v-bind:class="{'is-invalid' : !formData.address.length, 'is-valid': formData.address.length}"  />
                    <input v-model="formData.model"  type="text" placeholder="Внесите модель гриля"
                           v-bind:class="{'is-invalid' : !formData.model.length, 'is-valid': formData.model.length}"  />
                    <textarea v-model="formData.problem" class="richtext visible-xs visible-sm" type="text"
                              placeholder="Опишите проблему" v-bind:class="{'is-invalid' : !formData.problem.length, 'is-valid': formData.problem.length}" ></textarea>
                    <input ref="file" v-on:change="loadFile" id="load_files<?= $arParams['COMPONENT_ID'] ?>" type="file" multiple="multiple" name="files[]" accept="image/*">
                    <label class="load_link" for="load_files<?= $arParams['COMPONENT_ID'] ?>">
                        <img src="<?=SITE_TEMPLATE_PATH?>/img/repear/attach.svg"> Прикрепить фото
                    </label>
                    <div class="flies_list">
                        <div class="fileitem" v-for="(item, index) in formData.files">
                            <p>{{item.name}}</p>
                            <span v-on:click="deleteFile(index)" class="deletefile">
                                    <img src="<?=SITE_TEMPLATE_PATH?>/img/close_delete.svg" alt="delete file"/>
                            </span>
                        </div>
                    </div>
                </div>
                <div v-if="view === 'extended'" class="more_info_image-block col-md-4">
                    <textarea v-model="formData.problem" v-bind:class="{'is-invalid' : !formData.problem.length, 'is-valid': formData.problem.length}"  class="richtext" type="text" placeholder="Опишите проблему"></textarea>
                </div>
                <div class="buttons_block">
                    <div class="checkboxes" v-if="view === 'extended'">
                        <input id="mailing<?= $arParams['COMPONENT_ID'] ?>" type="checkbox"
                               v-model="formData.subscribe">
                        <label class="mailing" for="mailing<?= $arParams['COMPONENT_ID'] ?>">Согласие на
                            рассылку</label>
                    </div>
                    <div class="privacy_blocks">
                        <a href="/politika-konfidencialnosti/" target="_blank" class="gray_link">Согласен с политикой
                            конфиденциальности </a>
                        <button class="btn btn_link submit" v-on:click="sendForm">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/img/mail-card.svg">Отправить
                        </button>
                        <button v-on:click="changeView" class="btn btn_white">
                            Внести больше информации
                            <i
                                    v-bind:class="{'fa-angle-double-right' : view === 'base', 'fa-angle-double-left' : view === 'extended'}"
                                    class="fa"
                            ></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="view === 'base' && !successMessage" class="form_add_info-block hidden-xs hidden-sm">
            <div class="form_add_header">
                Перечень распространенных поломок, с которыми мы можем помочь
            </div>
            <div class="form_add_info">
                <p><img src="<?=SITE_TEMPLATE_PATH?>/img/check.png"> не работают форсунки</p>
                <p><img src="<?=SITE_TEMPLATE_PATH?>/img/check.png"> поломалась деталь</p>
                <p><img src="<?=SITE_TEMPLATE_PATH?>/img/check.png"> помялась деталь / корпус</p>
                <p><img src="<?=SITE_TEMPLATE_PATH?>/img/check.png"> отломалась дверка</p>
                <p><img src="<?=SITE_TEMPLATE_PATH?>/img/check.png"> разбилась чаша</p>
                <p><img src="<?=SITE_TEMPLATE_PATH?>/img/check.png"> сломалась / погнулась ножка</p>
                <p><img src="<?=SITE_TEMPLATE_PATH?>/img/check.png"> сломалась крышка</p>
                <p><img src="<?=SITE_TEMPLATE_PATH?>/img/check.png"> порвался шланг</p>

            </div>
            <div class="form_add_info notice">
                <p>Если вашей поломки нет в списке, не переживайте, расскажите нам в чем проблема и мы обязательно вам
                    поможем</p>
            </div>
        </div>
    </form>
</div>
<script>
    Vue.use(VueObserveVisibility);
    new Vue({
        el: "#<?=$arParams['COMPONENT_ID']?>",
        data: {
            numberPhone: '',
            formParams: {
                formId: "form<?=$arParams['COMPONENT_ID']?>",
                valid: true
            },
            formData: {
                files: [],
                phone: "",
                name: "",
                email: "",
                subscribe: true,
                problem: '',
                model: '',
                address: '',
                request_type: 'Ремонт',
            },
            view: 'base',
            //получаем параметры компонента
            signedParameters: '<?=$this->getComponent()->getSignedParameters()?>',
            csrf: '<?=bitrix_sessid()?>',
            errorMessage: '',
            successMessage: '',
        },
        computed: {
            formValid() {
                console.log(this.formData.files)
                if (this.view === 'base') {
                    return this.isValid && this.formData.name
                } else {
                    return this.isValid && this.formData.name && this.emailValid &&
                        this.formData.model && this.formData.problem && this.formData.address
                }
            },
            emailValid() {
                const re = /\S+@\S+\.\S+/;
                return re.test(this.formData.email);
            },
            isValid() {
                this.numberPhone = this.formData.phone.replace('+7', '');
                this.numberPhone = this.numberPhone.replace(/\s/g, '');

                if (this.formData.phone.charAt(0) === "8") {
                    this.formData.phone = this.replaced(this.formData, 0, "+7");
                }
                if (this.formData.phone.startsWith('+7+')) {
                    this.formData.phone = this.formData.phone.slice(3)
                }

                return this.formData.phone.length === 18;
            },
            formatPhone() {
                return this.numberPhone.replace(/(\d{1,3})(\d{1,3})(\d{1,4})/g, '+7 $1-$2-$3')
            },
        },
        methods: {
            loadFile: function () {
                this.formData.files = this.formData.files.concat(Array.from(this.$refs.file.files));
            },
            deleteFile: function (idx) {
                this.formData.files.splice(idx, 1);
            },
            changeView: function () {
                this.view = this.view === 'base' ? 'extended' : 'base';
            },
            sendForm: function () {
                this.errorMessage = '';
                if (this.formValid) {
                    var formData = new FormData();
                    this.formData.phone = this.numberPhone;
                    Object.keys(this.formData).forEach(prop => {
                        if (prop !== 'files') {
                            formData.append('data[' + prop + ']', this.formData[prop]);
                        } else {
                            for( var i = 0; i < this.formData.files.length; i++ ){
                                var file = this.formData.files[i];
                                formData.append('images[' + i + ']', file);
                            }
                        }
                    });

                    formData.append('formType', 'repair_request');

                    BX.ajax.runComponentAction('pixelplus:modal', 'sendForm', {
                        mode: 'class',
                        data: formData,
                    }).then((response) => {
                        if (response.data.redirectParams) {
                            location = '?'+response.data.redirectParams;
                        }
                    }).catch((errors) => {
                        this.addErrors(errors.errors);
                    });
                } else {
                    this.formParams.valid = false;
                }
            },
            // проверяем видимость, чтобы получить id товара для модалки
            visibilityChanged (isVisible) {
                if (!isVisible) {
                    this.view = 'base';
                    this.successMessage = '';
                    this.errorMessage = '';
                    this.formParams.valid = true;
                }
            },
            addErrors: function (errors) {
                errors.map((error) => {
                    this.errorMessage += error.message + '\n';
                });
            },
            replaced: function  (string, index, replacement) {
                return String(string).substr(0, index) + replacement + String(string).substr(index + replacement.length);
            },
        },
    });
</script>