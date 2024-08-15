@extends('home._layouts._app')

@section('style')
@endsection

@section('scripts')
    <script defer>
        $(window).on('load', function() {
            var maxHeight = 0;
            $('.grid-offer-text').each(function() {
                if ($(this).height() > maxHeight) {
                    maxHeight = $(this).height();
                }
            });
            $('.grid-offer-text').height(maxHeight);
        });
    </script>
@endsection
@section('content')
    <section class="short-image no-padding agency margin-top-135">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-12 short-image-title">
                    <h5 class="subtitle-margin second-color">AlQodsi</h5>
                    <h1 class="second-color">المشاريع</h1>
                    <div class="short-title-separator"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-light section-top-shadow">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-9">
                    {{-- <div class="row">
                        <div class="col-xs-12 col-lg-6">
                            <h5 class="subtitle-margin">apartments for sale, colorodo, usa</h5>
                            <h1>42 estates found<span class="special-color">.</span></h1>
                        </div>
                        <div class="col-xs-12 col-lg-6">

                            <div class="order-by-container">
                                <select name="sort" class="bootstrap-select" title="Order By:">
                                    <option>Price low to high</option>
                                    <option>Price high to low</option>
                                    <option>Area high to low</option>
                                    <option>Area high to low</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="title-separator-primary"></div>
                        </div>
                    </div> --}}
                    <div class="row grid-offer-row" style="display: flex; flex-wrap: wrap; margin-top: -15px;">


                        @if ($projects->count() > 0)
                            @foreach ($projects as $project)
                                <div class="col-xs-12 col-sm-6 col-lg-4 grid-offer-col" style="float: right">
                                    <div class="grid-offer">
                                        <div class="grid-offer-front">

                                            <div class="grid-offer-photo">
                                                <img src="{{ $project->poster_path }}" alt="" />
                                                @if ($project->status == 'تم البيع')
                                        <img src="{{ asset('done.png') }}" style="top: 0;
                                        position: absolute;
                                        z-index: 100000;
                                        left: 0;
                                        background: linear-gradient(0deg, rgba(240, 236, 0, 0.57), rgba(240, 236, 0, 0.57));
                                        padding-top: 45px;
                                        padding-bottom: 75px;" alt="">
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
                        @else
                            <h4>لايوجد مشاريع في هذا القسم</h4>
                        @endif
                    </div>

                    <div class="row col-xs-12" style="width: 100%;margin: 0 auto; text-align: center">
                        <ul>{{ $projects->links() }}</ul>
                    </div>
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
