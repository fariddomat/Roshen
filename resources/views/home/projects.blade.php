@extends('home._layouts._app')

@section('style')


@endsection
@section('scripts')

@endsection
@section('content')

<!-- blog starts -->
<section class="blog trending">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="listing-inner">
                    <div
                            class="list-results d-flex align-items-center justify-content-between"
                    >
                        <div class="list-results-sort">
                            {{-- <p class="m-0">عرض 1-5 من 80 نتيجة</p> --}}
                        </div>
                        <div
                                class="click-menu d-flex align-items-center justify-content-between"
                        >
                            <!--                            <div class="change-grid f-active me-2">-->
                            <!--                                <a href="{{ route('projects') }}"><i class="fa fa-th"></i></a>-->
                            <!--                            </div>-->
                            <div
                                    class="sortby d-flex align-items-center justify-content-between ml-2"
                            >
                            <select class="niceSelect">
                                <option value="1">فلترة بواسطة</option>
                                <option value="2">الأقرب إلى البلد</option>
                                <option value="3">الأقرب إلى المطار</option>
                                <option value="4">الأقرب إلى البحر</option>
                            </select>

                            </div>
                        </div>
                    </div>
                    <div class="trend-box bg-pattern p-2">
                        <div class="row">
                            @foreach ($projects as $project)   <div class="col-lg-6 col-md-6 mb-4  p-3 box-shadow">
                                <div class="trend-item bg-white box-shadow rounded">
                                    <div class="trend-image">
                                        <img src="{{ asset($project->poster_path) }}" alt="image"/>
                                        <a href="#" class="flash bg-theme1 white px-3 py-2"></a>
                                        <div
                                                class="trend-meta d-flex align-items-center justify-content-between"
                                        >

                                            <a href="{{ route('project', $project->id) }}" class="tags bg-theme2 white px-3 py-1">استعراض
                                                المشروع</a>
                                        </div>
                                    </div>
                                    <div class="trend-content p-4">
                                        <h5 class="theme">{{ $project->category->name }}</h5>
                                        <h4>
                                            <a href="{{ route('project', $project->id) }}"
                                            >{{ $project->name }}  </a
                                            >
                                        </h4>
                                        <div
                                                class="entry-meta d-flex align-items-center justify-content-between border-b pb-1 mb-2">
                                            {{-- <div class="entry-author">
                                                <p>
                                                    السعر يبدا من <span class="d-block theme fw-bold"
                                                >$63,000.00</span
                                                >
                                                </p>
                                            </div> --}}
                                        </div>
                                        <p class="mb-0">
                                            {!! $project->details !!}
                                        </p>
                                    </div>
                                    {{-- <ul
                                            class="d-flex align-items-center justify-content-between bg-grey p-3 px-4"
                                    >
                                        <li class="me-2">عدد الغرف</li>
                                        <li class="me-2">2 الدور</li>
                                        <li>الحي</li>
                                        <li>المساحة</li>
                                    </ul> --}}
                                </div>
                            </div>

                            @endforeach
                        </div>
                        <div class="pagination-main text-center">
                            <ul class="pagination">
                              {{$projects->links()}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- sidebar starts -->
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-sticky">
                    <div class="list-sidebar">
                        <div class="sidebar-item mb-4 box-shadow p-4 text-centerb">
                            <h3>ابحث عن منزلك</h3>
                            <form class="form-find">
                                <div class="form-group mb-2">
                                    <div class="input-box">
                                        <select class="niceSelect">
                                            <option>الحي</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="input-box">
                                        <select class="niceSelect">
                                            <option value="1">اتجاه الشقة</option>
                                            <option value="2">أمامية</option>
                                            <option value="3">خلفية</option>
                                            <option value="4">على زاوية</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="input-box">
                                        <select class="niceSelect">
                                            <option value="1">حالات الشقق</option>
                                            <option value="2">جاهز</option>
                                            <option value="3">تحت الإنشاء</option>
                                            <option value="4">قيد التشطيب</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-2 d-flex justify-content-between">
                                    <div class="input-box w-50 me-1">
                                        <select class="niceSelect">
                                            <option value="1">عدد الغرف</option>
                                            <option value="2">1</option>
                                            <option value="3">2</option>
                                            <option value="4">3</option>
                                            <option value="5">4</option>
                                            <option value="6">5</option>
                                        </select>
                                    </div>
                                    <div class="input-box w-50 ms-1">
                                        <select class="niceSelect">
                                            <option value="1">الحمامات</option>
                                            <option value="2">1</option>
                                            <option value="3">2</option>
                                            <option value="4">3</option>
                                            <option value="5">4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="range-slider mt-0">
                                        <p class="text-start mb-2">نطاق السعر</p>
                                        <div
                                            data-min="0"
                                            data-max="20000"
                                            data-unit="ريال"
                                            data-min-name="min_price"
                                            data-max-name="max_price"
                                            class="range-slider-ui ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                                            aria-disabled="false"
                                        >
                                            <span class="min-value">500 ريال</span>
                                            <span class="max-value">20000 ريال</span>
                                            <div
                                                class="ui-slider-range ui-widget-header ui-corner-all full"
                                                style="left: 0%; width: 100%"
                                            ></div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="form-group text-center w-100">
                                    <input
                                        type="submit"
                                        class="nir-btn w-100"
                                        id="submit3"
                                        value="بحث"
                                        style="
                                            background-color: #6f42c1;
                                            border-radius: 10px;
                                            font-size: 20px;
                                            color: #fff;
                                        "
                                    />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- blog Ends -->

@endsection

