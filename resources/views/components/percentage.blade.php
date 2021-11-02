<div class="all-progress">

    <div class="progress">
        <div>5 {{ __('product.stars') }}</div>
        @if (DB::table('rating')->where('rate', '=', 5)->where('product', '=', Request::route('id'))->count() !== 0)
            <div class="progress-bar">
                <div class="inner"
                    style="width:{{ (DB::table('rating')->where('rate', '=', 5)->where('product', '=', Request::route('id'))->count() /
    DB::table('rating')->where('product', '=', Request::route('id'))->count()) *
    100 }}%">
                </div>
            </div>
            <div>
                {{ number_format(
    (DB::table('rating')->where('rate', '=', 5)->where('product', '=', Request::route('id'))->count() /
        DB::table('rating')->where('product', '=', Request::route('id'))->count()) *
        100,
    0,
) }}%
            </div>
        @else
            <div class="progress-bar">
                <div class="inner" style="width:0%"></div>
            </div>
            <div>0%</div>
        @endif
    </div>

    {{-- ------------------------------------------------- --}}

    <div class="progress">
        <div>4 {{ __('product.stars') }}</div>
        @if (DB::table('rating')->where('rate', '=', 4)->where('product', '=', Request::route('id'))->count() !== 0)
            <div class="progress-bar">
                <div class="inner"
                    style="width:{{ (DB::table('rating')->where('rate', '=', 4)->where('product', '=', Request::route('id'))->count() /
    DB::table('rating')->where('product', '=', Request::route('id'))->count()) *
    100 }}%">
                </div>
            </div>
            <div>
                {{ number_format(
    (DB::table('rating')->where('rate', '=', 4)->where('product', '=', Request::route('id'))->count() /
        DB::table('rating')->where('product', '=', Request::route('id'))->count()) *
        100,
    0,
) }}%
            </div>
        @else
            <div class="progress-bar">
                <div class="inner" style="width:0%"></div>
            </div>
            <div>0%</div>
        @endif
    </div>

    {{-- ------------------------------------------------- --}}

    <div class="progress">
        <div>3 {{ __('product.stars') }}</div>
        @if (DB::table('rating')->where('rate', '=', 3)->where('product', '=', Request::route('id'))->count() !== 0)
            <div class="progress-bar">
                <div class="inner"
                    style="width:{{ (DB::table('rating')->where('rate', '=', 3)->where('product', '=', Request::route('id'))->count() /
    DB::table('rating')->where('product', '=', Request::route('id'))->count()) *
    100 }}%">
                </div>
            </div>
            <div>
                {{ number_format(
    (DB::table('rating')->where('rate', '=', 3)->where('product', '=', Request::route('id'))->count() /
        DB::table('rating')->where('product', '=', Request::route('id'))->count()) *
        100,
    0,
) }}%
            </div>
        @else
            <div class="progress-bar">
                <div class="inner" style="width:0%"></div>
            </div>
            <div>0%</div>
        @endif
    </div>

    {{-- ------------------------------------------------- --}}

    <div class="progress">
        <div>2 {{ __('product.stars') }}</div>
        @if (DB::table('rating')->where('rate', '=', 2)->where('product', '=', Request::route('id'))->count() !== 0)
            <div class="progress-bar">
                <div class="inner"
                    style="width:{{ (DB::table('rating')->where('rate', '=', 2)->where('product', '=', Request::route('id'))->count() /
    DB::table('rating')->where('product', '=', Request::route('id'))->count()) *
    100 }}%">
                </div>
            </div>
            <div>
                {{ number_format(
    (DB::table('rating')->where('rate', '=', 2)->where('product', '=', Request::route('id'))->count() /
        DB::table('rating')->where('product', '=', Request::route('id'))->count()) *
        100,
    0,
) }}%
            </div>
        @else
            <div class="progress-bar">
                <div class="inner" style="width:0%"></div>
            </div>
            <div>0%</div>
        @endif
    </div>

    {{-- ------------------------------------------------- --}}

    <div class="progress">
        <div>1 {{ __('product.stars') }}</div>
        @if (DB::table('rating')->where('rate', '=', 1)->where('product', '=', Request::route('id'))->count() !== 0)
            <div class="progress-bar">
                <div class="inner"
                    style="width:{{ (DB::table('rating')->where('rate', '=', 1)->where('product', '=', Request::route('id'))->count() /
    DB::table('rating')->where('product', '=', Request::route('id'))->count()) *
    100 }}%">
                </div>
            </div>
            <div>
                {{ number_format(
    (DB::table('rating')->where('rate', '=', 1)->where('product', '=', Request::route('id'))->count() /
        DB::table('rating')->where('product', '=', Request::route('id'))->count()) *
        100,
    0,
) }}%
            </div>
        @else
            <div class="progress-bar">
                <div class="inner" style="width:0%"></div>
            </div>
            <div>0%</div>
        @endif
    </div>

</div>
