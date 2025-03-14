<?php

namespace App\Http\Controllers;

use App\Models\CoffeeShop;
use Illuminate\Http\Request;

class CoffeeShopController extends Controller
{
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



