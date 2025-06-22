@extends('layout.clients.main')

@component('components.common.notification.alert')@endcomponent

@section('content')
    <div id="verifyPage" class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow rounded-3">
                    <div class="card-body text-center p-4">
                        <h4 class="mb-3">Xác thực địa chỉ email</h4>
                        <p class="text-muted">
                            Chúng tôi đã gửi một email xác thực đến địa chỉ email của bạn.
                            Vui lòng kiểm tra hộp thư đến (hoặc thư rác) để hoàn tất xác minh.
                        </p>

                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <input type="hidden" name="email" value="{{ $user->email }}">

                            <button type="submit" class="btn btn-primary">
                                Gửi lại email xác thực
                            </button>
                        </form>

                        <p class="mt-3 mb-0 small text-muted">
                            Nếu bạn không nhận được email, hãy thử lại sau vài phút.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
