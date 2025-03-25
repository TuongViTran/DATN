
<!-- resources/views/frontend/layout.blade.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Owner')</title>
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
<script src="https://kit.fontawesome.com/24875ac8f5.js" crossorigin="anonymous"></script>
</head>
<body>
    
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<header>


    <!-- Nav -------------------->
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

    <!-- Role  -------------------->
    <div class="right-section">
        <button class="btn btn-warning text-white">Chủ Quán</button>       
        <div class="in4">
            <img src="{{ asset('frontend/images/avt.png') }}" class="img-fluid rounded-circle" alt="avt" width="60" height="60" style="box-shadow: 0 0 25px 0 rgba(88, 79, 79, 0.1);">
            <span class="ms-2 fw-bold">Tường Vi</span>
        </div>
    </div>
</header>

    <main>
    <main class="container mt-4">
        <div class="p-4 rounded shadow-sm mb-4 d-flex align-items-center justify-content-around" style="background: linear-gradient(to bottom,rgb(241, 215, 180), #fbc2eb00);">
            <!-- Cột bên trái: Ảnh đại diện + Thông tin quán -->
            <div class="d-flex flex-column align-items-center">
                <img src="{{ asset('frontend/images/avt.png') }}" alt="User profile picture" class="rounded-circle mb-2" width="90" height="90" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                
                <div class="text-left">
                    <h4 class="text-center fw-bold mb-1">Tường Vi</h4>
                    <p class="text-secondary mb-1"><i class="fa-solid fa-door-open"></i></i> Open daily: 7:00 - 22:00</p>
                    <p class="text-secondary mb-1"><i class="fa-solid fa-tags"></i> Price: 35k - 65k</p>
                    <p class="text-secondary mb-0"><i class="fa-solid fa-location-dot"></i></i> Address: 25 Bùi Thị Xuân</p>
                </div>
            </div>

            <!-- Cột bên phải: Bài viết, Đã lưu, Đã tìm quán -->
            <div class="bg-white p-3 rounded shadow-sm text-center d-flex gap-4 justify-content-around" style="min-width: 500px;">
                <div>
                    <p class="fs-6 text-secondary mb-1">Bài viết</p>
                    <p class="fs-5 fw-bold mb-0">7</p>
                </div>
                <div>
                    <p class="fs-6 text-secondary mb-1">Đã lưu</p>
                    <p class="fs-5 fw-bold mb-0">607</p>
                </div>
                <div>
                    <p class="fs-6 text-secondary mb-1">Đã tìm quán</p>
                    <p class="fs-5 fw-bold mb-0">1.004k</p>
                </div>
            </div>
        </div>



    <div class="row">
        <div class="col-lg-8">
            
            <div class="bg-white p-4 rounded shadow-sm mb-4">
                <h2 class="fs-5 fw-bold mb-3">Quán của tôi</h2>
                <div class="border p-3 rounded shadow-sm bg-white">
            <div class="d-flex gap-4">
                <!-- Bên trái: Hình ảnh -->
                <div class="flex-shrink-0">
                    <!-- Ảnh lớn (Hình chữ nhật) -->
                    <img src="{{asset('frontend/images/' . $coffeeShop->cover_image)}}" 
                        alt="Quán Ngày Bình Yên" class="rounded" 
                        style="width: 380px; height: 250px; object-fit: cover;">
                    
                    <!-- Ảnh nhỏ (Hình vuông) -->
                    <div class="mt-3 d-flex justify-content-between" style="max-width: 380px;">
                        <img src="{{asset('frontend/images/' . $coffeeShop->image_1)}}" 
                            alt="Image 1" class="rounded" 
                            style="width: 32%; height: 110px; object-fit: cover;">
                        <img src="{{asset('frontend/images/' . $coffeeShop->image_2)}}" 
                            alt="Image 2" class="rounded" 
                            style="width: 32%; height: 110px; object-fit: cover;">
                        <img src="{{asset('frontend/images/' . $coffeeShop->image_3)}}" 
                            alt="Image 3" class="rounded" 
                            style="width: 32%; height: 110px; object-fit: cover;">
                    </div>
                </div>

                <!-- Bên phải: Thông tin quán -->
                <div class="flex-grow-1">
                    <h3 class="fs-4 fw-bold">{{ $coffeeShop->shop_name }}</h3>
                    <div class="d-flex align-items-center gap-2">
                    @for ($i = 1; $i <= 5; $i++)
                            @if($i <= $coffeeShop->rating)
                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                            @else
                            <i class="fa-thin fa-star" style="color: #FFD43B;"></i>
                            @endif
                        @endfor
                        <span class="text-secondary">{{ $coffeeShop->rating }}</span>
                        <span class="badge bg-success">{{ $coffeeShop->status }}</span>
                    </div>

                    <p class="text-secondary mt-2"><i class="bi bi-clock"></i> Open daily: {{ $coffeeShop->opening_time }} - {{ $coffeeShop->closing_time }}</p>
                    <p class="text-secondary"><i class="bi bi-cash"></i> Price: {{ $coffeeShop->min_price }} - {{ $coffeeShop->max_price }}</p>
                    <p class="text-secondary"><i class="bi bi-geo-alt"></i> Address: {{ $coffeeShop->address->street}}, {{ $coffeeShop->address->district}}, {{ $coffeeShop->address->city}} </p>

                    <h5 class="fw-bold mt-3">Thông tin</h5>
                    
                    <p class="mb-1"><strong>Đậu xe:</strong> {{ $coffeeShop->parking }}</p>
                    <p class="mb-1"><strong>Mật khẩu WiFi:</strong> {{ $coffeeShop->wifi_password }}</p>
                    <p class="mb-1"><strong>Hotline:</strong> {{ $coffeeShop->phone }}</p>

                    
                    <div class="mt-3 d-flex gap-3">
                        
                        <!-- Button mở Modal menu -->
                        <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#menuModal">
                            Menu
                        </button>

                        <!-- Modal hiển thị danh sách menu -->
    <div class="modal fade" id="menuModal" tabindex="-1" aria-labelledby="menuModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Menu {{ $coffeeShop->shop_name }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    @if($coffeeShop->menu->count() > 0)
                        @foreach ($coffeeShop->menu as $menu)
                            <div class="mb-3">
                                <img src="{{ asset('frontend/images/' . $menu->image_url) }}" class="rounded img-fluid mb-2 menu-item" 
                                    data-menu-id="{{ $menu->id }}" alt="Menu Image">
                            </div>
                        @endforeach
                    @else
                        <p class="text-muted">Chưa có menu nào được thêm.</p>
                    @endif
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning text-white" id="openEditMenuModal" data-bs-dismiss="modal">
                        Chỉnh sửa menu
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

                        <!-- Modal Chỉnh Sửa Menu -->
    <div class="modal fade" id="editMenuModal" tabindex="-1" aria-labelledby="editMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Chỉnh sửa menu {{ $coffeeShop->shop_name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="editMenuForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <label class="form-label">Chọn ảnh mới:</label>
                        <input type="file" class="form-control" name="menu_image" accept="image/*" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>


                      
                        <!-- JS để xử lý mở modal chỉnh sửa -->
