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
                    @foreach ($getOffersOne as $offer)
                        <div class="home-card">
                            <a href="/product/{{ $offer->asin }}">
                                <div class="image">
                                    <img src="{{ $offer->img }}" alt="A" />
                                </div>
                                <div class="title">{{ $offer->title }}</div>
                                <div class="stars">
                                    @if (number_format($offer->reviews, 0) == 5)
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                    @elseif(number_format($offer->reviews, 0) == 4)
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                    @elseif(number_format($offer->reviews, 0) == 3)
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                    @elseif(number_format($offer->reviews, 0) == 2)
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                    @elseif(number_format($offer->reviews, 0) == 1)
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                    @else
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                    @endif
                                </div>
                                <div class="price">
                                    <div class="currency">USD</div>
                                    <div class="amount">{{ $offer->price }}</div>
                                    {{-- <div class="complment">00</div> --}}
                                </div>
                            </a>
                            {{-- @include('components/country') --}}
                        </div>
                    @endforeach
                </div>
                <div class="homeblocks">

                    <div class="homeblock">
                        <div class="title">{{ __('home.clothes') }}</div>
                        <div class="images">
                            <div class="row">
                                <div class="image">
                                    <img src="https://images-na.ssl-images-amazon.com/images/G/01/AmazonExports/Fuji/2020/May/Dashboard/Fuji_Dash_WomenFashion_Sweatshirt_Quad_Cat_1x._SY116_CB418609101_.jpg"
                                        alt="Sweatshirts">
                                </div>
                                <div class="image">
                                    <img src="https://images-na.ssl-images-amazon.com/images/G/01/AmazonExports/Fuji/2020/May/Dashboard/Fuji_Dash_WomenFashion_Joggers_Quad_Cat_1x._SY116_CB418608748_.jpg"
                                        alt="Joggers">
                                </div>
                            </div>
                            <div class="row">
                                <div class="image">
                                    <img src="https://images-na.ssl-images-amazon.com/images/G/01/AmazonExports/Fuji/2020/May/Dashboard/Fuji_Dash_WomenFashion_Cardigans_Quad_Cat_1x._SY116_CB418608722_.jpg"
                                        alt="Cardigans">
                                </div>
                                <div class="image">
                                    <img src="https://images-na.ssl-images-amazon.com/images/G/01/AmazonExports/Fuji/2020/May/Dashboard/Fuji_Dash_WomenFashion_Tees_Quad_Cat_1x._SY116_CB418608878_.jpg"
                                        alt="A">
                                </div>
                            </div>
                        </div>
                        <a
                            href="https://www.amazon.com/gp/browse.html?node=16225018011&pf_rd_r=9Q4QA2CPPXSKQ01AT4K8&pf_rd_p=2ee4d9ee-1547-4179-9a86-f49e1aa6546c&pd_rd_r=658b23ea-b286-4bdd-834c-09ce20a0cf74&pd_rd_w=tILN3&pd_rd_wg=6wwSY&ref_=pd_gw_unk">{{ __('home.explore-now') }}</a>
                    </div>

                    <div class="homeblock">
                        <div class="title">{{ __('home.black-friday-deals') }}</div>
                        <img src="https://images-na.ssl-images-amazon.com/images/G/01/AmazonExports/Fuji/2021/October/EarlyBF/Fuji_Dash_EBF_1X_v2._SY304_CB653874737_.jpg"
                            alt="Black friday deals on Amazon">
                        <a
                            href="https://www.amazon.com/events/earlyblackfriday?ref_=nav_cs_gb_5d8ef71f209b44c2acab6343d6a5a05e&pf_rd_r=BWSXZEEJ7XXPGRS0H8RV&pf_rd_p=9a6c0d73-7822-49b7-81fa-791f25f9455c&pd_rd_r=d7b330a2-edeb-4366-a2ec-23cc58d28357&pd_rd_w=jhRib&pd_rd_wg=SEOHY">{{ __('home.show-now') }}</a>
                    </div>

                    <div class="homeblock">
                        <div class="title">{{ __('home.shopping') }}</div>
                        <div class="images">
                            <div class="row">
                                <div class="image">
                                    <img src="https://images-na.ssl-images-amazon.com/images/G/01/AmazonExports/Fuji/2019/February/Dashboard/computer120x._SY85_CB468850970_.jpg"
                                        alt="Computers">
                                </div>
                                <div class="image">
                                    <img src="https://images-na.ssl-images-amazon.com/images/G/01/AmazonExports/Fuji/2019/August/DashboardCard/PS4_120X._SY85_CB438749318_.jpg"
                                        alt="PlayStation">
                                </div>
                            </div>
                            <div class="row">
                                <div class="image">
                                    <img src="https://images-na.ssl-images-amazon.com/images/G/01/AmazonExports/Fuji/2019/February/Dashboard/Baby120X._SY85_CB468850882_.jpg"
                                        alt="Childrens">
                                </div>
                                <div class="image">
                                    <img src="https://images-na.ssl-images-amazon.com/images/G/01/AmazonExports/Fuji/2019/February/Dashboard/Toys120X._SY85_CB468851693_.jpg"
                                        alt="Toys">
                                </div>
                            </div>
                        </div>
                        <a
                            href="https://www.amazon.com/-/ar/b?node=17938598011&pf_rd_r=BWSXZEEJ7XXPGRS0H8RV&pf_rd_p=f4c99c2c-2128-4a44-b52e-ae53b811e48f&pd_rd_r=d7b330a2-edeb-4366-a2ec-23cc58d28357&pd_rd_w=rhIBV&pd_rd_wg=SEOHY&ref_=pd_gw_unk">{{ __('home.explore-now') }}</a>
                    </div>

                </div>
                <div class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach ($getOffersCarousel as $offer)
                            <div class="swiper-slide">
                                <div class="home-card">
                                    <a href="/product/{{ $offer->asin }}">
                                        <div class="image">
                                            <img src="{{ $offer->img }}" alt="{{ $offer->title }}" />
                                        </div>
                                        <div class="title">{{ $offer->title }}</div>
                                        <div class="stars">
                                            @if (number_format($offer->reviews, 0) == 5)
                                                <img src="{{ asset('public/icons/star.svg') }}" />
                                                <img src="{{ asset('public/icons/star.svg') }}" />
                                                <img src="{{ asset('public/icons/star.svg') }}" />
                                                <img src="{{ asset('public/icons/star.svg') }}" />
                                                <img src="{{ asset('public/icons/star.svg') }}" />
                                            @elseif(number_format($offer->reviews, 0) == 4)
                                                <img src="{{ asset('public/icons/star.svg') }}" />
                                                <img src="{{ asset('public/icons/star.svg') }}" />
                                                <img src="{{ asset('public/icons/star.svg') }}" />
                                                <img src="{{ asset('public/icons/star.svg') }}" />
                                                <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                            @elseif(number_format($offer->reviews, 0) == 3)
                                                <img src="{{ asset('public/icons/star.svg') }}" />
                                                <img src="{{ asset('public/icons/star.svg') }}" />
                                                <img src="{{ asset('public/icons/star.svg') }}" />
                                                <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                                <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                            @elseif(number_format($offer->reviews, 0) == 2)
                                                <img src="{{ asset('public/icons/star.svg') }}" />
                                                <img src="{{ asset('public/icons/star.svg') }}" />
                                                <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                                <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                                <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                            @elseif(number_format($offer->reviews, 0) == 1)
                                                <img src="{{ asset('public/icons/star.svg') }}" />
                                            @else
                                                <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                                <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                                <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                                <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                                <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                            @endif
                                        </div>
                                        <div class="price">
                                            <div class="currency">USD</div>
                                            <div class="amount">{{ $offer->price }}</div>
                                            {{-- <div class="complment">00</div> --}}
                                        </div>
                                    </a>
                                    {{-- @include('components/country') --}}
                                </div>
                            </div>
                        @endforeach
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
                    @foreach ($getOffersTwo as $offer)
                        <div class="home-card">
                            <a href="/product/{{ $offer->asin }}">
                                <div class="image">
                                    <img src="{{ $offer->img }}" alt="A" />
                                </div>
                                <div class="title">{{ $offer->title }}</div>
                                <div class="stars">
                                    @if (number_format($offer->reviews, 0) == 5)
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                    @elseif(number_format($offer->reviews, 0) == 4)
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                    @elseif(number_format($offer->reviews, 0) == 3)
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                    @elseif(number_format($offer->reviews, 0) == 2)
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                    @elseif(number_format($offer->reviews, 0) == 1)
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                    @else
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                    @endif
                                </div>
                                <div class="price">
                                    <div class="currency">USD</div>
                                    <div class="amount">{{ $offer->price }}</div>
                                    {{-- <div class="complment">00</div> --}}
                                </div>
                            </a>
                            {{-- @include('components/country') --}}
                        </div>
                    @endforeach
                </div>
                <div class="homeblocks">

                    <div class="homeblock">
                        <div class="title">{{ __('home.clothes') }}</div>
                        <div class="images">
                            <div class="row">
                                <div class="image">
                                    <img src="https://images-na.ssl-images-amazon.com/images/G/01/AmazonExports/Fuji/2020/May/Dashboard/Fuji_Dash_WomenFashion_Sweatshirt_Quad_Cat_1x._SY116_CB418609101_.jpg"
                                        alt="Sweatshirts">
                                </div>
                                <div class="image">
                                    <img src="https://images-na.ssl-images-amazon.com/images/G/01/AmazonExports/Fuji/2020/May/Dashboard/Fuji_Dash_WomenFashion_Joggers_Quad_Cat_1x._SY116_CB418608748_.jpg"
                                        alt="Joggers">
                                </div>
                            </div>
                            <div class="row">
                                <div class="image">
                                    <img src="https://images-na.ssl-images-amazon.com/images/G/01/AmazonExports/Fuji/2020/May/Dashboard/Fuji_Dash_WomenFashion_Cardigans_Quad_Cat_1x._SY116_CB418608722_.jpg"
                                        alt="Cardigans">
                                </div>
                                <div class="image">
                                    <img src="https://images-na.ssl-images-amazon.com/images/G/01/AmazonExports/Fuji/2020/May/Dashboard/Fuji_Dash_WomenFashion_Tees_Quad_Cat_1x._SY116_CB418608878_.jpg"
                                        alt="A">
                                </div>
                            </div>
                        </div>
                        <a
                            href="https://www.amazon.com/gp/browse.html?node=16225018011&pf_rd_r=9Q4QA2CPPXSKQ01AT4K8&pf_rd_p=2ee4d9ee-1547-4179-9a86-f49e1aa6546c&pd_rd_r=658b23ea-b286-4bdd-834c-09ce20a0cf74&pd_rd_w=tILN3&pd_rd_wg=6wwSY&ref_=pd_gw_unk">{{ __('home.explore-now') }}</a>
                    </div>

                    <div class="homeblock" style="width: 330px;">
                        <div class="title">{{ __('home.shopping-laptops') }}</div>
                        <img src="https://images-na.ssl-images-amazon.com/images/G/01/AmazonExports/Fuji/2020/May/Dashboard/Fuji_Dash_Laptops_379x304_1X_en_US._SY304_CB418608471_.jpg"
                            alt="Shopping laptops on Amazon">
                        <a
                            href="https://www.amazon.com/-/ar/s?bbn=16225007011&rh=n%3A16225007011%2Cn%3A13896617011&fst=as%3Aoff&qid=1602294815&rnid=16225007011&pf_rd_r=HPYVWZXARC8AR3971M0B&pf_rd_p=7b56b037-2145-4f6f-9418-dec0c2809586&pd_rd_r=f8857516-da02-4497-ac31-1c37425a3189&pd_rd_w=QCq8C&pd_rd_wg=u3BmH&ref_=pd_gw_unk">{{ __('home.show-now') }}</a>
                    </div>

                    <div class="homeblock">
                        <div class="title">{{ __('home.light-bar') }}</div>
                        <img src="https://images-na.ssl-images-amazon.com/images/G/01/AmazonExports/Fuji/2020/May/Dashboard/Fuji_Dash_StripLighting_379x304_1X_en_US._SY304_CB418597476_.jpg"
                            alt="Create with light bar on Amazon">
                        <a
                            href="https://www.amazon.com/-/ar/s?k=strip+lighting&pf_rd_r=HPYVWZXARC8AR3971M0B&pf_rd_p=6c2e6ac5-67ba-4130-941a-c2da8bd7140d&pd_rd_r=f8857516-da02-4497-ac31-1c37425a3189&pd_rd_w=twsze&pd_rd_wg=u3BmH&ref_=pd_gw_unk">{{ __('home.show-now') }}</a>
                    </div>

                </div>
                <div class="multi-item-grid">
                    @foreach ($getOffersThree as $offer)
                        <div class="home-card">
                            <a href="/product/{{ $offer->asin }}">
                                <div class="image">
                                    <img src="{{ $offer->img }}" alt="A" />
                                </div>
                                <div class="title">{{ $offer->title }}</div>
                                <div class="stars">
                                    @if (number_format($offer->reviews, 0) == 5)
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                    @elseif(number_format($offer->reviews, 0) == 4)
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                    @elseif(number_format($offer->reviews, 0) == 3)
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                    @elseif(number_format($offer->reviews, 0) == 2)
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                    @elseif(number_format($offer->reviews, 0) == 1)
                                        <img src="{{ asset('public/icons/star.svg') }}" />
                                    @else
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                        <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                    @endif
                                </div>
                                <div class="price">
                                    <div class="currency">USD</div>
                                    <div class="amount">{{ $offer->price }}</div>
                                    {{-- <div class="complment">00</div> --}}
                                </div>
                            </a>
                            {{-- @include('components/country') --}}
                        </div>
                    @endforeach
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
