<div id="<?=$arParams['COMPONENT_ID']?>" v-cloak>
    <div class="custom-bootstrap">
        <!-- Modal -->
        <div class="modal fade quick-order__modal" id="fastOrderModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content" ref="form<?= $arParams['COMPONENT_ID'] ?>" v-observe-visibility="visibilityChanged">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body" v-if="itemData"  v-bind:class="{'invalid' : !formParams.valid}">
                        <div v-if="successMessage" style="text-align: center; margin: 0 auto;">
                            <h3 style="padding: 100px;">{{successMessage}}</h3>
                        </div>
                        <div class="row" v-if="!successMessage">
                            <div class="col-sm-6">
                                <div class="quick-order__product">
                                    <div class="quick-order__title">{{formData.comment}}</div>
                                    <div class="quick-order__product-header">
                                        <div class="quick-order__product-title">
                                            {{itemData.title}}
                                        </div>
                                        <div class="quick-order__product-image">
                                            <img v-bind:src="itemData.picture">
                                        </div>
                                    </div>
                                    <div class="quick-order__price-wrapper">
                                        <div class="quick-order__product-price">{{itemData.discountPrice}}₽</div>
                                        <div v-if="itemData.hasDiscount" class="quick-order__product-oldprice">{{itemData.price}} ₽ </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 quick-order__right">
                                <div class="quick-order__title">{{formData.comment}}</div>
                                <form v-on:submit.prevent>
                                    <div class="form-group">
                                        <input v-model="formData.name" type="text" class="form-field" placeholder="Внесите ваше имя"
                                               v-bind:class="{'is-invalid' : !formData.name.length, 'is-valid': formData.name.length}"  />
                                    </div>
                                    <div class="form-group">
                                        <input type="tel"
                                               v-bind:class="{'is-invalid' : !isPhoneValid, 'is-valid': isPhoneValid}"
                                               v-model="formData.phone"
                                               class="form-field"
                                               v-mask="'+7###  ###  ##  ##'"
                                               key=1
                                               placeholder="Ваш телефон"/>
                                    </div>
                                    <div class="form-group">
                                        <input v-model="formData.email" type="email" class="form-field" placeholder="Внесите ваш Email"
                                               v-bind:class="{'is-invalid' : !emailValid, 'is-valid': emailValid}"  />
                                    </div>
                                    <div class="form-group">
                                        <div class="quick-order__price-wrapper mobile">
                                            <div  class="quick-order__product-price">{{itemData.discountPrice}}₽</div>
                                            <div v-if="itemData.hasDiscount" class="quick-order__product-oldprice">{{itemData.price}} ₽ </div>
                                        </div>
                                    </div>

<!--                                    <div class="form-group" v-if="formData.type === 'preorder'">-->
<!--                                        Ориентировочный срок доставки 6-8&nbsp;дней-->
<!--                                    </div>-->
                                    <div class="control-block">
                                        <label class="custom-check agree">
                                            <input type="checkbox" v-model="formData.subscribe">
                                            <span class="checkmark"></span>
                                            Согласие на рассылку
                                        </label>
                                        <div class="quick-order__police">
                                            <a href="/politika-konfidencialnosti/">Согласен с политикой конфиденциальности</a>
                                        </div>
                                        <div class="btn-line">
                                            <button v-bind:class="{'disabled': orderDisabled}" v-on:click="sendForm" name="send" class="btn btn-red cart-btn">Заказать</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    Vue.use(VueObserveVisibility);
    new Vue({
        el: "#<?=$arParams['COMPONENT_ID']?>",
        data: {
            orderDisabled: false,
            numberPhone: '',
            formParams: {
                formId: "form<?=$arParams['COMPONENT_ID']?>",
                valid: true
            },
            itemData: null,
            formData: {
                itemId: "",
                phone: "",
                name: "",
                subscribe: true,
                comment: 'Быстрый заказ',
                type: 'fast',
            },
            errorMessage: '',
            successMessage: '',
        },
        computed: {
            isFormValid() {
                return this.isPhoneValid && this.formData.name && this.emailValid
            },
            emailValid() {
                const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(this.formData.email);
            },
            isPhoneValid() {
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
            sendForm: function () {
                this.errorMessage = '';
                if (this.isFormValid && !this.orderDisabled) {
                    this.orderDisabled = true;
                    this.formData.phone = "7"+this.numberPhone;
                    BX.ajax.runComponentAction('pixelplus:modal', 'addOrder', {
                        mode: 'class',
                        data: {
                            'orderData': this.formData,
                        },
                    }).then((response) => {
                        this.successMessage = response.data.msg
                        if (response.data.orderData) {
                            fbq('track', 'Purchase', JSON.parse(response.data.orderData));
                        }
                        this.orderDisabled = false;
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
                    this.itemData = JSON.parse(this.$refs[this.formParams.formId].getAttribute('data-item'));
                    this.formData.itemId = this.itemData.id
                    this.formData.type =  this.itemData.in_sale === 'Предзаказ' ? 'preorder' : 'fast'
                    this.formData.comment=  this.itemData.in_sale === 'Предзаказ' ? 'Предзаказ' : 'Быстрый заказ'
                } else {
                    this.itemData= null;
                    this.successMessage = '';
                    this.errorMessage = '';
                }
            },
            addErrors: function (errors) {
                errors.map((error) => {
                    this.errorMessage += error.message+'\n';
                });
            },
            replaced: function  (string, index, replacement) {
                return String(string).substr(0, index) + replacement + String(string).substr(index + replacement.length);
            },
        },
    });
</script>