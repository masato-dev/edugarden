@extends('layout.clients.main')

@component('components.common.notification.alert')@endcomponent

@section('content')
    <section id="donatePage">
        <div class="container py-5">
            <h2 class="mb-4 text-center text-color">Dâng hiến</h2>

            <form id="donateForm" class="shadow p-4 rounded bg-white">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="name" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập họ và tên">
                    </div>
                    <div class="col-md-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Nhập email">
                    </div>
                    <div class="col-md-4">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="amount" class="form-label">Số tiền (VNĐ)</label>
                    <input type="number" class="form-control" id="amount" name="amount" min="1000" placeholder="Nhập số tiền (VNĐ)">
                </div>

                <div class="mb-3">
                    <label for="note" class="form-label">Lời nhắn / Ghi chú</label>
                    <textarea class="form-control" id="note" name="note" rows="6" placeholder="Nhập lời nhắn / ghi chú"></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="k-btn btn-main d-inline-block">Tạo mã QR chuyển khoản</button>
                </div>
            </form>

            <div class="mt-5" id="qrSection" style="display: none;">
                <h5 class="text-center text-success">Vui lòng quét mã QR bên dưới để chuyển khoản:</h5>
                <div id="qrImage" class="text-center mt-3"></div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    @vite(['resources/js/pages/donate.js'])
@endpush
