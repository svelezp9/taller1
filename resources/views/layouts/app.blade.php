<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- <link href="{{ asset('/css/app.css') }}" rel="stylesheet" /> -->
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet" />
    <title>@yield('title', __('messages.title'))</title>
</head>

<body>

    <!-- header -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <!--<div class="logo"><a href=""><img src="logo.png"></a></div>-->
            <a class="navbar-brand" href="{{ route('home.index') }}">{{__('messages.mobile_store') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{__('messages.cLang')}}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('locale.index', ['locale'=> 'en']) }}">{{__('messages.en')}}</a>
                        <a class="dropdown-item" href="{{ route('locale.index', ['locale'=> 'es']) }}">{{__('messages.es')}}</a>
                    </div>
                </div>
            </div>

        </div>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <a class="nav-link active" href="{{ route('home.index') }}">{{__('messages.home') }}</a>
                <a class="nav-link active" href="{{ route('mobiles.index') }}">{{__('messages.all') }}</a>
                <a class="nav-link active" href="{{ route('cart.index') }}">{{__('messages.shop_cart') }}</a>
                <a class="nav-link active" href="{{ route('orders.index') }}">{{__('messages.orders') }}</a>
                <a class="nav-link active" href="{{ route('profile.index') }}">{{__('messages.profile') }}</a>
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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>