<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}" />

    <script src="{{ asset('js/alpine.min.js') }}" defer></script>
    <script src="{{ asset('js/init-alpine.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    @livewireStyles

</head>

<body>
    @include('header')
    <div class="flex bg-gray-50 dark:bg-gray-900 h-screen">
        
        <img src="https://loremflickr.com/cache/resized/65535_52279038739_b68757436d_b_900_300_nofilter.jpg" width="100%">

    </div>
    @include('footer')
    @stack('modals')

    @livewireScripts
</body>

</html>
