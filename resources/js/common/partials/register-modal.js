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
            const password = passwordInput.value;
            const passwordConfirm = passwordConfirmInput.value;
            if(password !== passwordConfirm) {
                confirmError.classList.remove('d-none');
            }
            else {
                confirmError.classList.add('d-none');
            }
            return password && passwordConfirm && password === passwordConfirm;
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
                else {
                    notification.toast('Mập khẩu xác nhận chưa trùng khớp', 'error');
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