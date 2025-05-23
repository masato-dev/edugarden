;(function () {
    const addShippingAddressBtn = document.querySelector('#addShippingAddressBtn');
    const addressModal = document.querySelector('#addressModal');
    const paymentForm = document.querySelector('#paymentForm');

    const app = {
        start() {
            this.registerEvents();
        },

        onAddShippingAddress() {
            addressModal.classList.add('show');
        },

        onAddressStored() {
            addressModal.classList.remove('show');
            notification.toast('Thêm mới địa chỉ thành công', 'success');
        },

        onAddressUpdated() {
            addressModal.classList.remove('show');
            notification.toast('Cập nhật địa chỉ thành công', 'success');
        },

        onAddressDeleted() {
            addressModal.classList.remove('show');
            notification.toast('Xoá địa chỉ thành công', 'success');
        },

        onSubmit(e) {
            e.preventDefault();
            const userAddressId = paymentForm.querySelector('[name="chosen_address_id"]').value;
            if(userAddressId) {
                paymentForm.submit();
            } else {
                notification.fire.show('Lỗi', 'Vui lòng chọn địa chỉ để thanh toán ', 'error');
            }
        },

        registerEvents() {
            addShippingAddressBtn.addEventListener('click', this.onAddShippingAddress);
            paymentForm.addEventListener('submit', this.onSubmit);
            Livewire.on('addressStored', payload => {
                this.onAddressStored();
            });

            Livewire.on('addressUpdated', payload => {
                this.onAddressUpdated();
            });

            Livewire.on('addressDeleted', payload => {
                this.onAddressDeleted();
            });
        }
    }

    app.start();
})();
