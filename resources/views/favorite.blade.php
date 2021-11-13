<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layout/head')
    <title>Favourite - GoAmaz</title>
</head>

<body>
    @include('layout/header')
    @include('layout/nav')
    <div class="page">
        <div class="container">
            <div class="cart-page">
                <div class="cart-cont">
                    <h1>{{ __('home.favourite') }}</h1>
                    @foreach ($products as $product)
                        <div class="cart-item">
                            <div class="cart-image">
                                <img src="{{ $product->image }}" alt="Alt">
                            </div>
                            <div class="cart-item-info">
                                <div class="name">{{ $product->title }}</div>
                                <div class="price">{{ $product->price }} USD</div>
                                <div class="stars">
                                    @if (number_format($product->stars, 0) == 5)
                                        <img src="{{ asset('icons/star.svg') }}" />
                                        <img src="{{ asset('icons/star.svg') }}" />
                                        <img src="{{ asset('icons/star.svg') }}" />
                                        <img src="{{ asset('icons/star.svg') }}" />
                                        <img src="{{ asset('icons/star.svg') }}" />
                                    @elseif(number_format($product->stars, 0) == 4)
                                        <img src="{{ asset('icons/star.svg') }}" />
                                        <img src="{{ asset('icons/star.svg') }}" />
                                        <img src="{{ asset('icons/star.svg') }}" />
                                        <img src="{{ asset('icons/star.svg') }}" />
                                        <img src="{{ asset('icons/grey-star.svg') }}" />
                                    @elseif(number_format($product->stars, 0) == 3)
                                        <img src="{{ asset('icons/star.svg') }}" />
                                        <img src="{{ asset('icons/star.svg') }}" />
                                        <img src="{{ asset('icons/star.svg') }}" />
                                        <img src="{{ asset('icons/grey-star.svg') }}" />
                                        <img src="{{ asset('icons/grey-star.svg') }}" />
                                    @elseif(number_format($product->stars, 0) == 2)
                                        <img src="{{ asset('icons/star.svg') }}" />
                                        <img src="{{ asset('icons/star.svg') }}" />
                                        <img src="{{ asset('icons/grey-star.svg') }}" />
                                        <img src="{{ asset('icons/grey-star.svg') }}" />
                                        <img src="{{ asset('icons/grey-star.svg') }}" />
                                    @elseif(number_format($product->stars, 0) == 1)
                                        <img src="{{ asset('icons/star.svg') }}" />
                                    @else
                                        <img src="{{ asset('icons/grey-star.svg') }}" />
                                        <img src="{{ asset('icons/grey-star.svg') }}" />
                                        <img src="{{ asset('icons/grey-star.svg') }}" />
                                        <img src="{{ asset('icons/grey-star.svg') }}" />
                                        <img src="{{ asset('icons/grey-star.svg') }}" />
                                    @endif
                                </div>
                                <a
                                    href="/product/{{ $product->product_id }}"><button>{{ __('home.view-product') }}</button></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('layout/footer')
</body>

</html>
