{{ Hash::make('123456789') }}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/scss/main.css') }}">
</head>

<body>
    <div class="login-container">
        <div class="card">
            <h1>دخول لوحة التحكم</h1>
            <form method="POST" action="{{ route('checkAdmin') }}">
                @csrf
                <input type="email" name="email" placeholder="البريد الالكتروني">
                <input type="password" name="password" placeholder="كلمة المرور">
                <div style="direction: rtl">
                    <input type="checkbox" name="remember" id="remember"> <label for="remember">تذكر معلومات
                        الدخول</label>
                </div>
                <input type="submit" name="login" value="الدخول">
                @if (Session::has('error'))
                    <div class="error-message">{{ Session::get('error') }}</div>
                @endif
            </form>
        </div>
    </div>
</body>

</html>
