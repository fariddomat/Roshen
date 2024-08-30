@extends('home._layouts._app')
@section('header')
    header_menu-g
@endsection
@section('style')
<style> .list-results .nice-select {
    width: 175px;
}</style>

@endsection
@section('scripts')

@endsection
@section('content')

<!-- blog starts -->
<section class="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="listing-inner">
                    <div class="row">
                        <div class="col-lg-12">
                            <div
                                    class="list-results d-flex align-items-center justify-content-between"
                            >
                                <div class="list-results-sort">
                                    {{-- <p class="m-0">Showing 1-5 of 80 results</p> --}}
                                </div>
                                <div
                                        class="click-menu d-flex align-items-center justify-content-between"
                                >
                                    <div
                                            class="sortby d-flex align-items-center justify-content-between ml-2"
                                    >
                                        <select class="niceSelect">
                                            <option value="1">ترتيب حسب</option>
                                            <option value="2">الاقدم</option>
                                            <option value="2">الاحدث</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                       @foreach ($blogs as $blog)
                       <div class="col-lg-6 mb-4">
                        <div class="trend-item box-shadow bg-white">
                            <div class="trend-image">
                                <img src="{{ asset($blog->image) }}" alt="image" />
                            </div>
                            <div class="trend-content-main p-4">
                                <div class="trend-content">
                                    <h5 class="theme">{{$blog->category->name}}</h5>
                                    <h4>
                                        <a href="{{ route('blog', $blog->slug) }}"
                                        >{{$blog->title}}</a
                                        >
                                    </h4>
                                    <p class="mb-2">
                                        {!! Str::limit($blog->introduction, 190, ' ...') !!}

                                    </p>
                                    <div
                                            class="entry-meta d-flex align-items-center justify-content-between"
                                    >
                                        <div class="entry-author">
                                            <img
                                                    src="{{ asset($blog->author_image) }}"
                                                    alt=""
                                                    class="rounded-circle me-1"
                                            />
                                            <span>{{ $blog->author_name }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                       @endforeach

                    </div>
                    <div class="pagination-main text-center">
                        <ul class="pagination">
                          {{ $blogs->links() }}
                        </ul>
                    </div>
                </div>
            </div>

            <!-- sidebar starts -->
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-sticky">
                    <div class="list-sidebar">
                        <div class="sidebar-item mb-4">
                            <h4 class="">جميع الفئات</h4>
                            <ul class="sidebar-category">
                                <li class="{{ request('category') ? '' : 'active' }}"><a href="{{ route('blogs') }}">الكل</a></li>
                                @foreach ($blogCategories as $blogCategory)
                                    <li class="{{ request('category') == $blogCategory->id ? 'active' : '' }}">
                                        <a href="{{ route('blogs', ['category' => $blogCategory->id]) }}">
                                            {{ $blogCategory->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- blog Ends -->

<!-- featured-video starts -->
{{-- <section class="featured-video pb-5 bg-grey">
    <div class="container">
        <div class="section-title mb-6 pb-1 w-75 mx-auto text-center">
            <h2 class="m-0"><span>منشورات</span> ذات صله</h2>
        </div>
        <div class="featured-video-main">
            <div class="row">

                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="trend-item box-shadow bg-white">
                                <div class="trend-image">
                                    <img src="{{ asset('asset') }}/images/Background.png" alt="image" />
                                </div>
                                <div class="trend-content-main">
                                    <div class="trend-content p-4">
                                        <h5 class="theme mb-1">Design</h5>
                                        <h4 class="mb-0">
                                            <a href="detail-1.html"
                                            >Get Ready To Up Your Creative Game</a
                                            >
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="trend-item box-shadow bg-white">
                                <div class="trend-image">
                                    <img src="{{ asset('asset') }}/images/Background.png" alt="image" />
                                </div>
                                <div class="trend-content-main">
                                    <div class="trend-content p-4">
                                        <h5 class="theme mb-1">Products</h5>
                                        <h4 class="mb-0">
                                            <a href="detail-1.html"
                                            >New: Freehand Templates, built for all</a
                                            >
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="trend-item box-shadow bg-white">
                                <div class="trend-image">
                                    <img src="{{ asset('asset') }}/images/Background.png" alt="image" />
                                </div>
                                <div class="trend-content-main">
                                    <div class="trend-content p-4">
                                        <h5 class="theme mb-1">Design</h5>
                                        <h4 class="mb-0">
                                            <a href="detail-1.html"
                                            >Get Ready To Up Your Creative Game</a
                                            >
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="trend-item box-shadow bg-white">
                                <div class="trend-image">
                                    <img src="{{ asset('asset') }}/images/Background.png" alt="image" />
                                </div>
                                <div class="trend-content-main">
                                    <div class="trend-content p-4">
                                        <h5 class="theme mb-1">Products</h5>
                                        <h4 class="mb-0">
                                            <a href="detail-1.html"
                                            >New: Freehand Templates, built for all</a
                                            >
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- featured-video ends -->

@endsection

