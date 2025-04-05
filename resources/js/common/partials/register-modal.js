;(async function () {
    const registerModalChurchInput = document.getElementById('registerModalChurchInput');
    const passwordInput = document.getElementById('registerModalPasswordInput');
    const passwordConfirmInput = document.getElementById('registerModalPasswordConfirmInput');
    const registerForm = document.getElementById('registerForm');
    const confirmError = document.getElementById('registerModalPasswordConfirmError');

    const app = {
        start() {
            this.fetchChurchs();
            this.registerEvents();
        },

        async fetchChurchs() {
            const response = await fetch(route('ajax.churchs.index'));
            if(response.ok) {
                const json = await response.json();
                const data = json.data;
                const churchs = data.map((item) => {
                    return {
                        label: item.name,
                        value: item.id
                    }
                });
                
                VirtualSelect.init({
                    ele: '#churchSelect',
                    placeholder: 'Hội thánh',
                    search: true,
                    options: churchs,
                })
            }
        },

        onChurchSelectChange() {
            document.querySelector('#churchSelect').addEventListener('change', e => {
                const churchId = e.target.value;
                registerModalChurchInput.value = churchId;
            });
        },

        validate() {
            const isValidate = kValidator.validate(registerForm, {
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    phone: {
                        required: true,
                        phone: true,
                    },
                    password: {
                        required: true,
                        minlength: 6,
                    },
                    passwordConfirm: {
                        equalTo: '#registerModalPasswordInput'
                    }
                },
                messages: {
                    name: {
                        required: 'Vui lòng nhập họ và tên',
                    },
                    email: {
                        required: 'Vui lòng nhập email',
                        email: 'Vui lòng nhập đúng định dạng email',
                    },
                    phone: {
                        required: 'Vui lòng nhập SĐT',
                        phone: 'Vui lòng nhập đúng định dạng SĐT',
                    },
                    password: {
                        required: 'Mật khẩu là bắt buộc',
                        minlength: $.validator.format('Mật khẩu phải nhất {0} kí tự'),
                    },
                    passwordConfirm: {
                        equalTo: 'Mật khẩu xác nhận không trùng khớp',
                    }
                },
            });
            
            const churchInput = $('#registerModalChurchInput');
            const isNotEmptyChurchId = churchInput && churchInput.val();
            if(!isNotEmptyChurchId) {
                $('#churchSelectError').removeClass('d-none');
            }
            else {
                $('#churchSelectError').addClass('d-none');
            }
            return isValidate && $(`input[name="church_id]`).val() !== isNotEmptyChurchId;
        },

        onInputPassword() {
            passwordInput.addEventListener('input', () => {
                this.validate();
            });

            passwordConfirmInput.addEventListener('input', () => {
                this.validate();
            });
        },

        onSubmit() {
            registerForm.addEventListener('submit', e => {
                e.preventDefault();
                if(this.validate()) {
                    registerForm.submit();
                }
            });
        },

        registerEvents() {
            this.onChurchSelectChange();
            this.onInputPassword();
            this.onSubmit();
        }
    }

    app.start();
})();