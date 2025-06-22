<div id="addressModal" class="k-modal">
    <div class="k-modal-content">
        <div class="k-modal-header">
            <h5 class="k-modal-title d-flex align-items-center gap-2">
                <i class="icon ic-location-add"></i>
                <span id="addressModalTitle">Thêm mới địa chỉ</span>
            </h5>
            <button type="button" class="k-modal-close" data-dismiss="modal" aria-label="Close">&times;</button>
        </div>

        <div class="k-modal-body">
            <form id="addressForm" action="">
                <div class="mb-3">
                    <label for="name" class="form-label">Họ tên</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nhập họ tên">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại">
                </div>
                
                <livewire:common.location-selector />
    
                <div class="mb-3">
                    <label for="address_detail" class="form-label">Địa chỉ chi tiết</label>
                    <input class="form-control" id="address_detail" name="address_detail" rows="2" placeholder="Số nhà, tên đường..." />
                </div>

                <div class="mb-3">
                    <input type="checkbox" name="is_default" id="isDefaultCheckbox" width="16" height="16">
                    <label for="is_default" class="form-label">Đặt làm địa chỉ mặc định</label>
                </div>
                <div class="text-end justify-content-end d-flex">
                    <button type="submit" class="k-btn btn-main">Lưu địa chỉ</button>
                </div>
            </form>
        </div>

    </div>
</div>