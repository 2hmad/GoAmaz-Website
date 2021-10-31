@foreach ($rates as $rate)
    <div class="review">
        <div class="user">
            @if ($rate->author !== 'Anonymous User')
                <div class="user-image">
                    <img src="{{ DB::table('users')->where('email', '=', $rate->author)->value('pic') }}" alt="User"
                        style="object-fit: cover;">
                </div>
                <div class="user-name">{{ DB::table('users')->where('email', '=', $rate->author)->value('name') }}
                </div>
            @else
                <div class="user-image">
                    <img src="/images/profile-placeholder.png" alt="User" style="object-fit: cover;">
                </div>
                <div class="user-name">Anonymous User</div>
            @endif
        </div>
        <div class="stars">

            @if ($rate->rate == 1)
                <img src='/icons/star.svg' />
            @elseif($rate->rate == 2)
                <img src='/icons/star.svg' />
                <img src='/icons/star.svg' />
            @elseif($rate->rate == 3)
                <img src='/icons/star.svg' />
                <img src='/icons/star.svg' />
                <img src='/icons/star.svg' />
            @elseif($rate->rate == 4)
                <img src='/icons/star.svg' />
                <img src='/icons/star.svg' />
                <img src='/icons/star.svg' />
                <img src='/icons/star.svg' />
            @elseif($rate->rate == 5)
                <img src='/icons/star.svg' />
                <img src='/icons/star.svg' />
                <img src='/icons/star.svg' />
                <img src='/icons/star.svg' />
                <img src='/icons/star.svg' />
            @endif
        </div>
        <div class="date">{{ $rate->date }}</div>
        <div class="content">{{ $rate->message }}</div>
    </div>
@endforeach
