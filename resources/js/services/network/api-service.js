import './api-result.js';
class ApiService {
    constructor() {}

    async get(url, parameters = {}) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        const urlWithParams = new URL(url);
        Object.entries(parameters).forEach(([key, value]) => {
            if (value !== undefined && value !== null) {
                urlWithParams.searchParams.append(key, value);
            }
        });

        try {
            const response = await fetch(urlWithParams, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                },
                method: 'GET',
            });
            const json = await response.json();
            return ApiResult.from({'success': true, data: json.data, exception: null});
        } catch (error) {
            return ApiResult.from({'success': false, data: null, exception: error});
        }
    }

    async post(url, data = {}) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        try {
            const response = await fetch(url, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                },
                method: 'POST',
                body: JSON.stringify(data),
            });
            const json = await response.json();
            return ApiResult.from({'success': true, data: json.data, exception: null});
        } catch (error) {
            return ApiResult.from({'success': false, data: null, exception: error});
        }
    }

    async put(url, data = {}) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        try {
            const response = await fetch(url, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                },
                method: 'PUT',
                body: JSON.stringify(data),
            });
            const json = await response.json();
            return ApiResult.from({'success': true, data: json.data, exception: null});
        } catch (error) {
            return ApiResult.from({'success': false, data: null, exception: error});
        }
    }

    async delete(url, parameters = {}) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        try {
            const response = await fetch(url, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                },
                method: 'DELETE',
            });
            const json = await response.json();
            return ApiResult.from({'success': true, data: json.data, exception: null});
        } catch (error) {
            return ApiResult.from({'success': false, data: null, exception: error});
        }
    }
}

window.ApiService = ApiService;