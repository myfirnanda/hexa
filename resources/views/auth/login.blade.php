<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Hexavara Admin</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" />
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: "Inter", sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #0f172a;
            color: #f1f5f9;
        }
        .login-card {
            background: #1e293b;
            border-radius: 16px;
            padding: 48px 40px;
            width: 100%;
            max-width: 420px;
            margin: 20px;
            box-shadow: 0 25px 50px -12px rgba(0,0,0,0.5);
        }
        .login-logo {
            text-align: center;
            margin-bottom: 32px;
        }
        .login-logo img {
            height: 56px;
            width: auto;
        }
        .login-title {
            font-size: 24px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 8px;
        }
        .login-subtitle {
            font-size: 14px;
            color: #94a3b8;
            text-align: center;
            margin-bottom: 32px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #cbd5e1;
            margin-bottom: 6px;
        }
        .form-group input {
            width: 100%;
            padding: 12px 16px;
            border-radius: 10px;
            border: 1px solid #334155;
            background: #0f172a;
            color: #f1f5f9;
            font-size: 15px;
            font-family: inherit;
            outline: none;
            transition: border-color 0.2s;
        }
        .form-group input:focus {
            border-color: #2563eb;
        }
        .form-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }
        .remember-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: #94a3b8;
            cursor: pointer;
        }
        .remember-label input {
            accent-color: #2563eb;
            width: 16px;
            height: 16px;
        }
        .login-btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: #2563eb;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .login-btn:hover { background: #1d4ed8; }
        .error-msg {
            background: #7f1d1d;
            color: #fca5a5;
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 20px;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 24px;
            color: #64748b;
            font-size: 14px;
            text-decoration: none;
        }
        .back-link:hover { color: #94a3b8; }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-logo">
            <img src="{{ asset('assets/img/ChatGPT Image 26 Feb 2026, 11.24.32.png') }}" alt="Hexavara" />
        </div>
        <h1 class="login-title">Welcome Back</h1>
        <p class="login-subtitle">Sign in to access admin dashboard</p>

        @if($errors->any())
        <div class="error-msg">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="admin@gmail.com" />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="••••••••" />
            </div>
            <div class="form-row">
                <label class="remember-label">
                    <input type="checkbox" name="remember" /> Remember me
                </label>
            </div>
            <button type="submit" class="login-btn">Sign In</button>
        </form>
        <a href="{{ route('home') }}" class="back-link">&larr; Back to Homepage</a>
    </div>
</body>
</html>
