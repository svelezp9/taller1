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

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: black">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home.index') }}">
                <img src="{{ asset('images/logo.png') }}" alt="" width="110" height="65">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <div class="navbar-nav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('home.index') }}">{{__('messages.home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('mobiles.index') }}">{{__('messages.all') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('cart.index') }}">{{__('messages.shop_cart') }}</a>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('orders.index') }}">{{__('messages.orders') }}</a>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('profile.index') }}">{{__('messages.profile') }}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-warning" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ajustes
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @guest
                                <a class="nav-link active text-dark" href="{{ route('register') }}">{{__('messages.reg') }}</a>
                                <a class="nav-link active text-dark" href="{{ route('login') }}">{{__('messages.login') }}</a>
                                @else
                                <form id="logout" action="{{ route('logout') }}" method="POST">
                                    <a role="button" class="nav-link active text-dark" onclick="document.getElementById('logout').submit();">{{__('messages.log_out') }}</a>
                                    @csrf
                                </form>
                                @endguest
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <div class="dropdown">
                                <label class="nav-link dropdown-toggle text-warning" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{__('messages.cLang')}}
                                </label>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('locale.index', ['locale'=> 'en']) }}">{{__('messages.en')}}</a>
                                    <a class="dropdown-item" href="{{ route('locale.index', ['locale'=> 'es']) }}">{{__('messages.es')}}</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
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

    <!-- Footer -->

    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">


        <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>sianse
                    </h6>
                    <p>
                        SiAnSe es una tienda de celulares
                    </p>
                </div>
                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Contacto
                    </h6>
                    <p><i class="fas fa-home me-3"></i> Medellín, MDE 050022, CO</p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        support@sianse.com
                    </p>
                    <p><i class="fas fa-phone me-3"></i> + 57 604 300 1822</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        ©️ 2022 Copyright:
        <a class="navbar-brand" href="{{ route('home.index') }}">{{__('messages.mobile_store') }}</a>
    </div>
    <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>