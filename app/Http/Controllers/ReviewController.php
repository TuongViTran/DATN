<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'shop_id' => 'required|exists:coffeeshop,id',
        'content' => 'required|string',
        'rating' => 'required|integer|min:1|max:5',
        'img_url' => 'nullable|image|max:2048',
    ]);

    $review = new Review();
    $review->user_id = auth()->id();
    $review->shop_id = $request->shop_id;
    $review->content = $request->content;
    $review->rating = $request->rating;

    if ($request->hasFile('img_url')) {
        $path = $request->file('img_url')->store('reviews', 'public');
        $review->img_url = $path;
    }

    $review->save();

    return redirect()->back()->with('success', 'Đánh giá đã được gửi!');
}

}
