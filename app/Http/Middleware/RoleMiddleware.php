<?php

// app/Http/Middleware/RoleMiddleware.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Kiểm tra nếu người dùng đã đăng nhập và có role hợp lệ
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);  // Tiếp tục xử lý request nếu role hợp lệ
        }

        return redirect()->route('home');  // Nếu không có quyền, chuyển hướng về trang chủ
    }
}

