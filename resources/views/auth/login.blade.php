<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Hexavara Admin</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans min-h-screen flex items-center justify-center bg-slate-950 text-slate-100">
    <div class="bg-slate-800 rounded-2xl px-10 py-12 w-full max-w-[420px] mx-5 shadow-2xl shadow-black/50">
        <div class="text-center mb-8">
            <img src="{{ asset('assets/img/ChatGPT Image 26 Feb 2026, 11.24.32.png') }}" alt="Hexavara" class="h-14 w-auto mx-auto" />
        </div>
        <h1 class="text-2xl font-bold text-center mb-2">Welcome Back</h1>
        <p class="text-sm text-slate-400 text-center mb-8">Sign in to access admin dashboard</p>

        @if($errors->any())
        <div class="bg-red-950 text-red-300 px-4 py-2.5 rounded-lg text-sm mb-5">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-5">
                <label for="email" class="block text-sm font-medium text-slate-300 mb-1.5">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="admin@gmail.com" class="w-full px-4 py-3 rounded-[10px] border border-slate-700 bg-slate-950 text-slate-100 text-[15px] font-[inherit] outline-none transition-colors duration-200 focus:border-blue-600 placeholder:text-slate-500" />
            </div>
            <div class="mb-5">
                <label for="password" class="block text-sm font-medium text-slate-300 mb-1.5">Password</label>
                <input type="password" id="password" name="password" required placeholder="••••••••" class="w-full px-4 py-3 rounded-[10px] border border-slate-700 bg-slate-950 text-slate-100 text-[15px] font-[inherit] outline-none transition-colors duration-200 focus:border-blue-600 placeholder:text-slate-500" />
            </div>
            <div class="flex items-center justify-between mb-6">
                <label class="flex items-center gap-2 text-sm text-slate-400 cursor-pointer">
                    <input type="checkbox" name="remember" class="accent-blue-600 size-4" /> Remember me
                </label>
            </div>
            <button type="submit" class="w-full py-3.5 border-none rounded-[10px] bg-blue-600 text-white text-base font-semibold font-[inherit] cursor-pointer transition-colors duration-200 hover:bg-blue-700">Sign In</button>
        </form>
        <a href="{{ route('home') }}" class="block text-center mt-6 text-slate-500 text-sm no-underline hover:text-slate-400 transition-colors duration-150">&larr; Back to Homepage</a>
    </div>
</body>
</html>
