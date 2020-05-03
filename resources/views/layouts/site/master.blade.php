<!doctype html>
<html class="no-js" lang="fr-fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Mouvement des Instituteurs</title>
    <meta name="description"
        content="Mouvement">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" lang="fr" content="MIDD, ">
    <meta name="robots" content="index, follow">
    <meta name="distribution" content="global">
    <meta name="revisit-after" content="7 days">
    <meta name="identifier-url" content="https://www.midd.com">
    <meta http-equiv="Content-Language" content="fr-fr">
    <meta name="Geography" content="Côte d'Ivoire">
    <meta name="country" content="Côte d'Ivoire">
    <!--<link rel="shortcut icon" type="image/x-icon" href="/file/image/website/favicon.png">-->

    <meta property="og:type" content="website">
    <meta property="og:title" content="Mouvement des instituteurs">
    <meta property="og:site_name" content="MIDD">
    <meta property="og:url" content="https://www.midd.com">
    <meta property="og:description"
        content="Mouvement des instituteurs">
    <meta property="og:image" content="https://www.winihost.com/file/image/logo/midd.jpeg">
    <meta property="og:locale" content="fr_FR">

    <!-- Place favicon.png in the root directory -->
    <!-- CSS here -->
    <link rel="stylesheet" href="/dist/site/css/bootstrap.min.css">
    <link rel="stylesheet" href="/dist/site/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/dist/site/css/animate.min.css">
    <link rel="stylesheet" href="/dist/site/css/nice-select.css">
    <link rel="stylesheet" href="/dist/site/css/themify-icons.css">
    <link rel="stylesheet" href="/dist/site/css/magnific-popup.css">
    <link rel="stylesheet" href="/dist/site/css/jquery-ui.css">
    <link rel="stylesheet" href="/dist/site/css/meanmenu.css">
    <link rel="stylesheet" href="/dist/site/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/dist/site/css/slick.css">
    <link rel="stylesheet" href="/dist/site/css/default.css">
    <link rel="stylesheet" href="/dist/site/css/style.css">
    <link rel="stylesheet" href="/dist/site/css/responsive.css">

    {{-- Toastr css --}}
    @if (session('MsgFlash'))
    <link href="{{ asset('/dist/admin/plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    @endif

    <style type="text/css">
        body {
            overflow-x: hidden;
        }
    </style>

</head>

<body>

    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    @include('layouts.site.header')

    @yield('content')

    @include('layouts.site.footer')

    <!-- JS here -->
    <script src="/dist/site/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="/dist/site/js/vendor/jquery.min.js"></script>
    <script src="/dist/site/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="/dist/site/js/waypoints.min.js"></script>
    <script src="/dist/site/js/jquery.counterup.min.js"></script>
    <script src="/dist/site/js/bootstrap.min.js"></script>
    <script src="/dist/site/js/owl.carousel.min.js"></script>
    <script src="/dist/site/js/jquery.nice-select.min.js"></script>
    <script src="/dist/site/js/jquery.meanmenu.min.js"></script>
    <script src="/dist/site/js/slick.min.js"></script>
    <script src="/dist/site/js/ajax-form.js"></script>
    <script src="/dist/site/js/wow.min.js"></script>
    <script src="/dist/site/js/jquery.scrollUp.min.js"></script>
    <script src="/dist/site/js/jquery-ui.js"></script>
    <script src="/dist/site/js/jquery.magnific-popup.min.js"></script>
    <script src="/dist/site/js/plugins.js"></script>
    <script src="/dist/site/js/main.js"></script>

    {{-- Toastr js --}}
    @if (session('MsgFlash'))
    <script src="{{ asset('/dist/admin/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('/dist/admin/plugins/toastr/toastr.init.js') }}"></script>
    <script type="text/javascript">
        toastr.{{ session('MsgFlash')['type'] }}("{{ session('MsgFlash')['msg'] }}")
    </script>
    @endif

    <script>
        $(document).ready(function(){
            $('.main-menu nav ul li').click(function(){
                $('li').removeClass("active");
                $(this).addClass("active");
            });
        });
    </script>

    <script>
        new WOW().init();
    </script>

    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5d7105fb77aa790be33293a2/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script>

    @include('layouts.partage.google-analytic')
    @include('layouts.partage.recaptcha')

    @yield('js')

</body>

</html>
