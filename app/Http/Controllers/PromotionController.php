<?php


namespace App\Http\Controllers;

use App\Models\Promotion; // Nếu bạn sử dụng model Promotion
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::all();
        return view('promotions.index', compact('promotions'));
    }
}