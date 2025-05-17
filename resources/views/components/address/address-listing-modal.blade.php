<div id="addressListingModal" class="k-modal">
    <div class="k-modal-content">
        <div class="k-modal-header">
            <div></div>
            <h5 class="k-modal-title d-flex align-items-center gap-2">
                <i class="icon ic-location-add"></i>
                <span>Danh sách địa chỉ</span>
            </h5>
            <button type="button" class="k-modal-close" data-dismiss="modal" aria-label="Close">&times;</button>
        </div>

        <div class="k-modal-body">
            @foreach ($addresses as $address)
                <div class="mt-3">
                    <x-address.address-list-item :address="$address" />
                </div>
            @endforeach
        </div>

    </div>
</div>

<script>
    (function () {
        const addressListItems = document.querySelectorAll('.k-address-list-item');
        const addressListingModal = document.getElementById('addressListingModal');
        const app = {
            start() {
                this.registerEvents();
            },

            onItemSelect(addressId) {
                Livewire.dispatch('choseAddress', [addressId]);
            },

            onShowAddressFormModal(addressId) {
                
            },

            registerEvents() {
                Array.from(addressListItems).forEach(addressListItem => {
                    const addressId = addressListItem.dataset.addressId;
                    const editBtn = addressListItem.querySelector(`#addressListItemEditBtn${addressId}`);

                    addressListItem.addEventListener('click', (e) => {
                        if(e.target.closest(`#addressListItemEditBtn${addressId}`) == null)
                            this.onItemSelect(addressListItem.dataset.addressId);
                    });
                    editBtn.addEventListener('click', (e) => this.onShowAddressFormModal(addressId));
                });
            }
        }

        app.start();
    })();
</script>