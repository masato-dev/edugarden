;(function() {
    const increaseBtn = document.querySelector('.book-detail-increase-btn');
    const decreaseBtn = document.querySelector('.book-detail-decrease-btn');
    const quantityInput = document.querySelector('.book-detail-quantity-input');
    const addToCartBtn = document.querySelector('.book-detail-add-to-cart-btn');
    const hiddenBookInpput = document.querySelector('input[name="book"]');

    const app = {
        start() {
            this.registerEvents();
        },

        onUpdateQuantity(e) {
            const oldQuantity = parseInt(quantityInput.value);
            if(e.target === increaseBtn) {
                quantityInput.value = oldQuantity + 1;
            }

            if(e.target === decreaseBtn) {
                quantityInput.value = oldQuantity - 1;
            }

            if(quantityInput.value <= 0) {
                quantityInput.value = 1;
            }

        },

        async onAddToCart() {
            document.dispatchEvent(new CustomEvent(events.CART_UPDATED, {
                detail: {quantity: parseInt(quantityInput.value)}
            }));

            const cartService = locator.make(instanceNames.CartService);
            const book = JSON.parse(hiddenBookInpput.value);
            
            const response = await cartService.store({
                'book_id': book.id,
                'quantity': quantityInput.value,
            });

            if(response.isSuccessfully()) {
                notification.toast('Thêm vào giỏ hàng thành công', 'success');
            }
        },

        registerEvents() {
            increaseBtn.addEventListener('click', this.onUpdateQuantity);
            decreaseBtn.addEventListener('click', this.onUpdateQuantity);
            addToCartBtn.addEventListener('click', this.onAddToCart);
        },
    }

    app.start();
})();