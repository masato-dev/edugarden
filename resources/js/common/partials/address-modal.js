;(function (exports, global) {
    class AddressModalApp {
        constructor() {
            this.addressModal = document.getElementById('addressModal');
            this.cityIdInputHidden = document.getElementById('addressModalCityInputHidden');
            this.districtIdInputHidden = document.getElementById('addressModalDistrictInputHidden');
            this.wardIdInputHidden = document.getElementById('addressModalWardInputHidden');
            this.addressForm = document.getElementById('addressForm');
            this.submitBtn = document.querySelector('#addressModal button[type="submit"]');

            // State vars (optional depending on use)
            this.cityId = null;
            this.districtId = null;
            this.wardId = null;
        }

        validate() {
            return kValidator.validate(this.addressForm, {
                ignore: [],
                rules: {
                    name: { required: true },
                    phone: { required: true, phone: true },
                    address_detail: { required: true },
                    city_id: { required: true },
                    district_id: { required: true },
                    ward_id: { required: true },
                },
                messages: {
                    name: { required: 'Vui lòng nhập tên' },
                    phone: { 
                        required: 'Vui lòng nhập số điện thoại',
                        phone: 'Vui lòng nhập đúng định dạng số điện thoại',
                    },
                    address_detail: { required: 'Vui lòng nhập địa chỉ chi tiết' },
                    city_id: { required: 'Vui lòng chọn tỉnh/ thành phố' },
                    district_id: { required: 'Vui lòng chọn quận/ huyện' },
                    ward_id: { required: 'Vui lòng chọn phường/ xã' },
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
        }

        onSubmit = (e) => {
            e.preventDefault();
            if (this.validate()) {
                this.addressForm.submit();
            }
        }

        registerEvents() {
            this.cityIdInputHidden.addEventListener('change', () => {
                this.cityId = this.cityIdInputHidden.value;
            });
            this.districtIdInputHidden.addEventListener('change', () => {
                this.districtId = this.districtIdInputHidden.value;
            });
            this.wardIdInputHidden.addEventListener('change', () => {
                this.wardId = this.wardIdInputHidden.value;
            });
            this.addressForm.addEventListener('submit', this.onSubmit);
        }

        start() {
            this.registerEvents();
        }
    }

    const addressModal = document.getElementById('addressModal');
    if (addressModal) {
        const appInstance = new AddressModalApp();
        appInstance.start();
    }
})(window, window);
