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
                        <section class="support-cta shadow-lg border-0 rounded-4 overflow-hidden">
                            <div class="row g-0 align-items-stretch">

                            {{-- Media / Illustration --}}
                            <div class="col-md-5">
                                <div class="support-cta__media position-relative h-100" style="background:#F4F1E7;">
                                <img
                                    src="https://images.unsplash.com/photo-1516387938699-a93567ec168e?q=80&w=1200&auto=format&fit=crop"
                                    alt="Customer Support"
                                    class="support-cta__img w-100 h-100"
                                    loading="lazy" decoding="async"
                                    style="object-fit:cover; min-height:220px;">
                                <span class="support-cta__badge position-absolute top-0 start-0 m-3 px-3 py-1 rounded-pill fw-semibold"
                                        style="background:#fff; color:#466D4B; box-shadow:0 8px 18px rgba(0,0,0,.08);">
                                    Trực 24/7
                                </span>
                                </div>
                            </div>

                            {{-- Content --}}
                            <div class="col-md-7">
                                <div class="support-cta__body h-100 d-flex flex-column p-4 p-md-5"
                                    style="background: linear-gradient(180deg,#FAFAF8 0%, #FFFFFF 60%), #F4F1E7;">
                                <div class="mb-2">
                                    <h4 class="m-0" style="color:#6BA368; font-weight:800;">Hỗ trợ khách hàng</h4>
                                    <h2 class="fw-bold text-color mt-2 mb-3">Bạn cần tư vấn hoặc hỗ trợ?</h2>
                                </div>

                                <p class="sub-text-color fs-5 mb-3">
                                    Không tìm thấy sản phẩm hoặc có thắc mắc? Liên hệ ngay để được đội ngũ EduGarden hỗ trợ nhanh chóng.
                                </p>

                                <ul class="list-unstyled d-grid gap-2 mb-4">
                                    <li class="d-flex align-items-start">
                                    <i class="bi bi-check-circle-fill me-2" style="color:#6BA368;"></i>
                                    <span>Phản hồi trung bình &lt; 15 phút</span>
                                    </li>
                                    <li class="d-flex align-items-start">
                                    <i class="bi bi-check-circle-fill me-2" style="color:#6BA368;"></i>
                                    <span>Tư vấn sản phẩm theo nhu cầu</span>
                                    </li>
                                    <li class="d-flex align-items-start">
                                    <i class="bi bi-check-circle-fill me-2" style="color:#6BA368;"></i>
                                    <span>Hỗ trợ đổi trả theo chính sách</span>
                                    </li>
                                </ul>

                                <div class="d-flex flex-wrap gap-2">
                                    <a href="/contact" class="btn btn-main btn-lg px-4">
                                    <i class="bi bi-envelope-fill me-2"></i>Liên hệ
                                    </a>
                                    <a href="tel:+84000000000" class="btn btn-outline-main btn-lg px-4">
                                    <i class="bi bi-telephone-fill me-2"></i>Gọi ngay
                                    </a>
                                </div>

                                <div class="mt-3 d-flex flex-wrap gap-2">
                                    <span class="badge rounded-pill px-3 py-2"
                                        style="background:#CFE3D6; color:#374B42;">Email: support@edugarden.vn</span>
                                    <span class="badge rounded-pill px-3 py-2"
                                        style="background:#CFE3D6; color:#374B42;">Zalo / Messenger</span>
                                </div>
                                </div>
                            </div>

                            </div>
                        </section>
                        </div>
                    </div>
                </div>
            @endif

        @endforeach
    @endif
@endsection