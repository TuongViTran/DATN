<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\CoffeeShop;

class HomeController extends Controller
{
    // Hiển thị trang chủ với slider và danh sách quán cà phê
    public function index()
    {
        // Lấy các bài viết cho slider
        $sliderPosts = Post::orderBy('created_at', 'desc')->take(5)->get();

        // Lấy danh sách các quán cà phê phổ biến kèm địa chỉ và số like
        $shops = CoffeeShop::with('address')
            ->withCount('likes')
            ->get()
            ->map(function($shop) {
                $shop->liked = auth()->check() && $shop->likes()->where('user_id', auth()->id())->exists();
                return $shop;
            });

        // Lấy danh sách bài viết cùng user tạo bài viết đó
        $posts = Post::with('user')
            ->where('status', 'Published')
            ->orderBy('created_at', 'desc')
            ->get();

        // Trả về view và truyền dữ liệu sang
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
