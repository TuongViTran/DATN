<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CoffeeShopController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\CafeManagementController;
use App\Http\Controllers\OwnerController;


// Fontend --------------------------------------------
Route::get('/test-session', function () {
    Session::put('test_key', 'Hello Session');
    return 'Session đã được ghi!';
});

Route::get('/', [HomeController::class, 'index'])->name('home');

// Backend --------------------------------------------

Route::post('/like-shop/{id}', [CoffeeShopController::class, 'like'])->name('shop.like');

Route::get('/dashboard', function () {
    return view('backend.admin.dashboard'); // Chỉ định đường dẫn đầy đủ đến view
})->name('dashboard');

// User Management Routes
Route::prefix('user-management')->name('user.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('management'); // Hiển thị danh sách người dùng
    Route::get('/create', [UserController::class, 'create'])->name('create'); // Hiển thị form thêm mới người dùng
    Route::post('/', [UserController::class, 'store'])->name('store'); // Lưu người dùng mới
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit'); // Hiển thị form chỉnh sửa người dùng
    Route::put('/{user}', [UserController::class, 'update'])->name('update'); // Cập nhật người dùng
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy'); // Xóa người dùng
    Route::get('/{user}', [UserController::class, 'show'])->name('show'); // Hiển thị thông tin người dùng
});

// Định nghĩa route cho trang quản lý quán cà phê
Route::get('/coffeeshops', [CoffeeShopController::class, 'index'])->name('coffeeshops_management');
Route::get('/promotions', [PromotionController::class, 'index'])->name('promotions_management');
// Định nghĩa resource cho quản lý quán cà phê
Route::resource('cafes', CafeManagementController::class);


Route::get('/cafes_management', [CafeManagementController::class, 'index'])->name('cafes_management');

// Điều hướng trang cá nhân đến trang chỉnh sửa
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', function () {
        return redirect()->route('profile.edit'); // Điều hướng về trang chỉnh sửa
    })->name('profile');

    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::delete('/profile', [UserController::class, 'destroyProfile'])->name('profile.destroy'); 
});
require __DIR__.'/auth.php';


// Owner Management Routes
Route::get('/owner/{id}', [CoffeeShopController::class, 'show']);

Route::get('/owner/{id}', [OwnerController::class, 'owner'])->name('owner'); // lấy thông tin của chủ quán
Route::get('/owner/{id}', [OwnerController::class, 'showByOwner'])->name('owner.coffeeshop'); //hiển thị quán cafe theo id của chủ quán
Route::put('/menu/update/{id}', [OwnerController::class, 'update'])->name('menu.update'); // cập nhật menu
Route::get('/owner/{id}', [OwnerController::class, 'infor'])->name('coffeeshop.owner'); // lấy thông tin quán cafe
Route::put('/owner/update/{id}', [OwnerController::class, 'updateinfor'])->name('owner.updateinfor'); // cập nhật thông tin quán cafe
