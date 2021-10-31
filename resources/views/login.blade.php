<!DOCTYPE html>
<html @if (LaravelLocalization::getCurrentLocale() == 'ar') dir="rtl" @endif lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layout/head')
    <title>GoAmaz - Login</title>
</head>

<body>
    @include('layout/header')

    <div class="page">
        <div class="container">
            <div class="auth-page">
                <form method="POST" action="{{ route('login-account') }}">
                    @csrf
                    <h1>{{ __('home.signin') }}</h1>
                    <input type="email" name="email" placeholder="{{ __('login.email') }}">
                    <input type="password" name="password" placeholder="{{ __('login.password') }}">
                    <div><input type="checkbox" name="remember" id="remember"><label for="remember">
                            {{ __('login.remember-me') }}</label>
                    </div>
                    <button type="submit" style="margin-top: 5%">{{ __('login.login') }}</button>
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                    @if (Session::has('fail-email'))
                        <div class="error-message">
                            {{ Session::get('fail-email') }}</div>
                    @endif
                    @if (Session::has('fail-password'))
                        <div class="error-message">
                            {{ Session::get('fail-password') }}</div>
                    @endif
                    <div class="login-social">
                        <a href="javascript:;" id="facebook-connect" onclick="openFacebook()"
                            title="Continue with Facebook">
                            <img class="facebook"
                                src="https://iconmonstr.com/wp-content/g/gd/makefg.php?i=../assets/preview/2012/png/iconmonstr-facebook-1.png&r=66&g=103&b=178">
                        </a>
                        <a href="javascript:;" id="google-connect" onclick="openGoogle()" title="Continue with Google">
                            <img class="google"
                                src="https://iconmonstr.com/wp-content/g/gd/makefg.php?i=../assets/preview/2012/png/iconmonstr-google-plus-1.png&r=219&g=68&b=55">
                        </a>
                    </div>
                </form>
                <div class="new">{{ __('login.new-goamaz') }}</div>
                <a href="/register"><button class="second">{{ __('login.create-account') }}</button></a>
            </div>
        </div>
    </div>
    @include('layout/footer')
</body>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144638050-2"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-144638050-2');
</script>
<script>
    function openFacebook() {
        var login = window.open(
            "{{ url('redirect/facebook') }}", 'popup', 'width=600,height=500,resizable=no')
        setTimeout(function() {
            login.close()
        }, 5000)
    }

    function openGoogle() {
        var login = window.open(
            "{{ url('redirect/google') }}", 'popup', 'width=600,height=500,resizable=no')
        setTimeout(function() {
            login.close()
        }, 5000)
    }
</script>

</html>
