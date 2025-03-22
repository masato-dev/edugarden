<div id="registerModal" class="k-modal">
<div class="k-modal-content">
        <div class="k-modal-header">
            <div></div>
            <h5 class="k-modal-title">
                <i class="icon ic-register"></i>
                <span>Đăng ký</span>
            </h5>
            <button type="button" class="k-modal-close" data-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <div class="k-modal-body">
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    @component('components.common.form.k-input')
                        @slot('id', 'registerModalFullNameInput')
                        @slot('placeholder', 'Họ và tên')
                        @slot('type', 'text')
                        @slot('icon', 'ic-student-card')
                    @endcomponent
                </div>
                <div class="mb-3">
                    @component('components.common.form.k-input')
                        @slot('id', 'registerModalEmailInput')
                        @slot('placeholder', 'Email')
                        @slot('type', 'email')
                        @slot('icon', 'ic-mail')
                    @endcomponent
                </div>
                <div class="mb-3">
                    @component('components.common.form.k-input')
                        @slot('id', 'registerModalPasswordInput')
                        @slot('placeholder', 'Mật khẩu')
                        @slot('type', 'password')
                        @slot('icon', 'ic-lock-password')
                    @endcomponent
                </div>

                <div class="mb-3">
                    @component('components.common.form.k-input')
                        @slot('id', 'registerModalPasswordConfirmInput')
                        @slot('placeholder', 'Xác nhận mật khẩu')
                        @slot('type', 'password')
                        @slot('icon', 'ic-lock-password')
                    @endcomponent
                </div>

                <div class="mb-3 py-3" style="border-bottom: dashed 1px #ccc;">
                    <button type="submit" class="k-btn btn-main w-100">Đăng ký</button>
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