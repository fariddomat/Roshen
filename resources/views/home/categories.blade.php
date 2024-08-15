@extends('home._layouts._app')

@section('content')
    <section class="short-image no-padding agency margin-top-135">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-12 short-image-title">
                    <h5 class="subtitle-margin second-color">AlQodsi</h5>
                    <h1 class="second-color">تصنيفات المشاريع</h1>
                    <div class="short-title-separator"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-light section-top-shadow " style="margin-top: 0">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-12 short-image-title">
                    <form action="{{ route('category', ['id' => 1]) }}" method="get">
                        <div class="adv-search-cont" style="position: relative;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-lg-11 adv-search-icons">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs adv-search-tabs" role="tablist">
                                            <li role="presentation" class="active" data-toggle="tooltip"
                                                data-placement="top" title="المشاريع"><a href="#apartments"
                                                    aria-controls="apartments" role="tab" data-toggle="tab"
                                                    id="adv-search-tab1"><i class="fa fa-building"></i></a></li>
                                        </ul>
                                    </div>
                                    {{-- <div class="col-lg-1 visible-lg">
                                        <a id="adv-search-hide" href="#"><i class="jfont">&#xe801;</i></a>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="container">
                                <div class="row tab-content">
                                    <div role="tabpanel" class="col-xs-12 adv-search-outer tab-pane fade in active"
                                        id="apartments">

                                        <div class="row" dir="rtl">
                                            <div class="col-xs-12 col-sm-6 col-lg-3" style="float: right">
                                                <select name="category_id" class="bootstrap-select" title="التصنيف">
                                                    @foreach ($category_list as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-lg-4">
                                                <div class="adv-search-range-cont">
                                                    <label for="slider-range-price-sidebar-value"
                                                        class="adv-search-label">السعر:</label>
                                                    <span></span>
                                                    <input type="text" name="price"
                                                        id="slider-range-price-sidebar-value" readonly
                                                        class="adv-search-amount">
                                                    <div class="clearfix"></div>
                                                    <div id="slider-range-price-sidebar" data-min="0"
                                                        data-max="{{ $max_price }}" class="slider-range">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-lg-4">
                                                <div class="adv-search-range-cont">
                                                    <label for="slider-range-area-sidebar-value"
                                                        class="adv-search-label">المساحة:</label>
                                                    <span>m<sup>2</sup></span>
                                                    <input type="text" name="area"
                                                        id="slider-range-area-sidebar-value" readonly
                                                        class="adv-search-amount">
                                                    <div class="clearfix"></div>
                                                    <div id="slider-range-area-sidebar" data-min="0"
                                                        data-max="{{ $max_area }}" class="slider-range"></div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-lg-4">
                                                <div class="adv-search-range-cont">
                                                    <label for="slider-range-bedrooms-sidebar-value"
                                                        class="adv-search-label">الغرف:</label>
                                                    <input type="text" name="room_count"
                                                        id="slider-range-bedrooms-sidebar-value" readonly
                                                        class="adv-search-amount">
                                                    <div class="clearfix"></div>
                                                    <div id="slider-range-bedrooms-sidebar" data-min="1"
                                                        data-max="{{ $max_room_count }}" class="slider-range">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="container">
                                <div class="row">
                                    <div
                                        class="col-sm-12 col-md-6 col-lg-3 col-md-offset-6 col-lg-offset-9 adv-search-button-cont">
                                        <button type="submit" id="submit" aria-label="submit"
                                            class="button-primary pull-right">
                                            <span>بحث</span>
                                            <div class="button-triangle"></div>
                                            <div class="button-triangle2"></div>
                                            <div class="button-icon"><i class="fa fa-search"></i></div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-12">

                    <div class=""></div>
                    <div class="row team-member-row">
                        @if ($categories->count() > 0)
                            @foreach ($categories as $category)
                                <div class="col-xs-12 col-sm-6 col-lg-3 team-member-col" style="float: right !important">
                                    <div class="team-member">
                                        <div class="team-photo">
                                            <img src="{{ $category->image_path }}" alt="" />
                                            <div class="big-triangle"></div>
                                            <div class="big-triangle2"></div>
                                            <a class="big-icon " href="{{ route('category', $category->id) }}"><i
                                                    class="fa fa-search"></i></a>
                                            <div class="team-description">
                                                <div>

                                                    <p class="team-text">
                                                        {{ $category->description }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="team-name">
                                            <h3>{{ $category->name }}</h3>
                                            <h5 class="margin-top-15">
                                                عدد المشاريع {{ $category->projects->count() }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h4>لم يتم إضافة تصنيفات بعد</h4>
                        @endif

                        <div class="row col-xs-12" style="width:100%; margin: 0 auto; text-align: center">
                            <ul>{{ $categories->links() }}</ul>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-xs-12 col-md-3">
                    <form action="{{ route('category', ['id' => 1]) }}" method="get">

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
                </div> --}}
            </div>
        </div>
    </section>
@endsection
