@php
    use App\Utils\CurrencyUtil;
    use App\Utils\StringUtil;
    use Illuminate\Support\Facades\Storage;
@endphp

<div class="book-card">
    <a href="{{ route('books.detail', ['slug' => $model['slug']]) }}" class="text-decoration-none">
        <div class="book-card-thumbnail" style="background-image: url('{{ 
            str_contains($model['thumbnail'], 'https') ? $model['thumbnail'] : Storage::disk('public')->url($model['thumbnail']) 
        }}');">
    
        </div>
        
        <div class="book-card-info">
            <h4 class="book-card-title text-color fw-600 text-overflow-ellipsis max-lines-2">{{ $model['title'] }}</h4>
    
            <button class="mt-3 k-btn btn-secondary">
                Cựu ước
            </button>
    
            <div class="d-flex align-items-center justify-content-between mt-3">
                <div class="book-card-rating d-flex align-items-center gap-1">
                    <i class="icon ic-star text-main"></i>
                    <span class="text-main">{{ $model['rating'] }}</span>
                </div>
    
                <div class="book-card-buy-quantity d-flex align-items-center gap-1">
                    <i class="icon ic-shopping-cart desc-text-color"></i>
                    <span class="desc-text-color">{{ $model['buy_quantity'] }}</span>
                </div>
            </div>
    
            <div class="mt-3">
                <p class="m-0 desc-text-color text-overflow-ellipsis max-lines-3 book-card-desc">
                    {{ StringUtil::removeScriptTags($model['short_description'] ?? $model['description']) }}
                </p>
            </div>
    
            <div class="mt-3 text-right">
                <span class="danger-text-color fs-4 fw-600">
                    {{ CurrencyUtil::toVnd($model['price']) }}
                </span>
            </div>
        </div>
    
        <!-- <div class="book-card-actions">
            <button class="btn-add-to-cart" title="Thêm vào giỏ hàng">
                <i class="icon ic-shopping-cart-add"></i>
                <span class="fs-6 text-overflow-ellipsis max-lines-1">Thêm</span>
            </button>
    
            <button class="btn-buy-now" title="Mua ngay">
                <i class="icon ic-shopping-basket-done"></i>
                <span class="fs-6 text-overflow-ellipsis max-lines-1">Mua ngay</span>
            </button>
        </div> -->
    </a>
</div>

