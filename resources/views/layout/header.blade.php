<header style="direction: ltr;">
    <div class="container">
        <div class="logo"><a href="/">GoAmaz</a></div>
        @if (request()->route()->uri == 'ar/login' || (request()->route()->uri == 'en/login' || request()->route()->uri == 'ar/register') || request()->route()->uri == 'en/register')

        @else
            <form method="POST" action="{{ route('search') }}" style="width: 400px;margin-right: 2%;">
                @csrf
                <div class="search search-desk">
                    <input type="text" name="search" placeholder="Search..." />
                    <button type="submit" style="border-radius: 0;" class="icon">
                        <img src="/icons/search.svg" />
                    </button>
                </div>
            </form>
        @endif
        <div class="lang">
            <div class="current-lang">{{ LaravelLocalization::getCurrentLocaleName() }}</div>
            <div class="lang-dropdown" style="z-index: 999;">
                <a href="{{ LaravelLocalization::getLocalizedURL('en') }}">
                    <div class="lang-choice @if (LaravelLocalization::getCurrentLocale() == 'en') active @endif">EN</div>
                </a>
                <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}">
                    <div class="lang-choice @if (LaravelLocalization::getCurrentLocale() == 'ar') active @endif">AR</div>
                </a>
            </div>
        </div>
        @if (Session::has('email'))
            <a href="/profile" class="profile">
                <div class="profile-image">
                    <img src="/images/2.jpg">
                </div>
            </a>
            <a href="/favorite" class="cart"><img src="/icons/favorite.svg" style="width: 25px;" /></a>
            <a href="/logout" style="margin-left: 1%">
                {{ __('home.signout') }}
            </a>
        @else
            <div class="links">
                <a href="/login">{{ __('home.signin') }}</a>
            </div>
            <a href="/favorite" class="cart"><img src="/icons/favorite.svg" style="width: 25px;" /></a>
        @endif
    </div>
    <div class="search-responsive-con">
        <div class="container">
            <div class="search search-responsive">
                <input type="text" placeholder="Search..." />
                <div class="icon">
                    <img src="/icons/search.svg" />
                </div>
            </div>
        </div>
    </div>

</header>
