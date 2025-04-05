;(function (exports, global) {
    const loginBtn = document.getElementById('loginBtn');
    const registerBtn = document.getElementById('registerBtn');
    const headerSearchInput = document.getElementById('headerSearchInput');
    const headerSearchBtn = document.getElementById('headerSearchBtn');

    function search() {
        const keyword = headerSearchInput.value;
        if(keyword) {
            window.location.href = route('books.search', { keyword: keyword });
        }
    }

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

    if(headerSearchInput) {
        headerSearchInput.addEventListener('keyup', (e) => {
            if(e.key === 'Enter') {
                search();
            }
        });

    }

    if(headerSearchBtn) {
        headerSearchBtn.addEventListener('click', search);
    }
})(window.header = window.header || {}, window);