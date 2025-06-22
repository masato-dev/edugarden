;(function () {

    const resetPasswordForm = document.querySelector('#resetPasswordForm');

    const modules = {
        information: {
            start() {

            },
        },

        resetPassword: {

            validate() {
                return kValidator.validate(resetPasswordForm, {
                    rules: {
                        old_password: {
                            required: true,
                        },

                        password: {
                            required: true,
                        },

                        password_confirmation: {
                            required: true,
                            equalTo: '#password'
                        },
                    },
                    messages: {
                        old_password: {
                            required: 'Vui lòng nhập mật khẩu cũ',
                        },
                        password: {
                            required: 'Vui lòng nhập mật khẩu mới',
                        },
                        password_confirmation: {
                            required: 'Vui lòng nhập mật khẩu xác nhận',
                            equalTo: 'Mật khẩu xác nhận không khớp',
                        },
                    },
                }, (error, element) => {
                    error.addClass('text-danger');
                    if(element.attr('type') == 'hidden') {
                        element.closest('.position-relative').append(error);
                    }
                    else {
                        element.after(error);
                    }
                });
            },
            
            onSubmit(e) {
                e.preventDefault();
                if(modules.resetPassword.validate()) {
                    resetPasswordForm.submit();
                }
            },
            registerEvents() {
                resetPasswordForm.addEventListener('submit', this.onSubmit);
            },
            start() {
                this.registerEvents();
            }
        }
    }

    const app = {
        start() {
            modules.information.start();
            modules.resetPassword.start();
        }
    }

    app.start();
})();