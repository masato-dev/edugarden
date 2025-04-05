;(function () {
    const loginForm = document.getElementById('loginForm');
    const app = {

        start: function () {
            this.registerEvents();
        },

        
        validate: function () {
            return kValidator.validate(loginForm, {
                rules: {
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                    },
                },

                messages: {
                    email: {
                        required: 'Vui lòng nhập email',
                        email: 'Vui lòng nhập đúng định dạng email',
                    },
                    password: {
                        required: 'Vui lòng nhập mật khẩu',
                    },
                },
            });
        },

        registerEvents: function () {
            const handleSubmit = e => {
                e.preventDefault();
                if(app.validate()) {
                    loginForm.submit();
                }
            }

            if(loginForm) {
                loginForm.addEventListener('submit', handleSubmit);
            }
        },
    }

    app.start();

})();