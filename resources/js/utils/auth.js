(function(exports, global) {

    const loginModal = document.getElementById('loginModal');
    const registerModal = document.getElementById('registerModal');
    exports.showLoginModal = function() {
        if (loginModal) {
            loginModal.classList.add('show');
        }
        if (registerModal) {
            registerModal.classList.remove('show');
        }
    };

    exports.hideLoginModal = function() {
        if (loginModal) {
            loginModal.classList.remove('show');
        }
    };

    exports.showRegisterModal = function() {
        if (loginModal) {
            loginModal.classList.remove('show');
        }
        
        if (registerModal) {
            registerModal.classList.add('show');
        }
    };

    exports.hideRegisterModal = function() {
        if (registerModal) {
            registerModal.classList.remove('show');
        }
    };

    exports.isLoginModalShowing = function () {
        if(!loginModal) return false;
        return loginModal.classList.contains('show');
    }

    exports.isRegisterModalShowing = function () {
        if(!registerModal) return false;
        return registerModal.classList.contains('show');
    }

    
})(window.auth = window.auth || {}, window);
