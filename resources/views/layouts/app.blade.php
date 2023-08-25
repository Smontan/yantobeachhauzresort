<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
    {{-- Styles --}}
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    
    {{-- Internation code styles for Phone number --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.css">

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href=" {{asset('admin/vendors/mdi/css/materialdesignicons.min.css')}} ">
    
    {{-- Soft Ui CSS Styles --}}
    <link id="pagestyle" href="{{ asset('assets/css/soft_ui_styles/soft-ui-dashboard.css?v=1.0.6') }}" rel="stylesheet" />

    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/soft_ui_styles/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/soft_ui_styles/nucleo-svg.css') }}" rel="stylesheet" />

    {{-- Fontawesome offline icons --}}
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css')}}">

    {{-- Fonts and Icons --}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    @livewireStyles
</head>
<body>
    <div id="app">
        @include('layouts.partials.frontend.navbar')

        <main >
            @yield('content')
        </main>
    </div>
    @include('layouts.partials.frontend.footer')

    {{-- Scripts --}}
    
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-3.6.4.min.js')}}"></script>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
</body>
</html>
