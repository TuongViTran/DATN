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
            'phone' => 'required|string|max:15',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', Rule::in(['user', 'owner',])],
            'gender' => ['required', Rule::in(['male', 'female'])], // Thêm validation cho giới tính
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Chọn avatar mặc định dựa trên giới tính
        $defaultAvatar  = $request->gender === 'male' 
            ? 'frontend/images/default_avatar.jpg' 
            : 'frontend/images/default_avatar1.jpg';

        $user = User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'account_type' => 'user',
            'role' => $request->role,
            'gender' => $request->gender,
            'avatar' => $defaultAvatar, // Gán avatar mặc định
        ]);
        // Xử lý ảnh nếu có
     
    
        event(new Registered($user));
    
        Auth::login($user);
        if ($user->role === 'owner') {
            return redirect()->route('cafes_management')->with('success', 'Đăng ký thành công! Chào mừng chủ quán.');
        }

        return redirect()->route('home')->with('success', 'Đăng ký thành công! Chào mừng bạn.');

    }

    protected function authenticated(Request $request, $user)
{
    return redirect(session()->pull('url.intended', route('home')));
}

}
