@foreach ($request as $item)
    <div class="home-card">
        <a href="/product/{{ $item['id'] }}">

            <div class="image">
                <img src="{{ $item['image'] }}" alt="A" />
            </div>
            <div class="title">{{ $item['title'] }}</div>
            <div class="stars">
                <img src="/icons/star.svg" />
                <img src="/icons/star.svg" />
                <img src="/icons/star.svg" />
                <img src="/icons/star.svg" />
                <img src="/icons/star_half.svg" />
            </div>
            <div class="price">
                <div class="currency">USD</div>
                <div class="amount">{{ $item['price'] }}</div>
                {{-- <div class="complment">00</div> --}}
            </div>
        </a>
    </div>
@endforeach
