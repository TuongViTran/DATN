@extends('frontend.layoutuser')
@section('title', 'Owner')
@section('content')
<div class="container mt-4">
        <div class="p-4 rounded shadow-sm mb-4 d-flex align-items-center justify-content-around" style="background: linear-gradient(to bottom, rgb(180, 241, 200), #c2ebfb00);">
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

@endsection