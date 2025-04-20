;(function (exports, global) {
    const loginBtn = document.getElementById('loginBtn');
    const registerBtn = document.getElementById('registerBtn');
    const headerSearchInput = document.getElementById('headerSearchInput');
    const headerSearchBtn = document.getElementById('headerSearchBtn');
    const headerSearchResult = document.getElementById('headerSearchResult');
    const headerCartQuantity = document.getElementById('headerCartQuantity');

    let timeoutId = null;

    function search() {
        const keyword = headerSearchInput.value;
        if(keyword) {
            window.location.href = route('books.search', { keyword: keyword });
        }
    }

    function searchAjax() {
        const keyword = headerSearchInput.value;
        if(keyword) {
            clearTimeout(timeoutId);
            timeoutId = setTimeout(async () => {
                const bookService = locator.make(instanceNames.BookService); // Get instance from locator
                const response = await bookService.autoComplete(keyword);
                if(response.isSuccessfully()) {
                    headerSearchResult.classList.remove('d-none');
                    if(response.data.length === 0) {
                        headerSearchResult.innerHTML = `<li class="dropdown-item">Không tìm thấy</li>`;
                    }
                    else {
                        headerSearchResult.innerHTML = response.data.map((item) => `
                            <li>
                                <a href="${route('books.detail', { slug: item.slug })}" class="dropdown-item">
                                    ${item.title}
                                </a>
                            </li>
                        `).join('');
                    }
                }
                else {
                    headerSearchResult.classList.add('d-none');
                }
                
            }, 300);
        }
        else {
            headerSearchResult.classList.add('d-none');
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

        headerSearchInput.addEventListener('input', searchAjax);
        headerSearchInput.addEventListener('blur', e => {
            if(e.relatedTarget && e.relatedTarget.closest('#headerSearchResult')) return;
            headerSearchResult.classList.add('d-none');
        });

    }

    if(headerSearchBtn) {
        headerSearchBtn.addEventListener('click', search);
    }

    document.addEventListener(events.CART_UPDATED, (e) => {
        fetch(`${ route('ajax.carts.amount') }`)
            .then(response => response.json())
            .then(data => {
                const amount = parseInt(data.data);
                headerCartQuantity.innerText = amount;
                if(amount > 0) {
                    headerCartQuantity.classList.remove('d-none');
                }
                else {
                    headerCartQuantity.classList.add('d-none');
                }
            } 
        );
    });


})(window.header = window.header || {}, window);