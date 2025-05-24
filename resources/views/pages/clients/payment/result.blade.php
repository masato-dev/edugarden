@extends('layout.clients.main')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endpush

@section('content')
<div class="container py-5">
    <div class="row justify-content-center py-5">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body text-center py-5">

                    @if ($isSuccess)
                        <div class="mb-4">
                            <div class="text-success">
                                <i class="bi bi-check-circle-fill" style="font-size: 4rem;"></i>
                            </div>
                            <h2 class="mt-3">Thanh toán thành công!</h2>
                            <p class="text-muted">Cảm ơn bạn đã đặt hàng. Chúng tôi sẽ xử lý đơn hàng của bạn trong thời gian sớm nhất.</p>
                        </div>
                    @else
                        <div class="mb-4">
                            <div class="text-danger">
                                <i class="bi bi-x-circle-fill" style="font-size: 4rem;"></i>
                            </div>
                            <h2 class="mt-3">Thanh toán thất bại</h2>
                            <p class="text-muted">Đã xảy ra lỗi trong quá trình thanh toán. Vui lòng thử lại hoặc liên hệ hỗ trợ.</p>
                        </div>
                    @endif

                    <div class="d-flex justify-content-center mt-4 flex-wrap gap-3">
                        @if ($isSuccess)
                            <a href="{{ route('orders.detail', ['id' => $orderId]) }}" class="btn btn-success px-4 py-2 rounded-pill">
                                <i class="bi bi-receipt me-1"></i> Xem chi tiết đơn hàng
                            </a>
                        @endif
                        <a href="{{ route('home') }}" class="btn btn-outline-secondary px-4 py-2 rounded-pill">
                            <i class="bi bi-house-door me-1"></i> Quay lại trang chủ
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
