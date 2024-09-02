@extends('home._layouts._app')
@section('header')
    header_menu-g
@endsection
@section('style')
<style>
    .trend-meta .tags {
    width: 49%; /* عرض ثابت لكل زر */
    text-align: center; /* لجعل النص في الوسط */
    font-size: 14px;
    border-radius: 10px;
}

</style>
@endsection
@section('scripts')
<script>
    $(function() {
    var slider = $("#price-slider");
    var minPriceInput = $("#min_price");
    var maxPriceInput = $("#max_price");

    slider.slider({
        range: true,
        min: slider.data('min'),
        max: slider.data('max'),
        step: slider.data('step'),
        values: [slider.data('min-value'), slider.data('max-value')],
        slide: function(event, ui) {
            $(".min-value").text(ui.values[0] + " ريال");
            $(".max-value").text(ui.values[1] + " ريال");
            minPriceInput.val(ui.values[0]);
            maxPriceInput.val(ui.values[1]);
        }
    });

    // Set initial values for display
    $(".min-value").text(slider.slider("values", 0) + " ريال");
    $(".max-value").text(slider.slider("values", 1) + " ريال");
});

</script>
@endsection
@section('content')
    <!-- blog starts -->
    <section class="blog trending">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="listing-inner">
                        <div class="list-results d-flex align-items-center justify-content-between">
                            <div class="list-results-sort">
                                {{-- <p class="m-0">عرض 1-5 من 80 نتيجة</p> --}}
                            </div>
                            <div class="click-menu d-flex align-items-center justify-content-between">
                                <!--                            <div class="change-grid f-active me-2">-->
                                <!--                                <a href="{{ route('projects') }}"><i class="fa fa-th"></i></a>-->
                                <!--                            </div>-->
                                <div class="sortby d-flex align-items-center justify-content-between ml-2">
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
                                @foreach ($projects as $project)
                                    <div class="col-lg-6 col-md-6 mb-4  p-3 box-shadow">
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
                                                <div class="trend-meta d-flex align-items-center justify-content-between">

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
                                                <h5 class="theme">{{ $project->category->name }}</h5>
                                                <h4>
                                                    <a href="{{ route('project', $project->id) }}">{{ $project->name }} </a>
                                                </h4>
                                                <div
                                                    class="entry-meta d-flex align-items-center justify-content-between border-b pb-1 mb-2">

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="pagination-main text-center">
                                <ul class="pagination">
                                    {{ $projects->links() }}
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
                                <form class="form-find" method="GET" action="{{ route('projects') }}">
                                    <div class="form-group mb-2">
                                        <div class="input-box">
                                            <select name="category" class="niceSelect">
                                                <option value="">الحي</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <div class="input-box">
                                            <select name="direction" class="niceSelect">
                                                <option value="">اتجاه الشقة</option>
                                                <option value="أمامية" {{ request('direction') == 'أمامية' ? 'selected' : '' }}>أمامية</option>
                                                <option value="داخلية" {{ request('direction') == 'داخلية' ? 'selected' : '' }}>داخلية</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <div class="input-box">
                                            <select name="status" class="niceSelect">
                                                <option value="">حالات الشقق</option>
                                                <option value="جاهز" {{ request('status') == 'جاهز' ? 'selected' : '' }}>جاهز</option>
                                                <option value="تحت الانشاء" {{ request('status') == 'تحت الإنشاء' ? 'selected' : '' }}>تحت الإنشاء</option>
                                                <option value="قيد التشطيب" {{ request('status') == 'قيد التشطيب' ? 'selected' : '' }}>قيد التشطيب</option>
                                                <option value="تم البيع" {{ request('status') == 'تم البيع' ? 'selected' : '' }}>تم البيع</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2 d-flex justify-content-between">
                                        <div class="input-box w-50 me-1">
                                            <select name="rooms" class="niceSelect">
                                                <option value="">عدد الغرف</option>
                                                @for ($i = 2; $i <= 7; $i++)
                                                    <option value="{{ $i }}" {{ request('rooms') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="input-box w-50 ms-1">
                                            <select name="bathrooms" class="niceSelect">
                                                <option value="">الحمامات</option>
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <option value="{{ $i }}" {{ request('bathrooms') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <div class="range-slider mt-0">
                                            <p class="text-start mb-2">نطاق السعر</p>
                                            <div id="price-slider"
                                                 class="range-slider-ui ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                                                 data-min="0"
                                                 data-max="2000000"
                                                 data-step="10000"
                                                 data-min-value="{{ request('min_price', 0) }}"
                                                 data-max-value="{{ request('max_price', 2000000) }}">
                                                <span class="min-value">0 ريال</span>
                                                <span class="max-value">2000000 ريال</span>
                                                <div class="ui-slider-range ui-widget-header ui-corner-all full"></div>
                                            </div>
                                            <input type="hidden" name="min_price" id="min_price" value="{{ request('min_price', 0) }}">
                                            <input type="hidden" name="max_price" id="max_price" value="{{ request('max_price', 2000000) }}">
                                        </div>
                                    </div>

                                    <div class="form-group text-center w-100">
                                        <input type="submit" class="nir-btn w-100" id="submit3" value="بحث"
                                            style="background-color: #6f42c1; border-radius: 10px; font-size: 20px; color: #fff;" />
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
