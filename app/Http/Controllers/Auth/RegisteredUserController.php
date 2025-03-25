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
        ]);

        $user = User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'account_type' => 'user', // Thêm giá trị mặc định
            'role' => $request->role,
        ]);

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
}
