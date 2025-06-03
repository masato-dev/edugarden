@extends('layout.clients.main')

@section('content')
    <div id="bookPage">
        <div class="container py-5">

        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb k-breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sách</li>
            </ol>
        </nav>

            <h2 class="text-color fw-600">Sách</h2>

            <div class="mt-3">
                <x-common.pagination 
                    :perPage="8"
                    :url="route('ajax.books.index')"
                    :method="'GET'"
                    :component="'components.book.card.book-card'"
                    :recordType="json_encode(App\Models\Book::class)"
                    rowWrappers="row row-cols-1 row-cols-md-3 row-cols-lg-4"/>
            </div>

        </div>
    </div>
@endsection