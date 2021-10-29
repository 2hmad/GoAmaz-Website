    <div class="home-card">
        <a href="/product/1">
            <div class="image">
                <img src="/images/2.jpg" alt="A" />
            </div>
            <div class="title">Face mask</div>
            <div class="stars">
                <img src="/icons/star.svg" />
                <img src="/icons/star.svg" />
                <img src="/icons/star.svg" />
                <img src="/icons/star.svg" />
                <img src="/icons/star_half.svg" />
            </div>
            <div class="price">
                <div class="currency">USD</div>
                <div class="amount">350</div>
                {{-- <div class="complment">00</div> --}}
            </div>
        </a>
        <div class="countries">
            <div class="country">
                <div class="flag">
                    <img src="/images/eg.webp" alt="EG" />
                </div>
                <div class="info">
                    <div>1500 EGP</div>
                </div>
                @if (LaravelLocalization::getCurrentLocale() == 'en')
                    <a href="/" class="c-go">
                        <img src="/icons/arrow.svg" alt="Go" />
                    </a>
                @else
                    <a href="/" class="c-go" style="margin-right: auto">
                        <img src="/icons/arrow-left.svg" alt="Go" />
                    </a>
                @endif
            </div>
        </div>
    </div>
