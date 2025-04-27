;(function() {
    const removeBtns = document.querySelectorAll('.k-detail-remove-from-cart-btn');
    const cartDetailIncreaseBtns = document.querySelectorAll('.cart-detail-increase-btn');
    const cartDetailDecreaseBtns = document.querySelectorAll('.cart-detail-decrease-btn');

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
        }
    }

    app.start();
})();
