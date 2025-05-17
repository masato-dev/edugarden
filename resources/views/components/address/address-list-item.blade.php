<div id="addressListItem{{ $address->id }}" data-address-id="{{ $address->id }}" class="k-address-list-item"
    style="cursor: pointer;">
    <input type="hidden" name="user_address_id" value="{{ $address->id }}">
    <div class="p-3 border rounded-3">
        <div class="d-md-flex d-block justify-content-between">
            <div class="info">
                @if ($address->is_default == 1)
                    <div class="d-flex gap-2 align-items-center">
                        <div class="text-color fw-600">{{ $address->name }}</div>
                        <div class="bg-main-outline px-2 py-1 rounded-1">
                            <span class="text-main">Mặc định</span>
                        </div>
                    </div>
                @else
                    <div class="text-color fw-600">{{ $address->name }}</div>
                @endif
                <div class="mt-2 text-secondary">{{ $address->phone }}</div>
                <div class="mt-2 text-secondary">{{ $address->address_detail }}, {{ $address->ward_name }},
                    {{ $address->district_name }}, {{ $address->city_name }}</div>
            </div>

            <div class="action">
                <div class="d-flex gap-2 align-items-center">
                    <button id="addressListItemEditBtn{{ $address->id }}">
                        <i class="icon ic-edit"></i>
                    </button>

                    <button id="addressListItemDeleteBtn{{ $address->id }}" class="text-danger">
                        <i class="icon ic-delete"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>