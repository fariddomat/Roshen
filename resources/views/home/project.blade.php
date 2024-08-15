@extends('home._layouts._app')
@section('style')
    <style>
        .details-map iframe {
            width: 100% !important;
        }
        #aa > a:active{
            color: gold !important
        }
        .aa > a:active{
            color: gold !important
        }
        .youtube>iframe{
            width: 100% !important;
        }

        .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover {
  color: #555;
  cursor: default;
  background-color: #f1813f;
        }
    </style>
@endsection

@section('scripts')
@endsection
@section('content')

    <section class="section-light no-bottom-padding margin-top-135">
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-md-9">
                    <div class="row">
                        <div class="details-image pull-right hidden-xs">
                            <i class="fa fa-building"></i>
                        </div>
                        <div class="details-title pull-right">
                            <h4 class="subtitle-margin">المشروع ضمن {{ $project->category->name }}</h4>
                            <h3>{{ $project->name }}<span class="special-color">.</span></h3>
                        </div>
                    </div>
                    <section class="section-dark no-padding margin-top-15">

                        <!-- Slider main container -->
                        <div id="" class="">
                            <!-- Additional required wrapper -->
                            <div class="">
                                <!-- Slides -->
                                <div class="">
                                    <img class="" src="{{ $project->cover_img_path }}"
                                        style="width: 100%;  max-height: 470px" />
                                </div>
                            </div>

                        </div>

                    </section>

                    <div class="row margin-top-30">
                        <div class="col-xs-12 col-sm-5 col-md-4">
                            <div class="clearfix"></div>
                            <div class="details-parameters-price">{{ $project->status }}</div>
                            <div class="details-parameters">
                                <div class="details-parameters-cont">
                                    <div class="details-parameters-val">تاريخ البناء</div>
                                    <div class="details-parameters-name">{{ $project->date_of_build }}</div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="details-parameters-cont">
                                    <div class="details-parameters-val">عدد الأدوار</div>
                                    <div class="details-parameters-name">{{ $project->floors_count }}</div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="details-parameters-cont">
                                    <div class="details-parameters-val">عدد الغرف</div>
                                    <div class="details-parameters-name">{{ $project->floors->count() }}</div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="details-parameters-cont">
                                    <div class="details-parameters-val">الملاحق</div>
                                    <div class="details-parameters-name">
                                        {{ $project->appendixx_count }}
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                @if ($project->pdfs)
                                    @if ($project->pdfs->count() > 0)
                                        <div class="details-parameters-cont">
                                            <div class="details-parameters-val">الملفات</div>
                                            @foreach ($project->pdfs as $pdf)
                                                <a class="btn" href="{{ asset('/uploads/' . $pdf->file_path) }}"
                                                    download=""
                                                    style="white-space: unset;
                                            text-align: right;">
                                                    <i class="fa fa-download"></i> {{ $pdf->name }}</a>
                                            @endforeach
                                            <div class="clearfix"></div>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-7 col-md-8">
                            <div class="clearfix"></div>
                            <div class="title-separator-primary"></div>
                            <p class="details-desc">
                            <h3 style="  line-height: 30px;">العنوان: {!! $project->address !!}</h3>
                            <h3 style="  line-height: 30px;">الوصف: {!! $project->details !!}</h3>
                            </p>
                        </div>
                    </div>

                    @if ($project->propertie->details)
                        <div class="row margin-top-45">
                            @foreach (preg_split("/((\r?\n)|(\r\n?))/", $project->propertie->details) as $line)
                                @if ($line != '')
                                    <div class="col-xs-6 col-sm-6" style="float: right">
                                        <ul class="details-ticks">
                                            <li
                                                style="font-size: 22px;display: flex;
                                        align-items: center;">
                                                <i class="jfont">&#xe815;</i></i>{!! $line !!}
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                    <div class="row margin-top-45">
                        <div class="col-xs-12 apartment-tabs">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#tab-map" aria-controls="tab-map" role="tab" data-toggle="tab">
                                        <span>الموقع</span>
                                        <div class="button-triangle2"></div>
                                    </a>
                                </li>
                                @if ($project->virtual_location != '')
                                    <li role="presentation" class="">
                                        <a href="#tab-map2" aria-controls="tab-map2" role="tab" data-toggle="tab">
                                            <span>جولة افتراضية</span>
                                            <div class="button-triangle2"></div>
                                        </a>
                                    </li>
                                @endif
                                {{-- <li role="presentation">
                                    <a href="#tab-street-view" aria-controls="tab-street-view" role="tab"
                                        data-toggle="tab">
                                        <span>Street view</span>
                                        <div class="button-triangle2"></div>
                                    </a>
                                </li> --}}
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="tab-map">
                                    <div id="estate-map" class="details-map">
                                        {!! $project->address_location !!}
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane " id="tab-map2" style="margin-bottom: 200px">
                                    <div id="estate-map" class="details-map" loading="lazy">
                                        {!! $project->virtual_location !!}
                                    </div>
                                </div>
                                {{-- <div role="tabpanel" class="tab-pane" id="tab-street-view">
                                    <div id="estate-street-view" class="details-map"></div>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="row margin-top-60">
                        <div class="col-xs-12 col-lg-12 text-center">
                            <h1 class="">معرض الصور<span class="special-color">.</span></h1>
                        </div>
                        <div class="col-xs-8 col-xs-offset-2 col-sm-offset-4 col-sm-4">
                            <div class="title-separator-primary2"></div>
                        </div>
                    </div>
                    <section class="section-dark no-padding margin-top-30">

                        <!-- Slider main container -->
                        <div id="swiper-gallery" class="swiper-container">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                @foreach ($project->images_path as $item)
                                    <div class="swiper-slide">
                                        <div class="slide-bg swiper-lazy" data-background="{{ $item }}"
                                            data-sub-html="<strong>this is a caption 1</strong><br/>Second line of the caption">
                                        </div>
                                        <!-- Preloader image -->
                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="slide-buttons slide-buttons-center">
                                <a href="#" class="navigation-box navigation-box-next slide-next">
                                    <div class="navigation-triangle"></div>
                                    <div class="navigation-box-icon"><i class="jfont">&#xe800;</i></div>
                                </a>
                                <div id="slide-more-cont"></div>
                                <a href="#" class="navigation-box navigation-box-prev slide-prev">
                                    <div class="navigation-triangle"></div>
                                    <div class="navigation-box-icon"><i class="jfont">&#xe802;</i></div>
                                </a>
                            </div>

                        </div>

                    </section>

                    <section class="thumbs-slider section-both-shadow">
                        <div class="container" style="  max-width: 100% !important;">
                            <div class="row">
                                <div class="col-xs-1">
                                    <a href="#" class="thumb-box thumb-next pull-left">
                                        <div class="navigation-triangle"></div>
                                        <div class="navigation-box-icon"><i class="jfont">&#xe800;</i></div>
                                    </a>
                                </div>
                                <div class="col-xs-10">
                                    <!-- Slider main container -->
                                    <div id="swiper-thumbs" class="swiper-container">
                                        <!-- Additional required wrapper -->
                                        <div class="swiper-wrapper">
                                            <!-- Slides -->
                                            @foreach ($project->images_path as $item)
                                                <div class="swiper-slide">
                                                    <img class="slide-thumb" src="{{ $item }}" alt=""
                                                        style="max-width: 140px; max-height: 80px">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-1">
                                    <a href="#" class="thumb-box thumb-prev pull-right">
                                        <div class="navigation-triangle"></div>
                                        <div class="navigation-box-icon"><i class="jfont">&#xe802;</i></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>

                    {{-- Facilities --}}
                    <div class="row">
                        <div class="row margin-top-60">
                            <div class="col-xs-12 col-lg-12 text-center">
                                <h1 class="">الضمانات<span class="special-color">.</span></h1>
                            </div>
                            <div class="col-xs-8 col-xs-offset-2 col-sm-offset-4 col-sm-4">
                                <div class="title-separator-primary2"></div>
                            </div>
                        </div>
                        <div class="col-md-12 margin-top-30">
                            <div class="main-timeline9">
                                <div class="timeline">
                                    <div class="timeline-content">
                                        <div class="circle"><span><i class="fa fa-home"></i></span></div>
                                        <div class="content">
                                            <span class="year">{{ $project->facility->f1 }}</span>
                                            <h4 class="title">على الهيكل الإنشائي</h4>
                                            <div class="icon"><span></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline">
                                    <div class="timeline-content">
                                        <div class="circle"><span><i class="fa fa-plug"></i></span></div>
                                        <div class="content">
                                            <span class="year">{{ $project->facility->f2 }}</span>
                                            <h4 class="title">على القواطع والأفياش</h4>
                                            <div class="icon"><span></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline">
                                    <div class="timeline-content">
                                        <div class="circle"><span><i class="fa fa-cog"></i></span></div>
                                        <div class="content">
                                            <span class="year">{{ $project->facility->f3 }}</span>
                                            <h4 class="title">على الكهرباء والسباكة</h4>
                                            <div class="icon"><span></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline">
                                    <div class="timeline-content">
                                        <div class="circle"><span><i class="fa fa-user"></i></span></div>
                                        <div class="content">
                                            <span class="year">{{ $project->facility->f4 }}</span>
                                            <h4 class="title">اتحــاد المـلاك مجانـــا</h4>
                                            <div class="icon"><span></span></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- Apartments Reservation --}}
                    <div class="row">
                        @if ($project->floors->count() > 0)
                            <!-- apartment check Area-->
                            <div class="room-details-area pt-100 pb-70  ">
                                <div class="container-fluid m-0 p-0">
                                    <div class="section-title-two text-center">
                                        <div class="row margin-top-60">
                                            <div class="col-xs-12 col-lg-12 text-center">
                                                <h1 class="">حالة الشقق<span class="special-color">.</span></h1>
                                            </div>
                                            <div class="col-xs-8 col-xs-offset-2 col-sm-offset-4 col-sm-4">
                                                <div class="title-separator-primary2"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container margin-top-30" style="color: white; width: 100%">
                                        <div class="table-responsive">



                                            <table class="table mt-2 center"
                                                style="  margin-left: auto !important;
                                    width: fit-content;
                                    margin-bottom: 35px;">
                                                @if ($project->FloorRow($project->floors_count)->count() > 0)
                                                    <tr style="justify-content: center">
                                                        <td style="color: #2f2e33; border-top: none; ">

                                                        </td>
                                                        @foreach ($project->FloorRow($project->floors_count) as $key => $floor)
                                                            <td
                                                                class=" @if ($floor->status == 'متاح') td1
                                                            @elseif ($floor->status == 'محجوز')
                                                            td2
                                                            @else
                                                            td3 @endif">
                                                                {{-- {{ $floor->apartment->count() }} --}}
                                                                {{ $floor->apartment->type }}
                                                                {{-- -
                                                            {{ $floor->apartment->code }} --}}
                                                            </td>

                                                            {{-- @if ($key == 0)
                                                              <td
                                                            style="width: 33% !important; color:transparent!important;box-shadow: none !important; translate: 0px 24px;">
                                                            .</td>
                                                             @endif --}}
                                                        @endforeach
                                                    </tr>
                                                @endif

                                                @for ($i = $project->floors_count - 1; $i >= 1; $i--)
                                                    <tr>
                                                        <td style="color: #2f2e33; border-top: none">
                                                            الدور {{ $i }}
                                                        </td>
                                                        @php
                                                            $check = false;
                                                        @endphp
                                                        @foreach ($project->FloorRow($i) as $key => $floor)
                                                            {{-- @if ($key == $project->FloorRow($i)->count() - 1 && $floor->apartment->type == 'أمامية' && $project->backCount2($i) > 0)
                                                        <td class="m2">.</td>
                                                    @endif --}}

                                                            {{-- @if (!$check && $floor->apartment->type == 'خلفية')
                                                        <td class="m1">.</td>
                                                    @endif --}}
                                                            <td style="   border-radius: @if ($key == 0) 0 15px 15px 0px
                                                    @elseif ($key == $project->FloorRow($i)->count() - 1)
                                                    15px 0 0 15px @endif;
                                                    @if ($project->backCount2($i) == 1 && $check == false && $floor->apartment->type == 'خلفية') width:260px !important; @endif
                                                    "
                                                                class=" @if ($floor->status == 'متاح') td1
                                                    @elseif ($floor->status == 'محجوز')
                                                    td2
                                                    @else
                                                    td3 @endif @if ($floor->apartment->type == 'خلفية') back @endif">
                                                                {{ $floor->apartment->type }}
                                                                {{ $floor->apartment->code }}
                                                            </td>


                                                            {{-- @if ($project->backCount2($i) == 2 && $check == false && $floor->apartment->type == 'خلفية')
                                                        @php
                                                            $check = true;
                                                        @endphp
                                                        <td
                                                            style="color: transparent; width: 10px !important; border:none !important; box-shadow: none !important;">
                                                            .</td>
                                                    @endif --}}
                                                        @endforeach
                                                    </tr>
                                                @endfor
                                            </table>


                                        </div>
                                        <div style="text-align: center">

                                            {{-- <img src="{{ asset('1.png') }}" style="width: 60%; min-width: 300px; margin-top: 5px"> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End -->
                        @endif
                    </div>

                    {{-- Apartment Details --}}

                    @if ($project->apartments->count() > 0)
                        <section class="parallax">

                            <div class="container" style="width: 100%">
                                <div class="row">
                                    <div class="col-xs-12 col-lg-12 text-center">
                                        <h5 class="subtitle-margin">تفاصيل</h5>
                                        <h1 class="">الشقق<span class="special-color">.</span></h1>
                                    </div>
                                    <div class="col-xs-8 col-xs-offset-2 col-sm-offset-4 col-sm-4">
                                        <div class="title-separator-primary2"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="container margin-top-60" style="width: 100%; padding: 0">
                                <div class="row">
                                    <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                                        <div class="panel-group panel-apartment" id="accordion" role="tablist"
                                            aria-multiselectable="true">

                                            @foreach ($project->apartments as $index => $item)
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab"
                                                        id="heading{{ $index }}">
                                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                            href="#collaps{{ $index }}" aria-expanded="true"
                                                            aria-controls="collaps{{ $index }}">
                                                            <span style="padding-right: 50px">تفاصيل {{ $item->type }}
                                                                ({{ $item->code }})
                                                            </span>
                                                            <div class="button-triangle"></div>
                                                            <div class="button-triangle2"></div>
                                                            <div class="button-icon" style="right: unset; left: 10px;"><i
                                                                    class="jfont">&#xe801;</i></div>
                                                        </a>
                                                    </div>
                                                    <div id="collaps{{ $index }}" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="heading{{ $index }}">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-6">
                                                                    <img src="{{ $item->image_path }}" alt=""
                                                                        class="p-image img-responsive" />
                                                                </div>
                                                                <div class="col-xs-12 col-sm-6">
                                                                    <p class="negative-margin">
                                                                    <p>{!! $item->about !!}</p>
                                                                    <ul class="house-list">
                                                                        <li>عدد الغرف: <b>
                                                                                {{ $item->room_count }}</b>
                                                                        </li>
                                                                        @if ($item->price)
                                                                            <li>السعر : <b>{{ $item->price }} ريال</b>
                                                                            </li>
                                                                        @endif
                                                                        @if ($item->price_bank)
                                                                            <li>سعر البنك : <b>{{ $item->price_bank }}
                                                                                    ريال</b>
                                                                            </li>
                                                                        @endif
                                                                        <li> المساحة : <b>{{ $item->area }} متر</b></li>
                                                                    </ul>
                                                                    </p>
                                                                    <div class="row margin-top-30">
                                                                        @foreach (preg_split("/((\r?\n)|(\r\n?))/", $item->details) as $line)
                                                                            <div class="col-xs-12" style="float: right">
                                                                                <ul class="ticks-ul">
                                                                                    <li><i class="jfont">&#xe815;
                                                                                        </i>{{ $line }}
                                                                                    </li>

                                                                                </ul>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <ul class="nav nav-tabs aa">
                                                                @if ($item->virtual_location)
                                                                    <li id="aa" class="active"><a data-toggle="tab" href="#tab-virtual{{ $index }}">الموقع الافتراضي</a></li>
                                                                @endif
                                                                @if ($item->youtube)
                                                                    <li><a id="aa" data-toggle="tab" href="#tab-youtube{{ $index }}" >يوتيوب</a></li>
                                                                @endif
                                                            </ul>

                                                            <div class="tab-content">
                                                                @if ($item->virtual_location)
                                                                    <div id="tab-virtual{{ $index }}" class="tab-pane fade in active">
                                                                        {!! $item->virtual_location !!}
                                                                    </div>
                                                                @endif
                                                                @if ($item->youtube)
                                                                    <div id="tab-youtube{{ $index }}" class="tab-pane fade youtube">
                                                                        {!! $item->youtube !!}
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    @endif


                    <div class="row margin-top-90">
                        <div class="col-xs-12 col-sm-9">
                            <h1>مشاريع مشابهة<span class="special-color">.</span></h1>
                        </div>
                        <div class="col-xs-12 col-sm-3">
                            <a href="#" class="navigation-box navigation-box-prev" id="short-offers-owl-prev">
                                <div class="navigation-triangle"></div>
                                <div class="navigation-box-icon"><i class="jfont">&#xe800;</i></div>
                            </a>
                            <a href="#" class="navigation-box navigation-box-next" id="short-offers-owl-next">
                                <div class="navigation-triangle"></div>
                                <div class="navigation-box-icon"><i class="jfont">&#xe802;</i></div>
                            </a>
                        </div>
                        <div class="col-xs-12">
                            <div class="title-separator-primary"></div>
                        </div>
                    </div>

                    <div class="short-offers-container">
                        <div class="owl-carousel" id="short-offers-owl">
                            @foreach ($projects as $project)
                                <div class="grid-offer-col">
                                    <div class="grid-offer">
                                        <div class="grid-offer-front">

                                            <div class="grid-offer-photo">
                                                <img src="{{ $project->poster_path }}" alt="" />
                                                <div class="type-container"> <span
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
                                            <div class="grid-offer-params">

                                                <div class="grid-rooms"
                                                    style="float: right; padding-right: 15px; text-align: right">
                                                    {{ $project->name }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid-offer-back">
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
                        </div>
                    </div>
                    <div class="margin-top-45"></div>
                </div>
                <div class="col-xs-12 col-md-3">
                    <form action="" method="get">

                        <div class="sidebar">
                            <h3 class="sidebar-title">البحث<span class="special-color">.</span></h3>
                            <div class="title-separator-primary"></div>

                            <div class="sidebar-select-cont">
                                <select name="category_id" class="bootstrap-select" title="التصنيف" multiple>
                                    @foreach ($category_list as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="adv-search-range-cont">
                                <label for="slider-range-price-sidebar-value" class="adv-search-label">السعر:</label>
                                <span></span>
                                <input type="text" name="price" id="slider-range-price-sidebar-value" readonly
                                    class="adv-search-amount">
                                <div class="clearfix"></div>
                                <div id="slider-range-price-sidebar" data-min="0" data-max="{{ $max_price }}"
                                    class="slider-range">
                                </div>
                            </div>
                            <div class="adv-search-range-cont">
                                <label for="slider-range-area-sidebar-value" class="adv-search-label">المساحة:</label>
                                <span>m<sup>2</sup></span>
                                <input type="text" name="area" id="slider-range-area-sidebar-value" readonly
                                    class="adv-search-amount">
                                <div class="clearfix"></div>
                                <div id="slider-range-area-sidebar" data-min="0" data-max="{{ $max_area }}"
                                    class="slider-range"></div>
                            </div>
                            <div class="adv-search-range-cont">
                                <label for="slider-range-bedrooms-sidebar-value" class="adv-search-label">الغرف:</label>
                                <input type="text" name="room_count" id="slider-range-bedrooms-sidebar-value" readonly
                                    class="adv-search-amount">
                                <div class="clearfix"></div>
                                <div id="slider-range-bedrooms-sidebar" data-min="1" data-max="{{ $max_room_count }}"
                                    class="slider-range">
                                </div>
                            </div>
                            <div class="sidebar-search-button-cont">
                                <button type="submit" class="button-primary">
                                    <span>ابحث</span>
                                    <div class="button-triangle"></div>
                                    <div class="button-triangle2"></div>
                                    <div class="button-icon"><i class="fa fa-search"></i></div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
