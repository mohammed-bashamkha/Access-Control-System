<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - نظام إدارة المستخدمين</title>

    <!-- Cairo Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md px-4">
        <div class="bg-white rounded-2xl shadow-xl p-8">

            <!-- Logo / Title -->
            <div class="text-center mb-8">
                <div class="mx-auto mb-4 w-14 h-14 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center">
                    <!-- Shield Icon -->
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M12 3l8 4v5c0 5-3.5 9-8 9s-8-4-8-9V7l8-4z" />
                    </svg>
                </div>

                <h1 class="text-2xl font-bold text-gray-800 mb-1">
                    نظام إدارة المستخدمين
                </h1>
                <p class="text-gray-500 text-sm">
                    تسجيل الدخول للوصول حسب الصلاحيات
                </p>
            </div>

            <!-- Login Form -->
            <form action="{{ route('login') }}" method="POST">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        البريد الإلكتروني
                    </label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        placeholder="example@email.com"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300
                               focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition"
                    >
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        كلمة المرور
                    </label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        required
                        placeholder="********"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300
                               focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition"
                    >
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit -->
                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold
                           py-3 rounded-lg transition-colors mb-4">
                    تسجيل الدخول
                </button>

                <!-- Register -->
                <div class="text-center text-sm text-gray-600">
                    نسيت كلمة السر
                    <a href="#" class="text-blue-600 hover:text-blue-700 font-semibold">
                        تغيير كلمة السر
                    </a>
                </div>

            </form>
        </div>
    </div>

</body>
</html>