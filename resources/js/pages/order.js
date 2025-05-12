;(function () {
    const addShippingAddressBtn = document.querySelector('#addShippingAddressBtn');
    const addressModal = document.querySelector('#addressModal');

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

        registerEvents() {
            addShippingAddressBtn.addEventListener('click', this.onAddShippingAddress);
            Livewire.on('addressStored', payload => {
                this.onAddressStored();
            });
        }
    }

    app.start();
})();
