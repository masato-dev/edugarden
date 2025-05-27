@extends('layout.clients.main')

@section('content')
<div id="blogDetailPage" class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Thumbnail -->
                @if($blog->thumbnail)
                    <img src="{{ $blog->thumbnail }}" alt="{{ $blog->title }}" class="img-fluid rounded mb-4 w-100" style="max-height: 450px; object-fit: cover;">
                @endif

                <!-- Title -->
                <h1 class="mb-3">{{ $blog->title }}</h1>

                <!-- Description -->
                <p class="text-muted mb-4">
                    {{ $blog->description }}
                </p>

                <!-- Content -->
                <div class="blog-content">
                    {!! $blog->content !!}
                </div>

                <!-- Back Button -->
                <div class="mt-5">
                    <a href="{{ route('blogs.index') }}" class="btn btn-outline-secondary">
                        &larr; Back to Blog List
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection