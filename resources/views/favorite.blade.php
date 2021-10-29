<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layout/head')
    <title>GoAmaz - Login</title>
</head>

<body>
    @include('layout/header')
    @include('layout/nav')
    <div class="page">
        <div class="container">
            <div class="cart-page">
                <div class="cart-cont">
                    <h1>Cart</h1>
                    <div class="cart-item">
                        <div class="cart-image">
                            <img src="/images/2.jpg" alt="Alt">
                        </div>
                        <div class="cart-item-info">
                            <div class="name">Face mask 350ml</div>
                            <div class="price">350 USD</div>
                            <div class="stars">
                                <img src="/icons/star.svg" />
                                <img src="/icons/star.svg" />
                                <img src="/icons/star.svg" />
                                <img src="/icons/star.svg" />
                                <img src="/icons/star_half.svg" />
                            </div>
                            <button>Buy</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('layout/footer')
</body>

</html>
