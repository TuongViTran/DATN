<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
        .bounce {
            animation: bounce 1s infinite;
        }
        .bounce:nth-child(1) {
            animation-delay: 0s;
        }
        .bounce:nth-child(2) {
            animation-delay: 0.2s;
        }
        .bounce:nth-child(3) {
            animation-delay: 0.4s;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-white">
    <div class="flex flex-col md:flex-row bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Left Side -->
        <div class="flex flex-col items-center justify-center p-8 bg-[#fefcbf] md:w-1/2">
            <h1 class="text-2xl font-bold mb-4 text-center">
                Xin chào ! Chúng tôi hỗ trợ tìm kiếm quán cà phê
            </h1>
            <img alt="Illustration of a person making coffee" class="w-64 h-64" height="300" src="" width="300"/>
        </div>
        <!-- Right Side -->
        <div class="flex flex-col items-center justify-center p-8 md:w-1/2">
            <div class="flex items-center mb-6">
                <div class="w-4 h-4 bg-yellow-500 rounded-full mr-2 bounce"></div>
                <div class="w-4 h-4 bg-blue-500 rounded-full mr-2 bounce"></div>
                <div class="w-4 h-4 bg-red-500 rounded-full mr-2 bounce"></div>
                <h2 class="text-2xl font-bold">Cà Phê Đi Đâu ?</h2>
            </div>
            <h3 class="text-xl font-semibold mb-6">Đăng nhập</h3>
            <form class="w-full max-w-sm" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </span>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" placeholder="email@gmail.com" type="email" required/>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-lock text-gray-400"></i>
                        </span>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" placeholder="Enter your password" type="password" required/>
                    </div>
                </div>
                <div class="flex items-center justify-between mb-6">
                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('password.request') }}">Quên mật khẩu ?</a>
                </div>
                <div class="mb-6">
                    <button class="bg-[#f9c6a0] hover:bg-[#f9b58a] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full" type="submit">Đăng nhập</button>
                </div>
                <div class="flex items-center justify-center mb-4 space-x-16">
                    <a href="{{ url('auth/google') }}" class="btn btn-danger">
                        <i class="fab fa-google"></i>
                    </a>

                    <a href="{{ url('auth/facebook') }}" class="btn btn-primary">
                        <i class="fab fa-facebook"></i>
                    </a>

                    <a href="{{ url('auth/apple') }}" class="btn btn-dark">
                        <i class="fab fa-apple"></i>
                    </a>
                </div>
                <div class="text-center">
                    <span class="text-gray-500">Chưa có tài khoản?</span>
                    <a class="font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('register') }}">Đăng ký ngay</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
