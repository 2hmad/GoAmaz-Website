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
