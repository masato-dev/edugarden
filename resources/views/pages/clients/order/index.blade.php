@php
    use App\Utils\CurrencyUtil;
@endphp

@extends('layout.clients.main')

@section('content')
    @component('components.address.address-modal')@endcomponent
    <section id="orderSection">
        <div class="container py-5">
            <h2 class="text-color fw-600">Thanh toán</h2>
    
            <div class="mt-3 d-flex align-items-center text-main">
                <i class="icon ic-arrow-left"></i>
                <a href="{{ route('carts.index') }}" class="text-main text-decoration-none ">Quay lại giỏ hàng</a>
            </div>

            <div class="row mt-3">
                <div class="col-md-8 col-12">    
                    <div class="p-3 border rounded-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="text-color fw-600">Địa chỉ giao hàng</h3>
                            <button class="gap-2 d-flex align-items-center k-btn btn-main" type="button" id="addShippingAddressBtn">
                                <i class="icon ic-location-add"></i>
                                <span>Thêm địa chỉ giao hàng</span>
                            </button>
                        </div>
                    </div>
    
                    <div class="p-3 border rounded-3 mt-5">
                        <h3 class="text-color fw-600">Sản phẩm</h3>
                        @if (!empty($orderItems))
                            <ul class="list-unstyled">
                                @foreach ($orderItems as $item)
                                    <li class="py-3" style="border-bottom: dashed 1px #ccc">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center gap-2">
                                                <img class="border rounded-3" src="{{ $item['book']->thumbnail }}" alt="{{ $item['book']->title }}" width="60" height="60">
                                                <div>
                                                    <p class="fw-600 text-color m-0">{{ $item['book']->title }}</p>
                                                    <p class="mt-1 m-0 text-secondary">Số lượng: {{ $item['quantity'] }}</>
                                                </div>
                                            </div>
                                            <span class="text-danger fw-600">{{ CurrencyUtil::toVnd($item['price']) }}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
    
                    <div class="p-3 border rounded-3 mt-5">
                        <h3 class="text-color fw-600">Ghi chú</h3>
                        <textarea name="special_request" id="specialRequest" class="form-control mt-3 p-3" rows="4" placeholder="{{ __('Ghi chú về đơn hàng, ví dụ: gói đơn hàng thành hai đơn riêng') }}"></textarea>
                    </div>
                </div>
    
                <div class="col-md-4 col-12">
                    <div class="p-3 border rounded-3">
                        <h3 class="text-color fw-600">Tổng đơn hàng</h3>

                        <div class="d-flex align-items-center justify-content-between mt-3">
                            <div class="text-secondary">Tạm tính:</div>
                            <div class="text-color fw-600">{{ CurrencyUtil::toVnd($total) }}</div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mt-3">
                            <div class="text-secondary">Phí vận chuyển:</div>
                            <div class="text-color fw-600">{{ CurrencyUtil::toVnd($shippingPrice ?? 0) }}</div>
                        </div>

                        <hr>

                        <div class="d-flex align-items-center justify-content-between mt-3">
                            <div class="text-secondary">Tổng cộng:</div>
                            <div class="text-danger fs-4 fw-600">{{ CurrencyUtil::toVnd($total + ($shippingPrice ?? 0)) }}</div>
                        </div>

                        <button class="k-btn btn-main w-100 mt-3" id="completePaymentBtn">Hoàn thành thanh toán</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    @vite(['resources/js/pages/order.js'])
@endpush