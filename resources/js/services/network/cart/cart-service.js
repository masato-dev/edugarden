import '../api-service';
import '../api-result';

class CartService extends ApiService {
    constructor() {
        super();
    }

    async store(cartRequest) {
        const response = await this.post(route('ajax.carts.store', cartRequest));
        if(response.isSuccessfully()) {
            return ApiResult.from({'success': true, 'data': Cart.fromJson(response.data), 'exception': null});
        }
        return response;
    }

    async delete(cartId) {
        const response = await super.delete(route('ajax.carts.delete', { id: cartId }));
        return response;
    } 
}

window.CartService = CartService;