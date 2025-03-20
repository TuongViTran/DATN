<!-- resources/views/frontend/layout.blade.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Trang chủ')</title>
<link rel="stylesheet" href="{{ asset('frontend/css/layout.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/footer.css') }}">
<!-- Bootstrap CSS -->
<!-- Bootstrap 5.1.3 JS (Bundle includes Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

<header>
    <!-- Logo -------------------->
    <div class="logo">
        <img src="{{ asset('frontend/images/Logo.svg') }}" alt="Cà Phê Đi Đâu?">
    </div>

    <!-- Navigation -------------------->
    <nav>
        <ul>
            <li class="active">
                <a href="#">
                    <span class="icon"><img src="{{ asset('frontend/images/icon_trangchu.svg') }}" alt="Trang chủ"></span>Trang chủ</a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><img src="{{ asset('frontend/images/icon_feed.svg') }}" alt="Feed"></span>Feed</a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><img src="{{ asset('frontend/images/icon_tintuc.svg') }}" alt="Tin tức"></span>Tin Tức </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><img src="{{ asset('frontend/images/icon_thongbao.svg') }}" alt="Thông báo"></span>Thông báo</a>
            </li>
        </ul>
    </nav>

    <!-- Thời tiết -------------------->
    <div class="right-section">
        <div class="weather">
            <span class="weather-icon">☀️</span>
            <span class="weather-info">Đang tải...</span>
            <span class="weather-info">|</span>
            <div class="date-info">Đang tải ngày...</div>
        </div>

        <!-- Kiểm tra trạng thái đăng nhập -->
        <div class="auth-buttons">
            @auth
                <!-- Nếu đã đăng nhập -->
                <a href="{{ route('logout') }}" class="btn btn-outline"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Đăng xuất
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <!-- Nếu chưa đăng nhập -->
                <a href="{{ route('login') }}" class="btn btn-primary">Đăng nhập</a>
                <a href="{{ route('register') }}" class="btn btn-outline">Đăng ký</a>
            @endauth
        </div>
    </div>
</header>


<!-- Thanh tìm kiếm -------------------->
    <section class="search-section">
            <div class="search-box">
            <span class="icon"><img src="{{ asset('frontend/images/Search.svg') }}" alt="Trang chủ"></span><input type="text" placeholder="Hôm nay bạn muốn đi đâu?" />
                <button class="btn-location">Tìm kiếm </button>
            </div>
            <div class="filters">
            <div class="filter-container">
                    <button class="dropdown-btn">
                    <img src="{{ asset('frontend/images/icon_khoangcach.svg') }}" alt="icon" class="icon"> Khoảng cách ▾
                    </button>
                <div class="dropdown-content">
                    <div class="slider-container">
                        <span>0km</span>
                        <input type="range" min="0" max="15" class="slider" oninput="updateSliderValue(this)">
                        <span class="slider-value">0km</span>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="walkable">
                        <label for="walkable">Có thể đi bộ</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="distance2">
                        <label for="distance2">2 km</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="distance5">
                        <label for="distance5">&lt; 5km</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="distance7">
                        <label for="distance7">5-7km</label>
                    </div>
                </div>
            </div>
            <div class="filter-container">
                    <button class="dropdown-btn">
                    <img src="{{ asset('frontend/images/icon_stylequan.svg') }}" alt="icon" class="icon"> Style quán ▾
                    </button>
                <div class="dropdown-content">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="work">
                        <label for="work">Work Coffee</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="vintage">
                        <label for="vintage">Vintage Coffee</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="modern">
                        <label for="modern">Modern Coffee</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="traditional">
                        <label for="traditional">Traditional Coffee</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="concept">
                        <label for="concept">Concept Coffee</label>
                    </div>
                </div>
            </div>
            <div class="filter-container">
                    <button class="dropdown-btn">
                    <img src="{{ asset('frontend/images/icon_gia.svg') }}" alt="icon" class="icon"> Khoảng giá ▾
                    </button>
                <div class="dropdown-content">
                    <div class="slider-container">
                        <span>0k</span>
                        <input type="range" min="0" max="50" class="slider" oninput="updateSliderValue(this)">
                        <span class="slider-value">0k</span>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="price50">
                        <label for="price50">&lt; 50k</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="price50_70">
                        <label for="price50_70">50k - 70k</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="price70">
                        <label for="price70">&gt; 70k</label>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="hello">
        <h2>Xin chào! Chúng tôi hỗ trợ<br> tìm kiếm quán cà phê</h2> 
        </div> 
       
    </section>
    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-logo">
              <img src="{{ asset('frontend/images/Logo.svg') }}" alt="caphedidau" class="icon">
            </div>
            <div class="footer-links">
                <div class="footer-column">
                    <h3>Về website</h3>
                    <ul>
                        <li><a href="#">Cách đặt chỗ</a></li>
                        <li><a href="#">Hỗ trợ</a></li>
                        <li><a href="#">Liên hệ chúng tôi</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Dịch vụ khách hàng</h3>
                    <ul>
                        <li><a href="#">Câu hỏi thường gặp</a></li>
                        <li><a href="#">Chính sách chúng tôi</a></li>
                        <li><a href="#">Quyền lợi khách hàng</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Kênh kết nối</h3>
                    <ul>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">YouTube</a></li>
                    </ul>
                </div>
                <div class="footer-column update-section">
                    <h3><strong>LUÔN CẬP NHẬT</strong></h3>
                    <p>Về các tin tức đồ uống, sản phẩm mới</p>
                    <div class="subscribe">
                        <input type="email" placeholder="Email">
                        <button>Đăng ký</button>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="{{ asset('frontend/js/seacher.js') }}"></script>
<script src="{{ asset('frontend/js/date_weather.js') }}"></script>
</html>
