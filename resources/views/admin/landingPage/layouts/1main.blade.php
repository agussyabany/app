<!DOCTYPE html >
<html class="no-js"  lang="en">

        <head>
            <meta charset="utf-8">
            <meta http-equiv="x-ua-compatible" content="ie=edge">
            <title>simAset</title>
            <link rel="shortcut icon" type="image/x-icon" href="../pic/favicon.ico" />
            <meta name="description" content="">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Aset PDAM</title>
            @include('admin.landingPage.layouts._asset_header')
            <meta name="theme-color" content="#712cf9">
        </head>
        <body>
            @include('admin.landingPage.layouts.header')
            @yield('content')
            @stack('scripts')
            @include('admin.landingPage.layouts.footer')
        </body>
</html>
@include('admin.landingPage.layouts._asset_footer')


