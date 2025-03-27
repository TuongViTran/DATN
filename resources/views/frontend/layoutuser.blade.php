
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
    <nav class="navbar">
        <ul class="nav-list">
            <li class="{{ request()->routeIs('trangchu') ? 'active' : '' }}">
                <a href="{{ route('trangchu') }}">
                    <span class="icon"><img src="{{ asset('frontend/images/icon_trangchu.svg') }}" alt="Trang chủ"></span>
                    <span>Trang chủ</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('feed') ? 'active' : '' }}">
                <a href="{{ route('feed') }}">
                    <span class="icon"><img src="{{ asset('frontend/images/icon_feed.svg') }}" alt="Feed"></span>
                    <span>Feed</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('tintuc') ? 'active' : '' }}">
                <a href="{{ route('tintuc') }}">
                    <span class="icon"><img src="{{ asset('frontend/images/icon_tintuc.svg') }}" alt="Tin tức"></span>
                    <span>Tin tức</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('thongbao') ? 'active' : '' }}">
                <a href="{{ route('thongbao') }}">
                    <span class="icon"><img src="{{ asset('frontend/images/icon_thongbao.svg') }}" alt="Thông báo"></span>
                    <span>Thông báo</span>
                </a>
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
        <div class="user-menu" id="user-menu">
            <span class="user-role">{{ Auth::user()->account_type === 'owner' ? 'Chủ Quán' : 'Khách Hàng' }}</span>
            <img src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('frontend/images/default_avatar.jpg') }}" 
                 alt="Avatar" class="user-avatar" id="avatar">
            <span class="user-name">{{ Auth::user()->full_name }}</span>
            <ul class="dropdown-menu" id="dropdown-menu">
                <li><a href="{{ route('profile') }}">Trang cá nhân</a></li>
                <li>
                    <a href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Đăng xuất
                    </a>
                </li>
            </ul>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @else
        <!-- Nếu chưa đăng nhập -->
        <a href="{{ route('login') }}" class="btn btn-primary">Đăng nhập</a>
        <a href="{{ route('register') }}" class="btn btn-outline">Đăng ký</a>
    @endauth
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const avatar = document.getElementById("avatar");
        const dropdownMenu = document.getElementById("dropdown-menu");

        avatar.addEventListener("click", function (event) {
            dropdownMenu.style.display = dropdownMenu.style.display === "block" ? "none" : "block";
            event.stopPropagation(); // Ngăn chặn sự kiện click lan ra ngoài
        });

        // Ẩn dropdown khi click ra ngoài
        document.addEventListener("click", function () {
            dropdownMenu.style.display = "none";
        });

        // Giữ dropdown mở nếu click vào nó
        dropdownMenu.addEventListener("click", function (event) {
            event.stopPropagation();
        });
    });

</script>

</header>
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
