@php
    use App\Utils\CurrencyUtil;
    use App\Enums\PaymentStatuses;
    use App\Enums\DeliveryStatuses;
    use App\Enums\PaymentMethods;
@endphp

@extends('layout.clients.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12">
            {{-- Header --}}
            <div class="mb-4">
                <h3 class="mt-3">Chi tiết đơn hàng</h3>
                <p class="text-muted">Mã đơn: <strong>#{{ $order->id }}</strong></p>
            </div>

            <div class="mb-4">
                <a href="javascript:window.history.back()" class="k-btn btn-main text-decoration-none d-inline-block rounded-pill mb-3 mb-md-0">
                    <i class="bi bi-arrow-left"></i> Quay lại
                </a>
            </div>

            {{-- Thông tin giao hàng + trạng thái --}}
            <div class="row mb-4 g-4">
                <div class="col-md-6">
                    <h5 class="fw-semibold">Địa chỉ giao hàng</h5>
                    <div class="bg-light rounded-3 p-3">
                        <p class="mb-1"><strong>{{ $order->userAddress->name }}</strong></p>
                        <p class="mb-1">{{ $order->userAddress->phone ?? 'N/A' }}</p>
                        <p class="mt-1">
                            {{ $order->userAddress->address_detail ?? 'N/A' }},
                            {{ $order->userAddress->ward_name ?? 'N/A' }},
                            {{ $order->userAddress->district_name ?? 'N/A' }},
                            {{ $order->userAddress->city_name ?? 'N/A' }}
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <h5 class="fw-semibold">Trạng thái đơn hàng</h5>
                    <div class="bg-light rounded-3 p-3">
                        <p class="mb-1"><strong>Thanh toán:</strong>
                            @if ($order->payment_status == PaymentStatuses::PAID)
                                <span class="badge bg-success">Đã thanh toán</span>
                            @else
                                <span class="badge bg-warning text-dark">Chưa thanh toán</span>
                            @endif
                        </p>
                        <p class="mb-1"><strong>Phương thức:</strong> {{ PaymentMethods::label($order->payment_method) }}</p>
                        <p class="mt-1"><strong>Trạng thái giao hàng:</strong> {{ DeliveryStatuses::label($order->delivery_status) }}</p>
                    </div>
                </div>
            </div>

            {{-- Danh sách sản phẩm --}}
            <h5 class="fw-semibold mb-3">Danh sách sản phẩm</h5>
            <div class="bg-light rounded-4 p-3">
                <ul class="list-group list-group-flush">
                    @foreach ($order->orderItems as $i => $item)
                        @php $book = $item->book; @endphp
                        <li class="list-group-item d-flex gap-3 align-items-start py-3">
                            {{-- Ảnh sản phẩm --}}
                            <div class="flex-shrink-0" style="width: 80px;">
                                <img src="{{ $book->thumbnail ?? 'https://via.placeholder.com/80x100?text=No+Image' }}"
                                     alt="{{ $book->title }}" class="img-fluid rounded">
                            </div>

                            {{-- Thông tin sản phẩm --}}
                            <div class="flex-grow-1">
                                <h6 class="mb-1">
                                    {{ $book->title ?? 'Sản phẩm không tồn tại' }}
                                </h6>
                                <div class="small text-muted mb-1">
                                    @if (!empty($book->author)) <span>Tác giả: {{ $book->author }}</span> @endif
                                    @if (!empty($book->category)) <span class="ms-3">Thể loại: {{ $book->category }}</span> @endif
                                </div>
                                <div>
                                    <span class="text-muted">Đơn giá:</span> {{ CurrencyUtil::toVnd($item->price) }} <br>
                                    <span class="text-muted">Số lượng:</span> {{ $item->quantity }} <br>
                                    <span class="fw-semibold text-danger">Thành tiền: {{ CurrencyUtil::toVnd($item->price * $item->quantity) }}</span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Ghi chú --}}
            @if ($order->special_request)
                <div class="mt-4">
                    <h5 class="fw-semibold">Ghi chú đơn hàng</h5>
                    <div class="bg-light rounded-3 p-3">
                        {{ $order->special_request }}
                    </div>
                </div>
            @endif

            {{-- Tổng kết + quay lại --}}
            <div class="text-end mt-3">
                
                <p class="mb-1">Tạm tính: <strong>{{ CurrencyUtil::toVnd($order->total) }}</strong></p>
                <p class="mb-1">Phí vận chuyển: <strong>{{ CurrencyUtil::toVnd($order->shipping_fee) }}</strong></p>
                <h5 class="text-danger mt-2">Tổng cộng: {{ CurrencyUtil::toVnd($order->total - $order->shipping_fee) }}</h5>
            </div>
        </div>
    </div>
</div>
@endsection
