;(function () {
    'use strict';
    const contactForm = document.getElementById('contactForm');

    const app = {
        validate() {
            return kValidator.validate(contactForm, {
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    phone: {
                        phone: true,
                    },
                    subject: {
                        required: true,
                    },
                    message: {
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
                        phone: 'Vui lòng nhập đúng định dạng SĐT',
                    },
                    subject: {
                        required: 'Vui lòng nhập tiêu đề',
                    },
                    message: {
                        required: 'Vui lòng nhập nội dung',
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
            if(app.validate()) {
                contactForm.submit();
            }
        },
        registerEvents() {
            contactForm.addEventListener('submit', this.onSubmit);
        },
        start() {
            this.registerEvents();
        },
    }

    app.start();
})();