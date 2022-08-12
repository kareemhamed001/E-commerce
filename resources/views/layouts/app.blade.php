<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keywords')">
    <meta name="author" content="Kareem Turk">


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/css/splide.min.css">

    @livewireStyles
</head>
<body class="position-relative">
    <div id="app" class="vw-100 ">



        @include('layouts.inc.frontend.navbar')
            @yield('content')

    </div>

    <div id="done-modal" class="position-fixed rounded-2 rounded-circle top-50 start-50 translate-middle" style="display: none;">
        <div  class=" d-flex flex-column justify-content-center align-items-center   " >

            <span style="width: 7.5rem;height: 7.5rem;border-radius: 50%;" class=" bg-success  d-flex justify-content-center align-items-center text-white"><i style="font-size: 2.5rem;"  class="fa fa-check"></i></span>
            {{--    <span class="text-black" style="font-size: 1.5rem;">Done</span>--}}
        </div>
    </div>


    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}" ></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" ></script>
    <script src="{{ asset('assets/js/all.min.js') }}" ></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js"></script>
    <script>
        var splide = new Splide('.splide', {
            type: 'loop',
            perPage: 4,
            rewind: true,
        });

        splide.mount();
    </script>
    @livewireScripts
@stack('script')
</body>
</html>
