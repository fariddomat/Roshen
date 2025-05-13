@extends('home._layouts._app')

@section('header')
    header_menu-g
@endsection

@section('style')
<style>
    .btn-primary:focus {
        background-color: #10887c
    }
    /* Arrow rotation for expanded state */
    .arrow {
        transition: transform 0.3s ease;
    }

    [aria-expanded="true"] .arrow {
        transform: rotate(180deg);
    }
    /* Existing styles */
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

    /* Mobile-specific styles */
    @media (max-width: 767.98px) {
        .blog-left .row {
                display: flex;
                flex-direction: column;
            }

            .blog-left .col-lg-4 {
                order: 2; /* Move sidebar (content table and writer section) after the main content */
            }

            .blog-left .col-lg-8 {
                order: 1; /* Ensure main content comes first */
            }
        /* Move writer section to the end of the blog content */
        .author-news {
            margin-top: 2rem; /* Add some spacing */
        }

        /* Ensure content table is visible only in mobile */
        .content-table-mobile {
            display: block !important; /* Force display for mobile */
        }

        /* Hide content table in sidebar for mobile */
        .sidebar-item.d-none.d-lg-block {
            display: none !important;
        }
    }

    .team-slider {
    width: 100%; /* Ensure the container takes full width */
    overflow: hidden; /* Hide overflow */
}
.swiper-slide {
    width: 33.33%; /* Adjust based on slidesPerView */
}

.blog-single p{
    text-align: justify !important;
}
</style>
@endsection

@section('scripts')

    <script>
        let ele = document.querySelector(".scroll");
        let height =
            document.documentElement.scrollHeight - document.documentElement.clientHeight;

        window.addEventListener("scroll", function() {
            let scroller = window.pageYOffset || document.documentElement.scrollTop;
            let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            ele.style.width = ((scroller / height) * 100) + "%";
        })
    </script>
    <script>
document.addEventListener('DOMContentLoaded', function () {
    const swiper = new Swiper('.team-slider', {
        slidesPerView: 3,
        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 3000,
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        },
        observer: true,
        observeParents: true,
    });
});
document.querySelectorAll('*').forEach(element => {
    if (window.getComputedStyle(element).fontFamily.includes('Arial')) {
        element.style.fontFamily = 'Cairo, sans-serif';
    }
});
    </script>

@endsection

