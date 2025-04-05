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
                            <span>Tên sách</span>
                        </div>
                        <div class="col-9">
                            <input type="text" id="headerSearchInput" placeholder="Nhập nội dung tìm kiếm...">
                        </div>
                        <div class="col-1">
                            <button class="header-search-btn">
                                <i class="icon ic-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                
                @auth('user:web')
                    <div class="dropdown">
                        <button class="k-btn btn-main dropdown-toggle d-flex gap-2 py-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="icon ic-register"></i>
                            <span>{{ auth('user:web')->user()->name }}</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Thông tin cá nhân</a></li>
                            <li><a class="dropdown-item" href="#">Lịch sử giao dịch</a></li>
                            <li><a class="dropdown-item" href="{{ route('auth.client.logout') }}">Đăng xuất</a></li>
                        </ul>
                    </div>
                @else
                    <div id="authenticationWrapper">
                        <button class="k-btn btn-dark d-flex gap-2" id="loginBtn">
                            <i class="icon ic-login"></i>
                            <span>Đăng nhập</span>
                        </button>

                        <button class="k-btn btn-main d-flex gap-2" id="registerBtn">
                            <i class="icon ic-register"></i>
                            <span>Đăng ký</span>
                        </button>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</header>