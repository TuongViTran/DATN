<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\CoffeeShop;

class HomeController extends Controller
{
    // Hiển thị các trang chính
    public function trangchu() {
        return $this->index();  // Gọi luôn hàm index cho gọn
    }

    public function feed() {
        return view('frontend.feed');
    }

    public function tintuc() {
        return view('frontend.tintuc');
    }

    public function thongbao() {
        return view('frontend.thongbao');
    }
    public function user() {
        return view('frontend.user');
    }

    // Hàm chính xử lý dữ liệu trang chủ
    public function index() {
        // Lấy bài viết cho slider và bài viết thường
        $posts = Post::with('user')
            ->where('status', 'Published')
            ->orderBy('created_at', 'desc')
            ->get();

        $sliderPosts = $posts->take(5);

        // Lấy danh sách quán cà phê kèm địa chỉ, số like, trạng thái like của người dùng
        $shops = CoffeeShop::with('address')
            ->withCount('likes')
            ->get()
            ->each(function ($shop) {
                $shop->liked = auth()->check() && $shop->likes()->where('user_id', auth()->id())->exists();
            });

        // Trả về view và truyền dữ liệu
        return view('frontend.trangchu', compact('sliderPosts', 'shops', 'posts'));
    }
     // Xử lý like hoặc bỏ like
     public function like($id)
     {
         $shop = CoffeeShop::findOrFail($id);
         $user = auth()->user();
 
         if ($shop->likes()->where('user_id', $user->id)->exists()) {
             $shop->likes()->where('user_id', $user->id)->delete();
             $liked = false;
         } else {
             $shop->likes()->create(['user_id' => $user->id]);
             $liked = true;
         }
 
         return response()->json([
             'liked' => $liked,
             'likes' => $shop->likes()->count(),
         ]);
     }
}


   

