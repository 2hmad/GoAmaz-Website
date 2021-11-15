<!DOCTYPE html>
<html @if (LaravelLocalization::getCurrentLocale() == 'ar') dir="rtl" @endif lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layout/head')
    <title>{{ $json['title'] }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    @if (LaravelLocalization::getCurrentLocale() == 'ar')
        <style>
            .iti__flag-container {
                right: auto;
                left: auto !important;
            }

            div.stars {
                direction: ltr;
            }

            #phone {
                padding: 6px 52px 6px 6px;
            }

        </style>
    @endif
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
                                    <span><img src="{{ asset('images/united-states.svg') }}" /></span>
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
                                <img src="{{ asset('icons/star.svg') }}" />
                                <img src="{{ asset('icons/star.svg') }}" />
                                <img src="{{ asset('icons/star.svg') }}" />
                                <img src="{{ asset('icons/star.svg') }}" />
                                <img src="{{ asset('icons/star.svg') }}" />
                            @elseif(number_format($json['reviews']['stars'], 0) == 4)
                                <img src="{{ asset('icons/star.svg') }}" />
                                <img src="{{ asset('icons/star.svg') }}" />
                                <img src="{{ asset('icons/star.svg') }}" />
                                <img src="{{ asset('icons/star.svg') }}" />
                                <img src="{{ asset('icons/grey-star.svg') }}" />
                            @elseif(number_format($json['reviews']['stars'], 0) == 3)
                                <img src="{{ asset('icons/star.svg') }}" />
                                <img src="{{ asset('icons/star.svg') }}" />
                                <img src="{{ asset('icons/star.svg') }}" />
                                <img src="{{ asset('icons/grey-star.svg') }}" />
                                <img src="{{ asset('icons/grey-star.svg') }}" />
                            @elseif(number_format($json['reviews']['stars'], 0) == 2)
                                <img src="{{ asset('icons/star.svg') }}" />
                                <img src="{{ asset('icons/star.svg') }}" />
                                <img src="{{ asset('icons/grey-star.svg') }}" />
                                <img src="{{ asset('icons/grey-star.svg') }}" />
                                <img src="{{ asset('icons/grey-star.svg') }}" />
                            @elseif(number_format($json['reviews']['stars'], 0) == 1)
                                <img src="{{ asset('icons/star.svg') }}" />
                            @else
                                <img src="{{ asset('icons/grey-star.svg') }}" />
                                <img src="{{ asset('icons/grey-star.svg') }}" />
                                <img src="{{ asset('icons/grey-star.svg') }}" />
                                <img src="{{ asset('icons/grey-star.svg') }}" />
                                <img src="{{ asset('icons/grey-star.svg') }}" />
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
                            <ul style="width: 714px;max-width: 100%;line-height: 2em;">
                                <li>{{ isset($json['features'][0]) ? $json['features'][0] : '' }}</li>
                                <li>{{ isset($json['features'][1]) ? $json['features'][1] : '' }}</li>
                                <li>{{ isset($json['features'][2]) ? $json['features'][2] : '' }}</li>
                                <li>{{ isset($json['features'][3]) ? $json['features'][3] : '' }}</li>
                                <li>{{ isset($json['features'][4]) ? $json['features'][4] : '' }}</li>
                                {{ $json['description'] }}
                            </ul>
                        </div>

                    </div>
                    <div class="right-side">
                        <div class="advertise">
                            <img src="{{ asset('images/250px.png') }}">
                        </div>
                        <div class="watch" style="margin-top: 10%">
                            <h4
                                style="background: #ffa633;padding: 7px;border-radius: 50px;text-align: center;margin-bottom: 5%;">
                                {{ __('product.amazon-price-watches') }}</h4>
                            <form method="POST" action="{{ route('addwatch', [1]) }}"
                                style="display: flex;flex-direction: column;gap: 9px;">
                                @csrf
                                <div style="display: flex">
                                    @include('components/currencies')
                                    @if (LaravelLocalization::getCurrentLocale() == 'en')
                                        <input type="text" name="price" placeholder="{{ __('product.price') }}"
                                            style="padding:6px 13px 6px 85px;height:auto">
                                    @else
                                        <input type="text" name="price" placeholder="{{ __('product.price') }}"
                                            style="padding:6px 85px 6px 6px;height:auto">
                                    @endif
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
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                                    target="_blank">
                                    <img src="{{ asset('icons/facebook.svg') }}">
                                </a>
                                <a href="http://twitter.com/share?url={{ url()->current() }}&hashtags=GoAmaz"
                                    target="_blank">
                                    <img src="{{ asset('icons/twitter.svg') }}">
                                </a>
                                <a href="mailto:?subject=GoAmaz Website&body={{ url()->current() }}" target="_blank">
                                    <img src="{{ asset('icons/email.svg') }}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="other">
                    <div class="sa">
                        <div class="lds-ellipsis">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="ae">
                        <div class="lds-ellipsis">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="uk">
                        <div class="lds-ellipsis">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>

                <div class="chart-container">
                    <canvas id="chart"></canvas>
                </div>

                <div class="reviews-container">
                    <div style="max-width: 400px">
                        <div class="stats">
                            <h2>{{ __('product.customer-review') }}</h2>
                            <div class="stars-container">
                                @if (number_format($json['reviews']['stars'], 0) == 5)
                                    <img src="{{ asset('icons/star.svg') }}" />
                                    <img src="{{ asset('icons/star.svg') }}" />
                                    <img src="{{ asset('icons/star.svg') }}" />
                                    <img src="{{ asset('icons/star.svg') }}" />
                                    <img src="{{ asset('icons/star.svg') }}" />
                                @elseif(number_format($json['reviews']['stars'], 0) == 4)
                                    <img src="{{ asset('icons/star.svg') }}" />
                                    <img src="{{ asset('icons/star.svg') }}" />
                                    <img src="{{ asset('icons/star.svg') }}" />
                                    <img src="{{ asset('icons/star.svg') }}" />
                                    <img src="{{ asset('icons/grey-star.svg') }}" />
                                @elseif(number_format($json['reviews']['stars'], 0) == 3)
                                    <img src="{{ asset('icons/star.svg') }}" />
                                    <img src="{{ asset('icons/star.svg') }}" />
                                    <img src="{{ asset('icons/star.svg') }}" />
                                    <img src="{{ asset('icons/grey-star.svg') }}" />
                                    <img src="{{ asset('icons/grey-star.svg') }}" />
                                @elseif(number_format($json['reviews']['stars'], 0) == 2)
                                    <img src="{{ asset('icons/star.svg') }}" />
                                    <img src="{{ asset('icons/star.svg') }}" />
                                    <img src="{{ asset('icons/grey-star.svg') }}" />
                                    <img src="{{ asset('icons/grey-star.svg') }}" />
                                    <img src="{{ asset('icons/grey-star.svg') }}" />
                                @elseif(number_format($json['reviews']['stars'], 0) == 1)
                                    <img src="{{ asset('icons/star.svg') }}" />
                                @else
                                    <img src="{{ asset('icons/grey-star.svg') }}" />
                                    <img src="{{ asset('icons/grey-star.svg') }}" />
                                    <img src="{{ asset('icons/grey-star.svg') }}" />
                                    <img src="{{ asset('icons/grey-star.svg') }}" />
                                    <img src="{{ asset('icons/grey-star.svg') }}" />
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
                            <img src="https://via.placeholder.com/330x500"
                                style="display:block;margin-top:50px;max-width: 100%;">
                        </div>
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
    <script src="{{ asset('js/product.js') }}"></script>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://www.chartjs.org/dist/master/chart.js"></script>
