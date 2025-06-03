import '../api-service';
import '../api-result';

class DonateService extends ApiService {
    constructor() {
        super();
    }

    async store(donateRequest) {
        const response = await this.post(route('ajax.donates.store', donateRequest));
        
        if(response.isSuccessfully()) {
            return ApiResult.from({'success': true, 'data': {...response.data, data: Donate.fromJson(response.data)}, 'exception': null});
        }
        return response;
    }
}

window.DonateService = DonateService;