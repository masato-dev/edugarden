<div>
    <div class="mb-3">
        <label class="form-label">Tỉnh/Thành Phố</label>

        <x-common.autocomplete-input 
            id="addressModalCityInput"
            name="city_id"
            placeholder="Chọn Tỉnh/Thành Phố"
            wire:model="wCityId"
            value="{{ $wCityId }}"
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
            queryTable="districts"
            wire:model="wDistrictId"
            value="{{ $wDistrictId }}"
            :criteria="['city_id' => $wCityId ]" />

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
            queryTable="wards"
            wire:model="wWardId"
            value="{{ $wWardId }}"
            :criteria="['district_id' => $wDistrictId ]" />

        <div class="d-none" id="wardSelectError">
            <span class="text-danger">Vui lòng chọn Phường/Xã</span>
        </div>
    </div>
</div>
