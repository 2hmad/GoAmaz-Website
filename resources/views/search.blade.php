<!DOCTYPE html>
<html @if (LaravelLocalization::getCurrentLocale() == 'ar') dir="rtl" @endif lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layout/head')
    <title>GoAmaz - Login</title>
</head>
<body>
    @include('layout/header')
    <div class="page">
        <div class="container">
            <div class="search-page">
                <h1>Showing search results for "Face Nask"</h1>
                <div class="multi-item-grid">
                    @include('components/homecard2')    
                    @include('components/homecard2')    
                    @include('components/homecard2')    
                    @include('components/homecard2')    
                    @include('components/homecard2')    
                    @include('components/homecard2')    
                    @include('components/homecard2')    
                    @include('components/homecard2')    
                    @include('components/homecard2')    
                </div>     
            </div>
        </div>
    </div>
    @include('layout/footer')
</body>

</html>
