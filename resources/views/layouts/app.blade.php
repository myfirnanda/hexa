<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title', 'Hexavara')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL,GRAD,opsz@100..700,0,0,20..48" />
    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}" />
    @stack('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/scroll_top.css') }}" />
</head>
<body>
    @include('partials.header')

    @yield('content')

    @include('partials.cta-section')
    @include('partials.footer')
    @include('partials.scroll-top')
    @include('partials.hamburger-js')

    @include('partials.solutions-js')
    @stack('scripts')
    @include('partials.translation-js')
    @include('partials.count-animation')
    <script src="{{ asset('assets/js/scroll_top.js') }}"></script>
</body>
</html>
