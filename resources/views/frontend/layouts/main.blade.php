<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('frontend/css/news.css') }}"/>
    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}"/>
</head>

<body>
@include('frontend.layouts.slide')
@include('frontend.layouts.header')
<!--Main container start -->
<main class="main-container">
    @yield('content')
</main>
@include('frontend.layouts.footer')
</body>
</html>