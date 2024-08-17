@extends('home._layouts._app')

@section('style')

<style>.scroll {
    position: fixed;
    z-index: 1000;
    right: 0;
    top: 0;
    width: 0;
    height: 9px;
    background-color: #10887c;
}</style>

@endsection
@section('scripts')

@endsection
@section('content')


<div class="scroll"></div>

    <!-- Breadcrumb -->
    <div class="page-cover pt-10 pb-10 bg-lgrey border-b d-flex align-items-center" style="
        background-image: url(images/slide1.jpeg) !important;
        background-position: 8% !important;
        background-size: cover !important;
        height: 75vh;
      ">
        <div class="container">
            <div class="cover-content text-center text-md-start">
                <h1 class="lh-sm text-center">
                  {{ $blog->title }}
                </h1>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Ends -->

    <!-- blog starts -->
    <section class="blog blog-left pt-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-sticky">
                        <div class="list-sidebar">
                            <div class="sidebar-item mb-4">
                                <h4 class="">جدول المحتويات</h4>
                                <ul class="sidebar-category">
                                   {!! $blog->content_table !!}
                                </ul>
                            </div>
                            <div class="author-news mb-4 box-shadow p-5 text-center">
                                <div class="author-news-content">
                                    <h3 class="title mb-1"><a href="#">كاتب المقال</a></h3>

                                    <div class="author-thumb mb-1">
                                        <img src="{{ asset($blog->author_image) }}"
                                            alt="author" />
                                    </div>
                                    <div class="author-content">
                                        <h3 class="title mb-1"><a href="#">{{ $blog->author_image }}</a></h3>
                                        <p class="mb-2">
                                            {!! $blog->author_title !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="blog-single">
                        <div class="blog-single-in d-md-flex align-items-center mb-4 text-center text-md-start">
                            <div class="blog-single-in-cont text-center">
                                <div class="blog-content">
                                    <h2 class="blog-title mb-0">
                                        <a href="#" class="">{{ $blog->title }}</a>
                                    </h2>
                                </div>
                            </div>
                        </div>

                        <div class="blog-wrapper">
                            <div class="blog-content">
                                <div class="blog-imagelist mb-3">
                                    <img src="{{ asset($blog->image) }}" alt="image" />
                                </div>
                                <h3>المقدمه</h3>
                                <p class="mb-3 shadow-sm" style="
                      border-right: 2px solid #10887c;
                      padding: 10px;
                      border-radius: 8px;
                    ">
                                  {!! $blog->introduction !!}
                                </p>
                            </div>
                            <!-- blog blockquote -->
                            <p class="mb-3 shadow-sm" style="
                    border-right: 2px solid #10887c;
                    padding: 10px;
                    border-radius: 8px;
                  ">
                               {!! $blog->first_paragraph !!}
                            </p>
                            {{-- <h3>عنوان محتوى المقاله</h3> --}}
                            <!-- blog blockquote -->
                            <p class="mb-3 shadow-sm" style="
                    border-right: 2px solid #10887c;
                    padding: 10px;
                    border-radius: 8px;
                  ">
                               {!! $blog->description !!}
                            </p>

                        </div>
                    </div>
                </div>

                <!-- sidebar starts -->
            </div>
        </div>
    </section>
    <!-- blog Ends -->

    <!-- top deal starts -->
    {{-- <section class="top-post pt-0">
        <div class="container">
            <div class="section-title mb-6 pb-1 w-75 mx-auto text-center">
                <h2 class="m-0">Related <span>Posts</span></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="row team-slider swiper-wrapper" style="direction: ltr !important">
                <div class="col-lg-4 swiper-slide">
                    <div class="trend-item">
                        <div class="trend-image">
                            <img src="https://joeleclinics.com/storage/doctor_image/2251-Web_Site_Pic_-_F.jpg"
                                alt="image" />
                            <div class="trend-content p-4 bg-lgrey border-b">
                                <h5 class="theme">Inspiration</h5>
                                <h4>
                                    <a href="#">Inspire Runner with Autism Graces the Latest Cover</a>
                                </h4>
                                <p class="mb-2">
                                    A wonderful serenity has taken possession of my entire soul,
                                    like these sweet mornings.
                                </p>
                                <div class="entry-meta d-flex align-items-center justify-content-between border-t pt-2">
                                    <div class="entry-author d-flex align-items-center">
                                        <img src="https://joeleclinics.com/storage/doctor_image/2251-Web_Site_Pic_-_F.jpg"
                                            alt="" class="rounded-circle me-1" />
                                        <span>John Bolden</span>
                                    </div>
                                    <div class="entry-metalist">
                                        <small><a href="#" class="grey"><i class="fa fa-calendar"></i> 10 Apr
                                                2021</a></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 swiper-slide">
                    <div class="trend-item">
                        <div class="trend-image">
                            <img src="https://joeleclinics.com/storage/doctor_image/2251-Web_Site_Pic_-_F.jpg"
                                alt="image" />
                            <div class="trend-content p-4 bg-lgrey border-b">
                                <h5 class="theme">Inspiration</h5>
                                <h4>
                                    <a href="#">Inspire Runner with Autism Graces the Latest Cover</a>
                                </h4>
                                <p class="mb-2">
                                    A wonderful serenity has taken possession of my entire soul,
                                    like these sweet mornings.
                                </p>
                                <div class="entry-meta d-flex align-items-center justify-content-between border-t pt-2">
                                    <div class="entry-author d-flex align-items-center">
                                        <img src="{{ asset('asset') }}/images/reviewer/3.jpg" alt="" class="rounded-circle me-1" />
                                        <span>John Bolden</span>
                                    </div>
                                    <div class="entry-metalist">
                                        <small><a href="#" class="grey"><i class="fa fa-calendar"></i> 10 Apr
                                                2021</a></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 swiper-slide">
                    <div class="trend-item">
                        <div class="trend-image">
                            <img src="https://joeleclinics.com/storage/doctor_image/2251-Web_Site_Pic_-_F.jpg"
                                alt="image" />
                            <div class="trend-content p-4 bg-lgrey border-b">
                                <h5 class="theme">Inspiration</h5>
                                <h4>
                                    <a href="#">Inspire Runner with Autism Graces the Latest Cover</a>
                                </h4>
                                <p class="mb-2">
                                    A wonderful serenity has taken possession of my entire soul,
                                    like these sweet mornings.
                                </p>
                                <div class="entry-meta d-flex align-items-center justify-content-between border-t pt-2">
                                    <div class="entry-author d-flex align-items-center">
                                        <img src="{{ asset('asset') }}/images/reviewer/3.jpg" alt="" class="rounded-circle me-1" />
                                        <span>John Bolden</span>
                                    </div>
                                    <div class="entry-metalist">
                                        <small><a href="#" class="grey"><i class="fa fa-calendar"></i> 10 Apr
                                                2021</a></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 swiper-slide">
                    <div class="trend-item">
                        <div class="trend-image">
                            <img src="https://joeleclinics.com/storage/doctor_image/2251-Web_Site_Pic_-_F.jpg"
                                alt="image" />
                            <div class="trend-content p-4 bg-lgrey border-b">
                                <h5 class="theme">Inspiration</h5>
                                <h4>
                                    <a href="#">Inspire Runner with Autism Graces the Latest Cover</a>
                                </h4>
                                <p class="mb-2">
                                    A wonderful serenity has taken possession of my entire soul,
                                    like these sweet mornings.
                                </p>
                                <div class="entry-meta d-flex align-items-center justify-content-between border-t pt-2">
                                    <div class="entry-author d-flex align-items-center">
                                        <img src="{{ asset('asset') }}/images/reviewer/3.jpg" alt="" class="rounded-circle me-1" />
                                        <span>John Bolden</span>
                                    </div>
                                    <div class="entry-metalist">
                                        <small><a href="#" class="grey"><i class="fa fa-calendar"></i> 10 Apr
                                                2021</a></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- top deal ends -->

@endsection

