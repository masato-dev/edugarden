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
            <button type="button" class="k-detail-decrease-btn cart-detail-decrease-btn">-</button>
            <input name="quantities[]" type="text" class="k-detail-quantity-input cart-detail-quantity-input" data-cart-id="{{ $cart->id }}" value="{{ $cart->quantity }}">
            <button type="button"` class="k-detail-increase-btn cart-detail-increase-btn">+</button>
        </div>

        <div>
            <span class="text-danger fw-500 fs-5">{{ CurrencyUtil::toVnd($cart->book->price * $cart->quantity) }}</span>
        </div>

        <div>
            <button data-cart-id="{{ $cart->id }}" class="k-btn btn-danger k-detail-remove-from-cart-btn" title="Xoá khỏi giỏ hàng" type="button">
                <i class="icon ic-delete"></i>
            </button>
        </div>
    </div>
</div>