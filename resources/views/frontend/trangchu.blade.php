@extends('frontend.layout')
@section('title', 'Trang Chủ')
@section('content')
<div class="container1 mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="content_news">
            <h2>Điểm danh các thương hiệu cà phê nổi tiếng ở Việt Nam 2025</h2>
            <p>Thị trường kinh doanh đồ uống tại Việt Nam đang trên đà phát triển mạnh mẽ,
                đặc biệt là thị trường cà phê với sự xuất hiện của rất nhiều thương hiệu cà phê.
                 Vậy đâu là các thương hiệu cà phê nổi tiếng ở Việt Nam trong những năm qua?</p>
             
                 <p class="tacgia">
                 <img src="{{ asset('frontend/images/author.svg') }}" alt="Trang chủ">
                                11/10/2025 |
                                Tác giả: Tường Vi 
                            </p>
        </div> 
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card news-card">
                        <img src="{{asset('frontend/images/img_slider1.jpg') }}" alt="News 1">
                        <div class="card-body">
                            <h5 class="card-title">Quán cà phê ngõ nhỏ Đà Nẵng</h5>
                            <p class="card-text">Trải nghiệm không gian nhỏ xinh với phong cách cổ điển và ấm cúng.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card news-card">
                        <img src="{{asset('frontend/images/img_slider1.jpg') }}" alt="News 2">
                        <div class="card-body">
                            <h5 class="card-title">Tiệm núp hẻm cực chill ở Đà Nẵng</h5>
                            <p class="card-text">Không gian yên tĩnh, thích hợp để thư giãn và làm việc.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card news-card">
                        <img src="{{asset('frontend/images/img_slider1.jpg') }}" alt="News 3">
                        <div class="card-body">
                            <h5 class="card-title">Quán cà phê phong cách châu Âu</h5>
                            <p class="card-text">Thiết kế sang trọng, đậm chất phương Tây với thực đơn đặc sắc.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="slider-container">
                <div class="slider" id="slider">
                    <div class="slide"><img src="{{asset('frontend/images/img_slider1.jpg') }}" alt="Slide 1"></div>
                    <div class="slide d-block w-100"><img src="{{asset('frontend/images/img_slider2.jpg') }}" alt="Slide 2"></div>
                    <div class="slide "><img src="{{asset('frontend/images/img_slider3.jpg') }}"  alt="Slide 3"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
   document.addEventListener("DOMContentLoaded", function () {
    const slider = document.querySelector("#latest-posts-slider");
    const slides = slider.querySelectorAll(".slide");
    let currentSlide = 0;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle("active", i === index);
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    // Set interval for auto-sliding (every 5 seconds)
    if (slides.length > 1) {
        setInterval(nextSlide, 5000);
    }
});
</script>

   <div class="containter_style">
     <div class="content_style">
        <h2>Trải nghiệm các loại phong cách khác nhau</h2>
          <div class="caption_style" >
         <p>“ Khám phá thế giới cà phê – Thưởng thức mọi phong cách! “</p>
         </div>
     </div>
   <div class=" styles row mt-4">
    <div class="style col-md-3">
        <a href="link_traditional.html" class="card-link">
            <div class="style_card">
                <img src="{{asset('frontend/images/tt.svg') }}" alt="Traditional Coffee Shop">
            </div>
        </a>
    </div>
    <div class="style col-md-3">
        <a href="link_traditional.html" class="card-link">
            <div class="style_card">
                <img src="{{asset('frontend/images/hd.svg') }}" alt="Traditional Coffee Shop">
            </div>
        </a>
    </div>
    <div class="style col-md-3">
        <a href="link_traditional.html" class="card-link">
            <div class="style_card">
                <img src="{{asset('frontend/images/cs.svg') }}" alt="Traditional Coffee Shop">
            </div>
        </a>
    </div>
    <div class="style col-md-3">
        <a href="link_traditional.html" class="card-link">
            <div class="style_card">
                <img src="{{asset('frontend/images/nm.svg') }}" alt="Traditional Coffee Shop">
            </div>
        </a>
    </div>
 </div>
   <!-- Các quán gần tôi ---------------------------------------------------------------------------------------->
   <div classs="container_nearmes">
      <h3 class="nearme_title"><i class="fas fa-map-marker-alt"></i> Gợi ý các quán gần đây</h3>
      <div class="row">
        <!-- Quán 1 -->
        <div class="col-md-3">
            <div class="nearme_card">
                <div class="position-relative">
                    <span class="badge-near">Gần tôi</span>
                    <img src="{{asset('frontend/images/img_slider1.jpg') }}" alt="Cà phê">
                </div>
                <div class="d-flex justify-content-between align-items-center mt-2">
                        <div class="rating">
                            ★★★☆☆
                        </div>
                        <button class="save-btn"><i class="far fa-heart"></i> Lưu Nè</button>
                    </div>
                   
                <div class="nearme_info">
                    <div class="row">
                        <div class="nearme_avata col-3 ">
                         <img src="{{asset('frontend/images/img_slider1.jpg') }}" alt="Avatar">
                        </div>
                        <div class="nearme_textinfo col-9">
                        <p class="nearme_name">NGÀY BÌNH YÊN</p>
                        <p class="nearme_details">
                            <span class="nearme_icon"><img src="{{ asset('frontend/images/mc.svg') }}" alt="Clock Icon"></span>
                            Open daily: 7:00 - 22:00
                        </p>
                        <p class="nearme_details">
                            <span class="nearme_icon"><img src="{{ asset('frontend/images/gia.svg') }}" alt="Price Icon"></span>
                            Price: 35k - 65k
                        </p>
                        <p class="nearme_details">
                            <span class="nearme_icon"><img src="{{ asset('frontend/images/đc.svg') }}" alt="Location Icon"></span>
                            Address: 75 Bùi Thị Xuân
                        </p>
                    </div>
                    </div>
                    
                </div>
                
            </div>
            
        </div>

@endsection

    