;(function () {
    const forgotPasswordForm = document.getElementById('forgotPasswordForm');
    const app = {

        start: function () {
            this.registerEvents();
        },

        
        validate: function () {
            return kValidator.validate(forgotPasswordForm, {
                rules: {
                    email: {
                        required: true,
                        email: true,
                    },
                },

                messages: {
                    email: {
                        required: 'Vui lòng nhập email',
                        email: 'Vui lòng nhập đúng định dạng email',
                    },
                },
            });
        },

        registerEvents: function () {
            const handleSubmit = e => {
                e.preventDefault();
                if(app.validate()) {
                    forgotPasswordForm.submit();
                }
            }

            if(forgotPasswordForm) {
                forgotPasswordForm.addEventListener('submit', handleSubmit);
            }
        },
    }

    app.start();

})();