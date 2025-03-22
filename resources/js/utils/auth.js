(function(exports, global) {
    exports.showLoginModal = function() {
        const loginModal = document.getElementById('loginModal');
        const registerModal = document.getElementById('registerModal');
        if (loginModal) {
            loginModal.classList.add('show');
        }
        if (registerModal) {
            registerModal.classList.remove('show');
        }
    };

    exports.hideLoginModal = function() {
        const loginModal = document.getElementById('loginModal');
        if (loginModal) {
            loginModal.classList.remove('show');
        }
    };

    exports.showRegisterModal = function() {
        const loginModal = document.getElementById('loginModal');
        const registerModal = document.getElementById('registerModal');
        if (loginModal) {
            loginModal.classList.remove('show');
        }
        
        if (registerModal) {
            registerModal.classList.add('show');
        }
    };

    exports.hideRegisterModal = function() {
        const registerModal = document.getElementById('registerModal');
        if (registerModal) {
            registerModal.classList.remove('show');
        }
    };

    
})(window.auth = window.auth || {}, window);
