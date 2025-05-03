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

        registerEvents() {
            addShippingAddressBtn.addEventListener('click', this.onAddShippingAddress);
        }
    }

    app.start();
})();
