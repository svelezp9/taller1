<!doctype html>

<html lang="en">

<head>

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />

    <title>@yield('title', __('messages.title'))</title>

</head>

<body>

    <!-- header -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">

        <div class="container">

            <!--<div class="logo"><a href=""><img src="logo.png"></a></div>-->

            <a class="navbar-brand" href="{{ route('home.index') }}">{{__('messages.mobile_store') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>

        </div>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">

                <a class="nav-link active" href="{{ route('home.index') }}">{{__('messages.home') }}</a>
                <a class="nav-link active" href="{{ route('mobiles.index') }}">{{__('messages.all') }}</a>
                <a class="nav-link active" href="{{ route('cart.index') }}">{{__('messages.shop_cart') }}</a>
                <a class="nav-link active" href="{{ route('orders.index') }}">{{__('messages.orders') }}</a>

            </div>

        </div>

        <div class="navbar-nav ms-auto">
            <div class="vr bg-white mx-2 d-none d-lg-block"></div>
            @guest
            <a class="nav-link active" href="{{ route('login') }}">{{__('messages.login') }}</a>
            <a class="nav-link active" href="{{ route('register') }}">{{__('messages.reg') }}</a>
            @else
            <form id="logout" action="{{ route('logout') }}" method="POST">
                <a role="button" class="nav-link active" onclick="document.getElementById('logout').submit();">{{__('messages.log_out') }}</a>
                @csrf
            </form>
            @endguest
        </div>
    </nav>

    <header class="masthead bg-primary text-white text-center py-4">
        <div class="container d-flex align-items-center flex-column">
            <h2>@yield('subtitle', __('messages.SiAnSe') )</h2>
        </div>
    </header>

    <!-- header -->

    <div class="container my-4">
        @yield('content')
    </div>

    <!-- footer -->
    <div class="copyright py-4 text-center text-white">
        <div class="container">
            <small>
                {{__('messages.copyr') }} <a class="text-reset fw-bold text-decoration-none" target="_blank" href="https://twitter.com/danielgarax">
                {{__('messages.daniel') }}
                </a>
            </small>
        </div>
    </div>
    <!-- footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>