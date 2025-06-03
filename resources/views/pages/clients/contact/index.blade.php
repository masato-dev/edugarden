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
                                <span>45A/14 Nguyễn Văn Thiệt, Phường 3, Tp Vĩnh Long</span>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class="bi bi-telephone-fill fs-4 me-3" style="color: #EBA452;"></i>
                                <span>0386 353 083</span>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class="bi bi-envelope-fill fs-4 me-3" style="color: #EBA452;"></i>
                                <span>edugarden.24@gmail.com</span>
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

                                <div class="col-12">
                                    </div>
                                </div>
                                <div class="text-end">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_SITE_KEY')  }}" data-action="SEND_CONTACT"></div>
                                        <button type="submit" class="btn px-4 py-2 rounded-pill text-white" style="background-color: #EBA452;">
                                            <i class="bi bi-send me-1"></i> Gửi liên hệ
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://www.google.com/recaptcha/enterprise.js" async defer></script>
    @vite(['resources/js/pages/contact.js'])
@endpush