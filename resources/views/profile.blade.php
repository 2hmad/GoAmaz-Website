<!DOCTYPE html>
<html @if (LaravelLocalization::getCurrentLocale() == 'ar') dir="rtl" @endif lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layout/head')
    <title>My profile - GoAmaz</title>
</head>

<body>
    @include('layout/header')
    <div class="page">
        <div class="container">
            <div class="profile-page">
                <form method="POST" action="{{ route('update_info') }}">
                    @csrf
                    <div class="profile-image">
                        @if ($profile->pic == '')
                            <img src="/images/profile-placeholder.png" alt="User">
                        @else
                            <img src="{{ $profile->pic }}" alt="{{ $profile->name }} picture">
                        @endif
                    </div>
                    <input type="text" name="name" placeholder="{{ __('home.your-name') }}"
                        value="{{ $profile->name }}">
                    <input type="text" name="phone" placeholder="{{ __('home.phone') }}"
                        value="{{ $profile->phone }}">
                    @include('components/countries')
                    <input type="text" name="city" placeholder="{{ __('home.city') }}" value="{{ $profile->city }}">
                    <button type="submit">{{ __('home.save-changes') }}</button>
                </form>
                <hr style="width: 100%;margin-top: 5%;margin-bottom: 3%;border: 1px solid #e1e1e1;" />
                <div style="width: 100%">
                    <form method="POST" action="{{ route('update_password') }}">
                        @csrf
                        <input type="password" name="password" placeholder="{{ __('home.new-password') }}">
                        <input type="password" name="confirm_password"
                            placeholder="{{ __('home.confirm-new-password') }}">
                        <button type="submit">{{ __('home.change-password') }}</button>
                    </form>
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                    @if (Session::has('success'))
                        <div class="success-message">Changed Successfully</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('layout/footer')
</body>

</html>
