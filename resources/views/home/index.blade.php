@extends('home._layouts._app')

@section('style')
    <style>
        .video iframe{
        width: 100% !important;
        min-height: 80vh !important;
    }
    </style>
@endsection
@section('scripts')
    <script>
        $(window).on('load', function() {
            var maxHeight = 0;
            $('.grid-offer-text').each(function() {
                if ($(this).height() > maxHeight) {
                    maxHeight = $(this).height() - 100;
                }
            });
            $('.grid-offer-text').height(maxHeight);

            var maxHeight = 0;
            $('.grid-offer-col').each(function() {
                if ($(this).height() > maxHeight) {
                    maxHeight = $(this).height() + 200;
                }
            });
            $('.grid-offers-owl').height(maxHeight);
        });
    </script>
@endsection
@section('content')

    <section class="no-padding adv-search-section">
        <!-- Slider main container -->
        <div id="swiper2" class="swiper-container">
            <div class="container swiper2-navigation">
                <div class="row">
                    <div class="col-xs-2">
                        <a href="#" class="navigation-box2 navigation-box-prev slide-prev">
                            <div class="navigation-triangle"></div>
                            <div class="navigation-box-icon2"><i class="jfont">&#xe800;</i></div>
                        </a>
                    </div>
                    <div class="col-xs-2 col-xs-offset-8">
                        <a href="#" class="navigation-box2 navigation-box-next slide-next">
                            <div class="navigation-triangle"></div>
                            <div class="navigation-box-icon2"><i class="jfont">&#xe802;</i></div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide swiper-lazy"
                    data-background="{{ asset('home/images/1.jpg') }}?v={{ setting('cover_time') }}">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-8 col-xs-offset-2 animated fadeInDown slide2-desc slide2-desc-1">
                                <h1 class="second-color" style="line-height: 55px;">{{ setting('cover1_text') }}<span
                                        class="special-color">.</span></h1>
                                <div class="clearfix"></div>

                            </div>
                        </div>
                    </div>
                    <div class="slider-overlay"></div>
                </div>
                <div class="swiper-slide swiper-lazy"
                    data-background="{{ asset('home/images/2.jpg') }}?v={{ setting('cover_time') }}">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-8 col-xs-offset-2 animated slide2-desc slide2-desc-2">
                                <h1 class="second-color" style="line-height: 55px;">{{ setting('cover2_text') }}<span
                                        class="special-color">.</span></h1>
                                <div class="clearfix"></div>

                            </div>
                        </div>
                    </div>
                    <div class="slider-overlay"></div>

                </div>
                <div class="swiper-slide swiper-lazy"
                    data-background="{{ asset('home/images/3.jpg') }}?v={{ setting('cover_time') }}">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-8 col-xs-offset-2 animated slide2-desc slide2-desc-3">
                                <h1 class="second-color" style="line-height: 55px;">{{ setting('cover3_text') }}<span
                                        class="special-color">.</span></h1>
                                <div class="clearfix"></div>

                            </div>
                        </div>
                    </div>
                    <div class="slider-overlay"></div>
                </div>
            </div>
        </div>


    </section>

    {{-- <section class="section-light bottom-padding-45 section-both-shadow">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="feature wow fadeInLeft" id="feature1">
                        <div class="feature-icon center-block"><i class="fa fa-building"></i></div>
                        <div class="feature-text">
                            <h5 class="subtitle-margin">PIXEL PERFECT</h5>
                            <h3>DESIGN<span class="special-color">.</span></h3>
                            <div class="title-separator center-block feature-separator"></div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="feature wow fadeInUp" id="feature2">
                        <div class="feature-icon center-block"><i class="fa fa-home"></i></div>
                        <div class="feature-text">
                            <h5 class="subtitle-margin">FIFTY</h5>
                            <h3>HTML FILES<span class="special-color">.</span></h3>
                            <div class="title-separator center-block feature-separator"></div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="feature wow fadeInUp" id="feature3">
                        <div class="feature-icon center-block"><i class="fa fa-industry"></i></div>
                        <div class="feature-text">
                            <h5 class="subtitle-margin">MASONRY, LIST &amp; GRID</h5>
                            <h3>LAYOUTS<span class="special-color">.</span></h3>
                            <div class="title-separator center-block feature-separator"></div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="feature wow fadeInRight" id="feature4">
                        <div class="feature-icon center-block"><i class="fa fa-tree"></i></div>
                        <div class="feature-text">
                            <h5 class="subtitle-margin">MODERN &amp; CLEAN</h5>
                            <h3>PROJECT<span class="special-color">.</span></h3>
                            <div class="title-separator center-block feature-separator"></div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}


    <section class="testimonials parallax">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <h1 class="second-color">من نحن؟<span class="special-color">.</span></h1>
                </div>
                <div class="col-xs-12">
                    <div class="title-separator-secondary" style="background-color: #fff0;"></div>
                </div>
            </div>
        </div>

        <div class="container margin-top-90">
            <div class="row">
                <div class="col-xs-12" >
                    <div class="testimonial">
                        <div class="row" style="display: grid;
                        justify-content: center;
                        direction: rtl;">

                            <div class="col-md-6" style="margin: 0 auto;">
                                <div class="testimonials-content margin-top-30" style="  min-height: 200px; width: auto; margin-top: 0px !important;padding-top: 9px; background: #ffffffc4; ">
                                  <div>  <p class="lead">{!! $about->who_are_we !!}</p></div>

                                </div>
                            </div>
                            <div class="col-md-8 video"
                                style=" ;
                                        padding: 0;
                                        box-shadow: 5px 10px 10px 7px rgba(0, 0, 0, 0.35);
                                        -webkit-box-shadow: 5px 10px 10px 7px rgba(0, 0, 0, 0.35);
                                        -moz-box-shadow: 5px 10px 10px 7px rgba(0, 0, 0, 0.35); width: 90%; text-align:center; margin: 0 auto ;margin-top:50px">
                                {!! setting('site_youtube') !!}

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </section>

    <section class="" style="padding: 0">
        <div class="row">
            <div class="col-md-6"
                style="min-height: 450px ;padding: 100px 75px ;background: linear-gradient(0deg, rgba(240, 236, 0, 0.57), rgba(240, 236, 0, 0.57)),url({{ asset('home/images/massage.jpg') }});background-size: cover;  color:white; ">
                <h1 class="second-color">رسالتنا<span class="special-color">.</span></h1>
                <p class="lead">{!! $about->massage !!}</p>



            </div>
            <div class="col-md-6"
                style="min-height: 450px ;padding: 100px 75px ;background: linear-gradient(0deg, rgba(89, 92, 106, 0.74), rgba(89, 92, 106, 0.74)),url({{ asset('home/images/vision.jpg') }});background-size: cover; color:white">
                <h1 class="second-color">رؤيتنا<span class="special-color">.</span></h1>
                <p class="lead">{!! $about->vision !!}</p>
            </div>
        </div>


        {{--
    </section>

    <section class="testimonials parallax"> --}}



    </section>

    <section class="section-light no-bottom-padding section-top-shadow">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-9 col-sm-push-3">
                    <h1>آخر المشاريع<span class="special-color">.</span></h1>
                </div>
                <div class="col-xs-12 col-sm-3 col-sm-push-9">
                    <a href="#" class="navigation-box navigation-box-prev" id="grid-offers-owl-prev">
                        <div class="navigation-triangle"></div>
                        <div class="navigation-box-icon"><i class="jfont">&#xe800;</i></div>
                    </a>
                    <a href="#" class="navigation-box navigation-box-next" id="grid-offers-owl-next">
                        <div class="navigation-triangle"></div>
                        <div class="navigation-box-icon"><i class="jfont">&#xe802;</i></div>
                    </a>
                </div>
                <div class="col-xs-12">
                    <div class="title-separator-primary"></div>
                </div>
            </div>
        </div>
        <div class="grid-offers-container">
            <div class="owl-carousel " id="grid-offers-owl" style="display: flex; flex-wrap: wrap;">
                @if ($projects->count() > 0)
                    @foreach ($projects as $project)
                        <div class="grid-offer-col" style="margin-bottom: 150px">
                            <div class="grid-offer wow fadeInLeft" style="">
                                <div class="grid-offer-front" style="">
                                    <div class="grid-offer-photo">
                                        <img src="{{ $project->poster_path }}" alt="" />
                                        @if ($project->status == 'تم البيع')
                                            <img src="{{ asset('done.png') }}" loading="lazy"
                                                style="top: 0;
                                        position: absolute;
                                        z-index: 100000;
                                        left: 0;
                                        background: linear-gradient(0deg, rgba(240, 236, 0, 0.57), rgba(240, 236, 0, 0.57));
                                        padding-top: 45px;
                                        padding-bottom: 75px;"
                                                alt="">
                                        @endif
                                        <div class="type-container">
                                            <span
                                                class="badge @if ($project->status == 'مكتمل') btn-success
                                                        @elseif($project->status == 'على وشك الانتهاء')
                                                        btn-secondary
                                                        @elseif($project->status == 'غير متاح للعرض')
                                                        btn-danger
                                                        @else
                                                        btn-warning text-white @endif"
                                                style="padding: 5px 15px; font-size: 14px;  top: 5px;
                                                        position: relative;">{{ $project->status }}
                                                @if ($project->status == 'على وشك الانتهاء' || $project->status == 'غير متاح للعرض')
                                                    <i class="bx bx-lock"></i>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="grid-offer-text">
                                        <i class="fa fa-map-marker grid-offer-localization"></i>
                                        <div class="grid-offer-h4">
                                            <h4 class="grid-offer-title">{!! $project->address !!}</h4>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="grid-offer-params"><a href="{{ route('project', $project->id) }}"
                                            class="">
                                            <div class="grid-rooms"
                                                style="float: right; padding-right: 15px; text-align: right;width: 100%;">
                                                {{ $project->name }}
                                                <i class="fa fa-search"></i>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                                <div class="grid-offer-back" style="min-height: 500px">
                                    <div id="grid-map1" class="grid-offer-map">
                                        {!! $project->address_location !!}
                                    </div>
                                    <div class="button">
                                        <a href="{{ route('project', $project->id) }}" class="button-primary">
                                            <span>تفاصيل المشروع</span>
                                            <div class="button-triangle"></div>
                                            <div class="button-triangle2"></div>
                                            <div class="button-icon"><i class="fa fa-search"></i></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

    </section>

    <section class="testimonials parallax">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <h1 class="second-color">سياسة الجودة والأمان<span class="special-color">.</span></h1>
                </div>
                <div class="col-xs-12">
                    <div class="title-separator-secondary" style="background-color: #fff0;"></div>
                </div>
            </div>
        </div>

        <div class="container margin-top-90">
            <div class="row">
                <div class="col-xs-12" id="testimonials-owl">
                    <div class="testimonial">
                        <img src="{{ asset('home/images/quality_safty.jpg') }}" loading="lazy" alt=""
                            class="testimonials-photo" style="" />
                        <div class="testimonials-content" style="  min-height: 200px; max-width:780px;">
                            <p class="lead">{!! $about->quality_safty !!}</p>

                        </div>
                    </div>

                </div>
            </div>
        </div>


    </section>

    <section class="section-light top-padding-45 bottom-padding-45">
        <div class="container">
            <div class="row count-container">
                <div class="col-xs-6 col-lg-3" style="  height: 200px;">
                    <div class="number" id="number1">
                        <div class="number-img">
                            <i class="fa fa-line-chart "></i>
                        </div>
                        <span class="number-label text-color2">الحد الأعلى للأرباح التي سلمت</span>
                        <span class="number-big text-color3 count" data-from="0" data-to="{{ setting('chart_0') }}"
                            data-speed="2000"></span>
                        <span
                            style="position: relative;
                            top: -22px;
                            left: 60px;
                            font-size: 26px;">%</span>
                    </div>
                </div>
                <div class="col-xs-6 col-lg-3 number_border" style="  height: 200px;">
                    <div class="number" id="number2">
                        <div class="number-img">
                            <i class="fa fa-line-chart "></i>
                        </div>
                        <span class="number-label text-color2">الحد الأدنى للأرباح في الشقق</span>
                        <span class="number-big text-color3 count" data-from="0" data-to="{{ setting('chart_1') }}"
                            data-speed="2000"></span>
                        <span
                            style="position: relative;
                            top: -22px;
                            left: 60px;
                            font-size: 26px;">%</span>
                    </div>
                </div>
                <div class="col-xs-6 col-lg-3 number_border3" style="  height: 200px;">
                    <div class="number" id="number3">
                        <div class="number-img">
                            <i class="fa fa-line-chart "></i>
                        </div>
                        <span class="number-label text-color2">أعلى نسبة أرباح للأسهم</span>
                        <span class="number-big text-color3 count" data-from="0" data-to="{{ setting('chart_2') }}"
                            data-speed="2000"></span>
                        <span
                            style="position: relative;
                            top: -22px;
                            left: 60px;
                            font-size: 26px;">%</span>
                    </div>
                </div>
                <div class="col-xs-6 col-lg-3 number_border" style="  height: 200px;">
                    <div class="number" id="number4">
                        <div class="number-img">
                            <i class="fa fa-line-chart "></i>
                        </div>
                        <span class="number-label text-color2">الحد الأدنى للأسهم</span>
                        <span class="number-big text-color3 count" data-from="0" data-to="{{ setting('chart_3') }}"
                            data-speed="2000"></span>
                        <span style="margin-top: 15px
                            font-size: 20px;">ريال سعودي</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
