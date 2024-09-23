<!DOCTYPE html >
<html lang="en">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <meta name="description" content="">
            <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
            <meta name="generator" content="Hugo 0.118.2">
            <title>Aset PDAM</title>
            @include('diklat.mobile.layouts._asset_header')
            <meta name="theme-color" content="#712cf9">
        </head>
        <body>

            <title>DASHBOARD | TirtaKencana</title>
            @include('diklat.mobile.layouts._asset_header')
            <meta name="theme-color" content="#712cf9">
        </head>
        <body id="mobile_wrap">

            @include('diklat.mobile.layouts.header')
            @yield('content')
            @stack('scripts')
            @include('diklat.mobile.layouts.footer')
        </body>
</html>
            @include('diklat.mobile.layouts._asset_footer')

        {{-- //@include('sweetalert::alert') --}}


