@extends('home._layouts._app')

@section('style')
    <style>
        .list-results .nice-select {
            width: 175px;
        }
    </style>
    <style>
        .discount-action {
            width: 100%;
        }

        @media (max-width: 1400px) and (min-width: 1300px) {

            .main_header_area .header_menu .navbar.navbar-default .nav.navbar-nav li a,
            .main_header_area.headerstye-1 .header_menu .navbar.navbar-default .nav.navbar-nav li a {

                font-size: 18px;
            }
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p {
            text-align: right !important;
        }

        .why-us-content {
            h3 {
                text-align: center !important;
            }

            p {
                text-align: center !important;
            }
        }

        .section-title {
            h2 {
                text-align: center !important;
            }

            p {
                text-align: center !important;
            }
        }

        .our-mission {
            padding: 50px 0;
            background-color: #f9f9f9;
            text-align: center;
        }

        .our-mission .mission-text {
            font-size: 1.2em;
            line-height: 1.8;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 15px;
            border-radius: 8px;
            border: 2px solid #10887c;
        }

        .our-mission .mission-text:hover {
            color: #10887c;
            transition: 0.3s ease-in-out;
        }

        .serviceBox {
            color: #777;
            background: #128c7e;
            text-align: center;
            padding: 80px 20px 30px;
            border-radius: 10px 10px;
            position: relative;
            margin: 80px auto 0;
            z-index: 1;
        }

        .serviceBox:before {
            content: "";
            background: #fff;
            width: calc(100% - 15px);
            height: calc(100% + 40px);
            border-radius: 10px 10px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.4);
            transform: translateX(-50%) translateY(-50%);
            position: absolute;
            top: 50%;
            left: 50%;
            z-index: -1;
        }

        .serviceBox .service-icon {
            color: #128c7e;
            background: #128c7e;
            font-size: 45px;
            line-height: 100px;
            height: 100px;
            width: 100px;
            border-radius: 10px 10px;
            clip-path: polygon(25% 0%,
                    75% 0%,
                    100% 50%,
                    75% 100%,
                    25% 100%,
                    0% 50%);
            transform: translateX(-50%);
            position: absolute;
            top: -65px;
            left: 50%;
            margin: 0 auto;
        }

        .serviceBox .service-icon:before {
            content: "";
            background: #fff;
            width: calc(100% - 30px);
            height: calc(100% - 30px);
            border-radius: 50% 50%;
            transform: translateX(-50%) translateY(-50%);
            position: absolute;
            top: 50%;
            left: 50%;
            z-index: -1;
        }

        .serviceBox .title {
            color: #128c7e;
            font-size: 18px;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin: 0 0 7px;
        }

        .serviceBox .description {
            font-size: 13px;
            letter-spacing: 0.5px;
            line-height: 23px;
            margin: 0;
        }

        .serviceBox.green {
            --color: #44bd32;
        }

        .serviceBox.pink {
            --color: #e42485;
        }

        .serviceBox.orange {
            --color: #e65811;
        }

        @media only screen and (max-width: 990px) {
            .serviceBox {
                margin: 80px auto 100px;
            }
        }
    </style>