<script>
    let draw = Chart.controllers.line.prototype.draw;
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
            maintainAspectRatio: false,
            responsive: true,
        }
    });
    chart.canvas.parentNode.style.height = '500px';
    chart.canvas.parentNode.style.width = '1300px';
</script>
<script>
    const phoneInputField = document.querySelector("#phone");
    const phoneInput = window.intlTelInput(phoneInputField, {
        hiddenInput: "full-phone",
        nationalMode: true,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
</script>
<script>
    const sa = document.querySelector('.sa')

    // Amazon SA
    function generateCardSa({
        imageLinkSa,
        titleSa,
        priceSa,
        prevPriceSa,
        currencySa,
        fullLinkSa
    }) {
        function changeCurrency() {
            return `
            <div class="logo">
                <?php
                $country = country('' . $ip['country_code'] . '');
                echo $country->getFlag();
                ?>
                </div>
                <div class="price">
                    <div class="amount" style="color: green;font-weight:bold">
                        {{ number_format(
                            Currency::convert()->from('SAR')->to($ip['currency_code'])->amount(-1)->get(),
                            0,
                        ) }}
                            {{ $ip['currency_code'] }}
                            </div>
                            </div>
                            `
        }
        const checkPrice = priceSa = -1 ? '' + "{{ __('product.unknown-price') }}" + '' : priceSa + ' ' +
            currencySa;

        function upDown() {
            if (priceSa !== -1) {
                if (prevPriceSa !== -1) {
                    if (priceSa > prevPriceSa) {
                        return `
                        <div class="down"><img src="{{ asset('icons/trending_down.svg') }}">
                            (1 - ${priceSa} / ${prevPriceSa}) * 100
                        </div>`
                    } else {
                        return `
                        <div class="up"><img src="{{ asset('icons/trending_up.svg') }}">
                            (1 - ${priceSa} / ${prevPriceSa}) * 100
                        </div>`
                    }
                }
            } else {
                return '';
            }
        }
        return `
        <div class="other-card">
            <div class="image">
                <img src="{{ asset('images/amazon logo.png') }}" alt="">
                <a href="${fullLinkSa}"><span>${fullLinkSa}</span></a>
            </div>
            <div class="price-list">
                <div class="logo">
                    <img src="{{ asset('icons/saudi-arabia.svg') }}" alt="SA">
                </div>
                <div class="price" style="margin-right: 50px;">
                    <div class="amount" style="color: green;font-weight:bold">
                        ${priceSa}
                    </div>
                </div>
                ${changeCurrency()}            
            </div>

            ${upDown()}

            <a href="${fullLinkSa}"><button>{{ __('home.view-amazon') }}</button></a>
        </div>`
    }
    fetch('/amazonsa/' + "{{ $json['asin'] }}").then(res => res.json()).then(data => {
        sa.innerHTML = (generateCardSa({
            priceSa: data.prices.current_price,
            prevPriceSa: data.prices.previous_price,
            currencySa: data.prices.currency,
            fullLinkSa: data.full_link
        }))
    })
</script>

<script>
    const ae = document.querySelector('.ae')

    // Amazon AE
    function generateCardAe({
        imageLink,
        title,
        price,
        prevPrice,
        currency,
        fullLink
    }) {
        function changeCurrency() {
            return `
            <div class="logo">
                <?php
                $country = country('' . $ip['country_code'] . '');
                echo $country->getFlag();
                ?>
                </div>
                <div class="price">
                    <div class="amount" style="color: green;font-weight:bold">
                        {{ number_format(
                            Currency::convert()->from('AED')->to($ip['currency_code'])->amount(-1)->get(),
                            0,
                        ) }}
                            {{ $ip['currency_code'] }}
                            </div>
                            </div>
                            `
        }
        const checkPrice = price = -1 ? '' + "{{ __('product.unknown-price') }}" + '' : price + ' ' + currency;

        function upDown() {
            if (price !== -1) {
                if (prevPrice !== -1) {
                    if (price > prevPrice) {
                        return `
                        <div class="down"><img src="{{ asset('icons/trending_down.svg') }}">
                            (1 - ${price} / ${prevPrice}) * 100
                        </div>`
                    } else {
                        return `
                        <div class="up"><img src="{{ asset('icons/trending_up.svg') }}">
                            (1 - ${price} / ${prevPrice}) * 100
                        </div>`
                    }
                }
            } else {
                return '';
            }
        }
        return `
        <div class="other-card">
            <div class="image">
                <img src="{{ asset('images/amazon logo.png') }}" alt="">
                <a href="${fullLink}"><span>${fullLink}</span></a>
            </div>
            <div class="price-list">
                <div class="logo">
                    <img src="{{ asset('icons/United-Arab-Emirates-Flag.svg') }}" alt="Amazon UAE">
                </div>
                <div class="price" style="margin-right: 50px;">
                    <div class="amount" style="color: green;font-weight:bold">
                        ${price}
                    </div>
                </div>
                ${changeCurrency()}            
            </div>

            ${upDown()}

            <a href="${fullLink}"><button>{{ __('home.view-amazon') }}</button></a>
        </div>`
    }
    fetch('/amazonae/' + "{{ $json['asin'] }}").then(res => res.json()).then(data => {
        ae.innerHTML = (generateCardAe({
            price: data.prices.current_price,
            prevPrice: data.prices.previous_price,
            currency: data.prices.currency,
            fullLink: data.full_link
        }))
    })
</script>

<script>
    const uk = document.querySelector('.uk')
    // Amazon UK
    function generateCardUk({
        imageLink,
        title,
        price,
        prevPrice,
        currency,
        fullLink
    }) {
        function changeCurrency() {
            return `
            <div class="logo">
                <?php
                $country = country('' . $ip['country_code'] . '');
                echo $country->getFlag();
                ?>
                </div>
                <div class="price">
                    <div class="amount" style="color: green;font-weight:bold">
                        {{ number_format(
                            Currency::convert()->from('GBP')->to($ip['currency_code'])->amount(-1)->get(),
                            0,
                        ) }}
                            {{ $ip['currency_code'] }}
                            </div>
                            </div>
                            `
        }
        const checkPrice = price == -1 ? "{{ __('product.unknown-price') }}" : price + ' ' + currency;

        function upDown() {
            if (price !== -1) {
                if (prevPrice !== -1) {
                    if (price > prevPrice) {
                        return `
                        <div class="down"><img src="{{ asset('icons/trending_down.svg') }}">
                            (1 - ${price} / ${prevPrice}) * 100
                        </div>`
                    } else {
                        return `
                        <div class="up"><img src="{{ asset('icons/trending_up.svg') }}">
                            (1 - ${price} / ${prevPrice}) * 100
                        </div>`
                    }
                }
            }
        }
        return `
        <div class="other-card">
            <div class="image">
                <img src="{{ asset('images/amazon logo.png') }}" alt="">
                <a href="${fullLink}"><span>${fullLink}</span></a>
            </div>
            <div class="price-list">
                <div class="logo">
                    <img src="{{ asset('icons/United-Kingdom-Flag.svg') }}" alt="UK">
                </div>
                <div class="price" style="margin-right: 50px;">
                    <div class="amount" style="color: green;font-weight:bold">
                        ${price}
                    </div>
                </div>
                ${changeCurrency()}            
            </div>

            ${upDown()}

            <a href="${fullLink}"><button>{{ __('home.view-amazon') }}</button></a>
        </div>`
    }
    fetch('/amazonuk/' + "{{ $json['asin'] }}").then(res => res.json()).then(data => {
        uk.innerHTML = (generateCardUk({
            price: data.prices.current_price,
            prevPrice: data.prices.previous_price,
            currency: data.prices.currency,
            fullLink: data.full_link
        }))
    })
</script>

</html>
