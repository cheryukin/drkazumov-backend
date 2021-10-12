<div id="<?= $arParams['COMPONENT_ID'] ?>" v-cloak>
    <form ref="form<?= $arParams['COMPONENT_ID'] ?>" v-bind:class="{'more_active' : view === 'extended', 'invalid': !formParams.valid}"
          v-on:submit.prevent
          class="rent_form form_order_block
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
                Поможем с выбором и оформим ваш заказ
                <p>Оставьте заявку и мы перезвоним в течении 30 минут</p>
            </div>
            <div class="form-body">
                <div class="main_info col-md-4">
                    <input  v-bind:class="{'is-invalid' : !formData.name.length, 'is-valid': formData.name.length}"
                            v-model="formData.name"
                            type="text"
                            placeholder="Как вас зовут" />
                    <input type="tel"
                           v-bind:class="{'is-invalid' : !isValid, 'is-valid': isValid}"
                           v-model="formData.phone"
                           v-mask="'+7###  ###  ##  ##'"
                           key=1
                           placeholder="Ваш телефон"/>
                    <input v-if="view === 'extended'"
                           v-model="formData.email"
                           type="email" class="form_email"
                           placeholder="Внесите Ваш email"
                           v-bind:class="{'is-invalid' : !emailValid, 'is-valid': emailValid}"  />
                </div>
                <div v-if="view === 'extended'" class="more_info-block col-md-4">
                    <input  v-model="formData.address" type="text" placeholder="Внесите адрес доставки"
                            v-bind:class="{'is-invalid' : !formData.address.length, 'is-valid': formData.address.length}"  />
                    <div class="fake_select" v-if="!formData.item">
                        <i v-on:click="changeGrillSelectState" class="fa fa-sort-desc"></i>
                        <div v-on:click="changeGrillSelectState" class="select_title">
                            {{formData.type}}
                        </div>
                        <ul class="fake-select_list" v-if="formParams.showGrillSelect">
                            <? foreach (SiteHelper::getHlItemList('Grilltypes') as $item): ?>
                                <?if ($item['UF_DESCRIPTION'] === 'hide') continue?>
                                <li v-on:click="changeGrillType" data-type="<?= $item['UF_NAME'] ?>">
                                    <img src="<?= CFile::GetPath($item['UF_FILE']) ?>">
                                    <?= $item['UF_NAME'] ?>
                                </li v-on:click="changeGrillType">
                            <? endforeach; ?>
                        </ul>
                    </div>
                    <input
                            type="date"
                            v-model="formData.date"
                            min="<?=date('Y-m-d');?>"
                            placeholder="Введите дату аренды"
                            onkeydown="return false"
                    >
                    <div class="checkboxes hidden-xs hidden-sm">
                        <input v-model="formData.accessories" id="nabor<?= $arParams['COMPONENT_ID'] ?>" type="checkbox">
                        <label class="rent" for="nabor<?= $arParams['COMPONENT_ID'] ?>">Арендовать набор аксессуаров
                            +1000 ₽</label>
                    </div>
                </div>
                <div v-if="view === 'extended'" class="more_info_image-block col-md-4">
                    <img v-bind:src="formParams.productImg">
                </div>
                <div class="buttons_block">
                    <div class="checkboxes" v-bind:class="{'visible-xs visible-sm' : view === 'extended'}"  >
                        <input v-model="formData.accessories" id="modal_nabor<?=$arParams['COMPONENT_ID']?>"
                               type="checkbox">
                        <label class="rent" for="modal_nabor<?=$arParams['COMPONENT_ID']?>">Арендовать набор аксессуаров за 1000 ₽</label>
                    </div>
                    <div class="privacy_blocks">
                        <div class="checkboxes"  v-if="view === 'extended'" >
                            <input id="mailing<?= $arParams['COMPONENT_ID'] ?>" type="checkbox"
                                   v-model="formData.subscribe">
                            <label class="mailing" for="mailing<?= $arParams['COMPONENT_ID'] ?>">Согласие на
                                рассылку</label>
                        </div>
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
            Доставка в любую точку Москвы и МО
            </div>
            <div class="form_add_info pickup">
                <p>Стоимость доставки:</p>
                <p>Электрические и угольные грили: 1 000 рублей по Москве + 35 руб/км от МКАД</p>
                <p>Газовые грили: 2700 рублей по Москве + 35 руб/км от МКАД</p>
                <p>Самовывоз - бесплатно из пунктов выдачи:</p>
                <p><b>Москва, Калужское ш., Сосновая 3Б</b></p>
            </div>
            <div class="form_add_info">
                <div class="form_add_header">
                    Условия аренды
                </div>
                <p>Минимальный срок аренды 2 дня</p>
                <p>Аренда электрического гриля от 2000 руб./день, залог за гриль 10 000 руб.</p>
                <p>Аренда угольного гриля от 2000 руб./день, залог за гриль 10 000 руб.</p>
                <p>Аренда газового гриля от 5000 руб./день, залог за гриль 20 000 руб.</p>
                <p>Аксессуары (щипцы, щетка, стартер): 1000 рублей</p>
                <p>Аренда грилей на 7 и более дней обговаривается отдельно</p>
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
                showGrillSelect: false,
                productImg: "<?= SITE_TEMPLATE_PATH ?>/img/prod_grill.png",
                baseImg: "<?= SITE_TEMPLATE_PATH ?>/img/prod_grill.png",
                valid: true
            },
            formData: {
                item: '',
                phone: "",
                name: "",
                email: "",
                subscribe: true,
                accessories: false,
                type: 'Выберите тип гриля',
                date: "<?=date('Y-m-d');?>",
                address: ''
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
                if (this.view === 'base') {
                    return this.isValid && this.formData.name
                } else {
                    return this.isValid && this.formData.name && this.emailValid &&
                        this.formData.type && this.formData.address && this.formData.date
                 }
            },
            emailValid() {
                const re = /\S+@\S+\.\S+/;
                return re.test(this.formData.email);
            },
            isValid() {
               // if (!this.formData.phone.length) return true;
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
            changeView: function () {
                this.view = this.view === 'base' ? 'extended' : 'base';
            },
            changeGrillSelectState: function () {
                this.formParams.showGrillSelect = !this.formParams.showGrillSelect
            },
            changeGrillType: function () {
                var type = event.target.getAttribute('data-type');
                this.formData.type = type;
                this.changeGrillSelectState();
            },
            sendForm: function () {
                this.errorMessage = '';
                if (this.formValid) {
                    var data = this.formData;
                    data.phone = this.numberPhone;
                    BX.ajax.runComponentAction('pixelplus:modal', 'sendForm', {
                        mode: 'class',
                        data: {
                            'data': data,
                            'formType': 'rent_request',
                            'sessid': this.csrf,
                            'signedParameters': this.signedParameters
                        },
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
                if (isVisible) {
                    this.formData.item = this.$refs[this.formParams.formId].getAttribute('data-id');
                    var img = this.$refs[this.formParams.formId].getAttribute('data-img');
                    if (img) {
                        this.formParams.productImg = img;
                    }
                } else {
                    this.formData.item = '';
                    this.formParams.productImg = this.formParams.baseImg;
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