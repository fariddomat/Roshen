@extends('home._layouts._app')
@section('header')
    header_menu-g
@endsection
@section('style')
@endsection
@section('scripts')
@endsection
@section('content')
    <div class="container">
        {{-- <div class="page-cover pb-3"
            style="
        background-image: url({{ asset($service->image_path) }}) !important;
        background-position: center !important;
        background-size: cover !important;
        height: 400px;
        border-radius: 8px;
      ">
        </div> --}}
    </div>
    <!-- about-us starts -->
    <section class="about-us pb-10">
        <div class="container">
            <div class="about-image-box">
                <div class="row">
                    <div class="col-lg-8 col-sm-12 pe-4">
                        <div class="about-content">
                            <h2 class="mb-3">{{ $service->name }}</h2>
                            <div class="about-image bordernone mb-3">
                                <img src="{{ asset($service->image_path) }}" alt="" class="w-100" />
                            </div>
                            <p class="border-b mb-3 pb-3">
                               <div>
                                {!! $service->description !!}
                               </div>
                            </p>
                            <a href="{{ route('contactPage') }}" class="btn-btn d-block m-auto" style="width: fit-content;font-size: 1.5rem;">طلب الخدمه</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 ps-4">
                        <div class="sidebar-sticky">
                            <div class="list-sidebar">
                                <div class="sidebar-item mb-4">
                                    <h3 class="">خدمات أخرى</h3>
                                    <ul class="sidebar-category">
                                        @foreach ($services as $item)
                                        @if ($item->id != $service->id)
                                        <li><a href="{{ route('service', $item->slug) }}">{{ $item->name }}</a></li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-us ends -->
@endsection
