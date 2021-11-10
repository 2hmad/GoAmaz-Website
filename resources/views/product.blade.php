<!DOCTYPE html>
<html @if (LaravelLocalization::getCurrentLocale() == 'ar') dir="rtl" @endif lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layout/head')
    <title>{{ $json['title'] }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <style>
        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }

        #currency {
            width: 125px;
        }

        div.stars {
            justify-content: flex-start;
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
                        @if (isset($json['images'][0]))
                            <img src="{{ $json['images'][0] }}" alt="{{ $json['title'] }}">
                        @endif
                        @if (isset($json['images'][1]))
                            <img src="{{ $json['images'][1] }}" alt="{{ $json['title'] }}">
                        @endif
                    </div>
                    <div class="image">
                        @if (isset($json['images'][0]))
                            <img src="{{ $json['images'][0] }}" alt="{{ $json['title'] }}">
                        @endif
                    </div>
                    <div class="details">
                        <div class="top-details">
                            <a href="{{ $json['full_link'] }}">
                                <h1 class="title">{{ $json['title'] }}
                                    <span><img src="{{ asset('public/images/united-states.svg') }}" /></span>
                                </h1>
                            </a>
                            @if ($check)
                                <form method="POST"
                                    action="{{ route('destroy.favorite', [Request::route('id'), Session::get('email') ? Session::get('email') : $_SERVER['REMOTE_ADDR']]) }}">
                                    @csrf
                                    @method('delete')
                                    <button
                                        style="height: 30px;border-radius: 50px;font-size: 15px;">{{ __('product.remove-from-favorite') }}</button>
                                </form>
                            @else
                                <form method="POST"
                                    action="{{ route('addfavorite', [Request::route('id'), Session::get('email') ? Session::get('email') : $_SERVER['REMOTE_ADDR']]) }}">
                                    @csrf
                                    <input type="text" name="title" value="{{ $json['title'] }}" hidden>
                                    <input type="text" name="price" value="{{ $json['prices']['current_price'] }}"
                                        hidden>
                                    <input type="text" name="stars"
                                        value="{{ number_format($json['reviews']['stars'], 0) }}" hidden>
                                    <input type="text" name="image" value="{{ $json['images'][0] }}" hidden>
                                    <input type="text" name="date" value="{{ date('Y-m-d') }}" hidden>
                                    <button
                                        style="height: 30px;border-radius: 50px;font-size: 15px;">{{ __('product.add-to-favorite') }}</button>
                                </form>
                            @endif
                        </div>
                        <div class="stars">
                            @if (number_format($json['reviews']['stars'], 0) == 5)
                                <img src="{{ asset('public/icons/star.svg') }}" />
                                <img src="{{ asset('public/icons/star.svg') }}" />
                                <img src="{{ asset('public/icons/star.svg') }}" />
                                <img src="{{ asset('public/icons/star.svg') }}" />
                                <img src="{{ asset('public/icons/star.svg') }}" />
                            @elseif(number_format($json['reviews']['stars'], 0) == 4)
                                <img src="{{ asset('public/icons/star.svg') }}" />
                                <img src="{{ asset('public/icons/star.svg') }}" />
                                <img src="{{ asset('public/icons/star.svg') }}" />
                                <img src="{{ asset('public/icons/star.svg') }}" />
                                <img src="{{ asset('public/icons/grey-star.svg') }}" />
                            @elseif(number_format($json['reviews']['stars'], 0) == 3)
                                <img src="{{ asset('public/icons/star.svg') }}" />
                                <img src="{{ asset('public/icons/star.svg') }}" />
                                <img src="{{ asset('public/icons/star.svg') }}" />
                                <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                <img src="{{ asset('public/icons/grey-star.svg') }}" />
                            @elseif(number_format($json['reviews']['stars'], 0) == 2)
                                <img src="{{ asset('public/icons/star.svg') }}" />
                                <img src="{{ asset('public/icons/star.svg') }}" />
                                <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                <img src="{{ asset('public/icons/grey-star.svg') }}" />
                            @elseif(number_format($json['reviews']['stars'], 0) == 1)
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
                            @if ($json['prices']['current_price'] > 0)
                                <div>{{ $json['prices']['current_price'] }}</div>
                            @else
                                <div>0</div>
                            @endif
                            <span>USD</span>
                        </div>
                        <div class="prices">
                            <div class="l-price">
                                <div>{{ __('product.lowest-price') }}</div>
                                <span
                                    style="display: flex;align-items: center;justify-content: center;flex-wrap: nowrap;">
                                    @if ($json['prices']['previous_price'] != -1)
                                        {{ $json['prices']['previous_price'] }}
                                    @else
                                        0
                                    @endif
                                </span>
                            </div>
                            <div class="h-price">
                                <div>{{ __('product.highest-price') }}</div>
                                <span
                                    style="display: flex;align-items: center;justify-content: center;flex-wrap: nowrap;">
                                    @if ($json['prices']['current_price'] > 0)
                                        {{ $json['prices']['current_price'] }}
                                    @else
                                        0
                                    @endif
                                </span>
                            </div>
                            <div class="r-price">
                                <div>{{ __('product.latest-down') }}</div>
                                @if ($json['prices']['previous_price'] != -1)
                                    {{ number_format((1 - $json['prices']['current_price'] / $json['prices']['previous_price']) * 100, 0) }}%
                                @else
                                    0%
                                @endif
                            </div>
                        </div>

                        <div class="p-details">
                            <h3>{{ __('product.about-this-item') }}</h3>
                            <ul style="width: 714px;line-height: 2em;">
                                <li>{{ $json['features'][0] }}</li>
                                <li>{{ $json['features'][1] }}</li>
                                <li>{{ $json['features'][2] }}</li>
                                <li>{{ $json['features'][3] }}</li>
                                <li>{{ $json['features'][4] }}</li>
                                {{ $json['description'] }}
                            </ul>
                        </div>

                    </div>
                    <div class="right-side">
                        <div class="advertise">
                            <img src="{{ asset('public/images/250px.png') }}">
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

                <div class="chart">
                    <canvas id="chart"></canvas>
                </div>

                <div class="reviews-container">
                    <div class="stats">
                        <h2>{{ __('product.customer-review') }}</h2>
                        <div class="stars-container">
                            @if (number_format($json['reviews']['stars'], 0) == 5)
                                <img src="{{ asset('public/icons/star.svg') }}" />
                                <img src="{{ asset('public/icons/star.svg') }}" />
                                <img src="{{ asset('public/icons/star.svg') }}" />
                                <img src="{{ asset('public/icons/star.svg') }}" />
                                <img src="{{ asset('public/icons/star.svg') }}" />
                            @elseif(number_format($json['reviews']['stars'], 0) == 4)
                                <img src="{{ asset('public/icons/star.svg') }}" />
                                <img src="{{ asset('public/icons/star.svg') }}" />
                                <img src="{{ asset('public/icons/star.svg') }}" />
                                <img src="{{ asset('public/icons/star.svg') }}" />
                                <img src="{{ asset('public/icons/grey-star.svg') }}" />
                            @elseif(number_format($json['reviews']['stars'], 0) == 3)
                                <img src="{{ asset('public/icons/star.svg') }}" />
                                <img src="{{ asset('public/icons/star.svg') }}" />
                                <img src="{{ asset('public/icons/star.svg') }}" />
                                <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                <img src="{{ asset('public/icons/grey-star.svg') }}" />
                            @elseif(number_format($json['reviews']['stars'], 0) == 2)
                                <img src="{{ asset('public/icons/star.svg') }}" />
                                <img src="{{ asset('public/icons/star.svg') }}" />
                                <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                <img src="{{ asset('public/icons/grey-star.svg') }}" />
                            @elseif(number_format($json['reviews']['stars'], 0) == 1)
                                <img src="{{ asset('public/icons/star.svg') }}" />
                            @else
                                <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                <img src="{{ asset('public/icons/grey-star.svg') }}" />
                                <img src="{{ asset('public/icons/grey-star.svg') }}" />
                            @endif
                            <div class="rate">{{ number_format($json['reviews']['stars'], 0) }}
                                {{ __('product.out-of') }}
                                5
                            </div>
                        </div>
                        <h5>{{ $json['reviews']['total_reviews'] . ' ' . __('product.customer-ratings') }}
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
    <script src="{{ asset('public/js/product.js') }}"></script>
</body>
<script src="https://www.chartjs.org/dist/master/chart.js"></script>
<script>
    let draw = Chart.controllers.line.prototype.draw;
    Chart.controllers.line.prototype.draw = function() {
        let chart = this.chart;
        let ctx = chart.ctx;
        let _stroke = ctx.stroke;
        ctx.stroke = function() {
            ctx.save();
            ctx.shadowColor = ctx.strokeStyle;
            ctx.shadowBlur = 5;
            ctx.shadowOffsetX = 0;
            ctx.shadowOffsetY = 4;
            _stroke.apply(this, arguments);
            ctx.restore();
        };
        draw.apply(this, arguments);
        ctx.stroke = _stroke;
    };

    var ctx = document.getElementById("chart").getContext("2d");
    var chart = new Chart(ctx, {
        type: "line",
        data: {
            labels: [@foreach ($chart as $date) "{{ $date->date }}", @endforeach],
            datasets: [{
                label: 'Price Tracker',
                data: [@foreach ($chart as $price) {{ $price->price }}, @endforeach],
                borderColor: "#009dd9",
                borderWidth: 1,
                fill: false,
                pointBackgroundColor: "white"
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            title: {
                display: true,
                text: "chart",
                fontColor: "#212A49"
            }
        }
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