<script>
    document.getElementById("openEditMenuModal").addEventListener("click", function () {
        var firstMenuItem = document.querySelector(".menu-item"); // Lấy menu đầu tiên
        if (!firstMenuItem) return alert("Chưa có menu nào để chỉnh sửa!");

        var menuId = firstMenuItem.getAttribute("data-menu-id");

        // Ẩn modal danh sách menu
        var menuModal = bootstrap.Modal.getInstance(document.getElementById("menuModal"));
        if (menuModal) menuModal.hide();

        // Cập nhật action form
        var form = document.getElementById("editMenuForm");
        form.action = "/menu/update/" + menuId;

        // Hiển thị modal chỉnh sửa
        setTimeout(() => {
            var editMenuModal = new bootstrap.Modal(document.getElementById("editMenuModal"));
            editMenuModal.show();
        }, 300);
    });
</script>
                        <!-- Button mở Modal -->
<button type="button" class="btn btn-secondary px-4" data-bs-toggle="modal" data-bs-target="#editModal">
    Chỉnh sửa
</button>

<!-- Modal Chỉnh Sửa -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Chỉnh Sửa Thông Tin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('owner.updateinfor', $coffeeShop->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Tên quán -->
                    <div class="mb-3">
                        <label for="shop_name" class="form-label">Tên Quán</label>
                        <input type="text" class="form-control" id="shop_name" name="shop_name" value="{{ $coffeeShop->shop_name }}">
                    </div>

                    <!-- Trạng thái -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Trạng Thái</label>
                        <select class="form-select" id="status" name="status">
                            <option value="open" {{ $coffeeShop->status == 'open' ? 'selected' : '' }}>Mở cửa</option>
                            <option value="closed" {{ $coffeeShop->status == 'closed' ? 'selected' : '' }}>Đóng cửa</option>
                        </select>
                    </div>

                    <!-- Số điện thoại -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $coffeeShop->phone }}" required>
                    </div>

                    <!-- Mô tả -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả</label>
                        <textarea class="form-control" rows="5" id="description" name="description">{{ $coffeeShop->description }}</textarea>
                    </div>

                    <!-- Giờ mở cửa & đóng cửa -->
                    <div class="row">
                        <div class="col-md-6">
                            <label for="opening_time" class="form-label">Giờ mở cửa</label>
                            <input type="time" class="form-control" id="opening_time" name="opening_time" value="{{ substr($coffeeShop->opening_time, 0, 5) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="closing_time" class="form-label">Giờ đóng cửa</label>
                            <input type="time" class="form-control" id="closing_time" name="closing_time" value="{{ substr($coffeeShop->opening_time, 0, 5) }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Giá tối thiểu -->
                        <div class="col-md-6">
                            <label for="min_price" class="form-label">Giá nhỏ nhất</label>
                            <input type="number" class="form-control" id="min_price" name="min_price" value="{{ $coffeeShop->min_price }}" required>
                        </div>

                        <!-- Giá tối đa -->
                        <div class="col-md-6">
                            <label for="max_price" class="form-label">Giá cao nhất</label>
                            <input type="number" class="form-control" id="max_price" name="max_price" value="{{ $coffeeShop->max_price }}" required>
                        </div>
                    </div>

                    <!-- Hình ảnh -->
                    @foreach(['cover_image', 'image_1', 'image_2', 'image_3'] as $img)
                    <div class="mb-3">
                        <label for="{{ $img }}" class="form-label">Hình ảnh {{ ucfirst(str_replace('_', ' ', $img)) }}</label>
                        <input type="file" class="form-control" id="{{ $img }}" name="{{ $img }}">
                        @if(!empty($coffeeShop->$img))
                            <img src="{{ asset('frontend/images/' . $coffeeShop->$img) }}" class="img-thumbnail mt-2" width="100">
                        @endif
                    </div>
                    @endforeach

                    <!-- Địa chỉ -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" id="address" name="address"
                            value="{{ implode(', ', array_filter([
                                optional($coffeeShop->address)->street,
                                optional($coffeeShop->address)->ward,
                                optional($coffeeShop->address)->district,
                                optional($coffeeShop->address)->city,
                                optional($coffeeShop->address)->country
                            ])) }}" required>

                    </div>

                    <!-- Nút lưu -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


                    </div>

                    <!-- Nút yêu thích -->
                    <div class="mt-2 text-center">
                        <p><i class="fa-light fa-heart" style="color: #ff2600;"></i>Đã thích (3,3K)</p>
                    </div>
                </div>
        </div>
    </div>

    </div>
    <div class="bg-white mb-4 p-4 rounded shadow-sm">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fs-5 fw-bold">Bài viết của tôi</h2>
        <button class="btn btn-success text-white">
            <i class="fa-solid fa-plus"></i> Tạo bài viết
        </button>
    </div>

    <!-- Danh sách bài viết -->
    @foreach([1, 2, 3] as $post)
    <div class="border p-3 rounded mb-3 ">
        <div class="d-flex gap-3">
            <img src="https://storage.googleapis.com/a1aa/image/-kvRCDmF0l1t4Z7D4VZl5Rt7KEgUVoJU_sdY-M9g0yU.jpg" 
                 alt="Top những quán cà phê để làm việc" class="rounded" 
                 style="width: 380px; height: 160px; object-fit: cover;">

            <div class="flex-grow-1">
                <h3 class="fs-5 fw-bold">Top những quán cà phê để làm việc</h3>
                <span class="badge bg-success">Đã duyệt</span>
                <p class="text-secondary mt-2">
                    Thị trường kinh doanh đồ uống tại Việt Nam đang trên đà phát triển mạnh mẽ, đặc biệt là thị trường cà phê...
                </p>

                <p class="text-muted small mb-2">
                    <i class="fa-regular fa-calendar"></i> Thứ Hai, 11/11/2024 |
                    <i class="fa-regular fa-user"></i> Tác giả: Tường Vi
                </p>

                <div class="d-flex gap-2">
                    <button class="btn btn-danger btn-sm">❌ Xóa</button>
                    <button class="btn btn-warning btn-sm text-white">✏️ Chỉnh sửa</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

        </div>
        <div class="col-lg-4">
            <div class="bg-white p-4 rounded shadow-sm mb-4">
                <h2 class="fs-5 fw-bold mb-3">Quản lý đánh giá</h2>
                <ul class="list-unstyled">
                    <li class="d-flex align-items-center gap-3 mb-3">
                        <img src="https://storage.googleapis.com/a1aa/image/ijLC10jshGVG4_HQyAyMrqMQPBoFIktLJTsibzJx3BA.jpg" alt="User avatar" class="rounded-circle" width="50" height="50">
                        <div>
                            <h3 class="fs-6 fw-bold mb-1">Ngày Bình Yên</h3>
                            <p class="text-secondary mb-1">Quán cà phê đẹp và yên tĩnh</p>
                            <p class="text-secondary mb-0">4.0 <span class="text-warning"><i class="fas fa-star"></i></span></p>
                        </div>
                    </li>
                    <li class="d-flex align-items-center gap-3 mb-3">
                        <img src="https://storage.googleapis.com/a1aa/image/ijLC10jshGVG4_HQyAyMrqMQPBoFIktLJTsibzJx3BA.jpg" alt="User avatar" class="rounded-circle" width="50" height="50">
                        <div>
                            <h3 class="fs-6 fw-bold mb-1">Ngày Bình Yên</h3>
                            <p class="text-secondary mb-1">Quán cà phê đẹp và yên tĩnh</p>
                            <p class="text-secondary mb-0">4.0 <span class="text-warning"><i class="fas fa-star"></i></span></p>
                        </div>
                    </li>
                    <li class="d-flex align-items-center gap-3 mb-3">
                        <img src="https://storage.googleapis.com/a1aa/image/ijLC10jshGVG4_HQyAyMrqMQPBoFIktLJTsibzJx3BA.jpg" alt="User avatar" class="rounded-circle" width="50" height="50">
                        <div>
                            <h3 class="fs-6 fw-bold mb-1">Ngày Bình Yên</h3>
                            <p class="text-secondary mb-1">Quán cà phê đẹp và yên tĩnh</p>
                            <p class="text-secondary mb-0">4.0 <span class="text-warning"><i class="fas fa-star"></i></span></p>
                        </div>
                    </li>
                    <li class="d-flex align-items-center gap-3 mb-3">
                        <img src="https://storage.googleapis.com/a1aa/image/ijLC10jshGVG4_HQyAyMrqMQPBoFIktLJTsibzJx3BA.jpg" alt="User avatar" class="rounded-circle" width="50" height="50">
                        <div>
                            <h3 class="fs-6 fw-bold mb-1">Ngày Bình Yên</h3>
                            <p class="text-secondary mb-1">Quán cà phê đẹp và yên tĩnh</p>
                            <p class="text-secondary mb-0">4.0 <span class="text-warning"><i class="fas fa-star"></i></span></p>
                        </div>
                    </li>
                    <li class="d-flex align-items-center gap-3 mb-3">
                        <img src="https://storage.googleapis.com/a1aa/image/ijLC10jshGVG4_HQyAyMrqMQPBoFIktLJTsibzJx3BA.jpg" alt="User avatar" class="rounded-circle" width="50" height="50">
                        <div>
                            <h3 class="fs-6 fw-bold mb-1">Ngày Bình Yên</h3>
                            <p class="text-secondary mb-1">Quán cà phê đẹp và yên tĩnh</p>
                            <p class="text-secondary mb-0">4.0 <span class="text-warning"><i class="fas fa-star"></i></span></p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</main>
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let alert = document.querySelector(".alert");
        if (alert) {
            setTimeout(() => {
                alert.classList.add("fade");
                setTimeout(() => alert.remove(), 500); // Xóa alert khỏi DOM sau khi ẩn
            }, 3000); // 3 giây
        }
    });
</script>

<script src="{{ asset('frontend/js/seacher.js') }}"></script>
<script src="{{ asset('frontend/js/date_weather.js') }}"></script>
</html>
