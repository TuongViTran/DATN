<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CoffeeShopController;
use App\Http\Controllers\HomeController;
// Fontend --------------------------------------------
Route::get('/test-session', function () {
    Session::put('test_key', 'Hello Session');
    return 'Session đã được ghi!';
});
Route::get('/', [HomeController::class, 'index'])->name('home');
// Backend --------------------------------------------

Route::post('/like-shop/{id}', [CoffeeShopController::class, 'like'])->name('shop.like');



?>