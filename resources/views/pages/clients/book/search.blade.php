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
        @endif

        @component('components.book.listing.book-listing')
            @slot('books', $books)
        @endcomponent
    </div>

@endsection