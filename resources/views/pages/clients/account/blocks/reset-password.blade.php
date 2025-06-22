<div class="tab-pane fade p-3 rounded border border-1" id="change-password" role="tabpanel">
    <h4>Đổi mật khẩu</h4>
    <form method="POST" action="{{ route('auth.client.reset-password') }}" id="resetPasswordForm">
        @csrf

        <div class="mb-3">
            <label for="old_password" class="form-label">Mật khẩu hiện tại</label>
            <input type="password" class="form-control" id="oldPassword" name="old_password">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu mới</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Xác nhận mật khẩu mới</label>
            <input type="password" class="form-control" id="passwordConfirmation" name="password_confirmation">
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="k-btn btn-main d-inline-block">Đổi mật khẩu</button>
        </div>
    </form>
</div>