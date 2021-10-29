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
                    <input type="email" name="email" placeholder="Email">
                    <input type="password" name="password" placeholder="Password">
                    <div><input type="checkbox" name="remember" id="remember"><label for="remember"> Remember me</label>
                    </div>
                    <button type="submit" style="margin-top: 5%">Login</button>
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
                        <a href="{{ url('redirect/facebook') }}" id="facebook-connect" title="Continue with Facebook">
                            <img class="facebook"
                                src="https://iconmonstr.com/wp-content/g/gd/makefg.php?i=../assets/preview/2012/png/iconmonstr-facebook-1.png&r=66&g=103&b=178">
                        </a>
                        <a href="{{ url('redirect/google') }}" id="google-connect" title="Continue with Google">
                            <img class="google"
                                src="https://iconmonstr.com/wp-content/g/gd/makefg.php?i=../assets/preview/2012/png/iconmonstr-google-plus-1.png&r=219&g=68&b=55">
                        </a>
                    </div>
                </form>
                <div class="new">New to GoAmaz?</div>
                <a href="/register"><button class="second">Create GoAmaz account</button></a>
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

</html>
