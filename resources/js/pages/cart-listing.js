;(function() {
    const removeBtns = document.querySelectorAll('.k-detail-remove-from-cart-btn');
    const cartDetailIncreaseBtns = document.querySelectorAll('.cart-detail-increase-btn');
    const cartDetailDecreaseBtns = document.querySelectorAll('.cart-detail-decrease-btn');
    const cartDetailQuantityInputs = document.querySelectorAll('.cart-detail-quantity-input');
    const codSelect = document.querySelector('#codSelect')
    const onlineSelect = document.querySelector('#onlineSelect');
    const codRadio = document.querySelector('#codRadio');
    const onlineRadio = document.querySelector('#onlineRadio');
    const cartAmount = document.querySelector('#cartAmount');
    const processPaymentForm = document.querySelector('#processPaymentForm');

    const app = {
        handleQuantity(quantityElement) {
            const isIncrease = quantityElement.classList.contains('cart-detail-increase-btn');
            const input = isIncrease
            ? quantityElement.previousElementSibling
            : quantityElement.nextElementSibling;
    
            let value = parseInt(input.value);
    
            value = isIncrease ? value + 1 : value - 1;
    
            if(value <= 0) {
                value = 1;
            }
    
            input.value = value;

            const cartId = input.dataset.cartId;
            
            
            const cartService = locator.make(instanceNames.CartService);
            cartService.update(cartId, { quantity: value }).then(response => {
                if(response.isSuccessfully()) {
                    notification.toast(response.data.message, 'success');
                    document.dispatchEvent(new CustomEvent(events.CART_UPDATED, {}));
                }
            });
    
        },

        onCartUpdated() {
            const total = Array.from(cartDetailQuantityInputs).reduce((acc, curr) => acc + parseInt(curr.value), 0);
            cartAmount.textContent = total;
        },

        handleRemove(btn) {
            notification.fire.confirm(
                'Xoá khỏi giỏ hàng',
                'Bạn có chắc chắc là muốn xoá sản phẩm này khỏi giỏ hàng?'
            ).then(result => {
                if(result.isConfirmed) {
                    const cartId = btn.dataset.cartId;
                    const cartService = locator.make(instanceNames.CartService);
                    cartService.delete(cartId).then(response => {
                        if(response.isSuccessfully()) {
                            notification.toast('Xoá sản phẩm khỏi giỏ hàng thành công', 'success');
                            document.dispatchEvent(new CustomEvent(events.CART_UPDATED, {}));
                            btn.closest('li').remove();
                        }

                        else {
                            notification.toast('Đã có lỗi xảy ra, vui lòng thử lại sau', 'error');
                        }
                    });
                }
            })
        },

        handleSelectPaymentMethod(target) {        
            const changeEvent = new Event('change');
            target.dispatchEvent(changeEvent);
        },

        onPaymentMethodChange(e) {
            const paymentMethod = e.target.value;
            if(paymentMethod === '0') {
                codSelect.classList.add('active');
                onlineSelect.classList.remove('active');
            }
            else {
                codSelect.classList.remove('active');
                onlineSelect.classList.add('active');
            }
        },

        onSubmitForm(e) {
            e.preventDefault();
            const canSubmit = document.querySelector('.payment-select.active') !== null;
            if(canSubmit) {
                console.log(document.querySelector('.payment-select.active').parentNode);
                
                const input = document.createElement('input');
                input.setAttribute('name', 'payment_method_hidden');
                input.setAttribute('value', document.querySelector('.payment-select.active').parentNode.querySelector('input[name="payment_method"]').value);
                processPaymentForm.appendChild(input);
                processPaymentForm.submit();
            }
            else {
                notification.fire.show('Lỗi', 'Vui lòng chọn phương thức thanh toán bên dưới', 'error');
            }
        },

        start() {
            this.registerEvents();
        },

        registerEvents() {
            cartDetailIncreaseBtns.forEach(btn => {
                btn.addEventListener('click', e => {
                    this.handleQuantity(btn);
                });
            });

            cartDetailDecreaseBtns.forEach(btn => {
                btn.addEventListener('click', e => {
                    this.handleQuantity(btn);
                });
            });

            removeBtns.forEach(btn => {
                btn.addEventListener('click', e => {
                    this.handleRemove(btn);
                });
            });

            codSelect.addEventListener('click', () => this.handleSelectPaymentMethod(codRadio));
            onlineSelect.addEventListener('click', () => this.handleSelectPaymentMethod(onlineRadio));
            codRadio.addEventListener('change', this.onPaymentMethodChange);
            onlineRadio.addEventListener('change', this.onPaymentMethodChange);
            processPaymentForm.addEventListener('submit', this.onSubmitForm);
            document.addEventListener(events.CART_UPDATED, this.onCartUpdated);
        }
    }

    app.start();
})();
