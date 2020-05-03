<!-- header-area-start -->
<header>

    <div class="header-area blue2-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-5 col-sm-8">
                    <div class="header-wrapper">
                        <div class="header-left">
                            <div class="header-icon">
                                <span class="ti-headphone-alt"></span>
                            </div>
                            <div class="header-text">
                                <span>(+225) 47 790 119</span>
                            </div>
                        </div>
                        <div class="header-left">
                            <div class="header-icon">
                                <span class="ti-email"></span>
                            </div>
                            <div class="header-text">
                                <span>support@lifesoftci.com</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6 col-md-7 col-sm-4">
                    <div class="header-right-wrapper ">
                        <div class="header-left header2-left d-none d-md-block">
                            <div class="header-icon">
                                <span class="ti-key"></span>
                            </div>
                        </div>
                        <ul class="header-right-text">
                            <li><a href="{{ route('Site-LoginGetShow') }}">Connexion</a></li>
                            <li><a href="{{ route('Site-RegisterGetShow') }}">Inscription</a></li>
                        </ul>
                        <div class="header-top-icon d-none d-md-block">
                            <a href="https://www.facebook.com/lifesoftci"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com/lifesoftci"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.youtube.com/channel/UCBqXWKEZZ4d8ZfcgWE681ZQ"><i
                                    class="fab fa-youtube"></i></a>
                            <a href="https://www.linkedin.com/company/lifesoftci"><i
                                    class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="sticky-header" class="header-top-area header-2">
        <div class="container">
            <div class="row">
                <div class="col-xl-1 col-lg-1">
                    <div class="logo">
                        <a href="{{ route('Site-HomeGetShow') }}"><img src="/file/image/website/logo/midd.jpeg"
                                alt="logo MIDD" style="width:80px; height: 100px; margin-top: -25px;" /></a>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8">
                    <div class="main-menu text-right">
                        <nav id="mobile-menu">
                            <ul>
                                 <li class=""><a href="{{ route('Site-HomeGetShow') }}">Accueil </a></li>
                                {{--<li class=""><a href="{{ route('Site-HomeGetShow') }}#hosting">Hébergement</a></li>
                                <li class=""><a href="{{ route('Site-DomaineGetShow') }}">Domaine</a></li>--}}
                                <li class=""><a href="{{ route('Site-HomeGetShow') }}#about">A propos</a></li>
                                <li class=""><a href="{{ route('Site-HomeGetShow') }}#services">Services</a></li>
                                <li class=""><a href="{{ route('Site-HomeGetShow') }}#temoignage">Nos Adhérents</a></li>
                                <li class=""><a href="{{ route('Site-HomeGetShow') }}#footer">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="mobile-menu"></div>
                </div>
                <div class="col-xl-3 col-lg-3">
                    <div class="header-right f-right d-none d-md-none d-lg-block mt-souscribe">
                        <a href="{{ route('Site-LoginGetShow') }}" class="btn" data-animation="fadeInRight"
                            data-delay=".7s" href="#">Connectez - vous</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
<!-- header-area-end -->
