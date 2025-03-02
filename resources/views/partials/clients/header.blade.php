<header>
    <div class="container py-3">
        <div class="row align-items-center">
            <div class="col-2">
                <h2>Logo here</h2>
            </div>
            <div class="col-7">
                <div id="headerSearchWrapper">
                    <div class="row">
                        <div class="col-2">
                            <div class="text-dark d-flex align-items-center">
                                Tên sách
                                <img src="{{ asset('images/icons/ic_arrow_down.svg') }}" alt="Icon Arrow Down">
                            </div>
                        </div>
                        <div class="col-9">
                            <input type="text" id="headerSearchInput" placeholder="Nhập nội dung tìm kiếm...">
                        </div>
                        <div class="col-1">
                            <i class="icon ic-search"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div id="authenticationWrapper">
                    <button class="k-btn btn-dark">
                        <i class="icon ic-login"></i>
                        <span>Đăng nhập</span>
                    </button>

                    <button class="k-btn btn-main">
                        <i class="icon ic-register"></i>
                        <span>Đăng ký</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>