@extends('layout.clients.main')

@component('components.common.notification.alert')@endcomponent

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold" style="color: #EBA452;">Liên hệ với chúng tôi</h2>
                <p class="text-muted">Gửi tin nhắn nếu bạn có bất kỳ câu hỏi hoặc yêu cầu nào!</p>
            </div>
            <div class="row g-4 align-items-stretch">
                <!-- Contact Info -->
                <div class="col-md-5">
                    <div class="bg-white shadow-lg rounded-4 p-4 h-100">
                        <h5 class="mb-4" style="color: #EBA452;">Thông tin liên hệ</h5>
                        <ul class="list-unstyled">
                            <li class="mb-3 d-flex align-items-center">
                                <i class="bi bi-geo-alt-fill fs-4 me-3" style="color: #EBA452;"></i>
                                <span>123 Đường ABC, Quận 1, TP. HCM</span>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class="bi bi-telephone-fill fs-4 me-3" style="color: #EBA452;"></i>
                                <span>(028) 1234 5678</span>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class="bi bi-envelope-fill fs-4 me-3" style="color: #EBA452;"></i>
                                <span>contact@example.com</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-md-7">
                    <div class="bg-white shadow-lg rounded-4 p-4">
                        <form action="{{ route('contact.send') }}" method="POST" id="contactForm">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="name" class="form-label">Họ tên <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Nhập họ tên">
                                </div>
                                <div class="col-md-4">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email">
                                </div>
                                <div class="col-md-4">
                                    <label for="phone" class="form-label">SĐT</label>
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Nhập SĐT">
                                </div>
                                <div class="col-12">
                                    <label for="subject" class="form-label">Chủ đề <span class="text-danger">*</span></label>
                                    <input type="text" name="subject" id="subject" class="form-control" placeholder="Nhập chủ đề">
                                </div>
                                <div class="col-12">
                                    <label for="message" class="form-label">Nội dung <span class="text-danger">*</span></label>
                                    <textarea name="message" id="message" rows="6" class="form-control" placeholder="Nhập nội dung"></textarea>
                                </div>
                            </div>
                            <div class="text-end mt-4">
                                <button type="submit" class="btn px-4 py-2 rounded-pill text-white" style="background-color: #EBA452;">
                                    <i class="bi bi-send me-1"></i> Gửi liên hệ
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    @vite(['resources/js/pages/contact.js'])
@endpush