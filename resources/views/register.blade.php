<!DOCTYPE html>
<html @if (LaravelLocalization::getCurrentLocale() == 'ar') dir="rtl" @endif lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layout/head')
    <title>GoAmaz - Register</title>
</head>

<body>
    @include('layout/header')
    <div class="page">
        <div class="container">
            <div class="auth-page">
                <form method="POST" action="{{ route('register-acc') }}">
                    <h1>{{ __('register.register') }}</h1>
                    @csrf
                    <input type="text" name="name" placeholder="{{ __('register.your-name') }}">
                    <input type="email" name="email" placeholder="{{ __('register.email-address') }}">
                    <input type="text" name="phone" placeholder="{{ __('register.mobile') }}">
                    <input type="password" name="password" placeholder="{{ __('register.password') }}">
                    <input type="password" name="confirm_password"
                        placeholder="{{ __('register.confirm-password') }}">
                    <button type="submit">{{ __('register.signup') }}</button>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="error-message">{{ $error }}</div>
                        @endforeach
                    @endif
                    @if (Session::has('success'))
                        <div class="success-message">{{ Session::get('success') }}</div>
                    @endif
                </form>
                <div class="new">{{ __('register.have-account') }}</div>
                <a href="/login"><button class="second">{{ __('login.login') }}</button></a>
            </div>
        </div>
    </div>
    @include('layout/footer')
</body>

</html>
