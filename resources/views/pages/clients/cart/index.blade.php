@php
    use App\Utils\CurrencyUtil;
@endphp

@extends('layout.clients.main')

@section('content')
    <section id="cartPage">
        <div class="container" class="py-5">
            @if ($cartAmount > 0)
                <h2 class="text-color fw-600">Giỏ hàng</h2>
                <div class="mt-3 d-flex align-items-center text-main">
                    <i class="icon ic-arrow-left"></i>
                    <a href="/" class="text-main text-decoration-none ">Quay lại mua sắm</a>
                </div>

                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="mt-5">
                            <h4 class="fs-4 py-3" style="background-color: #F9FAFB;">Sản phẩm trong giỏ hàng ({{ $cartAmount }})</h4>
                            <ul class="list-unstyled">
                                @foreach ($carts as $index => $cart)
                                    <li class="bg-white px-3 {{ $index > 0 ? 'py-3' : 'pb-3'}}" style="border-bottom: solid 1px #ccc;">
                                        <x-cart.cart-list-item :cart="$cart" />
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="mt-5">
                            <h4 class="fs-4 p-3" style="background-color: #F9FAFB;">Tổng đơn hàng</h4>

                            <div class="px-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-500 text-color">Tạm tính:</span>
                                    <span class="fw-500 text-color">{{ CurrencyUtil::toVnd($cartTotal) }}</span>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <span class="fw-500 text-color">Phí vận chuyển:</span>
                                    <span class="fw-500 text-color">{{ CurrencyUtil::toVnd(0) }}</span>
                                </div>

                                <hr>

                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-600 text-color">Tổng cộng:</span>
                                    <span class="fw-600 text-danger fs-4">{{ CurrencyUtil::toVnd($cartTotal) }}</span>
                                </div>

                                <div class="mt-4">
                                    <button class="k-btn btn-main w-100">Tiến hành thanh toán</button>
                                </div>

                                <div class="mt-3">
                                    <p class="text-center text-secondary">Chúng tôi chấp nhận các phương thức thanh toán sau</p>

                                    <div class="d-flex justify-content-center gap-3 mt-3">
                                        <div class="d-flex align-items-center gap-2 w-100 ps-3" style="border-radius: 10px; border: solid 1px #ccc; padding: 8px;">
                                            <input type="radio" name="payment-method" value="cod" class="d-none">
                                            <i class="icon ic-cash fs-3 text-color"></i>
                                            <div class="ms-2">
                                                <h6 class="text-color fw-600 m-0">COD</h6>
                                                <span>Thanh toán khi nhận hàng</spa>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center gap-3 mt-3">
                                        <div class="d-flex align-items-center gap-2 w-100 ps-3" style="border-radius: 10px; border: solid 1px #ccc; padding: 8px;">
                                            <input type="radio" name="payment-method" value="cod" class="d-none">
                                            <img src="{{ asset('images/icons/ic_vietqr.png') }}" alt="Icon VietQR" width="40" height="40">
                                            <div class="ms-2">
                                                <h6 class="text-color fw-600 m-0">Chuyển khoản</h6>
                                                <span>Thanh toán thông qua hệ thống VietQR</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            @else
                <div class="mt-5 d-flex align-items-center flex-column">
                    <img src="{{ asset('images/backgrounds/cart_empty.svg') }}" alt="" width="300" height="300">
                    <h4 class="fs-4 py-3 text-color">Không có sản phẩm nào trong giỏ hàng</h4>
                    <p class="text-secondary">Khám phá thêm các sản phẩm để thêm vào giỏ hàng <a class="text-main" href="/">tại đây</a></p>
                </div>
            @endif
        </div>
    </section>
@endsection

@push('scripts')
    @vite(['resources/js/pages/cart-listing.js'])
@endpush