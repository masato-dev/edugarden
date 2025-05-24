<div class="tab-pane fade p-3 rounded border border-1" id="change-password" role="tabpanel">
    <h4>Đổi mật khẩu</h4>
    <form method="POST" action="{{ route('account.change-password') }}">
        @csrf

        <div class="mb-3">
            <label for="current_password" class="form-label">Mật khẩu hiện tại</label>
            <input type="password" class="form-control" id="current_password" name="current_password" required>
        </div>

        <div class="mb-3">
            <label for="new_password" class="form-label">Mật khẩu mới</label>
            <input type="password" class="form-control" id="new_password" name="new_password" required>
        </div>

        <div class="mb-3">
            <label for="new_password_confirmation" class="form-label">Xác nhận mật khẩu mới</label>
            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="k-btn btn-main d-inline-block">Đổi mật khẩu</button>
        </div>
    </form>
</div>