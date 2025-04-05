<div id="loginModal" class="k-modal">
    <div class="k-modal-content">
        <div class="k-modal-header">
            <div></div>
            <h5 class="k-modal-title">
                <i class="icon ic-login"></i>
                <span>Đăng nhập</span>
            </h5>
            <button type="button" class="k-modal-close" data-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <div class="k-modal-body">
            <form id="loginForm" action="{{ route('auth.client.login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    @component('components.common.form.k-input')
                        @slot('id', 'loginModalEmailInput')
                        @slot('placeholder', 'Email')
                        @slot('type', 'email')
                        @slot('icon', 'ic-mail')
                        @slot('name', 'email')
                    @endcomponent
                </div>
                <div class="mb-3">
                    @component('components.common.form.k-input')
                        @slot('id', 'loginModalPasswordInput')
                        @slot('placeholder', 'Mật khẩu')
                        @slot('type', 'password')
                        @slot('icon', 'ic-lock-password')
                        @slot('name', 'password')
                    @endcomponent
                </div>

                <div class="mb-3">
                    <div class="d-flex align-items-center gap-2">
                        <input type="checkbox" name="remember" id="remember" width="16" height="16">
                        <label for="remember" class="text-color">Nhớ lần đăng nhập sau</label>
                    </div>
                </div>

                <div class="mb-3 py-3" style="border-bottom: dashed 1px #ccc;">
                    <button type="submit" class="k-btn btn-main w-100" id="loginBtn">Đăng nhập</button>
                </div>

                <div class="d-flex justify-content-center">
                    <span class="text-center">
                        <a href="#" onclick="auth.showRegisterModal()" class="text-main text-decoration-none fw-600">Đăng ký thành viên</a> để nhận nhiều ưu đãi tốt nhất
                    </span>
                </div>

            </form>
        </div>
    </div>
</div>

