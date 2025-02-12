@extends('home._layouts._app')
@section('header')
    header_menu-g
@endsection
@section('style')
    <style>
        .custom-accordion {
            font-family: "Arial", sans-serif;
            direction: rtl;
        }

        .section-title h2 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #10887C;
            /* اللون الأخضر الغامق */
            margin-bottom: 1.5rem;
            text-align: center;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .accordion-wrapper {
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            background-color: #fff;
        }

        .accordion-item {
            border-bottom: 1px solid #ddd;
        }

        .accordion-header {
            padding: 1rem 1.5rem;
            background-color: #f7f7f7;
            color: #666;
            /* اللون الرمادي */
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            font-size: 1.2rem;
            font-weight: bold;
            transition: background-color 0.3s, color 0.3s;
            border-left: 5px solid transparent;
        }

        .accordion-header:hover {
            background-color: #eaf8f5;
            /* خلفية فاتحة */
            color: #10887C;
            /* لون النص عند التمرير */
        }

        .accordion-header.active {
            background-color: #10887C;
            /* اللون الأساسي عند الفتح */
            color: #fff;
            /* لون النص */
            border-left: 5px solid #0e705e;
            /* شريط جانبي أغمق */
        }

        .accordion-header .toggle-icon::before {
            content: '+';
            font-size: 1.5rem;
            color: #666;
            /* لون الأيقونة عند الإغلاق */
            transition: transform 0.3s, color 0.3s;
        }

        .accordion-header.active .toggle-icon::before {
            content: '-';
            color: #fff;
            /* لون الأيقونة عند الفتح */
        }

        .accordion-content {
            max-height: 0;
            overflow: hidden;
            background-color: #f7fdfb;
            /* خلفية فاتحة */
            color: #333;
            transition: max-height 0.5s ease, padding 0.3s;
            padding: 0 1.5rem;
        }

        .accordion-content p {
            margin: 1rem 0;
            font-size: 1rem;
            color: #333;
            line-height: 1.6;
        }

        .accordion-item .accordion-content.open {
            max-height: 500px;
            /* ارتفاع مفتوح */
            padding: 1rem 1.5rem;
        }
    </style>
@endsection
@section('scripts')
    <script>
        document.querySelectorAll(".accordion-header").forEach((header) => {
            header.addEventListener("click", function() {
                const content = document.querySelector(this.getAttribute("data-target"));
                const isOpen = content.classList.contains("open");

                // أغلق كل العناصر الأخرى
                document.querySelectorAll(".accordion-content").forEach((c) => {
                    c.classList.remove("open");
                    c.style.maxHeight = null;
                });

                // أغلق الأيقونة النشطة
                document.querySelectorAll(".accordion-header").forEach((h) => {
                    h.classList.remove("active");
                });

                if (!isOpen) {
                    content.classList.add("open");
                    content.style.maxHeight = content.scrollHeight + "px";
                    this.classList.add("active");
                }
            });
        });
        document.querySelectorAll('*').forEach(element => {
    if (window.getComputedStyle(element).fontFamily.includes('Arial')) {
        element.style.fontFamily = 'Cairo, sans-serif';
    }
});
    </script>
