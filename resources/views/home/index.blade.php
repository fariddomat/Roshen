@extends('home._layouts._app')

@section('style')
    <style>
        .trend-meta .tags {
    width: 49%; /* عرض ثابت لكل زر */
    text-align: center; /* لجعل النص في الوسط */
    font-size: 14px;
    border-radius: 10px;
}

        .trend-content {
            text-align: right;
        }

        .overlay {
            opacity: 0.2 !important;
        }

        .discount-action {
            width: 100%;
        }

        .testimonial .testimonial-item1 i {
            right: -45px;
        }

        .author-title>.theme2 {
            /* color: #5A4B93  !important; */
            color: #11857a !important;
        }

        .testimonial .testimonial-item1::before,
        .testimonial .testimonial-item1::after {
            -webkit-box-shadow: 0 10px 30px 0 rgba(90, 75, 147, 0.3) !important;
            box-shadow: 0 10px 30px 0 rgba(90, 75, 147, 0.3) !important;
        }


        .why-us .why-us-box .row {
            display: flex;
            flex-wrap: wrap;
        }

        .why-us .why-us-box .why-us-item {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }
    </style>
@endsection
@section('nav')
    headerstye-1
@endsection
@section('scripts')
    <script src="{{ asset('asset') }}/js/custom-swiper.js"></script>
    <script>
        window.onload = function() {
    var items = document.querySelectorAll('.item-rev');
    var maxHeight = 0;

    items.forEach(function(item) {
        var itemHeight = item.offsetHeight;
        if (itemHeight > maxHeight) {
            maxHeight = itemHeight;
        }
    });

    items.forEach(function(item) {
        item.style.height = maxHeight + 'px';
    });
};

    </script>
@endsection

