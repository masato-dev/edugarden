;(function () {
    'use strict';
    const donateForm = document.getElementById('donateForm');
    const submitBtn = document.querySelector('#donateForm button[type="submit"]');
    const qrSection = document.getElementById('qrSection');
    const qrImage = document.getElementById('qrImage');
    const app = {

        async storeDonate(donateRequest) {
            submitBtn.setAttribute('disabled', true);
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Đang tạo...';
            const donateService = locator.make(instanceNames.DonateService);
            return await donateService.store(donateRequest);
        },

        async renderQrCode() {
            qrSection.classList.remove('d-none');
            const response = await fetch(route('ajax.payment.vietqr.qr-code', { 
                amount: donateForm.amount.value,
                note: donateForm.note.value
            }));

            if(response.ok) {
                submitBtn.classList.add('d-none');
                const json = await response.json();
                const data = json.data;
                qrImage.style.backgroundImage = `url('${data}')`;
                submitBtn.classList.add('d-none');
                submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Đang tạo...';
            }
            else {
                notification.toast('Đã có lỗi trong quá trình tạo mã QR, vui lòng thử lại', 'error');
                qrSection.classList.add('d-none');
                submitBtn.removeAttribute('disabled');
                submitBtn.classList.remove('d-none');
                submitBtn.innerHTML = 'Tạo mã QR chuyển khoản';
            }
        },
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
        async onSubmit(e) {
            e.preventDefault();
            if(app.validate()) {
                const response = await app.storeDonate({
                    name: donateForm.name.value,
                    email: donateForm.email.value,
                    phone: donateForm.phone.value,
                    amount: donateForm.amount.value,
                    note: donateForm.note.value,
                });

                if(response.isSuccessfully()) {
                    app.renderQrCode();
                }
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