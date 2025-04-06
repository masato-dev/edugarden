class ApiResult {
    constructor(success, data, exception) {
        this.success = success;
        this.data = data;
        this.exception = exception;
    }

    static from(obj) {
        return new ApiResult(obj.success, obj.data, obj.exception);
    }

    isSuccessfully() {
        return this.success == true && this.exception == null;
    }
}

window.ApiResult = ApiResult;