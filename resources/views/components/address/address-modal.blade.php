<div id="addressModal" class="k-modal">
    <div class="k-modal-content">
        <div class="k-modal-header">
            <div></div>
            <h5 class="k-modal-title">
                <i class="icon ic-login"></i>
                <span>Thêm mới địa chỉ</span>
            </h5>
            <button type="button" class="k-modal-close" data-dismiss="modal" aria-label="Close">&times;</button>
        </div>

        <div class="k-modal-body">
            <div class="mb-3">
                <label for="name" class="form-label">Họ tên</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập họ tên">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại">
            </div>
            <div class="mb-3">

                <label class="form-label">Tỉnh/Thành Phố</label>

                <x-common.autocomplete-input 
                    id="addressModalCityInput"
                    name="city_id"
                    placeholder="Chọn Tỉnh/Thành Phố"
                    queryTable="cities" />

                <div class="d-none" id="citySelectError">
                    <span class="text-danger">Vui lòng chọn Tỉnh/Thành Phố</span>
                </div>

            </div>
            <div class="mb-3">

                <label class="form-label">Quận/Huyện</label>
                <x-common.autocomplete-input 
                    id="addressModalDistrictInput"
                    name="district_id"
                    placeholder="Chọn Quận/Huyện"
                    queryTable="districts" />

                <div class="d-none" id="districtSelectError">
                    <span class="text-danger">Vui lòng chọn Quận/Huyện</span>
                </div>
            </div>

            <div class="mb-3">
            <label class="form-label">Phường/Xã</label>
                <x-common.autocomplete-input 
                    id="addressModalWardInput"
                    name="ward_id"
                    placeholder="Chọn Phường/Xã"
                    queryTable="wards" />

                <div class="d-none" id="wardSelectError">
                    <span class="text-danger">Vui lòng chọn Phường/Xã</span>
                </div>
            </div>

            <div class="mb-3">
                <label for="address_detail" class="form-label">Địa chỉ chi tiết</label>
                <textarea class="form-control" id="address_detail" name="address_detail" rows="2" placeholder="Số nhà, tên đường..."></textarea>
            </div>
            <div class="text-end justify-content-end d-flex">
                <button type="submit" class="k-btn btn-main">Lưu địa chỉ</button>
            </div>
        </div>

    </div>
</div>