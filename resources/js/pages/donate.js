;(function () {
    'use strict';
    const donateForm = document.getElementById('donateForm');
    const app = {

        validate() {
            return kValidator.validate(donateForm, {
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
                    amount: {
                        required: true,
                    },
                },

                messages: {
                    name: {
                        required: 'Vui lòng nhập tên',
                    },
                    email: {
                        required: 'Vui lòng nhập email',
                        email: 'Vui lòng nhập đúng định dạng email',
                    },
                    phone: {
                        required: 'Vui lòng nhập số điện thoại',
                        phone: 'Vui lòng nhập đúng định dạng số điện thoại',
                    },
                    amount: {
                        required: 'Vui lòng nhập số tiền',
                    },
                }
            }, (error, element) => {
                error.addClass('text-danger');
                if(element.attr('type') == 'hidden') {
                    element.closest('.position-relative').append(error);
                }
                else {
                    element.after(error);
                }
            })
        },
        onSubmit(e) {
            e.preventDefault();
            if(app.validate()) {
                
            }
        },
        registerEvents() {
            donateForm.addEventListener('submit', this.onSubmit);
        },
        start() {
            this.registerEvents();
        }
    }

    app.start();
})();