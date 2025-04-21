import './api-result.js';
class ApiService {
    constructor() {}

    async callApi(url, method, data = {}) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        const urlWithParams = new URL(url);
        if(method === 'GET' || method === 'DELETE') {
            Object.entries(data).forEach(([key, value]) => {
                if (value !== undefined && value !== null) {
                    urlWithParams.searchParams.append(key, value);
                }
            });
        }
        try {
            const response = await fetch(method === 'GET' || method === 'DELETE' ? urlWithParams : url, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                },
                method: method,
                body: method === 'POST' || method === 'PUT' ? JSON.stringify(data) : null,
            });
            const json = await response.json();
            if(!response.ok) {
                return ApiResult.from({'success': false, data: null, exception: json.errors});
            }
            return ApiResult.from({'success': true, data: {...json}, exception: null});
        }
        catch (error) {
            return ApiResult.from({'success': false, data: null, exception: error});
        }
    }

    async get(url, parameters = {}) {
        return this.callApi(url, 'GET', parameters);
    }

    async post(url, data = {}) {
        return this.callApi(url, 'POST', data);
    }

    async put(url, data = {}) {
        return this.callApi(url, 'PUT', data);
    }

    async delete(url, parameters = {}) {
        return this.callApi(url, 'DELETE', parameters);
    }
}

window.ApiService = ApiService;