;(function (exports, global) {
    const loginBtn = document.getElementById('loginBtn');
    const registerBtn = document.getElementById('registerBtn');

    if(loginBtn) {
        loginBtn.addEventListener('click', () => {
            auth.showLoginModal();
        });
    }
    
    if(registerBtn) {
        registerBtn.addEventListener('click', () => {
        auth.showRegisterModal();
        });
    }
})(window.header = window.header || {}, window);