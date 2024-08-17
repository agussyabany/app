<!DOCTYPE html >
<html lang="en">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>DASHBOARD | TirtaKencana</title>
            @include('Liveline.layouts._asset_header')
            <meta name="theme-color" content="#712cf9">
        </head>
        <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
            @include('Liveline.layouts.header')
            @yield('content')
            @stack('scripts')
            @include('Liveline.layouts.footer')
        </body>
</html>
            @include('Liveline.layouts._asset_footer')

        {{-- //@include('sweetalert::alert') --}}


