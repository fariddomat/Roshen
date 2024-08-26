@extends('home._layouts._app')

@section('style')
    <style>
        .text>ul li,
        .tags>ul li {
            display: block;
        }

        td:first-child {
            left: : 0px !important;
            width: 100px !important;
            box-shadow: none !important;

        }

        tr:last-child {
            margin-bottom: 40px !important;

        }

        td.m1 {
            color: transparent;
            position: relative;
            transform: skewY(-50deg);
            translate: 0px 14px;
            -ms-transform: 0px 14px;
            -webkit-transform: 0px 14px;
            box-shadow: 0px 6px 8px #aaa !important;
            background: linear-gradient(#cc9933, #d19426, #cc9933);

            width: 20px !important;
        }



        td.m2 {
            color: transparent;
            transform: skewY(50deg);
            background: linear-gradient(#cc9933, #d19426, #cc9933);

            position: relative;
            translate: 0px 14px;
            -ms-transform: 0px 14px;
            -webkit-transform: 0px 14px;
            box-shadow: 0px 6px 8px #aaa !important;
            width: 20px !important;

        }

        /*  push 3:rd another extra 10px       */
        td.back {
            position: relative;
            translate: 0px 28px;

            -ms-transform: 0px 28px;
            -webkit-transform: 0px 28px;
            /* right: 5px; */
            margin-top: 24px;
            font-size: 13px !important;
            box-shadow: 0px 12px 8px #aaa !important;
            width: 167px !important;
        }

        .table-striped tbody tr:nth-of-type(2n+1) {
            background-color: none !important;
        }


        .td1 {
            min-width: 150px !important;
            text-align: center;
            color: white;
            font-weight: bolder;
            font-size: 16px;
            background-color: #198754 !important;
            border-radius: 0.3rem !important;
            padding: 0 15px;
        }

        .td2 {
            min-width: 150px !important;
            text-align: center;
            color: white;
            font-weight: bolder;
            font-size: 16px;
            background-color: #605098 !important;
            border-radius: 0.3rem !important;
            padding: 0 15px;
        }

        .td3 {
            min-width: 150px !important;
            text-align: center;
            color: white;
            font-weight: bolder;
            font-size: 16px;
            background-color: #c10808 !important;
            border-radius: 0.3rem !important;
            padding: 0 15px;
        }

        .virtual-tour {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .virtual-tour iframe {
            border: none;
        }

        .swiper-container {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            max-width: 100%;
            height: auto;
        }

        @media (max-width: 768px) {
            .virtual-tour iframe {
                height: 250px;
                width: 100%;
                max-width: 100%;
            }
        }

        .accrodion-grp {
            max-width: 96.5vw !important;
        }

        .rounded-3 {
            width: 100%;
        }

        .content-box iframe {
            width: 100%;
            height: 100%;
            border: 0;
            min-height: 480px !important;
        }

        .content-box {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .youtube iframe {
            max-width: 100%;
            height: auto;
            aspect-ratio: 16/9;
            /* هذا يحافظ على نسبة العرض إلى الارتفاع للفيديو */
            border: none;
            /* إزالة الحواف من الإطار */
            display: block;
            margin: 0 auto;
        }
    </style>
@endsection

@section('scripts')
    <script src="{{ asset('asset') }}/js/custom-accordian.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

    <script>
        var swiper = new Swiper(".swiper-container", {
            slidesPerView: 1, // Default
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
            },
        });
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
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        var interleaveOffset = 0.5;
        var swiperOptions = {
            loop: true,
            speed: 3000,
            grabCursor: true,
            slidesPerView: 3, // Correct casing
            spaceBetween: 30,
            watchSlidesProgress: true,
            mousewheel: true, // Corrected option
            keyboard: true, // Corrected option
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 3000,
            },
            fadeEffect: {
                crossFade: true
            },
        };

        var swiper = new Swiper(".swiper-container", swiperOptions);
    </script>
@endsection
@section('content')
    <!-- about-us starts -->
    {{-- <div class="container">
        <div class="page-cover pb-3"
            style="
        background-image: url({{ asset($project->poster_path) }}) !important;
        background-position: center !important;
        background-size: cover !important;
        height: 400px;
        border-radius: 8px;
      ">
        </div>
    </div> --}}
    <div class="about-us">
        <div class="container">
            <div class="desc col-lg-6 " style="color: #605098; font-size: 20px; font-weight: bold;">تفاصيل المشروع</div>
            <div class="about-image-box">
                <div class="row align-items-center">
                    <div class="col-lg-5 mb-3">
                        <div class="info">
                            <div class="text">
                                <p style="color: #605098; font-size: 20px" class="fw-bold">
                                    مشروع {{ $project->name }} :

                                </p>
                                {!! $project->details !!}
                                <ul>
                                    <li style="margin-top: 15px">تاريخ البناء: {{ $project->date_of_build }}</li>
                                    <li style="margin-top: 15px">عدد الأدوار: {{ $project->floors_count }}</li>
                                    <li style="margin-top: 15px">عدد الشقق: {{ $project->floors->count() }}</li>
                                    <li style="margin-top: 15px">عدد الملاحق: {{ $project->appendixx_count }}</li>
                                    <br />
                                    @if ($project->pdfs)
                                        @if ($project->pdfs->count() > 0)
                                            <li style="margin-top: 15px">
                                                <a href="{{ asset('/uploads/' . $project->pdfs->first()->file_path) }}"
                                                    class="btn btn-success my-3">تنزيل البرشور</a>
                                            </li>
                                        @endif
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div class="about-image bordernone mb-3">
                            {!! $project->virtual_location !!}

                        </div>
                    </div>
                    @if ($project->images_path)
                        <div class="project_images my-5">
                            <div class="container">
                                <h4 class="text-center my-4">صور المشروع</h4>
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-10">
                                        <div class="swiper-container">
                                            <div class="swiper-wrapper">
                                                @foreach ($project->images_path as $pimage)
                                                    <div class="swiper-slide">
                                                        <!-- رابط التكبير -->
                                                        <a href="{{ $pimage }}" data-fancybox="gallery">
                                                            <!-- الصورة نفسها -->
                                                            <img src="{{ $pimage }}" alt="project_image" />
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <!-- أزرار التنقل -->
                                            <div class="swiper-button-next"></div>
                                            <div class="swiper-button-prev"></div>
                                            <!-- ترقيم الصفحات -->
                                            <div class="swiper-pagination"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>


    <!-- نماذج الشقق -->
    <div class="container pt-3 pb-3" style="border: 1px solid #dfdfdb;
         border-radius: 15px; ">
        <div class="section-title mb-6 pb-1 w-75 text-center mx-auto">
            <h2 class="m-0">نماذج شقق المشروع</h2>
        </div>

        <div class="accrodion-grp faq-accrodion mb-3" style="direction: ltr" data-grp-name="faq-accrodion1">
            @foreach ($project->apartments as $index => $item)
                <div class="accrodion">
                    <div class="accrodion-title text-center ">
                        <h5>نموذج {{ $item->type }} (( {{ $item->code }} ))</h5>
                    </div>
                    <div class="accrodion-content row justify-content-between align-items-center" style="display: none">
                        <div class="col-lg-7 col-md-12 youtube">
                            {!! $item->youtube !!}
                        </div>
                        <div class="inner col-lg-5 col-md-12">
                            <div class="tags">
                                <ul style="direction: rtl">
                                    <li class="mt-2"><span
                                            style="font-size: 20px; font-weight: bold;color:#5a4b93">معلومات عن
                                            الشقة:</span> {!! $item->about !!}</li>
                                    <li class="mt-2">عدد الغرف: {{ $item->room_count }}</li>
                                    <li class="mt-2">السعر: {{ $item->price }} ريال</li>
                                    <li class="mt-2">المساحة: {{ $item->area }} متر²</li>
                                    {{-- <li class="mt-2"><span style="font-size: 20px; font-weight: bold;color:#5a4b93">تفاصيل:</span> {!! $item->details !!}</li> --}}
                                    <br />

                                    <li class="mt-3">
                                        @if ($item->pdfs)
                                            @if ($item->pdfs->count() > 0)
                                                <a href="{{ asset('/uploads/' . $item->pdfs->first()->file_path) }}"
                                                    class="btn-btn">تنزيل البرشور</a>
                                            @endif
                                        @endif
                                        <a href="{{ route('contactPage') }}" class="btn-btn">احجز الشقة</a>

                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-{{ $item->virtual_location ? '6' : '12' }} d-flex flex-column">
                                <p class="text-center" style="font-size: 22px; margin-bottom: 12px">
                                    عنوان الخريطة
                                </p>
                                <div class="content-box flex-grow-1">
                                    {!! $item->project->address_location !!}
                                </div>
                            </div>

                            @if ($item->virtual_location)
                                <div class="col-lg-6 d-flex flex-column">
                                    <p class="text-center" style="font-size: 22px; margin-bottom: 12px">
                                        الجولة الافتراضية
                                    </p>
                                    <div class="content-box flex-grow-1">
                                        {!! $item->virtual_location !!}
                                    </div>
                                </div>
                            @endif
                        </div>
                        @if ($item->images_path)
                            <div class="project_images my-5">
                                <div class="container">
                                    <h4 class="text-center my-4">صور الشقة</h4>
                                    <div class="row justify-content-center">
                                        <div class="col-12 col-md-10">
                                            <div class="swiper-container">
                                                <div class="swiper-wrapper">
                                                    @foreach ($item->images_path as $pimage)
                                                        <div class="swiper-slide">
                                                            <!-- رابط التكبير -->
                                                            <a href="{{ $pimage }}" data-fancybox="gallery">
                                                                <!-- الصورة نفسها -->
                                                                <img src="{{ $pimage }}" alt="project_image" />
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <!-- أزرار التنقل -->
                                                <div class="swiper-button-next"></div>
                                                <div class="swiper-button-prev"></div>
                                                <!-- ترقيم الصفحات -->
                                                <div class="swiper-pagination"></div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- حالات الشقق -->
    <!-- حالات الشقق -->
    @if ($project->floors->count() > 0)
        <!-- apartment check Area-->
        <div class="room-details-area pt-3 pb-70" style="background: url({{ asset('b.png') }});">
            <div class="container-fluid m-0 p-0">
                <div class="section-title-two text-center">
                    <h2 class="margin-auto" style="color: #cc9933; margin-bottom: 35px;margin-right: 25px;">حالة الشقق</h2>
                </div>
                <div class="container" style="color: white">
                    <div class="table-responsive">
                        <table class="table mt-2 center"
                            style="margin-left: auto !important; margin-right: auto !important; width: fit-content; margin-bottom: 35px;">
                            @if ($project->FloorRow($project->floors_count)->count() > 0)
                                <tr>
                                    <td>الملاحق</td>
                                    @foreach ($project->FloorRow($project->floors_count) as $key => $floor)
                                        <td
                                            class="@if ($floor->status == 'متاح') td1 @elseif ($floor->status == 'محجوز') td2 @else td3 @endif">
                                            {{ $floor->apartment->type }}
                                        </td>
                                        {{-- @if ($key == 0)
                                     <td style="width: 33% !important; color:transparent!important;box-shadow: none !important; translate: 0px 24px;">.</td>
                                 @endif --}}
                                    @endforeach
                                </tr>
                            @endif
                        </table>
                        <table class="table mt-2 center"
                            style="margin-left: auto !important; margin-right: auto !important; width: fit-content; margin-bottom: 35px;">

                            @for ($i = $project->floors_count - 1; $i >= 1; $i--)
                                <tr>
                                    <td>الدور {{ $i }}</td>
                                    @php $check = false; @endphp
                                    @foreach ($project->FloorRow($i) as $key => $floor)
                                        @if ($key == $project->FloorRow($i)->count() - 1 && $floor->apartment->type == 'أمامية' && $project->backCount2($i) > 0)
                                            <td class="m2">.</td>
                                        @endif

                                        @if (!$check && $floor->apartment->type == 'خلفية')
                                            <td class="m1">.</td>
                                        @endif
                                        <td style="width:@if ($project->backCount2($i) == 2 && $floor->apartment->type == 'خلفية') 69px !important @endif; border-radius: @if ($key == 0) 0 15px 15px 0px @elseif ($key == $project->FloorRow($i)->count() - 1) 15px 0 0 15px @elseif($project->backCount2($i) == 2 && $key == 1) 15px 0 0 15px @elseif($project->backCount2($i) == 2 && $key == 2) 0 15px 15px 0px @endif;"
                                            class="@if ($floor->status == 'متاح') td1 @elseif ($floor->status == 'محجوز') td2 @else td3 @endif @if ($floor->apartment->type == 'خلفية') back @endif">
                                            {{ $floor->apartment->room_count }}
                                            {{ $floor->apartment->type }}
                                        </td>

                                        @if ($project->backCount2($i) == 2 && $check == false && $floor->apartment->type == 'خلفية')
                                            @php $check = true; @endphp
                                            <td
                                                style="color: transparent; width: 10px !important; border:none !important; box-shadow: none !important;">
                                                .</td>
                                        @endif
                                    @endforeach
                                </tr>
                            @endfor
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <!-- End -->
    @endif
    <!-- المشاريع المشابهة -->
    {{-- <div class="project_images my-5">
        <div class="container">
            <h4 class="text-center my-4">مشاريع مشابهة في نفس المنطقة</h4>
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach ($projects as $similar_project)
                                <div class="swiper-slide">
                                    <img src="{{ $similar_project->poster_path }}" alt="project_image" />
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <a class="btn-btn m-auto d-block mt-4"
        style="width: fit-content; font-size: 22px; font-weight: bold; padding: 10px 20px; border-radius: 8px;"
        href="{{ route('contactPage') }}">
        احجز وحدتك السكنية الآن
    </a>

    <!-- Damns -->
    <section class="counter-main pb-0 p2-0 bg-pattern" style="margin-top: 50px; padding-bottom: 50px">
        <div class="container text-center" style="  padding-bottom: 50px;">
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
