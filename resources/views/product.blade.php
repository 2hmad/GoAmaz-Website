<!DOCTYPE html>
<html @if (LaravelLocalization::getCurrentLocale() == 'ar') dir="rtl" @endif lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layout/head')
    <title>GoAmaz - Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
</head>

<body>
    @include('layout/header')
    @include('layout/nav')
    <div class="page" style="background: white">
        <div class="container">
            <div class="product-page">
                <div class="product">
                    <div class="image-selector" @if (LaravelLocalization::getCurrentLocale() == 'ar') style="right:0;left:auto" @endif>
                        <img src="/images/1.jpg" alt="A1">
                        <img src="/images/3.jpg" alt="A1">
                    </div>
                    <div class="image">
                        <img src="/images/1.jpg" alt="A1">
                    </div>
                    <div class="details">
                        <div class="top-details">

                            <h1 class="title">Face Mask
                                <span><img src="/images/eg.webp" /></span>
                            </h1>
                            @if ($check)
                                <form method="POST"
                                    action="{{ route('destroy.favorite', [Request::route('id'), Session::get('email') ? Session::get('email') : $_SERVER['REMOTE_ADDR']]) }}">
                                    @csrf
                                    @method('delete')
                                    <button>{{ __('product.remove-from-favorite') }}</button>
                                </form>
                            @else
                                <form method="POST"
                                    action="{{ route('addfavorite', [Request::route('id'), Session::get('email') ? Session::get('email') : $_SERVER['REMOTE_ADDR']]) }}">
                                    @csrf
                                    <button>{{ __('product.add-to-favorite') }}</button>
                                </form>
                            @endif
                        </div>
                        <div class="stars">
                            <img src="/icons/star.svg" />
                            <img src="/icons/star.svg" />
                            <img src="/icons/star.svg" />
                            <img src="/icons/star.svg" />
                            <img src="/icons/star_half.svg" />
                            <span>4.5</span>
                        </div>
                        <div class="price">
                            <div>100</div>
                            <span>USD</span>
                        </div>
                        <div class="prices">
                            <div class="l-price">
                                <div>{{ __('product.lowest-price') }}</div>
                                <span
                                    style="display: flex;align-items: center;justify-content: center;flex-wrap: nowrap;">
                                    <img src="/icons/trending_up.svg" style="max-width: 30px">535.00
                                </span>
                            </div>
                            <div class="h-price">
                                <div>{{ __('product.highest-price') }}</div>
                                <span
                                    style="display: flex;align-items: center;justify-content: center;flex-wrap: nowrap;">
                                    <img src="/icons/trending_down.svg" style="max-width: 30px">1500
                                </span>
                            </div>
                            <div class="r-price">
                                <div>{{ __('product.latest-down') }}</div>
                                -12.8%
                            </div>
                        </div>

                        <div class="p-details">
                            <h3>{{ __('product.about-this-item') }}</h3>
                            <ul>
                                <li>Color: Black</li>
                                <li>Awesome Shoe</li>
                                <li>Unbreakable</li>
                                <li>Ass Best</li>
                                <li>Great</li>
                            </ul>
                        </div>

                    </div>
                    <div class="right-side">
                        <div class="advertise">
                            <img src="https://via.placeholder.com/250">
                        </div>
                        <div class="watch">
                            <h4>{{ __('product.amazon-price-watches') }}</h4>
                            <form method="POST" action="{{ route('addwatch', [1]) }}"
                                style="display: flex;flex-direction: column;gap: 9px;">
                                @csrf
                                @include('components/currencies')
                                <div style="display: flex;align-items: center;gap: 10px;">
                                    <input type="checkbox" name="send_email">
                                    <label>{{ __('product.send-an-email') }}</label>
                                </div>
                                <input type="email" name="email" placeholder="{{ __('product.send-an-email') }}">
                                <div style="display: flex;align-items: center;gap: 10px;">
                                    <input type="checkbox" name="send_phone">
                                    <label>{{ __('product.send-an-message') }}</label>
                                </div>
                                <input type="phone" id="phone" name="phone"
                                    placeholder="{{ __('product.send-an-message') }}">
                                <input type="submit" value="{{ __('product.subscribe') }}">
                                @if (\Session::has('watcher_added'))
                                    <div class="success-message">{{ \Session::get('watcher_added') }}</div>
                                @elseif(\Session::has('watcher_fail'))
                                    <div class="error-message">{{ \Session::get('watcher_fail') }}</div>
                                @endif
                            </form>
                            <div style="margin-top: 5%">
                                <!-- AddToAny BEGIN -->
                                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                    <a class="a2a_button_facebook"></a>
                                    <a class="a2a_button_twitter"></a>
                                    <a class="a2a_button_email"></a>
                                    <a class="a2a_button_linkedin"></a>
                                    <a class="a2a_button_pinterest"></a>
                                    <a class="a2a_button_facebook_messenger"></a>
                                </div>
                                <script async src="https://static.addtoany.com/menu/page.js"></script>
                                <!-- AddToAny END -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="other">
                    @include('components/othercard')
                    @include('components/othercard')
                    @include('components/othercard')
                    @include('components/othercard')
                </div>
                <div id="chartdiv"></div>
                <div class="reviews-container">
                    <div class="stats">
                        <h2>{{ __('product.customer-review') }}</h2>
                        <div class="stars-container">

                            <div class="stars">
                                <img src="/icons/star.svg" />
                                <img src="/icons/star.svg" />
                                <img src="/icons/star.svg" />
                                <img src="/icons/star.svg" />
                                <img src="/icons/star_half.svg" />
                            </div>
                            <div class="rate">4.5 {{ __('product.out-of') }} 5</div>
                        </div>
                        <h5>2 {{ __('product.customer-ratings') }}</h5>
                        <div class="all-progress">

                            <div class="progress">
                                <div>5 {{ __('product.stars') }}</div>
                                <div class="progress-bar">
                                    <div class="inner" style="width: 50%"></div>
                                </div>
                                <div>50%</div>
                            </div>

                            <div class="progress">
                                <div>4 {{ __('product.stars') }}</div>
                                <div class="progress-bar">
                                    <div class="inner" style="width: 50%"></div>
                                </div>
                                <div>50%</div>
                            </div>

                            <div class="progress">
                                <div>3 {{ __('product.stars') }}</div>
                                <div class="progress-bar">
                                    <div class="inner" style="width: 0%"></div>
                                </div>
                                <div>0%</div>
                            </div>

                            <div class="progress">
                                <div>2 {{ __('product.stars') }}</div>
                                <div class="progress-bar">
                                    <div class="inner" style="width: 0%"></div>
                                </div>
                                <div>0%</div>
                            </div>

                            <div class="progress">
                                <div>1 {{ __('product.stars') }}</div>
                                <div class="progress-bar">
                                    <div class="inner" style="width: 0%"></div>
                                </div>
                                <div>0%</div>
                            </div>
                        </div>

                        <form class="review-input">
                            <h2>{{ __('product.review-this-product') }}</h2>

                            <div class="stars">
                                <img src="/icons/star_outline.svg" />
                                <img src="/icons/star_outline.svg" />
                                <img src="/icons/star_outline.svg" />
                                <img src="/icons/star_outline.svg" />
                                <img src="/icons/star_outline.svg" />
                            </div>
                            <div class="first-row">
                                <div class="input-wrapper">

                                    <textarea name="review" rows="20"
                                        placeholder="{{ __('product.what-do-you-think') }}"></textarea>
                                </div>

                                <button>{{ __('product.review') }}</button>
                            </div>

                        </form>

                    </div>
                    <div class="reviews-content">

                        <div class="reviews">
                            @include('components/review')
                            @include('components/review')
                            @include('components/review')
                            @include('components/review')
                            @include('components/review')
                            @include('components/review')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout/footer')
    <script src="/js/product.js"></script>
</body>
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<script>
    am4core.ready(function() {
        am4core.useTheme(am4themes_animated);
        var chart = am4core.create("chartdiv", am4charts.XYChart);
        var data = [];
        var value = 50;
        for (var i = 0; i < 300; i++) {
            var date = new Date();
            date.setHours(0, 0, 0, 0);
            date.setDate(i);
            value -= Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
            data.push({
                date: date,
                value: value
            });
        }
        chart.data = data;
        var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
        dateAxis.renderer.minGridDistance = 60;
        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        var series = chart.series.push(new am4charts.LineSeries());
        series.dataFields.valueY = "value";
        series.dataFields.dateX = "date";
        series.tooltipText = "{value}"
        series.tooltip.pointerOrientation = "vertical";
        chart.cursor = new am4charts.XYCursor();
        chart.cursor.snapToSeries = series;
        chart.cursor.xAxis = dateAxis;
        chart.scrollbarX = new am4core.Scrollbar();
    });
</script>
<script>
    const phoneInputField = document.querySelector("#phone");
    const phoneInput = window.intlTelInput(phoneInputField, {
        hiddenInput: "full-phone",
        nationalMode: true,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
</script>

</html>
