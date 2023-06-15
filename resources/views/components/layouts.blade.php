<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">

    <!-- =================== CSS ========================= -->
    {{-- Font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}">
    {{-- Sweetalert --}}
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.10/dist/sweetalert2.min.css" rel="stylesheet">
    {{-- CSS plugins --}}
    <link rel="stylesheet" href="{{ asset('css/plugins/animation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/feature.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/magnify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>jobradar</title>
</head>

<body class="active-dark-mode">
    <main class="page-wrapper">
        <!-- Start Header Area  -->
        <header class="rn-header header-default header-not-transparent header-sticky">
            <div class="container position-relative">
                <div class="row align-items-center row--0">
                    <div class="col-lg-3 col-md-6 col-4">
                        <div class="logo">
                            <a href="/">
                                <img class="logo-light" src="{{ asset('images/logo/logo.png') }}" alt="Corporate Logo">
                                <img class="logo-dark" src="{{ asset('images/logo/logo-dark.png') }}"
                                    alt="Corporate Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-6 col-8 position-static">
                        <div class="header-right">

                            <div class="row align-items-center row--0">
                                <nav class="mainmenu-nav d-none d-lg-block">
                                    <ul class="mainmenu">
                                        <li><a href="/">Home</a></li>
                                        <li><a href="/">About</a></li>
                                        <li><a href="/">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                            @auth
                                <nav class="mainmenu-nav d-none d-lg-block">
                                    <div class="mainmenu">
                                        <a class="btn-default btn-small round" href="javascript:void()">Welcome
                                            {{ auth()->user()->name }}</a>
                                    </div>
                                </nav>
                                <!-- Start Header Btn  -->
                                <div class="header-btn d-none d-lg-block">
                                    <a class="btn-default btn-small round" href="single_job/manage">Manage Jobs
                                    </a>
                                </div>
                                <!-- End Header Btn  -->
                                <!-- Start Header Btn  -->
                                <div class="header-btn d-none d-lg-block">
                                    <form method="POST" action="/logout">
                                        @csrf
                                        <button class="btn-default btn-small round">
                                            Logout
                                        </button>
                                    </form>
                                </div>
                                <!-- End Header Btn  -->
                            @else
                                <nav class="mainmenu-nav d-none d-lg-block" style="margin-left: 20rem">
                                    <ul class="mainmenu">

                                        <div class="me-3"><a class="btn-default btn-small round" href="/login">Login</a>
                                        </div>
                                        <div class=""><a class="btn-default btn-small round"
                                                href="/register">Register</a></div>

                                    </ul>
                                </nav>
                            @endauth
                            <!-- Start Mobile-Menu-Bar -->
                            <div class="mobile-menu-bar ml--5 d-block d-lg-none">
                                <div class="hamberger">
                                    <button class="hamberger-button">
                                        <i class="feather-menu"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- Start Mobile-Menu-Bar -->


                            <div id="my_switcher" class="my_switcher">
                                <ul>
                                    <li>
                                        <a href="javascript: void(0);" data-theme="light" class="setColor light">
                                            <img class="sun-image" src="{{ asset('images/icons/sun-01.svg') }}"
                                                alt="Sun images">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);" data-theme="dark" class="setColor dark">
                                            <img class="Victor Image" src="{{ asset('images/icons/vector.svg') }}"
                                                alt="Vector Images">
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- End Header Area  -->
        <div class="popup-mobile-menu">
            <div class="inner">
                <div class="header-top">

                    <div class="logo">
                        <a href="/">
                            <img class="logo-light" src="{{ asset('images/logo/logo.png') }}" alt="Corporate Logo">
                            <img class="logo-dark" src="{{ asset('images/logo/logo-dark.png') }}"
                                alt="Corporate Logo">
                        </a>
                    </div>
                    <div class="close-menu">
                        <button class="close-button">
                            <i class="feather-x"></i>
                        </button>
                    </div>
                </div>
                <ul class="mainmenu">

                    @auth
                        <a class="btn-default btn-small round mb-3" href="javascript:void()">Welcome
                            {{ auth()->user()->name }}</a>
                        <div class="d-flex mb-3">
                            <!-- Start Header Btn  -->
                            <div class="header-btn me-3"><a class="btn-default btn-small round"
                                    href="single_job/manage">Manage
                                    Jobs</a></div>
                            <!-- End Header Btn  -->
                            <!-- Start Header Btn  -->
                            <div class="header-btn">
                                <form method="POST" action="/logout">
                                    @csrf
                                    <button class="btn-default btn-small round">
                                        Logout
                                    </button>
                                </form>
                            </div>
                            <!-- End Header Btn  -->
                        @else
                            <nav class="mainmenu-nav d-flex">
                                <div class="me-3 mb-3"><a class="btn-default btn-small round" href="/login">Login</a>
                                </div>
                                <div class=""><a class="btn-default btn-small round" href="/register">Register</a>
                                </div>
                            </nav>
                        @endauth
                    </div>
                    <li><a href="/">Home</a></li>
                    <li><a href="/">About</a></li>
                    <li><a href="/">Contact</a></li>
                </ul>
            </div>
        </div>


        <main>
            {{ $slot }}
        </main>
        <!-- Start Footer Area  -->
        <footer class="rn-footer footer-style-default variation-two">
            <div class="rn-callto-action clltoaction-style-default style-7">
                <div class="container">
                    <div class="row row--0 align-items-center content-wrapper">
                        <div class="col-lg-8 col-md-8">
                            <div class="inner">
                                <div class="content text-left">
                                    <div class="logo">
                                        <a href="/">
                                            <img class="logo-light" src="{{ asset('images/logo/logo.png') }}"
                                                alt="Corporate Logo">
                                            <img class="logo-dark" src="{{ asset('images/logo/logo-dark.png') }}"
                                                alt="Corporate Logo">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4" data-sal="slide-up" data-sal-duration="400"
                            data-sal-delay="150">
                            <div class="call-to-btn text-left mt_sm--20 text-lg-right">
                                <a class="btn-default" href="/single_job/create">Create Job
                                    <i class="feather-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer Area  -->
        <!-- Start Copy Right Area  -->
        <div class="copyright-area copyright-style-one">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-8 col-sm-12 col-12">
                        <div class="copyright-left">
                            <ul class="ft-menu link-hover">
                                <li>
                                    <a href="#">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="#">Terms And Condition</a>
                                </li>
                                <li>
                                    <a href="#">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-12 col-12">
                        <div class="copyright-right text-center text-lg-end">
                            <p class="copyright-text">© Gilbert Goodnews -- RG</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Copy Right Area  -->
    </main>
    <!-- All Scripts  -->
    <!-- Start Top To Bottom Area  -->
    <div class="rn-back-top">
        <i class="feather-arrow-up"></i>
    </div>
    <!-- End Top To Bottom Area  -->
    <!-- JS
============================================ -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.10/dist/sweetalert2.all.min.js"></script>
    <x-flash-message />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/vendor/modernizr.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('js/vendor/waypoint.min.js') }}"></script>
    <script src="{{ asset('js/vendor/wow.min.js') }}"></script>
    <script src="{{ asset('js/vendor/counterup.min.js') }}"></script>
    <script src="{{ asset('js/vendor/feather.min.js') }}"></script>
    <script src="{{ asset('js/vendor/sal.min.js') }}"></script>
    <script src="{{ asset('js/vendor/masonry.js') }}"></script>
    <script src="{{ asset('js/vendor/imageloaded.js') }}"></script>
    <script src="{{ asset('js/vendor/magnify.min.js') }}"></script>
    <script src="{{ asset('js/vendor/lightbox.js') }}"></script>
    <script src="{{ asset('js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('js/vendor/easypie.js') }}"></script>
    <script src="{{ asset('js/vendor/text-type.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery.style.swicher.js') }}"></script>
    <script src="{{ asset('js/vendor/js.cookie.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery-one-page-nav.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
