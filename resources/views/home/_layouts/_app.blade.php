<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Real Estate</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('asset/') }}images/logo.webp" />
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('asset') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!--Custom CSS-->
    <link href="{{ asset('asset') }}/css/style.css" rel="stylesheet" type="text/css" />
    <!--Plugin CSS-->
    <link href="{{ asset('asset') }}/css/plugin.css" rel="stylesheet" type="text/css" />
    <!--Flaticons CSS-->
    <link href="{{ asset('asset') }}/fonts/flaticon.css" rel="stylesheet" type="text/css" />
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- FancyBox CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="{{ asset('asset') }}/fonts/line-icons.css" type="text/css" />
    <style>
        @media (max-width: 1400px) and (min-width: 1300px) {

            .main_header_area .header_menu .navbar.navbar-default .nav.navbar-nav li a,
            .main_header_area.headerstye-1 .header_menu .navbar.navbar-default .nav.navbar-nav li a {

                font-size: 18px;
            }
        }
    </style>
    @yield('style')
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div id="status"></div>
    </div>


    <header class="main_header_area  @yield('nav')">
        <!-- Navigation Bar -->
        <div class="header_menu" id="header_menu">
            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-flex d-flex align-items-center justify-content-between w-100 pb-3 pt-3">
                           <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="navbar-collapse1 d-flex align-items-center justify-content-center"
                            id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav" id="responsive-menu">
                                <li class="dropdown submenu active">
                                    <a href="{{ route('home') }}" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">الرئيسية</a>
                                </li>
                                <li><a class="" href="{{ route('about') }}">من نحن</a></li>
                                <li class="submenu dropdown">
                                    <a href="{{ route('projects') }}" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">مشاريعنا
                                    </a>
                                </li>
                                <li class="submenu dropdown">
                                    <a href="{{ route('services') }}" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">خدماتنا</a>
                                </li>
                                <li class="submenu dropdown">
                                    <a href="{{ route('blogs') }}" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">المدونة
                                    </a>
                                </li>
                                <li><a class="" href="contactPage">تواصل معنا</a></li>
                                <li class="search-main">
                                    <a href="#search1" class="mt_search"><i class="fa fa-search"></i></a>
                                </li>
                            </ul>
                        </div>
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <a class="navbar-brand" href="{{ route('home') }}">
                                <img src="{{ asset('asset') }}/images/logo.webp" alt="image" />
                                <img src="{{ asset('asset') }}/images/logo.webp" alt="image" />
                            </a>
                        </div>

                        <div id="slicknav-mobile"></div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </nav>
        </div>
        <!-- Navigation Bar Ends -->
    </header>
    <!-- header ends -->

    @yield('content')

    <!--Footer-->
    <footer>
        <div class="waves">
            <div class="wave" id="wave1"></div>
            <div class="wave" id="wave2"></div>
            <div class="wave" id="wave3"></div>
            <div class="wave" id="wave4"></div>
        </div>
        <ul class="social_icon">
            <li>
                <a href="https://web.facebook.com/profile.php?id=100087543796287&_rdc=1&_rdr">
                    <ion-icon name="logo-facebook"></ion-icon>
                </a>
            </li>
            <li>
                <a href="https://twitter.com/roshemcompany">
                    <ion-icon name="logo-twitter"></ion-icon>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-brands fa-x-twitter fs-2"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-brands fa-youtube"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-brands fa-snapchat fs-2"></i>
                </a>
            </li>
            <li>
                <a href="https://www.instagram.com/roshemcompany/">
                    <ion-icon name="logo-instagram"></ion-icon>
                </a>
            </li>
        </ul>
        <ul class="menu">
            <li><a href="{{ route('home') }}">المدونة</a></li>
            <li><a href="{{ route('about') }}">من نحن</a></li>
            <li><a href="{{ route('services') }}">خدماتنا</a></li>
            <li><a href="contactPage">سياسية الخصوصية</a></li>
        </ul>
        <p>حقوق النشر والملكية ل روشم</p>
    </footer>
    <!-- footer ends -->

    <!-- Back to top start -->
    <div id="back-to-top">
        <a href="#"></a>
    </div>
    <!-- Back to top ends -->

    <!-- search popup -->
    <div id="search1">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <!-- header side menu -->
    <a href="https://wa.me/966554115160" class="whatsapp-icon" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>
    <a href="https://wa.me/966554115160" class="phone-icon" target="_blank">
        <i class="fa-solid fa-phone"></i>
    </a>
    <!-- FancyBox JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".js-video-button").fancybox({
                type: "iframe",
                iframe: {
                    preload: false, // prevents preloading, ensuring no unnecessary requests
                    css: {
                        width: "80%",
                        height: "80%",
                    },
                },
            });
        });
    </script>
    <!-- *Scripts* -->
    <script src="{{ asset('asset') }}/js/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('asset') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('asset') }}/js/plugin.js"></script>
    <script src="{{ asset('asset') }}/js/main.js"></script>
    <script src="{{ asset('asset') }}/js/custom-swiper.js"></script>
    <script src="{{ asset('asset') }}/js/custom-nav.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    @yield('scripts')
</body>

</html>