@section('content')
    <!-- banner starts -->
    <section style="direction: ltr" class="banner overflow-hidden">
        <div class="slider">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="slide-inner">
                            <div class="slide-image" style="background-image: url({{ asset('home/images/1.jpg?v=1') }})">
                            </div>
                            <div class="swiper-content">
                                <div class="entry-meta mb-0">
                                    <span class="entry-category">
                                        <a class="text-white"> Real Estate Agency</a>
                                    </span>
                                </div>
                                <h1 class="mb-1">
                                    <a class="text-white">{{ setting('cover1_text') }}</a>
                                </h1>

                            </div>
                            <div class="overlay"></div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slide-inner">
                            <div class="slide-image" style="background-image: url({{ asset('home/images/2.jpg?v=1') }})">
                            </div>
                            <div class="swiper-content">
                                <div class="entry-meta mb-0">
                                    <span class="entry-category">
                                        <a class="text-white"> Real Estate Agency</a>
                                    </span>
                                </div>
                                <h1 class="mb-1">
                                    <a class="text-white">{{ setting('cover2_text') }}</a>
                                </h1>

                            </div>
                            <div class="overlay"></div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slide-inner">
                            <div class="slide-image" style="background-image: url({{ asset('home/images/3.jpg?v=1') }})">
                            </div>
                            <div class="swiper-content">
                                <div class="entry-meta mb-0">
                                    <span class="entry-category">
                                        <a class="text-white"> Real Estate Agency</a>
                                    </span>
                                </div>
                                <h1 class="mb-1">
                                    <a class="text-white">{{ setting('cover3_text') }}</a>
                                </h1>

                            </div>
                            <div class="overlay"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </section>
    <!-- banner ends -->

    <!-- about-us starts -->
    <section class="about-us pt-5 pb-2 " style="background: #fbfbfb !important">
        <div class="container">
            <div class="about-image-box">
                <div class="row d-flex align-items-center justify-content-between">
                    <div class="col-lg-7 col-sm-12 mb-4 bg-white">
                        <div class="about-content text-lg-end p-3">
                            <h4 class="theme fs-3 d-inline-block">من نحن</h4>
                            <p class="border-b mb-2 pb-2 ">
                                {!! $about->who_are_we !!}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-12 mb-4">
                        <div class="about-image p-3 box-shadow position-relative">
                            <img src="{{ asset('uploads/about/' . $about->who_are_we_image) }}" alt=""
                                class="w-100" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-us ends -->
    <!-- Our Services -->
    <section class="about-us pb-6 pt-4 bg-pattern">
        <div class="container">
            <div class="section-title mb-6 pb-1 w-75 text-center mx-auto">
                <h2 class="m-0">خدماتنا</h2>
            </div>
            <!-- why us starts -->
            <div class="why-us">
                <div class="why-us-box">
                    <div class="row">
                        @foreach ($services as $service)
                            <div class="col-lg-4 rounded-2 col-md-6 mb-4">
                                <div style="border-radius: 8px" class="why-us-item text-center bg-lgrey">
                                    <div class="why-us-icon">
                                        <i class="{{ $service->icon }} theme"></i>
                                    </div>
                                    <div class="why-us-content">
                                        <h3>
                                            <a href="{{ route('service', $service->id) }}">{{ $service->name }}</a>

                                        </h3>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- why us ends -->
        </div>
    </section>
    <!-- Our Services -->

    <!-- Counter -->
    <section style="border-radius: 8px" class="counter-main pb-3 pt-0">
        <div class="container text-center">
            <div class="section-title mb-6 pb-1 w-75 text-center mx-auto">
                <h2 class="m-0">ارقامنا تتحدث</h2>
            </div>
            <div class="counter text-center bg-lgrey p-5 pb-1 border">
                <div class="row d-flex align-items-center justify-content-center">
                    @foreach ($counters as $counter)
                        <div class="col-lg-3 d-flex align-items-center justify-content-center col-md-6 col-sm-6 mb-4">
                            <div class="counter-item d-flex align-items-center text-start border-end px-4">
                                <div class="counter-content d-flex flex-column align-items-center gap-2">
                                    <i class="{{ $counter->icon }} theme" style="font-size: 40px"></i>
                                    <h3 class="value mb-0 text-center">{{ $counter->value }}</h3>
                                    <span class="m-0 text-center">{{ $counter->name }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- End Counter -->

    <!-- Trending Starts -->
    <section class="trending bg-pattern">
        <div class="container">
            <div class="section-title mb-6 pb-1 w-75 mx-auto text-center">
                <h2 class="m-0">مشاريعنا</h2>
            </div>
            <div class="trend-box  p-3 pb-5 box-shadow" style="direction: ltr">
                <div class="row item-slider">
                    @foreach ($projects as $project)
                        <div class="col-lg-4 col-md-4 mb-4  p-3 box-shadow">
                            @if ($project->status =='تم البيع')
                            <div class="badge success-badge" style="position: absolute;
                                z-index: 5555555;
                                background: gray;
                                padding: 8px 22px;"> تم البيع</div>
                            @endif
                            <div class="trend-item bg-white box-shadow rounded">
                                <div class="trend-image">
                                    <img src="{{ asset($project->poster_path) }}" alt="image" />
                                    <a href="#" class="flash bg-theme1 white px-3 py-2"></a>
                                    <div class="trend-meta d-flex align-items-center justify-content-between" style="border-radius: 15px;
  opacity: 0.9;">

                                        <a href="{{ route('project', $project->id) }}"
                                            class="tags bg-theme2 white px-3 py-1">استعراض
                                            المشروع</a>

                                        @if ($project->pdfs)
                                            @if ($project->pdfs->count() > 0)
                                                <a href="{{ asset('/uploads/' . $project->pdfs->first()->file_path) }}"
                                                    class="tags bg-theme2 white px-3 py-1">تحميل البرشور</a>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <div class="trend-content p-4">
                                    <h5 class="theme">{{ $project->name }}</h5>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="trend-btn text-center">
                    <a style="border-radius: 8px" href="{{ route('projects') }}" class="btn-btn">
                        عرض جميع المشاريع
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Trending Ends -->

    <!-- Our Company -->
    <section class="discount-action pt-0">
        <div class="container" style="max-width: 99% !important;">
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
            {{-- <div class="text-center mt-3">
                <a style="border-radius: 8px" href="{{ route('about') }}" class="btn-btn">
                    عرض المزيد
                </a>
            </div> --}}
        </div>
    </section>
    <!-- Our Company -->

    <!-- about-us starts -->
    <section class="about-us bg-pattern pb-6 pt-2">
        <div class="container">
            <div class="row align-items-center my-6 text-center text-lg-end">
                <div class="col-lg-8">
                    <div class="pb-1">
                        <h2 class="mb-2">لماذا تختار روشم ؟</h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <a style="border-radius: 8px" href="{{ route('projects') }}"
                        class="btn-btn float-lg-end float-none">عرض جميع المشاريع</a>
                </div>
            </div>
            <!-- why us starts -->
            <div class="why-us">
                <div class="why-us-box ">
                    <div class="row p-5 rosem_bg">
                        @foreach ($whies as $why)
                            <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                                <div style="border-radius: 8px" class="why-us-item text-center bg-lgrey">
                                    <div class="why-us-icon">
                                        <i class="{{ $why->icon }} theme"></i>
                                    </div>
                                    <div class="why-us-content">
                                        <h4><a href="{{ route('about') }}">{{ $why->name }}</a></h4>
                                        <p class="mb-0" spellcheck="text-align: justify;">
                                            {{ $why->value }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- why us ends -->
        </div>
    </section>
    <!-- about-us ends -->
    <!-- testomonial start -->
    <section class="testimonial pb-5 pt-9">
        <div class="container">
            <div class="section-title mb-4 pb-1 w-75 mx-auto text-center">
                <h2 class="m-0">آراء العملاء</h2>
            </div>
            <div class="row review-slider bg-lgrey d-flex flex-wrap" style="direction: ltr">
                @foreach ($reviews as $review)
                    <div style="border-radius: 8px" class="col-sm-4 item d-flex item-rev">
                        <div class="testimonial-item1 text-center d-flex flex-column justify-content-between" style="width: 100%;">
                            <div class="details">
                                <p class="m-0">
                                    {!! $review->description !!}
                                </p>
                            </div>
                            <div class="author-info mt-2">
                                <a>
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

    <!--certificate-->
    <div class="certificate pt-2 my-4">
        <div class="container">
            <div class="section-title mt-3 mb-3 pb-1 w-75 mx-auto text-center">
                <h2 class="mt-3">الشهادات</h2>
            </div>
            <div class="row bg-lgrey py-3 px-2">
                @foreach ($certs as $cert)
                    <div class="col-lg-3 d-flex align-items-center justify-content-center">
                        <img style="max-height: 220px; max-width: 100%" src="{{ asset($cert->img) }}"
                            alt="" />
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--certificate-->
    <!-- Damns -->
    <section class="counter-main pb-0 pt-2 bg-pattern">
        <div class="container text-center">
            <div class="section-title mb-4 pb-1 w-75 mx-auto text-center">
                <h2 class="m-0">الضمانات</h2>
            </div>
            <div class="counter text-center bg-lgrey p-5 pb-1 border">
                <div class="row">
                    @foreach ($facils as $facil)
                        <div
                            class="col-lg-3 d-flex align-items-center justify-content-center text-center col-md-6 col-sm-6 mb-4">
                            <div class="counter-item d-flex align-items-center text-start border-end px-4">
                                <div class="counter-content">
                                    <img style="
                    width: 100px;
                    height: 100px;
                    margin: 10px auto;
                    display: block;
                  "
                                        src="{{ asset($facil->icon) }}" alt="" />
                                    <h2 style="color: #605098" class="value mb-0 text-center">
                                        {{ $facil->value }}
                                    </h2>
                                    <span style="color: #605098; font-size: 18px" class="m-0">
                                        {{ $facil->name }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- Damn -->
@endsection
