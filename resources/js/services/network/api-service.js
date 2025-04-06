import './api-result.js';
class ApiService {
    constructor() {}

    async get(url, parameters = {}) {
        try {
            const response = await fetch(url, parameters);
            const json = await response.json();
            return ApiResult.from({'success': true, data: json.data, exception: null});
        } catch (error) {
            return ApiResult.from({'success': false, data: null, exception: error});
        }
    }
}

window.ApiService = ApiService;