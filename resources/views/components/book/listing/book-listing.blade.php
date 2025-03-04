<div>
    <div class="d-flex align-items-center justify-content-between">
        <h2 class="text-color fw-600">{{ $title }}</h2>
        <a href="#" class="text-decoration-none text-main fs-5">Xem thêm</a>
    </div>
    <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2 g-3 mt-3">
        @foreach ($books as $book)
            <div class="col">
                @component('components.book.card.book-card')
                    @slot('book', $book)
                @endcomponent
            </div>
        @endforeach
    </div>
</div>