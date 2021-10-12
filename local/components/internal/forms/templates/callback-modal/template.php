<div id="callback-modal" v-cloak>
    <div class="custom-bootstrap">
        <!-- Modal -->
        <div class="modal fade" id="callbackModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header justify-content-center"  style="display: block;">
                        <h5 class="modal-title" style="text-align: center;">
                            Введите свой номер телефона <br />и мы Вам перезвоним
                        </h5>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body">
                        <form v-if="!successMessage">
                            <div class="form-group">
                                <input type="tel"
                                       v-bind:class="{'is-invalid' : !isValid, 'is-valid': isValid}"
                                       v-model="formData.phone"
                                       class="form-control"
                                       v-mask="'+7###  ###  ##  ##'"
                                       key=1
                                       placeholder="+7___   ___   __   __"/>
                            </div>

                            <div v-if="errorMessage">
                                <p class="error">{{errorMessage}}</p>
                            </div>

                            <div class="main-controls">
                                <button v-bind:disabled="!isValid && formData.name" type="button" class="btn btn-primary col-12" v-on:click="sendForm">
                                    <span>
                                       Перезвоните мне
                                   </span>
                                </button>
                            </div>

                        </form>
                        <p v-if="successMessage">
                            {{successMessage}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    new Vue({
        el: "#callback-modal",
        data: {
            numberPhone: '',
            formData: {
                phone: "",
            },
            //получаем параметры компонента
            signedParameters: '<?=$this->getComponent()->getSignedParameters()?>',
            csrf: '<?=bitrix_sessid()?>',
            errorMessage: '',
            successMessage: '',
        },
        computed: {
            isValid() {
                this.numberPhone = this.formData.phone.replace('+7', '');
                this.numberPhone = this.numberPhone.replace(/\s/g, '');

                // убираем семерки и восьмерки при копипасте
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
            replaced: function  (string, index, replacement) {
                return String(string).substr(0, index) + replacement + String(string).substr(index + replacement.length);
            },
            sendForm: function () {
                this.errorMessage = '';

                if (this.isValid) {
                    BX.ajax.runComponentAction('pixelplus:modal', 'sendForm', {
                        mode: 'class',
                        data: {
                            'data': {
                                // 'page': window.location.href,
                                'phone': this.numberPhone
                            },
                            'formType': 'back_call_phone',
                            'sessid': this.csrf,
                            'signedParameters': this.signedParameters
                        },
                    }).then((response) => {
                        this.successMessage = response.data.msg
                    }).catch((errors) => {
                        this.addErrors(errors.errors);
                    });
                }
            },

            addErrors: function (errors) {
                errors.map((error) => {
                    this.errorMessage += error.message+'\n';
                });
            },
        }
    });
</script>