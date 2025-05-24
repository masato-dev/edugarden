<div class="tab-pane fade show active p-3 rounded border border-1" id="basic-info" role="tabpanel">
    
    <h4>Thông tin cá nhân</h4>
    <form method="POST" action="{{ route('account.update') }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Họ tên</label>
            <input type="text" placeholder="Nhập Họ Tên" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" placeholder="Nhập Email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" placeholder="Nhập số điện thoại" class="form-control" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
        </div>

        <div class="mb-3">
            <label for="church" class="form-label">Hội thánh</label>
            <x-common.autocomplete-input
                queryTable="churchs"
                queryColumn="name"
                value="{{ $user->church->id ?? null }}"
                displayValue="{{ $user->church->name ?? null }}"
                name="church_id"
                id="church"/>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="k-btn btn-main d-inline-block">Cập nhật</button>
        </div>
    </form>
</div>