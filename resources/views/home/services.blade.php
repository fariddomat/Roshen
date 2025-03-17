@extends('home._layouts._app')
@section('header')
    header_menu-g
@endsection
@section('style')
<style>
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
@section('scripts')

@endsection
@section('content')

<!-- Our Services -->
<section class="about-us pb-6 pt-4 bg-pattern">
    <div class="container">
        <<div class="section-title mb-6 pb-1 w-75 text-center mx-auto">
            <h1 style="
                color: #10887c;
                line-height: 1.2;
                margin-bottom: 1rem !important;
                ">خدماتنا
            </h1>
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
                                    <a href="{{ route('service', $service->slug) }}">{{ $service->name }}</a>

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
<section class="counter-main pt-5 ">
    <div class="container">
        <div class="counter text-center bg-lgrey p-5 pb-1 border">
            <div class="row">
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

@endsection

