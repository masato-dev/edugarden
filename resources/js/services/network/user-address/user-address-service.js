import '../api-service';
import '../api-result';

class UserAddressService extends ApiService {
    constructor() {
        super();
    }

    async store(userAddressRequest) {
        return this.post(route('ajax.user-addresses.store', userAddressRequest));
    }

    async update(userAddressId, userAddressRequest) {
        return this.put(route('ajax.user-addresses.update', { id: userAddressId, ...userAddressRequest }));
    }
}

window.UserAddressService = UserAddressService;