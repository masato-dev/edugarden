@php
    use App\Utils\CurrencyUtil;
@endphp

<div class="d-md-flex d-block align-items-center justify-content-between">
    <div class="d-flex align-items-center gap-3">
        <img src="{{ $cart->book->thumbnail }}" alt="" width="80" height="80">
        <div>
            <h6>{{ $cart->book->title }}</h6>
            <div class="mt-3">
                <span class="text-danger fw-600">{{ CurrencyUtil::toVnd($cart->book->price) }}</span>
            </div>
        </div>
    </div>

    <div class="d-flex align-items-center gap-4">
        <div class="d-flex k-detail-quantity">
            <button class="k-detail-decrease-btn">-</button>
            <input type="text" class="k-detail-quantity-input" value="{{ $cart->quantity }}">
            <button class="k-detail-increase-btn">+</button>
        </div>

        <div>
            <span class="text-danger fw-500 fs-5">{{ CurrencyUtil::toVnd($cart->book->price * $cart->quantity) }}</span>
        </div>

        <div>
            <button data-cart-id="{{ $cart->id }}" class="k-btn btn-danger k-detail-remove-from-cart-btn" title="Xoá khỏi giỏ hàng">
                <i class="icon ic-delete"></i>
            </button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const removeBtn = document.querySelector('.k-detail-remove-from-cart-btn');
        removeBtn.forEach(btn => {
            btn.addEventListener('click', e => {
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
            });
        });
    });
</script>