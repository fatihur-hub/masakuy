<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{config('app.name')}}</title>
    
    <link rel="shortcut icon" href="{{asset('icon/icon-hitam.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('UI/assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('UI/assets/css/swiper-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('UI/assets/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('UI/assets/css/aos.min.css') }}">
    <link rel="stylesheet" href="{{ asset('UI/assets/css/Hero-Carousel-images.css') }}">
    <link rel="stylesheet" href="{{ asset('UI/assets/css/Search-Field-With-Icon.css') }}">
    <link rel="stylesheet" href="{{ asset('UI/assets/css/Search-Input-Responsive-with-Icon.css') }}">
    <link rel="stylesheet" href="{{ asset('UI/assets/css/Simple-Slider-swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('UI/assets/css/Simple-Slider.css') }}">
    <link rel="stylesheet" href="{{ asset('UI/assets/css/Team-icons.css') }}">
</head>

<body>
    <!-- Start: Navbar Centered Links -->
    <nav class="navbar  navbar-expand-md mb-4 fixed-top bg-body py-3"
        style="position: fixed;display: flex;width: 100%;">
        <div class="container"><a class="navbar-brand d-flex align-items-center"
                href="{{url('/')}}"><span>MasaKuy</span></a><button data-bs-toggle="collapse" class="navbar-toggler"
                data-bs-target="#navcol-3"><span class="visually-hidden">Toggle navigation</span><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-3">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Artikel</a></li>
                    <li class="nav-item"></li>
                </ul>
                @if (Auth::guest())
                    <a href="{{ route('login') }}" class="btn btn-primary" type="button"
                        style="margin: 0px;margin-right: 14px;">Login</a>
                @else
                    <a href="/home" class="btn btn-outline-secondary" type="button">Home</a>
                @endif

            </div>
        </div>
    </nav><!-- End: Navbar Centered Links -->


    <div class="container" style="margin-bottom: 70px;">
        <!-- Start: Navbar Centered Links -->
        <nav class="navbar navbar-expand-md fixed-top bg-body py-3" style="position: fixed;display: flex;width: 100%;">
            <div class="container"><a class="navbar-brand d-flex align-items-center"
                    href="#"><span>MasaKuy</span></a><button data-bs-toggle="collapse" class="navbar-toggler"
                    data-bs-target="#navcol-3"><span class="visually-hidden">Toggle navigation</span><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-3">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item"><a class="nav-link active" href="{{ url('/') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('indexartikel') }}">Artikel</a></li>
                        <li class="nav-item"></li>
                    </ul>
                    @if (Auth::guest())
                        <a href="{{ route('login') }}" class="btn btn-primary" type="button"
                            style="margin: 0px;margin-right: 14px;">Login</a>
                    @else
                        <a href="/home" class="btn btn-outline-secondary" type="button">Home</a>
                    @endif
                </div>
            </div>
        </nav><!-- End: Navbar Centered Links -->
    </div>
    @yield('content')
    <!-- Start: Footer Basic -->
    <footer class="text-center">
        <div class="container text-muted py-4 py-lg-5">
            <ul class="list-inline">
                <li class="list-inline-item me-4"></li>
                <li class="list-inline-item me-4"></li>
            </ul>
            <p class="mb-0">Copyright © 2023&nbsp;<br><a href="#"><span
                        style="color: RGBA(86,94,100,var(--bs-link-opacity,1));">C523-PR090</span></a><br><br></p>
        </div>
    </footer><!-- End: Footer Basic -->
    <script src="{{ asset('UI/assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('UI/assets/js/aos.min.js') }}"></script>
    <script src="{{ asset('UI/assets/js/bs-init.js') }}"></script>
    <script src="{{ asset('UI/assets/js/Simple-Slider-swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('UI/assets/js/Simple-Slider.js') }}"></script>
</body>

</html>
