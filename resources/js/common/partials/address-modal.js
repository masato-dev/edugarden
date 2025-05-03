;(function(exports, global) {
    const addressModal = document.getElementById('addressModal');
    const app = {
        registerEvents() {
            
        },
        start() {
            this.registerEvents();
        }
    }

    if(addressModal) {
        app.start();
    }
})();