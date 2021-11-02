<!DOCTYPE html>
<html @if (LaravelLocalization::getCurrentLocale() == 'ar') dir="rtl" @endif lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layout/head')
    <title>GoAmaz - Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <style>
        #currency {
            width: 125px;
        }

        div.stars {
            direction: rtl;
            justify-content: flex-end;
        }

        input.star {
            display: none;
        }

        label.star {
            float: right;
            padding: 10px;
            font-size: 20px;
            transition: all .2s;
            color: #CCC
        }

        input.star:checked~label.star:before {
            content: '\f005';
            color:
                #ffbb00;
            transition: all .25s;
            font-weight: 900
        }

        input.star:checked~label.star:before {
            content: '\f005';
            color:
                #ffbb00;
            transition: all .25s;
            font-weight: 900
        }

        input.star-5:checked~label.star:before {
            color:
                #ffbb00;
        }

        input.star-1:checked~label.star:before {
            color:
                #ffbb00;
        }

        label.star:before {
            content: '\f005';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900
        }


        .horline>li:not(:last-child):after {
            content: " |";
        }

        .horline>li {
            font-weight: bold;
            color:
                #ffbb00;

        }

    </style>
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
                                    <button
                                        style="height: 30px;border-radius: 50px;width: 150px;font-size: 15px;">{{ __('product.remove-from-favorite') }}</button>
                                </form>
                            @else
                                <form method="POST"
                                    action="{{ route('addfavorite', [Request::route('id'), Session::get('email') ? Session::get('email') : $_SERVER['REMOTE_ADDR']]) }}">
                                    @csrf
                                    <button
                                        style="height: 30px;border-radius: 50px;width: 150px;font-size: 15px;">{{ __('product.add-to-favorite') }}</button>
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
                                    535.00
                                </span>
                            </div>
                            <div class="h-price">
                                <div>{{ __('product.highest-price') }}</div>
                                <span
                                    style="display: flex;align-items: center;justify-content: center;flex-wrap: nowrap;">
                                    1500
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
                        <div class="watch" style="margin-top: 10%">
                            <h4 style="margin-bottom: 2%">{{ __('product.amazon-price-watches') }}</h4>
                            <form method="POST" action="{{ route('addwatch', [1]) }}"
                                style="display: flex;flex-direction: column;gap: 9px;">
                                @csrf
                                <div style="display: flex">
                                    @include('components/currencies')
                                    <input type="text" name="price" placeholder="{{ __('product.price') }}"
                                        style="width:125px">
                                </div>
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
                                </div>
                                <script async src="https://static.addtoany.com/menu/page.js"></script>
                                <!-- AddToAny END -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="other">
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
                        <h5>{{ DB::table('rating')->where('product', '=', Request::route('id'))->count() .
    ' ' .
    __('product.customer-ratings') }}
                        </h5>
                        @include('components/percentage')
                        <h2 style="margin-top: 5%">{{ __('product.review-this-product') }}</h2>
                        <form class="review-input" method="POST"
                            action="{{ route('addRate', ['id' => request()->route('id'), 'author' => Crypt::encrypt(Session::get('email'))]) }}">
                            @csrf
                            <div class="stars">
                                <input class="star star-5" value="5" id="star-5" type="radio" name="star" />
                                <label class="star star-5" for="star-5"></label>

                                <input class="star star-4" value="4" id="star-4" type="radio" name="star" />
                                <label class="star star-4" for="star-4"></label>

                                <input class="star star-3" value="3" id="star-3" type="radio" name="star" />
                                <label class="star star-3" for="star-3"></label>

                                <input class="star star-2" value="2" id="star-2" type="radio" name="star" />
                                <label class="star star-2" for="star-2"></label>

                                <input class="star star-1" value="1" id="star-1" type="radio" name="star" />
                                <label class="star star-1" for="star-1"></label>
                            </div>
                            <div class="first-row">
                                <div class="input-wrapper">
                                    <textarea name="review" rows="20"
                                        placeholder="{{ __('product.what-do-you-think') }}" required></textarea>
                                </div>
                                <button type="submit">{{ __('product.review') }}</button>
                            </div>
                        </form>
                    </div>
                    <div class="reviews-content">

                        <div class="reviews">
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
