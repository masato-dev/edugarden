@extends('layout.clients.main')

@push('styles')
    @vite('resources/css/modules/pages/clients/home.scss')
@endpush

@section('content')
    <div id="homeSlider">
        <img src="https://img.freepik.com/premium-vector/back-school-discount-banner-template-learning-knowledge-education-flyer-poster-with-textbooks-books-stationery_555489-1653.jpg" alt="Slider Image" class="w-100 home-slider-img">
    </div>

    <div class="container py-3">
        @component('components.book.listing.book-listing')
        @slot('title', 'Ưu đãi hấp dẫn')
            @slot('books', $books)
        @endcomponent
    </div>

    <div id="homeWidget" class="mt-5">
        <div class="container">
            <div class="row align-items-baseline">
                <div class="col">
                    @component('components.common.widget-item')
                        @slot('icon', 'icon ic-delivery-box')
                        @slot('title', 'Danh mục sản phẩm')
                        @slot('description', 'Hàng hoá đa dạng với hơn 5000 sản phẩm')
                    @endcomponent
                </div>

                <div class="col">
                    @component('components.common.widget-item')
                        @slot('icon', 'icon ic-container-truck')
                        @slot('title', 'Chính sách vận chuyển')
                        @slot('description', 'Giao hàng nhanh chóng, tiết kiệm, miễn phí vận chuyển')
                    @endcomponent
                </div>

                <div class="col">
                    @component('components.common.widget-item')
                        @slot('icon', 'icon ic-credit-card-validation')
                        @slot('title', 'Phương thức thanh toán')
                        @slot('description', 'Tiện lợi, an toàn, đa dạng phương thức thanh toán')
                    @endcomponent
                </div>

                <div class="col">
                    @component('components.common.widget-item')
                        @slot('icon', 'icon ic-call')
                        @slot('title', 'Liên hệ đặt hàng')
                        @slot('description', 'Hotline/Zalo: 1800 1090')
                    @endcomponent
                </div>
            </div>
        </div>
    </div>

    <div class="container py-3">
        @component('components.book.listing.book-listing')
        @slot('title', 'Lời chúa hôm nay')
            @slot('books', $books)
        @endcomponent
    </div>

    <div id="homeSupport">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-6">
                    <div id="homeSupportContent">
                        <h4 class="text-main">Hỗ trợ khách hàng</h4>
                        <h2 class="mt-3 mb-0 text-color fw-600">
                            Khách cần hỗ trợ về thông tin sản phẩm
                        </h2>
    
                        <p class="sub-text-color mt-3 mb-0">
                            Trong trường hợp không tìm thấy được sản phẩm, loại thuốc như mong muốn, quý khách vui lòng nhập thông tin yêu cầu vào khung bên cạnh. Chúng tôi sẽ liên hệ hỗ trợ mua thuốc và báo giá lại sớm nhất có thể cho quý khách.
                        </p>
                    </div>
                </div>

                <div class="col-6">
                    <div id="homeSupportFormWrapper">
                        <form action="" id="homeSupportForm">
                            <div class="form-group">
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Nhập nội dung..."></textarea>
                            </div>

                            <button type="submit" class="k-btn btn-main mt-3 mx-auto">Gửi thông tin</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection