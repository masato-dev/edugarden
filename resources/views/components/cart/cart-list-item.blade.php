@php
    use App\Utils\CurrencyUtil;
@endphp

<div class="d-md-flex d-block align-items-center justify-content-between">
    <div class="d-flex align-items-center gap-3">
        <img src="{{ $book->thumbnail }}" alt="" width="80" height="80">
        <div>
            <h6>{{ $book->title }}</h6>
            <div class="mt-3">
                <span class="text-danger fw-600">{{ CurrencyUtil::toVnd($book->price) }}</span>
            </div>
        </div>
    </div>

    <div class="d-flex align-items-center gap-4">
        <div class="d-flex k-detail-quantity">
            <button class="k-detail-decrease-btn">-</button>
            <input type="text" class="k-detail-quantity-input" value="1">
            <button class="k-detail-increase-btn">+</button>
        </div>

        <div>
            <span class="text-danger fw-500 fs-5">{{ CurrencyUtil::toVnd($book->price * $cart->quantity) }}</span>
        </div>

        <div>
            <button class="k-btn btn-danger k-detail-remove-from-cart-btn" title="Xoá khỏi giỏ hàng">
                <i class="icon ic-delete"></i>
            </button>
        </div>
    </div>
</div>