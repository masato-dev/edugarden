@php
    use App\Enums\ModuleTypes;
    use App\Utils\StringUtil;
@endphp

@extends('layout.clients.main')

@push('styles')
    @vite('resources/css/modules/pages/clients/home.scss')
@endpush

@component('components.common.notification.alert')@endcomponent

@section('content')
    @if (!empty($sections))
        @foreach ($sections as $section)
            @if($section['type'] == ModuleTypes::BOOK)
                @php $books = $section['data']; @endphp
                <div class="container py-3">
                    @component('components.book.listing.book-listing')
                    @slot('title', $section['title'])
                        @slot('books', $books)
                    @endcomponent
                </div>
            @endif

            @if($section['type'] == ModuleTypes::BLOG)
                @php $blogs = $section['data']; @endphp
                @if(isset($blogs) && count($blogs) >= 1)
                    <div class="container py-5">
                        <h2 class="fw-bold text-main mb-4">Cơ đốc giáo dục</h2>
                        <div class="row g-4">
                            <!-- Blog mới nhất nổi bật -->
                            <div class="col-12 mb-3">
                                <div class="card shadow-lg border-0 rounded-4 flex-md-row align-items-stretch h-100" style="background: #f5f7fa;">
                                    @if($blogs[0]->thumbnail ?? false)
                                        <div class="col-md-5 p-0">
                                            <img src="{{ Storage::url($blogs[0]->thumbnail) }}" alt="{{ $blogs[0]->title }}" class="img-fluid rounded-4 w-100 h-100 object-fit-cover" style="min-height:220px;">
                                        </div>
                                    @endif
                                    <div class="col-md-7 p-4 d-flex flex-column justify-content-between">
                                        <div>
                                            <h3 class="fw-bold text-color mb-2">{{ $blogs[0]->title }}</h3>
                                            <p class="text-secondary mb-3">{{ StringUtil::removeScriptTags(\Illuminate\Support\Str::limit($blogs[0]->summary ?? $blogs[0]->content, 120)) }}</p>
                                        </div>
                                        <a href="{{ route('blogs.detail', ['slug' => $blogs[0]->slug]) }}" class="btn btn-main btn-sm align-self-start mt-2">Đọc tiếp</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Các blog còn lại -->
                            @foreach($blogs as $i => $blog)
                                @if($i > 0)
                                <div class="col-md-4 col-12">
                                    <div class="card h-100 border-0 shadow-sm rounded-3">
                                        @if($blog->thumbnail ?? false)
                                            <img src="{{ Storage::url($blog->thumbnail) }}" alt="{{ $blog->title }}" class="card-img-top rounded-top-3" style="height:160px; object-fit:cover;">
                                        @endif
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title fw-semibold">{{ $blog->title }}</h5>
                                            <p class="card-text text-secondary">{{ \Illuminate\Support\Str::limit($blog->summary ?? $blog->content, 80) }}</p>
                                            <a href="{{ route('blogs.detail', ['slug' => $blog->slug]) }}" class="btn btn-outline-main btn-sm mt-auto">Đọc tiếp</a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @endif

            @if ($section['type'] == ModuleTypes::SLIDER)
                @php $sliders = $section['data']; @endphp
                <div id="homeSlider">
                    <div id="homeSliderCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($sliders as $index => $slider)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    <div class="ratio ratio-21x9">
                                        <img src="{{ Storage::url($slider->url) }}" alt="Slider Image" class="d-block w-100">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        @if(count($sliders) > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#homeSliderCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#homeSliderCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        @endif
                    </div>
                </div>
            @endif

            @if ($section['type'] == ModuleTypes::PAGE)
                @php $page = $section['data']; @endphp
                @if ($page)
                    <div class="container py-5">
                        <div class="feature-page">
                            <div class="feature-page__media">
                                <img
                                    class="feature-page__img"
                                    src="{{ $page->image ? Storage::url($page->image) : 'https://via.placeholder.com/800x600?text=No+Image' }}"
                                    alt="{{ $section['title'] ?? $page->title }}">
                                {{-- <span class="feature-page__badge">Cơ đốc giáo dục</span> --}}
                            </div>

                            <div class="feature-page__body">
                                <h2 class="feature-page__title">
                                    {{ $section['title'] ?? $page->title }}
                                </h2>

                                <p class="feature-page__desc">
                                    {{ StringUtil::removeScriptTags($page->summary ?? $page->content) }}
                                </p>

                                <div class="feature-page__actions">
                                    <a href="{{ route('pages.detail', ['slug' => $page->slug]) }}" class="btn btn-main">
                                        Đọc tiếp
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif


            @if ($section['type'] == ModuleTypes::SUPPORT)
                <div class="container py-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card shadow-lg border-0 rounded-4 p-4 p-md-5 d-flex flex-md-row align-items-center" style="background: #f8fafc;">
                                <div class="col-md-4 text-center mb-4 mb-md-0">
                                    <img src="https://images.unsplash.com/photo-1516387938699-a93567ec168e?q=80&w=2671&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Customer Support" class="img-fluid rounded-3" style="max-height:180px; object-fit:cover;">
                                </div>
                                <div class="col-md-8 ps-md-5">
                                    <h4 class="text-main mb-2">Hỗ trợ khách hàng</h4>
                                    <h2 class="fw-bold text-color mb-3">Bạn cần tư vấn hoặc hỗ trợ?</h2>
                                    <p class="sub-text-color mb-4 fs-5">Nếu bạn không tìm thấy sản phẩm hoặc có thắc mắc, hãy liên hệ với chúng tôi để được tư vấn và hỗ trợ nhanh chóng nhất.</p>
                                    <a href="/contact" class="btn btn-main btn-lg px-4"><i class="bi bi-envelope-fill me-2"></i>Liên hệ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @endif
@endsection