@endsection
@section('content')
    <!-- about-us starts -->
    <section class="about-us bg-white pb-6 pt-0">
        <div class="container">
            <div class="section-title mb-6 pb-1 w-75 text-center mx-auto">
                <h2 class="m-0">{{ $service->name }}</h2>
            </div>
            <!-- why us starts -->
            <div class="text">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="about-image bordernone mb-3">
                                <img src="{{ asset($service->image_path) }}" alt="" class="w-100" />
                            </div>
                            <div class="box mb-2">
                                {!! $service->description !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="why-us">
                    <div class="why-us-box">
                        <div class="row">
                            <div class="col-lg-4 rounded-2 col-md-6 mb-4">
                                <div style="border-radius: 8px" class="why-us-item text-center bg-lgrey">
                                    <div class="why-us-icon">
                                        <i class="flaticon-building theme"></i>
                                    </div>
                                    <div class="why-us-content">
                                        <h3>
                                            <a href="service.html">التطوير العقاري و التمليك</a>
                                        </h3>
                                        <p class="mb-0">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 rounded-2 col-md-6 mb-4">
                                <div style="border-radius: 8px" class="why-us-item text-center bg-lgrey">
                                    <div class="why-us-icon">
                                        <i class="flaticon-global theme"></i>
                                    </div>
                                    <div class="why-us-content">
                                        <h3>
                                            <a href="service.html">التسوييق اللعقـااري</a>
                                        </h3>
                                        <p class="mb-0">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 rounded-2 col-md-6 mb-4">
                                <div style="border-radius: 8px" class="why-us-item text-center bg-lgrey">
                                    <div class="why-us-icon d-flex justify-content-center align-items-center"
                                         style="height: 89px">
                                        <i class="fa-solid fa-building-circle-check theme"></i>
                                    </div>
                                    <div class="why-us-content">
                                        <h3><a href="service.html">إدارة ألأمــلاك</a></h3>
                                        <p class="mb-0">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 rounded-2 col-md-6 mb-4">
                                <div style="border-radius: 8px" class="why-us-item text-center bg-lgrey">
                                    <div class="why-us-icon d-flex justify-content-center align-items-center"
                                         style="height: 89px">
                                        <i class="fa-solid fa-head-side-virus theme"></i>
                                    </div>
                                    <div class="why-us-content">
                                        <h3>
                                            <a href="service.html">الحلـول تمويليــة</a>
                                        </h3>
                                        <p class="mb-0">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 rounded-2 col-md-6 mb-4">
                                <div style="border-radius: 8px" class="why-us-item text-center bg-lgrey">
                                    <div class="why-us-icon d-flex justify-content-center align-items-center"
                                         style="height: 89px">
                                        <i class="fa-solid fa-money-bill-trend-up theme"></i>
                                    </div>
                                    <div class="why-us-content">
                                        <h3><a href="service.html">الاستثمــار</a></h3>
                                        <p class="mb-0">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 rounded-2 col-md-6 mb-4">
                                <div style="border-radius: 8px" class="why-us-item text-center bg-lgrey">
                                    <div class="why-us-icon d-flex justify-content-center align-items-center"
                                         style="height: 89px">
                                        <i class="fa-solid fa-dollar-sign theme"></i>
                                    </div>
                                    <div class="why-us-content">
                                        <h3>
                                            <a href="service.html">الاستشارات الفنية و المالية</a>
                                        </h3>
                                        <p class="mb-0">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            <!-- why us ends -->
        </div>
    </section>
    <!-- about-us ends -->

    @if ($service->faqs->count() > 0)
        <!-- Questions -->
        <div class="custom-accordion container">
            <div class="section-title mb-4 pb-1 w-75 mx-auto text-center">
                <h2 class="m-0">الأسئلة الشائعة</h2>
            </div>
            <div class="accordion-wrapper">
                @foreach ($service->faqs as $index => $faq)
                    <div class="accordion-item">
                        <div class="accordion-header" data-target="#customCollapse{{ $index }}">
                            <span>{{ $faq->question }}</span>
                            <i class="toggle-icon"></i>
                        </div>
                        <div id="customCollapse{{ $index }}" class="accordion-content">
                            {!! $faq->answer !!}
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <!-- Questions -->
    @endif

    @if ($service->reviews->count() > 0)
        <!-- testomonial start -->
        <section class="testimonial pb-5 pt-9" style="padding-bottom: 20px;">
            <div class="container">
                <div class="section-title mb-4 pb-1 w-75 mx-auto text-center">
                    <h2 class="m-0">اراء العملاء</h2>
                </div>
                <div class="row review-slider bg-lgrey" style="direction: ltr">
                    @foreach ($service->reviews as $review)
                        <div style="border-radius: 8px" class="col-sm-4 item">
                            <div class="testimonial-item1 text-center">
                                <div class="details">
                                    <p class="m-0">
                                        {!! $review->description !!}
                                    </p>
                                </div>
                                <div class="author-info mt-2">
                                    <a href="#">
                                        <img style="
                                width: 100px;
                                height: 100px;
                                border-radius: 100%;
                                margin: auto;
                                "
                                            src="{{ asset($review->image_path) }}" alt="" />
                                    </a>
                                    <div class="author-title">
                                        <h4 class="m-0 theme2">{{ $review->name }}</h4>
                                        <span>{{ $review->title }}</span>
                                    </div>
                                </div>
                                <i class="fa fa-quote-left mb-2"></i>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- testomonial-->
    @endif

    <!-- contact starts -->
    <section style="margin-top: 110px;" class="contact-main pt-0 pb-10 bg-grey">
        <!-- <div class="map">
                <div style="width: 100%">
                    <iframe height="500"
                        src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=+(mangal%20bazar)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                </div>
            </div> -->
        <div class="container">
            <div class="contact-info-main">
                <div class="row">
                    <div class="col-lg-10 col-offset-lg-1 mx-auto">
                        <div class="contact-info bg-white pt-10 pb-10 px-5">
                            <div class="contact-info-title text-center mb-4 px-5">
                                <h3 class="mb-1">معلومات التواصل معنا</h3>
                                <p class="mb-0">
                                    يكون نسعى لارضائكم دائماً من خلال قسم خدمات العملاء لدينا
                                </p>
                            </div>
                            <div class="contact-info-content row mb-1">
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="info-item bg-lgrey px-4 py-5 border-all text-center" style="height: 100%;">
                                        <div class="info-icon mb-2">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <div class="info-content">
                                            <p style="font-size: 18px" class="m-0"><a
                                                    href="{{ setting('site_location') }}"> إعمار سكوير، حي الفيحاء، جدة،
                                                    المملكة العربية السعودية</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="info-item bg-lgrey px-4 py-5 border-all text-center" style="height: 100%;">
                                        <div class="info-icon mb-2">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <div class="info-content">
                                            <p style="font-size: 18px" class="m-0"><a
                                                    href="tel:{{ setting('site_phone') }}">{{ setting('site_phone') }}</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 mb-4">
                                    <div class="info-item bg-lgrey px-4 py-5 border-all text-center" style="height: 100%;">
                                        <div class="info-icon mb-2">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <div class="info-content ps-4">
                                            <p style="font-size: 18px" class="m-0">
                                                <a
                                                    href="mailto:{{ setting('site_email') }}">{{ setting('site_email') }}</a>
                                                </li>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="contact-form1" class="contact-form px-5">
                                <div class="contact-info-title text-center mb-4 px-5">
                                    <h3 class="mb-1">خدمة عملاء مميزة ورد سريع</h3>
                                    <p class="mb-0">
                                        اسعي لارضائك دايما بالعمل ولا ينتهي العمل الا وانت راض عنة
                                    </p>
                                </div>
                                <div id="contactform-error-msg"></div>

                                <form method="post" action="{{ route('contact') }}" name="contactform"
                                    id="contactform">
                                    @include('layouts._error')
                                    @csrf

                                    <div class="form-group mb-2">
                                        <input type="text" name="name" class="form-control" id="llastname"
                                            placeholder=" *الاسم " />
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="البريد الالكتروني" />
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="text" name="phone" class="form-control" id="phnumber"
                                            placeholder=" *رقم  الجوال" />

                                        <div class="form-group mb-2">
                                            <select class="form-control mt-2" id="dropdown" name="service_id">
                                                <option value="" disabled selected>اختر الخدمة</option>
                                                @foreach ($services as $servic)
                                                    <option value="{{ $servic->id }}"
                                                        @if ($service->id == $servic->id) selected @endif>
                                                        {{ $servic->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="textarea mb-2">
                                            <textarea name="message" placeholder=" *اكتب رسالتك نسعد بها"></textarea>
                                        </div>
                                        <div class="comment-btn text-center">
                                            <button type="submit"
                                                style="background-color: #6f42c1; color: white;  font-size: 1.5rem;"
                                                class="btn px-5" id="submit2">ارسال الرسالة</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact Ends -->
@endsection
