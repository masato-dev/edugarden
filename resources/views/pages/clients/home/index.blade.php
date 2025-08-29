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
                @if(isset($blogs))
                    <div class="container py-5 blog-section">
                        <h2 class="fw-bold text-main mb-4">Cơ đốc giáo dục</h2>

                        <div class="row row-cols-md-4 row-cols-2 g-4">
                            {{-- Các blog còn lại --}}
                            @foreach($blogs as $i => $blog)
                                <div class="">
                                    <div class="blog-section__card">
                                        @if(($blog->thumbnail ?? false))
                                            <img class="blog-section__card-img" src="{{ Storage::url($blog->thumbnail) }}" alt="{{ $blog->title }}"
                                                loading="lazy" decoding="async" width="480" height="320">
                                        @endif

                                        <div class="blog-section__card-body">
                                            <h5 class="blog-section__card-title">{{ $blog->title }}</h5>
                                            <p class="blog-section__card-desc">
                                                {{ \Illuminate\Support\Str::limit(StringUtil::removeScriptTags($blog->summary ?? $blog->content), 80) }}
                                            </p>
                                            <a href="{{ route('blogs.detail', ['slug' => $blog->slug]) }}"
                                                class="btn btn-outline-main btn-sm blog-section__card-cta">
                                                Đọc tiếp
                                            </a>
                                        </div>
                                    </div>
                                </div>
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
                @if ($page != null)
                    <div class="container py-5">
                        <div class="row align-items-center">
                            <div class="col-md-4 mb-4 mb-md-0">
                                <img src="{{ $page->image ? Storage::url($page->image) : 'https://via.placeholder.com/400x300?text=No+Image' }}"
                                    alt="About EduGarden" class="img-fluid rounded shadow" width="100%" style="aspect-ratio: 4/3;">
                            </div>
                            <div class="col-md-8">
                                <h2 class="fw-bold text-main mb-3">{{ $section['title'] ?? $page->title }}</h2>
                                <p class="fs-5" style="
                                                                            -webkit-line-clamp: 3;
                                                                            -webkit-box-orient: vertical;
                                                                            overflow: hidden;
                                                                            text-overflow: ellipsis;
                                                                            display: -webkit-box;
                                                                        ">
                                    {{ StringUtil::removeScriptTags($page->summary ?? $page->content) }}</p>
                                <!--  Ưu tiên hiển thị nội dung ngắn, nếu không tồn tại thì render content, maximum 3 dòng -->
                                <a href="{{ route('pages.detail', ['slug' => $page->slug]) }}" class="btn btn-main mt-3">Đọc thêm</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endif

            @if ($section['type'] == ModuleTypes::SUPPORT)
                <div class="container py-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card shadow-lg border-0 rounded-4 p-4 p-md-5 d-flex flex-md-row align-items-center"
                                style="background: #f8fafc;">
                                <div class="col-md-4 text-center mb-4 mb-md-0">
                                    <img src="https://images.unsplash.com/photo-1516387938699-a93567ec168e?q=80&w=2671&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                        alt="Customer Support" class="img-fluid rounded-3" style="max-height:180px; object-fit:cover;">
                                </div>
                                <div class="col-md-8 ps-md-5">
                                    <h4 class="text-main mb-2">Hỗ trợ khách hàng</h4>
                                    <h2 class="fw-bold text-color mb-3">Bạn cần tư vấn hoặc hỗ trợ?</h2>
                                    <p class="sub-text-color mb-4 fs-5">Nếu bạn không tìm thấy sản phẩm hoặc có thắc mắc, hãy liên hệ
                                        với chúng tôi để được tư vấn và hỗ trợ nhanh chóng nhất.</p>
                                    <a href="/contact" class="btn btn-main btn-lg px-4"><i class="bi bi-envelope-fill me-2"></i>Liên
                                        hệ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @endif
@endsection