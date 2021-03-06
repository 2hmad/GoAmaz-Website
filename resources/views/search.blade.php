<!DOCTYPE html>
<html @if (LaravelLocalization::getCurrentLocale() == 'ar') dir="rtl" @endif lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layout/head')
    <title>Search for {{ Request::input('search') }}</title>
</head>

<body>
    @include('layout/header')
    <div class="page">
        <div class="container">
            <div class="search-page">
                <h1>Showing search results for "{{ Request::input('search') }}"</h1>
                <div class="multi-item-grid">
                    @foreach ($json['results'] as $item)
                        <div class="home-card">
                            <a href="/product/{{ $item['asin'] }}">
                                <div class="image">
                                    <img src="{{ $item['image'] }}" alt="A" />
                                </div>
                                <div class="title">{{ $item['title'] }}</div>
                                <div class="stars">
                                    @if (number_format($item['reviews']['stars'], 0) == 5)
                                        <img src="{{ asset('icons/star.svg') }}" />
                                        <img src="{{ asset('icons/star.svg') }}" />
                                        <img src="{{ asset('icons/star.svg') }}" />
                                        <img src="{{ asset('icons/star.svg') }}" />
                                        <img src="{{ asset('icons/star.svg') }}" />
                                    @elseif(number_format($item['reviews']['stars'], 0) == 4)
                                        <img src="{{ asset('icons/star.svg') }}" />
                                        <img src="{{ asset('icons/star.svg') }}" />
                                        <img src="{{ asset('icons/star.svg') }}" />
                                        <img src="{{ asset('icons/star.svg') }}" />
                                        <img src="{{ asset('icons/grey-star.svg') }}" />
                                    @elseif(number_format($item['reviews']['stars'], 0) == 3)
                                        <img src="{{ asset('icons/star.svg') }}" />
                                        <img src="{{ asset('icons/star.svg') }}" />
                                        <img src="{{ asset('icons/star.svg') }}" />
                                        <img src="{{ asset('icons/grey-star.svg') }}" />
                                        <img src="{{ asset('icons/grey-star.svg') }}" />
                                    @elseif(number_format($item['reviews']['stars'], 0) == 2)
                                        <img src="{{ asset('icons/star.svg') }}" />
                                        <img src="{{ asset('icons/star.svg') }}" />
                                        <img src="{{ asset('icons/grey-star.svg') }}" />
                                        <img src="{{ asset('icons/grey-star.svg') }}" />
                                        <img src="{{ asset('icons/grey-star.svg') }}" />
                                    @elseif(number_format($item['reviews']['stars'], 0) == 1)
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
                                    <div class="currency">USD</div>
                                    <div class="amount">{{ $item['prices']['current_price'] }}</div>
                                    {{-- <div class="complment">00</div> --}}
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('layout/footer')
</body>

</html>
