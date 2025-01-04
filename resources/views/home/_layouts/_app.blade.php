<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $metaTitle ?? 'روشم العقارية' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'شركة روشم العقارية، خيارك الأول للسكن والاستثمار' }}">
    @isset($metaTag)
        @if ($metaTag->canonical_link)
            <link rel="canonical" href="{{ $metaTag->canonical_link }}">
        @endif
        @if ($metaTag->schema_markup)
            <script type="application/ld+json">
        {!! $metaTag->schema_markup !!}
    </script>
        @endif
        @endif
        <meta name="google-site-verification" content="EA25pmn7jYA1WLJ7W_JU1-I_8s6NHDWeFss2cGYj0lE" />
        <!-- Google Tag Manager -->
        <script>
            (function(w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    'gtm.start': new Date().getTime(),
                    event: 'gtm.js'
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-PQ6QZ5RX');
        </script>
        <!-- End Google Tag Manager -->
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11218174378"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'AW-11218174378');
        </script>
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('asset/') }}/images/logo.webp" />
        <!-- Bootstrap core CSS -->
        <link href="{{ asset('asset') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!--Custom CSS-->
        <style>
            @import url("{{ asset('editorFonts/Al-Jazeera-Arabic-Regular.ttf') }}");

            @font-face {
                font-family: 'Al-Jazeera-Arabic-Regular';
                src: url("{{ asset('editorFonts/Al-Jazeera-Arabic-Regular.ttf') }}") format('truetype');
            }
        </style>

        <link  href="{{ asset('asset') }}/css/style.css?v=1" rel="stylesheet" type="text/css" />
        <!--Plugin CSS-->
        <link href="{{ asset('asset') }}/css/plugin.css?v=1" rel="stylesheet" type="text/css" />
        <!--Flaticons CSS-->
        <link href="{{ asset('asset') }}/fonts/flaticon.css" rel="stylesheet" type="text/css" />
        <!--Font Awesome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
            integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- FancyBox CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
        <link rel="stylesheet" href="{{ asset('asset') }}/fonts/line-icons.css" type="text/css" />

        <link rel="stylesheet" href="{{ asset('noty/noty.css') }}">
        <script src="{{ asset('noty/noty.min.js') }}" defer></script>
        <style>
            @media (max-width: 480px) {
                .menu-f {
                    display: block !important;
                }
            }

            :root {
                behavior: smooth !important;
            }

            html,
            body {
                height: 100% !important;
            }

            .slicknav_nav {
                height: 244px;
            }

            .slick-prev,
            .slick-next {
                background: #605098;
            }

            @media (min-width: 1300px) {

                .main_header_area .header_menu .navbar.navbar-default .nav.navbar-nav li a,
                .main_header_area.headerstye-1 .header_menu .navbar.navbar-default .nav.navbar-nav li a {

                    font-size: 18px;
                }
            }

            .bg-pattern {
                background-image: url("{{ asset('asset/images/bg2.png') }}");
                background-repeat: repeat;
                background-size: auto;
                background-attachment: fixed;
                background-color: rgba(255, 255, 255, 0.7) !important;
                background-blend-mode: lighten !important;
                box-shadow: inset 0 -8px 8px #fff !important;
            }

            .bg-roshem {
                background-color: #DDD0C0 !important;
            }
        </style>

        <style>
            .newsletter-subscription {
                text-align: center;
                margin: 20px 0;
            }

            .newsletter-subscription form {
                display: inline-block;
                position: relative;
            }

            .newsletter-subscription input[type="tel"] {
                width: 250px;
                padding: 10px 15px;
                border-radius: 50px;
                border: 1px solid #ccc;
                outline: none;
                font-size: 16px;
                text-align: right;
            }

            .newsletter-subscription button {
                position: absolute;
                left: 0;
                top: 0;
                bottom: 0;
                background-color: #605098;
                /* Purple color */
                color: #fff;
                border: none;
                border-radius: 50px;
                padding: 10px 20px;
                font-size: 16px;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .newsletter-subscription button:hover {
                background-color: #483d8b;
                /* Darker purple */
            }
        </style>

        <style>


            .main_header_area .header_menu .navbar.navbar-default .nav.navbar-nav li a {
                /* color: #fff; */
                font-weight: bold !important;
            }


        </style>
        @yield('style')
    </head>

    <body>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQ6QZ5RX" height="0" width="0"
                style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        <!-- Preloader -->
        <div id="preloader">
            <div id="status"></div>
        </div>


        <header class="main_header_area  @yield('nav')">
            <!-- Navigation Bar -->
            <div class="header_menu @yield('header')" id="header_menu">
                <nav class="navbar navbar-default">
                    <div class="container">
                        <div class="navbar-flex d-flex align-items-center justify-content-between w-100 pb-3 pt-3">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <a class="navbar-brand" href="{{ route('home') }}">
                                    <img src="{{ asset('asset') }}/images/logo.webp" alt="image"  loading="lazy"/>
                                    <img src="{{ asset('asset') }}/images/logo.webp" alt="image"  loading="lazy"/>
                                </a>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="navbar-collapse1 d-flex align-items-center justify-content-center"
                                id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav" id="responsive-menu">
                                    <li class="dropdown submenu active">
                                        <a href="{{ route('home') }}" class="dropdown-toggle" data-toggle="dropdown"
                                            role="button" aria-haspopup="true" aria-expanded="false">الرئيسية</a>
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
                                    <li class="submenu dropdown">
                                        <a href="{{ route('contactPage') }}" class="dropdown-toggle" data-toggle="dropdown"
                                            role="button" aria-haspopup="true" aria-expanded="false">تواصل معنا
                                        </a>
                                    </li>
                                    {{-- <li class="search-main">
                                    <a href="#search1" class="mt_search"><i class="fa fa-search"></i></a>
                                </li> --}}
                                </ul>
                            </div>

                            <div class="navbar-body">

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
        <footer class="container-fluid py-5 text-white">
            <div class="waves">
                <div class="wave" id="wave1"></div>
                <div class="wave" id="wave2"></div>
                <div class="wave" id="wave3"></div>
                <div class="wave" id="wave4"></div>
            </div>
            <div class="row">
                <!-- Social Media and Newsletter -->
                <div class="col-md-3">
                    <h5 style="font-size: 20px;
  font-weight: bold;
  color: #fff;">تابعنا</h5>
                    <ul class="social_icon">
                        @php
                            $social_sites = ['facebook', 'twitter', 'instagram', 'whatsapp', 'youtube', 'snapchat'];
                            $social_icons = [
                                'facebook' => 'fa-facebook',
                                'twitter' => 'fa-x-twitter',
                                'instagram' => 'fa-instagram',
                                'whatsapp' => 'fa-whatsapp',
                                'youtube' => 'fa-youtube',
                                'snapchat' => 'fa-snapchat',
                            ];
                        @endphp
                        @foreach ($social_sites as $social_site)
                            @php
                                $social_link = setting($social_site . '_link');
                            @endphp
                            <li class="">
                                <a href="{{ $social_link }}" target="_blank">
                                    <i class="fa-brands {{ $social_icons[$social_site] }} fs-3"></i>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="newsletter-subscription">
                        <form action="{{ route('newsletter') }}" method="POST">
                            @csrf
                            <input type="tel" name="mobile" placeholder="أدخل رقمك" required>
                            <button type="submit">تابعنا</button>
                        </form>

                    </div>
                </div>

                <!-- Services -->
                <div class="col-md-3">
                    <h5 style="font-size: 20px;
  font-weight: bold;
  color: #fff;">خدماتنا</h5>
                    <ul class="list-unstyled menu" style="display: inline-grid !important">
                        @foreach ($services as $service)
                            <li><a href="{{ route('services', $service->id) }}">{{ $service->name }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <!-- Quick Links -->
                <div class="col-md-3">
                    <h5 style="font-size: 20px;
  font-weight: bold;
  color: #fff;">روابط سريعة</h5>
                    <ul class="list-unstyled menu" style="display: inline-grid !important">
                        <li><a href="{{ route('blogs') }}">المدونة</a></li>
                        <li><a href="{{ route('about') }}">من نحن</a></li>
                        <li><a href="{{ route('contactPage') }}">اتصل بنا</a></li>
                        <li><a href="{{ route('privacy') }}">سياسية الخصوصية</a></li>
                        <li><a href="{{ route('terms') }}">الشروط والأحكام</a></li>
                    </ul>
                </div>

                <!-- Contact Information -->
                <div class="col-md-3">
                    <h5 style="font-size: 20px;
  font-weight: bold;
  color: #fff;">معلومات التواصل</h5>
                    <ul class="list-unstyled menu" style="display: inline-grid !important">
                        <li class="mb-2" style="font-size: 13px">   <a href="{{ setting('site_location') }}">  <i class="fa fa-map-marker"></i> إعمار سكوير، حي الفيحاء، جدة، المملكة العربية السعودية</a></li>
                        <li class="mb-2"><a
                                href="tel:{{ setting('site_phone') }}"><i class="fa fa-phone me-2"></i> {{ setting('site_phone') }}</a></li>
                        <li class="mb-2"><a
                                href="mailto:{{ setting('site_email') }}"><i class="fa fa-envelope me-2"></i> {{ setting('site_email') }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="text-center mt-4">
                <p>حقوق النشر والملكية ل روشم</p>
            </div>
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

        <!-- *Scripts* -->
        <script src="{{ asset('asset') }}/js/jquery-3.5.1.min.js" ></script>
        <script src="{{ asset('asset') }}/js/bootstrap.min.js" ></script>
        <script src="{{ asset('asset') }}/js/plugin.js" ></script>
        <script src="{{ asset('asset') }}/js/main.js?v=7" defer></script>
        {{-- <script src="{{ asset('asset') }}/js/custom-swiper.js"></script> --}}
        <script src="{{ asset('asset') }}/js/custom-nav.js" defer></script>

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" defer></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js" defer></script>
        <script defer>
            // Disable scroll inside the slider
            $(".review-slider, .item-slider").on("mouseenter", function() {
                $('body').css('overflow', 'visible');
            });

            // Re-enable scroll when mouse leaves the slider
            $(".review-slider, .item-slider").on("mouseleave", function() {
                $('body').css('overflow', 'visible');
            });

            $(".attract-slider, .item-slider").on("mouseleave", function() {
                $('body').css('overflow', 'visible');
            });
        </script>

        @extends('dashboard._layouts._noty')
        @yield('scripts')
    </body>

    </html>
