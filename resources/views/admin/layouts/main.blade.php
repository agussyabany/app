<!DOCTYPE html >
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>Aset PDAM</title>
    @include('admin.layouts._asset_header')
    <meta name="theme-color" content="#712cf9">
</head>

    <body>


            @include('admin.layouts.header')
            @yield('content')
            @stack('scripts')
            @include('admin.layouts.footer')
        </body>
    </html>
            @include('admin.layouts._asset_footer')

        {{-- //@include('sweetalert::alert') --}}


