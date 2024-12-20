@extends('home._layouts._app')
@section('header')
    header_menu-g
@endsection
@section('style')

<style>
.blog-content p:first-child::first-letter {
    font-size: inherit !important;
  color: unset !important;
  float: inherit !important;
}
.scroll {
    position: fixed;
    z-index: 1000;
    right: 0;
    top: 0;
    width: 0;
    height: 9px;
    background-color: #10887c;
}
ul li {
    display: block;
}
</style>

@endsection
@section('scripts')

@endsection
@section('content')


<div class="scroll"></div>

    <!-- Breadcrumb -->
    <div class="page-cover pt-10 pb-10 bg-lgrey border-b d-flex align-items-center" style="
        background-image: url({{ asset($blog->image) }}) !important;
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
                                        <p class="mb-2" style="color: #000; font-size: 20px">
                                            {!! $blog->author_name !!}
                                        </p>
                                    </div>
                                    <div class="author-content">
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
                                    <img src="{{ asset($blog->index_image) }}" alt="{{ $blog->index_image_alt }}" />
                                </div>
                                <h3>المقدمه</h3>
                                <div class="mb-3 shadow-sm" style="
                      border-right: 2px solid #10887c;
                      padding: 10px;
                      border-radius: 8px;
                    ">
                                  {!! $blog->introduction !!}
                            </div>
                            </div>
                            <!-- blog blockquote -->
                            <div class="mb-3 shadow-sm" style="
                    border-right: 2px solid #10887c;
                    padding: 1.5rem;
                    border-radius: 8px;
                  ">
                               {!! $blog->first_paragraph !!}
                        </div>
                            {{-- <h3>عنوان محتوى المقاله</h3> --}}
                            <!-- blog blockquote -->
                            <div class="mb-3 shadow-sm" style="
                    border-right: 2px solid #10887c;
                    padding: 10px;
                    border-radius: 8px;
                  ">
                               {!! $blog->description !!}
                    </div>

                    <a href="{{ route('contactPage') }}" class="btn-btn d-block m-auto" style="width: fit-content;font-size: 1.5rem;">تواصل معنا</a>
                        </div>
                    </div>
                </div>

                <!-- sidebar starts -->
            </div>
        </div>
    </section>
    <!-- blog Ends -->


@endsection

