@extends('home._layouts._app')
@section('header')
    header_menu-g
@endsection
@section('style')
    <style>
        .list-results .nice-select {
            width: 175px;
        }
    </style>
@endsection
@section('scripts')
    <script>
        document.querySelectorAll('s').forEach((tag) => {
            // Replace the <s> tag with its inner content
            const parent = tag.parentNode;
            while (tag.firstChild) {
                parent.insertBefore(tag.firstChild, tag);
            }
            parent.removeChild(tag); // Remove the empty <s> tag
        });
    </script>
@endsection
@section('content')
    <!-- blog starts -->
    <section class="blog">
        <div class="container">
            <div class="section-title mb-6 pb-1 w-75 text-center mx-auto">
                <h1 style="
                    color: #10887c;
                    line-height: 1.2;
                    margin-bottom: 1rem !important;
                    ">المدونة
                </h1>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="listing-inner">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="list-results d-flex align-items-center justify-content-between">
                                    <div class="list-results-sort">
                                        {{-- <p class="m-0">Showing 1-5 of 80 results</p> --}}
                                    </div>
                                    <div class="click-menu d-flex align-items-center justify-content-between">
                                        <div class="sortby d-flex align-items-center justify-content-between ml-2">
                                             <form id="filterForm" method="GET" action="{{ route('blogs.category',$category->slug) }}">
                                        <select name="sort" class="niceSelect"
                                            onchange="document.getElementById('filterForm').submit();">
                                            <option value="">ترتيب حسب</option>
                                            <option value="oldest"
                                                {{ request('sort') == 'oldest' ? 'selected' : '' }}>الاقدم</option>
                                            <option value="latest"
                                                {{ request('sort') == 'latest' ? 'selected' : '' }}>الاحدث</option>
                                        </select>
                                    </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach ($blogs as $blog)
                                <div class="col-lg-6">
                                    <div class="trend-item box-shadow bg-white">
                                        <div class="trend-image">
                                            <img src="{{ asset($blog->image) }}" alt="{{ $blog->image_alt }}" />
                                        </div>
                                        <div class="trend-content-main p-4">
                                            <div class="trend-content">
                                                <h5 class="theme">{{ $blog->category->name }}</h5>
                                                <h4>
                                                    <a href="{{ route('blog', $blog->slug) }}">{{ $blog->title }}</a>
                                                </h4>
                                                <p class="mb-2">
                                                    {{-- {!! Str::limit($blog->introduction, 190, ' ...') !!} --}}

                                                </p>
                                                <div class="entry-meta d-flex align-items-center justify-content-between">
                                                    <div class="entry-author">
                                                        <img src="{{ asset($blog->author_image) }}" alt=""
                                                            class="rounded-circle me-1" />
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
                                {{ $blogs->appends(request()->query())->links() }}
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- sidebar starts -->
                <div class="col-lg-4">
                    <div class="sidebar-sticky">
                        <div class="list-sidebar">
                            <div class="sidebar-item mb-4">
                                <h4 class="">جميع الفئات</h4>
                                <ul class="sidebar-category">
                                     <li class="{{ $category ? '' : 'active' }}"><a href="{{ route('blogs') }}">الكل</a></li>
                                @foreach ($blogCategories as $blogCategory)
                                    <li class="{{ $category->id == $blogCategory->id ? 'active' : '' }}">
                                        <a href="{{ route('blogs.category', ['slug' => $blogCategory->slug]) }}">
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
@endsection