@endsection
@section('scripts')
@endsection
@section('content')
    <!-- about-us starts -->
    <div class="banner py-6"
        style="
        background-image: url({{ asset('home') }}/images/shape-1.png);
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
      ">
        <div class="section-title mb-6 pb-1 w-75 text-center mx-auto">
            <h2 class="m-0 text-center">عن روشم</h2>
        </div>
    </div>
    <section class="about-us pb-6">
        <div class="container">
            <div class="about-image-box">
                <div class="row d-flex align-items-center justify-content-between text-lg-start text-center">
                    <div class="col-lg-7 col-sm-12 mb-4">
                        <div class="about-content">
                            <h4 class="theme">من نحن</h4>
                            <p class="border-b mb-2 pb-2">
                            <div dir="rtl" style="text-align: right">
                                {!! $about->who_are_we !!}
                            </div>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-12 mb-4">
                        <div class="about-image p-3 box-shadow position-relative">
                            {{-- <img src="{{ asset('asset/images/Background.png') }}" alt="" class="w-100" /> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-us ends -->

    <section class="education" id="education">
        <h2 class="heading mb-6"><span>تاريخنا</span></h2>
        <div class="container">
            <div class="education-row" style="
                /* flex-direction: row-reverse */
                ">
                <div class="education-column">
                    <div class="education-box">
                        <div class="education-content">
                            <div class="content">
                                <div class="year">
                                    <i class="fa-solid fa-calendar-days fa-lg"></i>2003
                                </div>
                                <h3>البداية</h3>
                                <p>
                                    كانت البداية في مدينة الرياض ببناء فيلات سكنية وإدارة أملاك لعدة مشاريع سكنية
                                    وتجارية
                                </p>
                            </div>
                        </div>
                        <div class="education-content">
                            <div class="content">
                                <div class="year">
                                    <i class="fa-solid fa-calendar-days fa-lg"></i>2010
                                </div>
                                <h3>التوسع في مدينة الرياض</h3>
                                <p>
                                    توسعت الشركة وزادت من حجم المشاريع لتشمل العديد من الأحياء في مدينة الرياض وضواحيها.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="education-column">
                    <div class="education-box">
                        <div class="education-content">
                            <div class="content">
                                <div class="year">
                                    <i class="fa-solid fa-calendar-days fa-lg"></i>2020
                                </div>
                                <h3>التوسع في مدينة جدة</h3>
                                <p>
                                    انطلقت الشركة نحو التوسع في مدينة جدة، حيث تم تنفيذ عدة مشاريع عمائر سكنية في مختلف
                                    الأحياء.
                                </p>
                            </div>
                        </div>
                        <div class="education-content">
                            <div class="content">
                                <div class="year">
                                    <i class="fa-solid fa-calendar-days fa-lg"></i> 2023
                                </div>
                                <h3>التحالف</h3>
                                <p>
                                    أبرمت الشركة تحالفات استراتيجية مع شركة خليجية لتطوير مجموعة من المشاريع في عدة
                                    أحياء بمدينة جدة.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="our-mission bg-pattern">
        <div class="container">
            <div class="row gap-5">
                <div class="col-lg-12">
                    <div class="serviceBox">
                        <div class="service-icon">
                            <span><i class="fa-solid fa-eye"></i></span>
                        </div>
                        <h3 class="title text-center" style="font-size: 32px; margin-bottom: 15px">
                            رؤيتنا
                        </h3>
                        <p class="description text-center" style="font-size: 20px; line-height: 2">
                            {!! $about->vision !!}
                        </p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="serviceBox">
                        <div class="service-icon">
                            <span><i class="fa-solid fa-message"></i></span>
                        </div>
                        <h3 class="title text-center" style="font-size: 32px; margin-bottom: 15px">
                            رسالتنا
                        </h3>
                        <p class="description text-center" style="font-size: 20px; line-height: 2">
                        <div> {!! $about->message !!}</div>
                        </p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="serviceBox">
                        <div class="service-icon">
                            <span><i class="fa-solid fa-bullseye"></i></span>
                        </div>
                        <h3 class="title text-center" style="font-size: 32px; margin-bottom: 15px">
                            اهدافنا
                        </h3>
                        <p class="description text-center" style="font-size: 20px; line-height: 2">
                            {!! $about->goals !!}
                        </p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="serviceBox">
                        <div class="service-icon">
                            <span><i class="fa-solid fa-star"></i></span>
                        </div>
                        <h3 class="title text-center" style="font-size: 32px; margin-bottom: 15px">
                            قيمنا
                        </h3>
                        @php
                            // تقسيم النص إلى فقرات منفصلة
                            $paragraphs = explode('</p>', $about->values);

                            // تهيئة مصفوفة لتخزين العناوين والوصف
                            $sections = [];

                            for ($i = 0; $i < count($paragraphs) - 1; $i += 2) {
                                $title = strip_tags($paragraphs[$i]);
                                $description = strip_tags($paragraphs[$i + 1]);

                                $sections[] = [
                                    'title' => $title,
                                    'description' => $description,
                                ];
                            }
                        @endphp

                        <div class="d-flex gap-5 justify-content-center flex-wrap align-items-center">
                            @foreach ($sections as $section)
                                <div>
                                    <p class="description text-center" style="font-size: 20px; line-height: 2">
                                        {!! $section['title'] !!}
                                    </p>
                                    <p class="text-center" style="max-width: 350px">
                                        {!! $section['description'] !!}
                                    </p>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Company -->
    <section class="discount-action pt-0">
        <div class="container">
            <div class="section-title my-6 pb-1 w-75 mx-auto text-center">
                <h2 class="m-0">شركاء النجاح</h2>
            </div>
            <div style="direction: ltr" class="partner-wrapper bg-lgrey p-4">
                <ul class="attract-slider">
                    @foreach ($partners as $partner)
                        <li class="px-3">
                            <a href="#"><img src="{{ asset($partner->img) }}" alt="" /></a>
                        </li>
                    @endforeach

                </ul>
            </div>
            <div class="text-center mt-3">
                <a style="border-radius: 8px" href="{{ route('about') }}" class="btn-btn">
                    عرض المزيد
                </a>
            </div>
        </div>
    </section>
    <!-- Our Company -->
@endsection