@section('content')
    <div class="scroll"></div>

    <!-- blog starts -->
    <section class="blog blog-left pt-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-sticky">
                        <div class="list-sidebar">
                            <!-- Content Table for Desktop -->
                            <div class="sidebar-item mb-4 d-none d-lg-block">
                                <h4 class="">جدول المحتويات</h4>
                                <ul class="sidebar-category">
                                    @php
                                        // Remove HTML tags and convert to plain text
                                        $plainText = strip_tags($blog->content_table);

                                        // Replace &nbsp; with a regular space
                                        $plainText = str_replace('&nbsp;', ' ', $plainText);

                                        // Split the plain text by newlines
                                        $rows = preg_split('/\r\n|\r|\n/', $plainText);
                                    @endphp

                                    @if(!empty($rows))
                                        @foreach($rows as $row)
                                            @if(trim($row) !== '') {{-- Skip empty rows --}}
                                                <li><a href="#">{{ $row }}</a></li>
                                            @endif
                                        @endforeach
                                    @else
                                        <li>لا يوجد محتوى متاح</li>
                                    @endif
                                </ul>
                            </div>

                            <!-- Writer Section -->
                            <div class="author-news mb-4 box-shadow p-5 text-center">
                                <div class="author-news-content">
                                    <h3 class="title mb-1"><a href="#">كاتب المقال</a></h3>
                                    <div class="author-thumb mb-1">
                                        <img src="{{ asset($blog->author_image) }}" alt="author" />
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
                                    <h1 class="blog-title mb-0" style="font-size: 2.5rem">
                                        {{ $blog->title }}
                                    </h1>
                                </div>
                            </div>
                        </div>

                        <div class="blog-wrapper">
                            <div class="blog-content">
                                <div class="blog-imagelist mb-3">
                                    <img src="{{ asset($blog->index_image) }}" alt="{{ $blog->index_image_alt }}" />
                                </div>

                                <!-- Toggle Button for Content Table (Visible Only on Mobile) -->
                                <div class="mb-3 d-block d-lg-none">
                                    <button class="btn btn-primary w-100 d-flex justify-content-between align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#contentTableCollapse" aria-expanded="false" aria-controls="contentTableCollapse" style="background-color: #10887c">
                                        جدول المحتويات
                                        <span class="arrow">▼</span>
                                    </button>
                                </div>

                                <!-- Content Table (Collapsible) -->
                                <div id="contentTableCollapse" class="collapse">
                                    <h4 class="mb-3">جدول المحتويات</h4>
                                    <ul class="sidebar-category">
                                        @php
                                            // Remove HTML tags and convert to plain text
                                            $plainText = strip_tags($blog->content_table);

                                            // Replace &nbsp; with a regular space
                                            $plainText = str_replace('&nbsp;', ' ', $plainText);

                                            // Split the plain text by newlines
                                            $rows = preg_split('/\r\n|\r|\n/', $plainText);
                                        @endphp

                                        @if(!empty($rows))
                                            @foreach($rows as $row)
                                                @if(trim($row) !== '') {{-- Skip empty rows --}}
                                                    <li><a href="#">{{ $row }}</a></li>
                                                @endif
                                            @endforeach
                                        @else
                                            <li>لا يوجد محتوى متاح</li>
                                        @endif
                                    </ul>
                                </div>

                                <h3>المقدمه</h3>
                                <div class="mb-3 shadow-sm"
                                    style="
                                      border-right: 2px solid #10887c;
                                      padding: 10px;
                                      border-radius: 8px;
                                    ">
                                    {!! $blog->introduction !!}
                                </div>
                            </div>
                            <!-- blog blockquote -->
                            <div class="mb-3 shadow-sm"
                                style="
                                    border-right: 2px solid #10887c;
                                    padding: 1.5rem;
                                    border-radius: 8px;
                                  ">
                                {!! $blog->first_paragraph !!}
                            </div>
                            <div class="mb-3 shadow-sm"
                                style="
                                    border-right: 2px solid #10887c;
                                    padding: 10px;
                                    border-radius: 8px;
                                  ">
                                {!! $blog->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog Ends -->

    @if ($relatedBlogs->count() > 0)
        <!-- top deal starts -->
        <section class="top-post pt-0">
            <div class="container">
                <div class="section-title mb-6 pb-1 w-75 mx-auto text-center">
                    <h2 class="m-0">مقالات <span>ذات صلة</span></h2>
                </div>
                <div class="row team-slider swiper-wrapper" style="direction: ltr !important">
                    @foreach ($relatedBlogs as $blog)
                        <div class="col-lg-4 swiper-slide">
                            <div class="trend-item">
                                <div class="trend-image">
                                    <img src="{{ asset($blog->image) }}" alt="{{ $blog->image_alt }}" />
                                    <div class="trend-content p-4 bg-lgrey border-b">
                                        <h5 class="theme">{{ $blog->category->name }}</h5>
                                        <h4>
                                            <a href="{{ route('blog', $blog->slug) }}">{{ $blog->title }}</a>
                                        </h4>

                                        <div
                                            class="entry-meta d-flex align-items-center justify-content-between border-t pt-2">
                                            <div class="entry-author d-flex align-items-center">
                                                <img src="{{ asset($blog->author_image) }}" alt=""
                                                    class="rounded-circle me-1" />
                                                <span>{{ $blog->author_name }}</span>
                                            </div>
                                            <div class="entry-metalist">
                                                <small><a href="#" class="grey"><i class="fa fa-calendar"></i>
                                                        {{ $blog->created_at }}</a></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- top deal ends -->
    @endif
@endsection
