<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', Rule::in(['user', 'owner', 'admin'])],
            'phone' => ['required', 'string', 'max:15'],
            'avatar_url' => ['nullable', 'image', 'max:2048'], // Thêm quy tắc xác thực cho trường avatar_url
        ]);
    
        // Khởi tạo mảng dữ liệu người dùng
        $userData = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'account_type' => 'user',
            'role' => $request->role,
            'phone' => $request->phone,
        ];
    
        // Xử lý ảnh nếu có
        if ($request->hasFile('avatar_url')) {
            $avatarPath = $request->file('avatar_url')->store('avatars', 'public'); // Lưu ảnh vào thư mục public/avatars
            $userData['avatar_url'] = $avatarPath; // Lưu đường dẫn ảnh vào mảng dữ liệu người dùng
        }
    
        // Tạo người dùng với dữ liệu đã bao gồm avatar_url
        $user = User::create($userData);
    
        event(new Registered($user));
    
        Auth::login($user);
        if ($user->role === 'admin') {
            return redirect()->route('dashboard')->with('success', 'Đăng ký thành công! Chào mừng Admin.');
        } elseif ($user->role === 'owner') {
            return redirect()->route('cafes_management')->with('success', 'Đăng ký thành công! Chào mừng chủ quán.');
        } else {
            return redirect()->route('home')->with('success', 'Đăng ký thành công! Chào mừng bạn.');
        }
    }

    protected function authenticated(Request $request, $user)
{
    return redirect(session()->pull('url.intended', route('home')));
}
}