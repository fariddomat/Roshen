@extends('home._layouts._app')

@section('header')
    header_menu-g
@endsection

@section('style')
    <style>
        /* Parallax effect for trend-box */
.trend-box {
    background-image: url('{{ asset('home/bg-projects.png') }}');
    background-size: cover;
    background-position: center;
    background-attachment: fixed; /* Creates parallax effect */
    background-repeat: no-repeat;
}

/* Mobile fallback: Disable parallax on mobile due to inconsistent support */
@media (max-width: 991px) {
    .trend-box {
        background-attachment: scroll; /* Fallback to normal scrolling */
        background-size: cover; /* Ensure it still looks good */
        background-position: center;
    }
}
        .section-title:before,
        .section-title-w:before,
        .section-title-l:before {
            border-bottom: unset;

        }

        .container {
            position: relative;
            z-index: unset;
            direction: rtl;
            /* Ensure RTL direction */
        }

        header {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            ศ: 19999;
            background: #fff;
        }

        .side-menu {
            position: fixed;
            right: 0;
            /* RTL: Sidebar on right */
            top: 0;
            width: 250px;
            height: 100%;
            background: #f0f0f0;
            z-index: 30;
        }

        .nice-select {
            color: black;
            font-weight: bold;
        }

        .trend-meta .tags {
            width: 100%;
            text-align: center;
            font-size: 14px;
            border-radius: 10px;
            margin-bottom: 10px;
            display: block;
        }

        .sold-image {
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            max-width: 80%;
            z-index: 9;
        }

        /* Desktop styles */
        @media (min-width: 992px) {
            .trend-item {
                display: flex;
                align-items: stretch;
                background: #fff;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                /* Material shadow */
                overflow: hidden;
            }

            .project-col:nth-child(even) .trend-item {
                border-top-right-radius: 50px;
                /* RTL: Fully rounded top-right */
                border-bottom-left-radius: 50px;
                /* RTL: Fully rounded bottom-left */
                border-top-left-radius: 10px;
                /* Small rounded */
                border-bottom-right-radius: 10px;
                /* Small rounded */
            }

            .project-col:nth-child(odd) .trend-item {
                border-top-left-radius: 50px;
                /* RTL: Fully rounded top-left */
                border-bottom-right-radius: 50px;
                /* RTL: Fully rounded bottom-right */
                border-top-right-radius: 10px;
                /* Small rounded */
                border-bottom-left-radius: 10px;
                /* Small rounded */
            }

            .trend-image {
                flex: 0 0 50%;
                position: relative;
                /* For sold image positioning */
            }

            .trend-content {
                flex: 0 0 50%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                padding: 20px;
                text-align: right;
                /* RTL: Right-aligned text */
            }

            .trend-meta {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                /* RTL: Align to start (right) */
                gap: 10px;
            }
        }

        /* Mobile styles (revert to original) */
        @media (max-width: 991px) {
            .trend-item {
                display: block;
                border-radius: 10px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                /* Original shadow */
            }

            .trend-image {
                width: 100%;
                position: relative;
                /* For sold image */
            }

            .trend-content {
                padding: 15px;
                text-align: right;
                /* RTL: Right-aligned text */
            }

            .trend-meta {
                display: flex;
                flex-direction: row;
                justify-content: space-between;
            }

            .trend-meta .tags {
                width: 49%;
                margin-bottom: 0;
            }

            .sold-image {
                top: 10px;
                left: 50%;
                transform: translateX(-50%);
                max-width: 80%;
            }
        }
        /* Mobile styles (revert to original with reversed order) */
@media (max-width: 991px) {
    .trend-item {
        display: flex; /* Change to flex to control order */
        flex-direction: column; /* Stack vertically */
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        /* Original shadow */
    }

    .trend-image {
        width: 100%;
        position: relative;
        /* For sold image */
        order: 1; /* Image appears first */
    }

    .trend-content {
        padding: 15px;
        text-align: right;
        /* RTL: Right-aligned text */
        order: 2; /* Content appears second */
    }

    .trend-meta {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }

    .trend-meta .tags {
        width: 49%;
        margin-bottom: 0;
    }

    .sold-image {
        top: 10px;
        left: 50%;
        transform: translateX(-50%);
        max-width: 80%;
    }
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

            $(".min-value").text(slider.slider("values", 0) + " ريال");
            $(".max-value").text(slider.slider("values", 1) + " ريال");
        });
    </script>
@endsection

