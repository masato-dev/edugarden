@php
    use App\Utils\CurrencyUtil;
@endphp

@extends('layout.clients.main')
@component('components.common.notification.alert')

@endcomponent

@section('content')
    <section id="bookDetailSection" class="py-5">
        <input type="hidden" name="book" value="{{ json_encode($book) }}">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-12">
                    <div class="book-detail-thumbnail p-3 mb-3">
                        <img src={{ $book->thumbnail }} alt="{{ $book->title }}" class="w-100" style="aspect-ratio: 1">
                    </div>
                </div>
                <div class="col-md-7 col-12">
                    <div class="book-detail-info">
                        <h2 class="fw-600 text-color">{{ $book->title }}</h2>
                        <div class="mt-3"><p class="fs-4 fw-400 m-0">Cựu ước</p></div>
                        <div class="d-flex gap-2 align-items-center mt-3">
                            @php
                                $rating = $book->rating;
                                $rating = round($rating);
                                for ($i = 0; $i < $rating; $i++) {
                                    echo '<i class="icon ic-star-solid text-main"></i>';
                                }
                                for ($i = 0; $i < 5 - $rating; $i++) {
                                    echo '<i class="icon ic-star"></i>';
                                }
                            @endphp

                            <div class="d-flex align-items-center gap-5">
                                <span class="fs-4">(Đánh giá)</span>
                                <span class="fs-4">|</span>
                                <span class="fs-4">Đã bán: {{ $book->buy_quantity }}</span>
                            </div>

                            
                        </div>

                        <div class="mt-3">
                            <span class="text-danger fs-3 fw-600">{{ CurrencyUtil::toVnd($book->price) }}</span>
                        </div>

                        <hr>
                        <div class="mt-5">
                            <h4>Mô tả ngắn:</h4>
                            <p class="fs-4 fw-400 m-0">{{ $book->description }}</p>
                        </div>
                        
                        <div class="mt-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="d-flex book-detail-quantity">
                                    <button class="book-detail-decrease-btn">-</button>
                                    <input type="text" class="book-detail-quantity-input" value="1">
                                    <button class="book-detail-increase-btn">+</button>
                                </div>

                                <button class="k-btn btn-main book-detail-add-to-cart-btn gap-2" title="Thêm vào giỏ hàng">
                                    <i class="icon ic-shopping-cart-add"></i>
                                    <span>Thêm vào giỏ hàng</span>
                                </button>

                                <button class="book-detail-add-to-wishlist-btn" id="addToWishlistBtn" title="Thêm vào danh sách yêu thích">
                                    <i class="icon ic-heart"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mt-3">
                            <div style="background-color: #F9FAFB;" class="py-2">
                                <ul class="list-unstyled ps-3">
                                    <li class="py-1 d-flex align-items-center gap-2">
                                        <div class="p-1 bg-main-outline rounded-circle">
                                            <i class="icon ic-tick text-main"></i>
                                        </div>
                                        <span>Sách đảm bảo chất lượng</span>
                                    </li>
                                    <li class="py-1 d-flex align-items-center gap-2">
                                        <div class="p-1 bg-main-outline rounded-circle">
                                            <i class="icon ic-tick text-main"></i>
                                        </div>
                                        <span>Giao hàng nhanh chóng</span>
                                    </li>
                                    <li class="pt-1 d-flex align-items-center gap-2">
                                        <div class="p-1 bg-main-outline rounded-circle">
                                            <i class="icon ic-tick text-main"></i>
                                        </div>
                                        <span>Đổi trả miễn phí nếu sản phẩm lỗi</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="mt-3">
                <ul class="nav nav-tabs mb-3 book-detail-nav" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Mô tả chi tiết</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Thông tin chi tiết</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Đánh giá</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        {!! $book->description !!}
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <table class="table table-responsive vertical-table">
                            <tbody>
                                <tr>
                                    <th>Tác giả</th>
                                    <td>{{ $book->author ?? 'Đang cập nhật' }}</td>
                                </tr>
                                <tr>
                                    <th>Nhà xuất bản</th>
                                    <td>{{ $book->publisher ?? 'Đang cập nhật' }}</td>
                                </tr>
                                <tr>
                                    <th>Năm xuất bản</th>
                                    <td>{{ $book->published_year ?? 'Đang cập nhật' }}</td>
                                </tr>
                                <tr>
                                    <th>Loại sách</th>
                                    <td>{{ $book->category ?? 'Cựu ước' }}</td>
                                </tr>
                                <tr>
                                    <th>Số lượng trang</th>
                                    <td>{{ $book->number_of_pages ?? 'Đang cập nhật' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="d-flex align-items-center gap-1">
                                        <i class="icon ic-star text-main"></i>
                                        <span class="text-main">{{ $book->rating }}</span>
                                    </div>
                                    <span class="fs-6">|</span>
                                    <span class="fs-6">({{ $book->total_rating }} đánh giá)</span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <ul class="list-unstyled">
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                @component('components.book.listing.book-listing')
                    @slot('title', 'Khám phá thêm một số loại sách khác')
                    @slot('books', $relatedBooks)
                @endcomponent
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    @vite(['resources/js/pages/book-detail.js'])
@endpush