<div id="forgotPasswordModal" class="k-modal">
    <div class="k-modal-content">
        <div class="k-modal-header">
            <div></div>
            <h5 class="k-modal-title">
                <i class="icon ic-register"></i>
                <span>Quên mật khẩu</span>
            </h5>
            <button type="button" class="k-modal-close" data-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <div class="k-modal-body">
            <form action="{{ route('verification.send') }}" method="POST" id="forgotPasswordForm">
                @csrf

                <div class="mb-3">
                    @component('components.common.form.k-input')
                        @slot('id', 'forgotPasswordModalEmailInput')
                        @slot('placeholder', 'Email')
                        @slot('type', 'email')
                        @slot('icon', 'ic-mail')
                        @slot('name', 'email')
                    @endcomponent
                </div>

                <div class="mb-3 py-3" style="border-bottom: dashed 1px #ccc;">
                    <button type="submit" class="k-btn btn-main w-100">Gửi email xác nhận</button>
                </div>

                <div class="d-flex justify-content-center">
                    <span class="text-center">
                        <a href="#" onclick="auth.showLoginModal()" class="text-main text-decoration-none fw-600">Đăng nhập tài khoản</a> nếu bạn đã có tài khoản
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>