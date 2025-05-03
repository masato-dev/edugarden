;(function(exports, global) {
    const addressModal = document.getElementById('addressModal');
    const cityIdInputHidden = document.getElementById('addressModalCityInputHidden');
    const districtIdInputHidden = document.getElementById('addressModalDistrictInputHidden');
    const wardIdInputHidden = document.getElementById('addressModalWardInputHidden');

    let cityId = null;
    let districtId = null;
    let wardId = null;

    const app = {
        registerEvents() {
            cityIdInputHidden.addEventListener('change', () => cityId = cityIdInputHidden.value);
            districtIdInputHidden.addEventListener('change', () => districtId = districtIdInputHidden.value);
            wardIdInputHidden.addEventListener('change', () => wardId = wardIdInputHidden.value);
        },
        start() {
            this.registerEvents();
        }
    }

    if(addressModal) {
        app.start();
    }
})();