@section('content')
    <!-- Blog starts -->
    <section class="blog trending py-5">
        <div class="container">
            <div class="section-title mb-5 pb-1 w-75 text-center mx-auto">
                <h1 style="color: #10887c; line-height: 1.2; margin-bottom: 1rem !important;">مشاريعنا</h1>
            </div>
            <div class="row position-relative">
                <!-- Sidebar -->
                <div class="sidebar-container">
                    <div class="sidebar-sticky p-3">
                        <div class="list-sidebar">
                            <div class="sidebar-item mb-4 shadow p-4 text-center">
                                <h3>ابحث عن منزلك</h3>
                                <form class="form-find" method="GET" action="{{ route('projects') }}">
                                    <div class="form-group mb-2">
                                        <div class="input-box">
                                            <select name="category" class="niceSelect form-select">
                                                <option value="">الحي</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ request('category') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <div class="input-box">
                                            <select name="direction" class="niceSelect form-select">
                                                <option value="">اتجاه الشقة</option>
                                                <option value="أمامية"
                                                    {{ request('direction') == 'أمامية' ? 'selected' : '' }}>أمامية</option>
                                                <option value="داخلية"
                                                    {{ request('direction') == 'داخلية' ? 'selected' : '' }}>داخلية</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <div class="input-box">
                                            <select name="status" class="niceSelect form-select">
                                                <option value="">حالات الشقق</option>
                                                <option value="جاهز" {{ request('status') == 'جاهز' ? 'selected' : '' }}>
                                                    جاهز</option>
                                                <option value="تحت الانشاء"
                                                    {{ request('status') == 'تحت الإنشاء' ? 'selected' : '' }}>تحت الإنشاء
                                                </option>
                                                <option value="قيد التشطيب"
                                                    {{ request('status') == 'قيد التشطيب' ? 'selected' : '' }}>قيد التشطيب
                                                </option>
                                                <option value="تم البيع"
                                                    {{ request('status') == 'تم البيع' ? 'selected' : '' }}>تم البيع
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2 d-flex justify-content-between">
                                        <div class="input-box w-50 me-1">
                                            <select name="rooms" class="niceSelect form-select">
                                                <option value="">عدد الغرف</option>
                                                @for ($i = 2; $i <= 7; $i++)
                                                    <option value="{{ $i }}"
                                                        {{ request('rooms') == $i ? 'selected' : '' }}>{{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="input-box w-50 ms-1">
                                            <select name="bathrooms" class="niceSelect form-select">
                                                <option value="">الحمامات</option>
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <option value="{{ $i }}"
                                                        {{ request('bathrooms') == $i ? 'selected' : '' }}>
                                                        {{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <div class="range-slider mt-0">
                                            <p class="text-end mb-2">نطاق السعر</p> <!-- RTL: Text-end -->
                                            <div id="price-slider"
                                                class="range-slider-ui ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                                                data-min="0" data-max="2000000" data-step="10000"
                                                data-min-value="{{ request('min_price', 0) }}"
                                                data-max-value="{{ request('max_price', 2000000) }}">
                                                <span class="min-value">0 ريال</span>
                                                <span class="max-value">2000000 ريال</span>
                                                <div class="ui-slider-range ui-widget-header ui-corner-all full"></div>
                                            </div>
                                            <input type="hidden" name="min_price" id="min_price"
                                                value="{{ request('min_price', 0) }}">
                                            <input type="hidden" name="max_price" id="max_price"
                                                value="{{ request('max_price', 2000000) }}">
                                        </div>
                                    </div>
                                    <div class="form-group text-center w-100">
                                        <input type="submit" class="btn w-100" id="submit3" value="بحث"
                                            style="background-color: #6f42c1; border-radius: 10px; font-size: 20px; color: #fff;" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar-overlay"></div>
                <button class="sidebar-toggle-btn btn btn-primary"
                    style="    border-top-right-radius: 400px;
                        border-bottom-left-radius: 400px;
                        padding-top: 20px;
                        padding-bottom: 20px;
                        font-weight: normal !important;
                    ">ابحث
                    عن منزلك</button>

                <!-- Main content -->
                <div class="col-lg-12">
                    <div class="listing-inner">
                        <div class="trend-box bg-light p-4">
                            <div class="row">
                                @foreach ($projects as $project)
                                    <div class="col-lg-6 col-md-6 mb-4 p-8 project-col" style="padding: 2rem !important">
                                        <div class="trend-item" style="background: #10887c28">
                                            <div class="trend-content p-4">
                                                <h5 class="bold"
                                                    style="border-left: unset; margin: 5px auto; color: #10887c; font-weight: bold">
                                                    {{ $project->category->name }}</h5>
                                                <h4>
                                                    <a href="{{ route('project', $project->slug) }}"
                                                        class="text-decoration-none"
                                                        style="color: #605098 ">{{ $project->name }}</a>
                                                </h4>
                                                <div class="trend-meta">
                                                    <a href="{{ route('project', $project->slug) }}"
                                                        class="tags bg-theme2 text-white px-1 py-1 text-decoration-none">استعراض
                                                        المشروع</a>
                                                    @if ($project->pdfs && $project->pdfs->count() > 0)
                                                        <a href="{{ asset('/Uploads/' . $project->pdfs->first()->file_path) }}"
                                                            class="tags bg-theme2 text-white px-1 py-1 text-decoration-none"
                                                            style="background-color: #10887c !important">تحميل البرشور</a>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="trend-image">
                                                @if ($project->status == 'تم البيع')
                                                    <img src="{{ asset('home/sell.png') }}" alt="Sold"
                                                        class="sold-image">
                                                @endif
                                                <img src="{{ asset($project->poster_path) }}" alt="Project Image"
                                                    class="img-fluid"
                                                    style="width: 100%; height: 100%; object-fit: cover;" />

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="pagination-main text-center">
                                <ul class="pagination justify-content-center">
                                    {{ $projects->links() }}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
