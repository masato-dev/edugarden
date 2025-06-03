@extends('layout.clients.main')

@section('content')
    <div id="blogPage">
        <div class="container py-5">

        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb k-breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cơ đốc giáo dục</li>
            </ol>
        </nav>

            <h2 class="text-color fw-600">Cơ đốc giáo dục</h2>

            <div class="mt-3">
                <x-common.pagination 
                    :perPage="8"
                    :url="route('ajax.blogs.index')"
                    :method="'GET'"
                    :component="'components.blog.blog-card-item'"
                    :recordType="json_encode(App\Models\Blog::class)"
                    rowWrappers="row row-cols-1 row-cols-md-3 row-cols-lg-4"/>
            </div>

        </div>
    </div>
@endsection