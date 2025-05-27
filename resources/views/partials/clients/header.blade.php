<header>
    <div class="container py-3">
        <div class="row align-items-center">
            <div class="col-2">
                <a href="/" class="text-decoration-none">
                    <h2 class="text-color">Logo here</h2>
                </a>
            </div>
            <div class="col-6">
                <div id="headerSearchWrapper">
                    <div class="row">
                        <div class="col-2">
                            <span>Tên sách</span>
                        </div>
                        <div class="col-9" id="headerSearchInputWrapper">
                            <input 
                                value="{{ request('keyword') ?? '' }}"
                                type="text" 
                                id="headerSearchInput" 
                                placeholder="Nhập nội dung tìm kiếm...">

                            <ul class="list-unstyled d-none" id="headerSearchResult">

                            </ul>
                        </div>
                        <div class="col-1">
                            <button class="header-search-btn" id="headerSearchBtn">
                                <i class="icon ic-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                @auth('user:web')
                    <div class="d-flex align-items-center justify-content-end gap-3">
                        <a href="{{ route('carts.index') }}" class="k-btn btn-text-color d-flex gap-2 text-decoration-none py-3" id="headerCartBtn">
                            <i class="icon ic-shopping-cart"></i>
                            <span>Giỏ hàng</span>
                            <span class="header-cart-quantity @if($cartAmount == 0) d-none @endif" id="headerCartQuantity">
                                {{ $cartAmount  }}
                            </span>
                        </a>
    
                        <div class="dropdown">
                            <button class="k-btn btn-main dropdown-toggle d-flex gap-2 py-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="icon ic-register"></i>
                                <span>{{ auth('user:web')->user()->name }}</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('account.index') }}">Thông tin cá nhân</a></li>
                                <li><a class="dropdown-item" href="#">Lịch sử giao dịch</a></li>
                                <li><a class="dropdown-item" href="{{ route('auth.client.logout') }}">Đăng xuất</a></li>
                            </ul>
                        </div>
                    </div>
                @else
                    <div id="authenticationWrapper" class="d-flex justify-content-end gap-2">
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
    
    <nav class="navbar navbar-expand-lg bg-light border-top border-bottom">
        <div class="container">
            <a class="navbar-brand d-lg-none" href="/">Menu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#responsiveNavbar" aria-controls="responsiveNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="responsiveNavbar">
                <ul class="navbar-nav w-100 justify-content-between py-2">
                    @foreach ($menu->menuItems as $item)
                        @php
                            $isActive = Request::is(trim($item->url, '/') === '' ? '/' : trim($item->url, '/') . '*');
                        @endphp

                        <a href="{{ $item->url }}" class="nav-link {{ $isActive ? 'text-main fw-bold' : '' }}">
                            {{ $item->title }}
                        </a>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>

</header>

