<!DOCTYPE html>
<html @if (LaravelLocalization::getCurrentLocale() == 'ar') dir="rtl" @endif lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layout/head')
    <title>GoAmaz</title>
</head>

<body style="background:#f6f6f8">
    @include('layout/header')
    @include('layout/nav')
    <div class="ad-728"></div>
    <div class="page">
        <div class="container">
            <div class="home-page">
                <div class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">

                        <!-- Slides -->
                        @foreach ($getAds as $ad)
                            <div class="swiper-slide">
                                <div class="home-card">
                                    <a href="{{ $ad->url }}">
                                        <div class="image">
                                            <img src="{{ $ad->image }}" alt="{{ $ad->title }}" />
                                        </div>
                                        <div class="title"><span class="ad-label">Ads</span>
                                            {{ $ad->title }}
                                        </div>
                                        <div class="price">
                                            <div class="currency">{{ $ad->currency }}</div>
                                            <div class="amount">{{ $ad->price }}</div>
                                            <div class="complment">00</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <!-- If we need pagination -->

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                </div>

                <div class="multi-item-grid">
                    @include('components/homecard2')
                    @include('components/homecard2')
                    @include('components/homecard2')
                    @include('components/homecard2')
                    @include('components/homecard2')
                </div>
                <div class="homeblocks">
                    @include('components/homeblock2')
                    @include('components/homeblock')
                    @include('components/homeblock2')
                </div>
                <div class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide">
                            @include('components/homecardtest')
                        </div>
                        <div class="swiper-slide">
                            @include('components/homecardtest')
                        </div>
                        <div class="swiper-slide">
                            @include('components/homecardtest')
                        </div>
                        <div class="swiper-slide">
                            @include('components/homecardtest')
                        </div>
                        <div class="swiper-slide">
                            @include('components/homecardtest')
                        </div>
                        <div class="swiper-slide">
                            @include('components/homecardtest')
                        </div>
                        <div class="swiper-slide">
                            @include('components/homecardtest')
                        </div>
                        <div class="swiper-slide">
                            @include('components/homecardtest')
                        </div>

                    </div>
                    <!-- If we need pagination -->

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                </div>
                <!-- Ad -->
                <div class="ad-728"></div>
                <!-- End Ad -->
                <div class="multi-item-grid">
                    @include('components/homecard2')
                    @include('components/homecard2')
                    @include('components/homecard2')
                    @include('components/homecard2')
                    @include('components/homecard2')
                </div>
                <div class="homeblocks">
                    @include('components/homeblock2')
                    @include('components/homeblock')
                    @include('components/homeblock')
                </div>
                <div class="multi-item-grid">
                    @include('components/homecard2')
                    @include('components/homecard2')
                    @include('components/homecard2')
                    @include('components/homecard2')
                    @include('components/homecard2')
                </div>

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
