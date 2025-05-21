let globalMode = 'create';
let globalAddress = {};
;(function (exports, global) {
    exports.show = function(mode = 'create', address = {}) {
        globalMode = mode;
        globalAddress = address;
        if(mode == 'create') {
            document.querySelector('#addressModal').classList.add('show');
        }

        if(mode == 'update') {
            const addressModal = document.querySelector('#addressModal');
            addressModal.querySelector('#addressModalTitle').innerText = 'Cập nhật địa chỉ';
            addressModal.querySelector('#name').value = address.name;
            addressModal.querySelector('#phone').value = address.phone;
            addressModal.querySelector('#address_detail').value = address.address_detail;
            addressModal.querySelector('#isDefaultCheckbox').checked = address.is_default;
            addressModal.querySelector('#addressModalCityInputHidden').value = address.city_id;
            addressModal.querySelector('#addressModalDistrictInputHidden').value = address.district_id;
            addressModal.querySelector('#addressModalWardInputHidden').value = address.ward_id;
            addressModal.querySelector('#addressModalCityInput').value = address.city_name;
            addressModal.querySelector('#addressModalDistrictInput').value = address.district_name;
            addressModal.querySelector('#addressModalWardInput').value = address.ward_name;

            Livewire.dispatchTo('common.location-selector', 'selectItem', ['city_id', address.city_id]);
            Livewire.dispatchTo('common.location-selector', 'selectItem', ['district_id', address.district_id]);
            Livewire.dispatchTo('common.location-selector', 'selectItem', ['ward_id', address.ward_id]);

            addressModal.classList.add('show');
        }
    }

    exports.hide = function() {
        document.querySelector('#addressModal').classList.remove('show');
    }

    class AddressModalApp {
        constructor() {
            this.addressModal = document.getElementById('addressModal');
            this.cityIdInputHidden = document.getElementById('addressModalCityInputHidden');
            this.districtIdInputHidden = document.getElementById('addressModalDistrictInputHidden');
            this.wardIdInputHidden = document.getElementById('addressModalWardInputHidden');
            this.addressForm = document.getElementById('addressForm');
            this.submitBtn = document.querySelector('#addressModal button[type="submit"]');
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

        onSubmit = async (e) => {
            e.preventDefault();
            if (this.validate()) {
                const name = this.addressForm.name.value;
                const phone = this.addressForm.phone.value;
                const addressDetail = this.addressForm.address_detail.value;
                const cityId = this.addressForm.city_id.value;
                const districtId = this.addressForm.district_id.value;
                const wardId = this.addressForm.ward_id.value;
                const isDefault = this.addressForm.is_default.checked;

                if(globalMode == 'create') {
                    Livewire.dispatchTo('address.address-form', 'storeAddress', [
                        name,
                        phone,
                        addressDetail,
                        cityId,
                        districtId,
                        wardId,
                        isDefault
                    ]);
                }

                if(globalMode == 'update') {
                    Livewire.dispatchTo('address.address-form', 'updateAddress', [
                        globalAddress.id,
                        name,
                        phone,
                        addressDetail,
                        cityId,
                        districtId,
                        wardId,
                        isDefault
                    ]);
                }
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
})(window.addressModal = window.addressModal || {}, window);
