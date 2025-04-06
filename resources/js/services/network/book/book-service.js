import '../api-service';
import '../api-result';
class BookService extends ApiService {
    constructor() {
        super();
    }

    async autoComplete(keyword) {
        const response = await this.get(route('ajax.books.search', { keyword: keyword }));
        if(response.isSuccessfully()) {
            return ApiResult.from({
                'success': true,
                'data': Array.from(response.data).map((item) => Book.fromJson(item)),
                'exception': null
            })
        }
        return response;
    }
}

window.BookService = BookService;