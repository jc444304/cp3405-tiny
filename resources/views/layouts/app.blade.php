<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script defer>
        // Author: Yvan Burrie
        window.addEventListener('scroll', function (event) {

            const ontop = 'navbar-ontop';
            const navbar = $('.navbar');
            const computedStyle = getComputedStyle(document.documentElement);
            const navbarHeightMin = computedStyle.getPropertyValue('$navbar-height-min');
            const navbarHeightMax = computedStyle.getPropertyValue('$navbar-height-max');

            if (scrollY > 50) {
                if (navbar.hasClass(ontop)) {
                    navbar.removeClass(ontop);
                    navbar.animate({
                        height: navbarHeightMin
                    }, 100);
                }
            } else {
                if (navbar.hasClass(ontop) === false) {
                    navbar.addClass(ontop);
                    navbar.animate({
                        height: navbarHeightMax
                    }, 500);
                }
            }
        });
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <div class="flex-container">
            <nav class="navbar navbar-expand-lg navbar-light navbar-ontop bg-white fixed-top shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('images/logo.svg') }}" alt="{{ config('app.name') }}" title="{{ config('app.name') }}" id="logo" />
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="about">About</a>
                            </li>
                            @if (Route::current()->getName() !== '/')
                            <form class="form-inline my-2 my-lg-0" action="{{ route('search') }}" method="POST">
                                @csrf
                                <input class="form-control mr-sm-2" type="search" placeholder="Enter search term ..." aria-label="'Search" name="search_term">
                                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                            </form>
                            @endif
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('profile.index') }}">Profile</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>


                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="site-content">
                @yield('content')
            </main>
            <footer>
                <div class="footer-container">
                    <div class="footer-section copyright">
                        <p><b>JCU JOBLINK</b><br> &copy; 2019 Joblink Pty. Ltd.<br> ABN 46253211955</p>
                    </div>
                    <div class="footer-section affiliates">
                        <div class="affiliates-traditional-text">
                            <div class="affiliate-icon-link"><a class="footer-affiliate-link" href="https://www.jcu.edu.au/ierc" title="Indigenous Education Link">
                                    <img class="footer-affiliate-link-image5" src="/images/footer/affiliates-icons/aboriginal-flag.svg" height="60" alt="Aboriginal Flag"></a>
                            </div>
                            <span class="footer-traditional-text">We acknowledge Australian Aboriginal People and Torres Strait Islander People as the first inhabitants of the nation, and acknowledge Traditional Owners of the lands where our staff and students live, learn and work.</span>
                            <div class="affiliate-icon-link"><a class="footer-affiliate-link" href="https://www.jcu.edu.au/ierc" title="Indigenous Education Link">
                                    <img class="footer-affiliate-link-image5" src="/images/footer/affiliates-icons/torres-strait.svg" height="60" alt="Torres Strait Flag"></a>
                            </div>
                        </div>
                        <div class="footer-affiliate-icon-section">
                            <div class="affiliate-icon-link"><a class="footer-affiliate-link" href="http://www.studyinaustralia.gov.au/global/why-australia" title="Australia Future Unlimited">
                                    <img class="footer-affiliate-link-image1" src="/images/footer/affiliates-icons/australia-future-unlimited.svg" height="60" alt="Australia Future Unlimited logo"></a>
                            </div>
                            <div class="affiliate-icon-link"><a class="footer-affiliate-link" href="https://www.iru.edu.au/" title="Innovative Research Universities">
                                    <img class="footer-affiliate-link-image2" src="/images/footer/affiliates-icons/innovative-research-universities.svg" alt="Innovative Research Universities logo"></a>
                            </div>
                            <div class="affiliate-icon-link"><a class="footer-affiliate-link" href="https://www.universitiesaustralia.edu.au/" title="Universities Australia">
                                    <img class="footer-affiliate-link-image3" src="/images/footer/affiliates-icons/universities-australia-2018-blue.svg" alt="Universities Australia logo"></a>
                            </div>
                            <div class="affiliate-icon-link"><a class="footer-affiliate-link" href="https://www.jcu.edu.au/state-of-the-tropics" title="State Of The Tropics">
                                    <img class="footer-affiliate-link-image4" src="/images/footer/affiliates-icons/SOTT3.svg" alt="State Of The Tropics logo"></a>
                            </div>
                        </div>
                    </div>
                    <div class="footer-section footer-social">
                        <div class="footer-social-text-section"><h4><b>Stay Social #jculife</b></h4></div>
                        <div class="footer-social-icon-section">
                            <div class="social-icon-link"><a class="footer-social-link" href="https://www.facebook.com/jamescookuniversity" title="Facebook">
                                    <img class="footer-social-link-image" src="/images/footer/social-icons/icon-facebook.svg" alt="Facebook logo"></a>
                            </div>
                            <div class="social-icon-link"><a class="footer-social-link" href=https://twitter.com/jcu" title="Twitter">
                                    <img class="footer-social-link-image" src="/images/footer/social-icons/icon-twitter.svg" alt="Twitter logo"></a>
                            </div>
                            <div class="social-icon-link"><a class="footer-social-link" href="https://www.instagram.com/jamescookuniversity/" title="Instagram">
                                    <img class="footer-social-link-image" src="/images/footer/social-icons/icon-instagram.svg" alt="Instagram logo"></a>
                            </div>
                            <div class="social-icon-link"><a class="footer-social-link" href="https://www.linkedin.com/school/james-cook-university/" title="LinkedIn">
                                    <img class="footer-social-link-image" src="/images/footer/social-icons/icon-linkedin.svg" alt="LinkedIn logo"></a>
                            </div>
                            <div class="social-icon-link"><a class="footer-social-link" href="https://www.youtube.com/jamescookuniversity" title="Facebook">
                                    <img class="footer-social-link-image" src="/images/footer/social-icons/icon-youtube.svg" alt="Youtube logo"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>
