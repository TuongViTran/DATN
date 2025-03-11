<!-- resources/views/frontend/layout.blade.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trang chủ')</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/layout.css') }}">
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
    <div class="logo">
        <img src="{{ asset('frontend/images/Logo.svg') }}" alt="Cà Phê Đi Đâu?">
    </div>
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
                    <span class="icon"><img src="{{ asset('frontend/images/icon_tintuc.svg') }}" alt="TinTuc"></span>Tin Tức </a>
            </li>
            <li>
                <a href="#">
                        <span class="icon"><img src="{{ asset('frontend/images/icon_thongbao.svg') }}" alt="Thông báo"></span>Thông báo</a>
            </li>
        </ul>
    </nav>
    <div class="right-section">
        <div class="weather">
            <span class="weather-icon">☀️</span>
            <span class="weather-info">28°C - Nắng</span>
        </div>
        
        <div class="auth-buttons">
            <button class="btn btn-primary">Đăng nhập</button>
            <button class="btn btn-outline">Đăng ký</button>
        </div>
    </div>
</header>

    <section class="search-section">
        <div class="search-box">
        <span class="icon"><img src="{{ asset('frontend/images/Search.svg') }}" alt="Trang chủ"></span><input type="text" placeholder="Hôm nay bạn muốn đi đâu?" />
            <button class="btn-location">Tìm kiếm </button>
        </div>
        <div class="filters">
        <div class="filter-container">
            <button class="dropdown-btn">Khoảng cách ▾</button>
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
            <button class="dropdown-btn">Style quán ▾</button>
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
            <button class="dropdown-btn">Khoảng giá ▾</button>
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
        
    <script>
        function updateSliderValue(slider) {
            let valueLabel = slider.nextElementSibling;
            valueLabel.textContent = slider.value + (slider.max == 15 ? 'km' : 'k');
        }
        document.querySelectorAll('.dropdown-btn').forEach(button => {
            button.addEventListener('click', function () {
                let content = this.nextElementSibling;
                if (content.classList.contains('active')) {
                    content.style.maxHeight = '0';
                    content.style.opacity = '0';
                    setTimeout(() => content.classList.remove('active'), 300);
                } else {
                    content.classList.add('active');
                    content.style.maxHeight = content.scrollHeight + 'px';
                    content.style.opacity = '1';
                }
            });
        });
    </script>
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
