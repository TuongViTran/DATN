<!-- resources/views/frontend/layout.blade.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trang chủ')</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/layout.css') }}">
</head>
<body>
    <header>
        <div class="logo">
            <span class="dot yellow"></span>
            <span class="dot blue"></span>
            <span class="dot grey"></span>
            <h1>Cà Phê Đi Đâu?</h1>
        </div>
        <nav>
            <a href="{{ url('/') }}" class="active">Trang chủ</a>
            <a href="#">Feed</a>
            <a href="#">Tin Tức</a>
            <a href="#">Thông báo</a>
            <button class="btn">Đăng nhập</button>
            <button class="btn btn-outline">Đăng ký</button>
        </nav>
    </header>

    <section class="search-section">
        <div class="search-box">
            <input type="text" placeholder="Hôm nay bạn muốn đi đâu?" />
            <button class="btn-location">Vị trí hiện tại</button>
        </div>
        <div class="filter-buttons">
            <button class="filter"><span>📍</span> Khoảng cách</button>
            <button class="filter"><span>🏠</span> Style quán</button>
            <button class="filter"><span>💰</span> Khoảng giá</button>
        </div>
        <h2>Xin chào! Chúng tôi hỗ trợ tìm kiếm quán cà phê</h2>
    </section>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2025 - Website của tôi</p>
    </footer>
</body>
</html>
