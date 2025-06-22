(function(exports, global) {

    const loginModal = document.getElementById('loginModal');
    const registerModal = document.getElementById('registerModal');
    const forgotPasswordModal = document.getElementById('forgotPasswordModal');
    exports.showLoginModal = function() {
        auth.hideForgotPasswordModal();
        auth.hideRegisterModal();
        if (loginModal) {
            loginModal.classList.add('show');
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

    exports.showForgotPasswordModal = function() {
        if(auth.isLoginModalShowing()) {
            auth.hideLoginModal();
        }
        if (forgotPasswordModal) {
            forgotPasswordModal.classList.add('show');
        }
    }

    exports.hideForgotPasswordModal = function() {
        if (forgotPasswordModal) {
            forgotPasswordModal.classList.remove('show');
        }
    }

    exports.isLoginModalShowing = function () {
        if(!loginModal) return false;
        return loginModal.classList.contains('show');
    }

    exports.isRegisterModalShowing = function () {
        if(!registerModal) return false;
        return registerModal.classList.contains('show');
    }

    exports.isForgotPasswordModalShowing = function () {
        if(!forgotPasswordModal) return false;
        return forgotPasswordModal.classList.contains('show');
    }

    
})(window.auth = window.auth || {}, window);
