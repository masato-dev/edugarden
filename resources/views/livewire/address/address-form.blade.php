<div class="p-3 border rounded-3">
    <x-address.address-listing-modal :addresses="$addresses" />
    <div class="d-md-flex d-block align-items-center justify-content-between">
        <h3 class="text-color fw-600">Địa chỉ giao hàng</h3>
        <button class="gap-2 d-flex align-items-center k-btn btn-main" type="button" id="addShippingAddressBtn">
            <i class="icon ic-location-add"></i>
            <span>Thêm địa chỉ giao hàng</span>
        </button>
    </div>

    @if (!empty($chosenAddress))
        <div class="mt-3" id="chosenAddressWrapper">
            <x-address.address-list-item :address="$chosenAddress" />
        </div>
    @else
        <div class="mt-3">
            <p class="text-color">Chưa tồn tại địa chỉ, vui lòng tạo ít nhất một địa chỉ giao hàng</p>
        </div>
    @endif
</div>

<script>
    (function() {
        const chosenAddressWrapper = document.getElementById('chosenAddressWrapper');
        const addressListingModal = document.getElementById('addressListingModal')
        const app = {
            start() {
                this.registerEvents();
            },

            showAddressListingModal() {
                addressListingModal.classList.add('show');
            },

            registerEvents() {
                chosenAddressWrapper.addEventListener('click', () => this.showAddressListingModal());
            }
        };

        app.start();
    })();
</script>