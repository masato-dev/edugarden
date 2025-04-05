@extends('layout.clients.main')

@section('content')
    <div class="container">
        @if (count($books) > 0)
            <h2 class="text-color fw-600">Kết quả tìm kiếm</h2>
            <p>Tìm thấy <span class="fw-600">{{ count($books) }}</span> sản phẩm 
                @if (!empty($keyword))
                    với từ khoá <span class="fw-600">"{{ $keyword }}"</span> 
                @endif
            </p>

            @component('components.book.listing.book-listing')
                @slot('books', $books)
            @endcomponent
        @else
            <div class="d-flex align-items-center justify-content-center flex-column">
                <img src="{{ asset('images/backgrounds/no_item_found.svg') }}" alt="No item found" width="600" style="aspect-ratio: 21/9;">
                <p class="mt-3">Không tìm thấy sử dụng tìm kiếm với <span class="fw-600">"{{ $keyword }}"</span></p>
            </div>
        @endif

    </div>

@endsection