    {{-- Amazon Sa --}}
    @if ($jsonSa['error'] !== true)
        <div class="other-card">
            <div class="image">
                <img src="{{ asset('images/amazon logo.png') }}" alt="">
                <a href="{{ $jsonSa['full_link'] }}"><span>{{ $jsonSa['full_link'] }}</span></a>
            </div>
            <div class="price-list">
                <div class="logo">
                    <img src="{{ asset('icons/saudi-arabia.svg') }}" alt="SA">
                </div>
                <div class="price" style="margin-right: 50px;">
                    <div class="amount" style="color: green;font-weight:bold">
                        {{ $jsonSa['prices']['current_price'] == -1 ? '' . __('product.unknown-price') . '' : $jsonSa['prices']['current_price'] . ' ' . $jsonSa['prices']['currency'] }}
                    </div>
                </div>
                @if ($jsonSa['prices']['current_price'] != -1)
                    <div class="logo">
                        <?php
                        $egypt = country('eg');
                        echo $egypt->getFlag();
                        ?>
                    </div>
                    <div class="price">
                        <div class="amount" style="color: green;font-weight:bold">
                            {{ number_format(
                                Currency::convert()->from('SAR')->to($ip['currency'])->amount($jsonSa['prices']['current_price'])->get(),
                                0,
                            ) }}
                            {{ $ip['currency'] }}
                        </div>
                    </div>
                @endif
            </div>

            @if ($jsonSa['prices']['current_price'] != -1)
                @if ($jsonSa['prices']['previous_price'] != -1)
                    @if ($jsonSa['prices']['current_price'] > $jsonSa['prices']['previous_price'])
                        <div class="down"><img src="{{ asset('icons/trending_down.svg') }}">
                            {{ number_format((1 - $jsonSa['prices']['current_price'] / $jsonSa['prices']['previous_price']) * 100, 0) }}%
                        </div>
                    @else
                        <div class="up"><img src="{{ asset('icons/trending_up.svg') }}">
                            {{ number_format((1 - $jsonSa['prices']['current_price'] / $jsonSa['prices']['previous_price']) * 100, 0) }}%
                        </div>
                    @endif
                @endif
            @endif
            <a href="{{ $jsonSa['full_link'] }}"><button>{{ __('home.view-amazon') }}</button></a>
        </div>
    @endif

    {{-- Amazon AE --}}
    @if ($jsonAe['error'] !== true)
        <div class="other-card">
            <div class="image">
                <img src="{{ asset('images/amazon logo.png') }}" alt="">
                <a href="{{ $jsonAe['full_link'] }}"><span>{{ $jsonAe['full_link'] }}</span></a>
            </div>
            <div class="price-list">
                <div class="logo">
                    <img src="{{ asset('icons/United-Arab-Emirates-Flag.svg') }}" alt="UAE">
                </div>
                <div class="price" style="margin-right: 50px;">
                    <div class="amount" style="color: green;font-weight:bold">
                        {{ $jsonAe['prices']['current_price'] == -1 ? '' . __('product.unknown-price') . '' : $jsonAe['prices']['current_price'] . ' ' . $jsonAe['prices']['currency'] }}
                    </div>
                </div>
                @if ($jsonAe['prices']['current_price'] != -1)
                    <div class="logo">
                        <?php
                        $egypt = country('' . $ip['countryCode'] . '');
                        echo $egypt->getFlag();
                        ?>
                    </div>
                    <div class="price">
                        <div class="amount" style="color: green;font-weight:bold">
                            {{ number_format(
                                Currency::convert()->from('AED')->to($ip['currency'])->amount($jsonAe['prices']['current_price'])->get(),
                                0,
                            ) }}
                            {{ $ip['currency'] }}
                        </div>
                    </div>
                @endif
            </div>

            @if ($jsonAe['prices']['current_price'] != -1)
                @if ($jsonAe['prices']['previous_price'] != -1)
                    @if ($jsonAe['prices']['current_price'] > $jsonAe['prices']['previous_price'])
                        <div class="down"><img src="{{ asset('icons/trending_down.svg') }}">
                            {{ number_format((1 - $jsonAe['prices']['current_price'] / $jsonAe['prices']['previous_price']) * 100, 0) }}%
                        </div>
                    @else
                        <div class="up"><img src="{{ asset('icons/trending_up.svg') }}">
                            {{ number_format((1 - $jsonAe['prices']['current_price'] / $jsonAe['prices']['previous_price']) * 100, 0) }}%
                        </div>
                    @endif
                @endif
            @endif
            <a href="{{ $jsonAe['full_link'] }}"><button>{{ __('home.view-amazon') }}</button></a>
        </div>
    @endif

    {{-- Amazon UK --}}
    @if ($jsonUk['error'] !== true)
        <div class="other-card">
            <div class="image">
                <img src="{{ asset('images/amazon logo.png') }}" alt="">
                <a href="{{ $jsonUk['full_link'] }}"><span>{{ $jsonUk['full_link'] }}</span></a>
            </div>
            <div class="price-list">
                <div class="logo">
                    <img src="{{ asset('icons/United-Kingdom-Flag.svg') }}" alt="United Kingdom">
                </div>
                <div class="price" style="margin-right: 50px;">
                    <div class="amount" style="color: green;font-weight:bold">
                        {{ $jsonUk['prices']['current_price'] == -1 ? '' . __('product.unknown-price') . '' : $jsonUk['prices']['current_price'] . ' ' . $jsonUk['prices']['currency'] }}
                    </div>
                </div>
                @if ($jsonUk['prices']['current_price'] != -1)
                    <div class="logo">
                        <?php
                        $egypt = country('eg');
                        echo $egypt->getFlag();
                        ?>
                    </div>
                    <div class="price">
                        <div class="amount" style="color: green;font-weight:bold">
                            {{ number_format(
                                Currency::convert()->from('GBP')->to($ip['currency'])->amount($jsonUk['prices']['current_price'])->get(),
                                0,
                            ) }}
                            {{ $ip['currency'] }}
                        </div>
                    </div>
                @endif
            </div>

            @if ($jsonUk['prices']['current_price'] != -1)
                @if ($jsonUk['prices']['previous_price'] != -1)
                    @if ($jsonUk['prices']['current_price'] > $jsonUk['prices']['previous_price'])
                        <div class="down"><img src="{{ asset('icons/trending_down.svg') }}">
                            {{ number_format((1 - $jsonUk['prices']['current_price'] / $jsonUk['prices']['previous_price']) * 100, 0) }}%
                        </div>
                    @else
                        <div class="up"><img src="{{ asset('icons/trending_up.svg') }}">
                            {{ number_format((1 - $jsonUk['prices']['current_price'] / $jsonUk['prices']['previous_price']) * 100, 0) }}%
                        </div>
                    @endif
                @endif
            @endif
            <a href="{{ $jsonUk['full_link'] }}"><button>{{ __('home.view-amazon') }}</button></a>
        </div>
    @endif
