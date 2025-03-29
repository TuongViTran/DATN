@extends('frontend.layout')
@section('title', 'Feed')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
    .user-avatar {
    width: 40px;
    height: 40px;
    object-fit: cover;
}

.review-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 13px;
}

.review-images {
    display: flex;
    gap: 5px;
    margin-top: 5px;
    overflow-x: auto;
}

.review-img {
    width: 70px;
    height: 70px;
    object-fit: cover;
    border-radius: 8px;
}

.card {
    transition: transform 0.2s ease-in-out;
    
}

.card:hover {
    transform: translateY(-5px);
}

.btn {
    font-size: 13px;
    padding: 5px 10px;
}
.td{
    display:flex;
    font-size:small;
    display:flex
}
.td span{
    font-size:small;
    margin-left:5px
}
.ft{
    font-size:13px
}

</style>

<div class="container mt-4">
    <div class="row">
        <!-- Danh sách review -->
        <div class="col-md-7">
            <h4 style="margin-bottom:20px"><strong>Xem review để chọn quán nè</strong></h4>
            @foreach ($reviews->items() as $review)
            
        <div class="card mb-1 p-3" style="border:none">
            <div class="d-flex align-items-center">
                <!-- Avatar người dùng -->
                <img src="https://surl.li/qroawz" style="width:50px;height:50px; margin-top:-15px" class="rounded-circle me-2" alt="User Avatar">
                <div>
                    <strong>{{ $review->user->full_name ?? 'Người dùng ẩn danh' }}</strong>
                    <span style="max-width: 30px; "> đang ở tại <strong >{{ $review->shop->shop_name ?? 'Người dùng ẩn danh' }}</strong>
                    </span>

                    <div style="display:flex">
                    <p class="text-muted small">{{ $review->created_at ? $review->created_at->format('d/m/Y') : 'Không có ngày' }}</p>&ensp;
                        <span style="margin-right:5px;margin-left:0px;" class="like-count ">{{ $review->likes_count }} </span>  lượt thích   <!-- Hiển thị số sao -->
                        <p class="text-warning" style="margin-left:25px;">    
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fa{{ $i <= $review->rating ? 's' : 'r' }} fa-star"></i>
                                @endfor
                        </p>

                        <button class="like-button" data-id="{{ $review->id }}" style="border: none; background: none; cursor: pointer; margin-top:-19px;position: relative; left: 200px; top:-23px">
                            ❤️ 
                        </button>
                    </div>
                </div>           
            </div>
            <!-- Nội dung đánh giá -->
            <p class="" style="margin-left:50px">{{ $review->content }}</p>

            <!-- Hiển thị ảnh đánh giá -->
            @if ($review->img_url)
                <div class="row ">
                    @foreach (explode(',', $review->img_url) as $img)
                        <div class="col-4" style="display:flex; ">
                            <img style="height:200px; width:200px; margin-right:15px" src="https://www.cotrang.org/tin-tuc/images/quan-cafe/da-nang/top-list/top-cafe-dep/quan-cafe-dep-da-nang-ttgt-01.jpg" class="img-fluid rounded" alt="Review Image">
                            <img style="height:200px; width:200px; margin-right:15px" src="https://www.cotrang.org/tin-tuc/images/quan-cafe/da-nang/top-list/top-cafe-dep/quan-cafe-dep-da-nang-ttgt-01.jpg" class="img-fluid rounded" alt="Review Image">
                            <img style="height:200px; width:200px; margin-right:15px" src="{{ asset($review->image_url) }}" class="img-fluid rounded" alt="Review Image">

                            <!-- <img src="{{asset('frontend/images/tt.svg') }}" class="img-fluid rounded" alt="Review Image"> -->

                        </div>
                    @endforeach
                </div>
            @endif
  
        
        </div>
    @endforeach

<!--  -->
   

<!--  -->


        </div>
        
        <!-- Sidebar phải -->
        <div class="col-md-5">
            <!-- Bảng tin -->
            <div class="card mb-3">
                <div class="card-header bg-light"><strong>Bảng tin DịchPhê</strong></div>
                <div class="card-body">
                    <ul class="list-unstyled">
                       

                    
                    </ul>
                </div>
            </div>
            
            <!-- Mã khuyến mãi -->
            <div class="card mb-3">
                <div class="card-header bg-light"><strong>Thu thập mã khuyến mãi</strong></div>
                <div class="card-body">
                   


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!--  -->




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.like-button').click(function() {
            let reviewId = $(this).data('id'); // Lấy ID của review
            let likeCount = $(this).siblings('.like-count'); // Vị trí hiển thị số lượt thích
            let button = $(this);

            $.ajax({
                url: `/review/${reviewId}/like`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}' // Token bảo mật Laravel
                },
                success: function(response) {
                    likeCount.text(response.likes); // Cập nhật số lượt thích
                    button.addClass('liked'); // Thêm hiệu ứng nếu cần
                },
                error: function() {
                    alert('Có lỗi xảy ra, vui lòng thử lại!');
                }
            });
        });
    });
</script>
