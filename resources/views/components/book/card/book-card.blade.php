@php
    use App\Utils\CurrencyUtil;
    use App\Utils\StringUtil;
    use Illuminate\Support\Facades\Storage;

    $thumb = str_contains($model['thumbnail'] ?? '', 'https')
        ? ($model['thumbnail'] ?? '')
        : ($model['thumbnail'] ? Storage::disk('public')->url($model['thumbnail']) : null);

    $title   = $model['title'] ?? 'Untitled';
    $desc    = StringUtil::removeScriptTags($model['short_description'] ?? $model['description'] ?? '');
    $price   = CurrencyUtil::toVnd($model['price'] ?? 0);
    $rating  = (float)($model['rating'] ?? 0);
    $buyQty  = (int)($model['buy_quantity'] ?? 0);

    $stars = [];
    for ($i = 1; $i <= 5; $i++) {
        if ($rating >= $i) $stars[] = 'full';
        elseif ($rating >= $i - 0.5) $stars[] = 'half';
        else $stars[] = 'empty';
    }
    $badgeColor = '#f39c12';
@endphp

<a href="{{ route('books.detail', ['slug' => $model['slug']]) }}" class="bookcard">
    <figure class="bookcard__media">
        @if($thumb)
            <img loading="lazy" decoding="async" src="{{ $thumb }}" alt="{{ $title }}" class="bookcard__img">
        @else
            <div class="bookcard__placeholder">No image</div>
        @endif

        @if(isset($model['category']))
            <span class="bookcard__badge" style="background-color: {{ $badgeColor }}">
                {{ $model['category']['name'] }}
            </span>
        @endif

        <div class="bookcard__overlay"></div>
    </figure>

    <div class="bookcard__body">
        <h3 class="bookcard__title">{{ $title }}</h3>

        <div class="bookcard__meta">
            <div class="bookcard__rating" aria-label="Rating {{ number_format($rating,1) }} / 5">
                @foreach($stars as $s)
                    @if($s === 'full')
                        <i class="icon ic-star"></i>
                    @elseif($s === 'half')
                        <i class="icon ic-star-half"></i>
                    @else
                        <i class="icon ic-star-outline"></i>
                    @endif
                @endforeach
                <span class="bookcard__rating-num">{{ number_format($rating,1) }}</span>
            </div>

            <div class="bookcard__sold">
                <i class="icon ic-shopping-cart"></i>
                <span>{{ number_format($buyQty) }}</span>
            </div>
        </div>

        <p class="bookcard__desc">{{ $desc }}</p>

        <div class="bookcard__footer">
            <span class="bookcard__price">{{ $price }}</span>
            <span class="bookcard__cta">Xem chi tiết</span>
        </div>
    </div>
</a>
