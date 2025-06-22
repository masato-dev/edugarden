<div id="addressListingModal" class="k-modal">
    <div class="k-modal-content">
        <div class="k-modal-header">
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

            onShowAddressFormModal(addressId, address = {}) {
                addressListingModal.classList.remove('show');
                addressModal.show('update', address);
            },

            onDeleteAddress(addressId) {
                notification.fire.confirm(
                    'Xoá địa chỉ này?',
                    'Bạn có chắc chắn muốn xoá địa chỉ này, các thông tin liên quan đến địa chỉ này sẽ được xoá khỏi hệ thống',
                    'warning',
                ).then(result => {
                    if(result.isConfirmed) {
                        Livewire.dispatchTo('address.address-form', 'deleteAddress', [addressId]);
                    }
                })
            },

            registerEvents() {
                Array.from(addressListItems).forEach(addressListItem => {
                    const addressId = addressListItem.dataset.addressId;
                    const address = JSON.parse(addressListItem.dataset.address);
                    const editBtn = addressListItem.querySelector(`#addressListItemEditBtn${addressId}`);
                    const deleteBtn = addressListItem.querySelector(`#addressListItemDeleteBtn${addressId}`);

                    addressListItem.addEventListener('click', (e) => {
                        if(e.target.closest(`#addressListItemEditBtn${addressId}`) == null)
                            this.onItemSelect(addressListItem.dataset.addressId);
                    });
                    editBtn.addEventListener('click', (e) => this.onShowAddressFormModal(addressId, address));
                    deleteBtn.addEventListener('click', (e) => this.onDeleteAddress(addressId));
                });
            }
        }

        app.start();
    })();
</script>