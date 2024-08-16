@extends('home._layouts._app')

@section('style')
<style>
    .overlay{
      opacity: 0.2 !important;
    }
.discount-action {
width: 100%;}
  </style>
@endsection
@section('nav')
headerstye-1
@endsection
@section('scripts')

@endsection

@section('content')
    <!-- banner starts -->
    <section style="direction: ltr" class="banner overflow-hidden">
        <div class="slider">
          <div class="swiper-container">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="slide-inner">
                  <div
                    class="slide-image"
                    style="background-image: url({{ asset('asset') }}/images/slide1.jpeg)"
                  ></div>
                  <div class="swiper-content">
                    <div class="entry-meta mb-0">
                      <span class="entry-category">
                        <a class="text-white"> Real Estate Agency</a>
                      </span>
                    </div>
                    <h1 class="mb-1">
                      <a class="text-white"
                        >Search Properties for Sale and To Rent</a
                      >
                    </h1>
                    <p class="white mb-4">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                      do eiusmod tempor incididunt ut labore et dolore magna
                      aliqua
                    </p>
                  </div>
                  <div class="overlay"></div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="slide-inner">
                  <div
                    class="slide-image"
                    style="background-image: url({{ asset('asset') }}/images/slide2.jpeg)"
                  ></div>
                  <div class="swiper-content">
                    <div class="entry-meta mb-0">
                      <span class="entry-category">
                        <a class="text-white"> Real Estate Agency</a>
                      </span>
                    </div>
                    <h1 class="mb-1">
                      <a class="text-white"
                        >Search Properties for Sale and To Rent</a
                      >
                    </h1>
                    <p class="white mb-4">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                      do eiusmod tempor incididunt ut labore et dolore magna
                      aliqua
                    </p>
                  </div>
                  <div class="overlay"></div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="slide-inner">
                  <div
                    class="slide-image"
                    style="background-image: url({{ asset('asset') }}/images/slide3.jpeg)"
                  ></div>
                  <div class="swiper-content">
                    <div class="entry-meta mb-0">
                      <span class="entry-category">
                        <a class="text-white"> Real Estate Agency</a>
                      </span>
                    </div>
                    <h1 class="mb-1">
                      <a class="text-white"
                        >Search Properties for Sale and To Rent</a
                      >
                    </h1>
                    <p class="white mb-4">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                      do eiusmod tempor incididunt ut labore et dolore magna
                      aliqua
                    </p>
                  </div>
                  <div class="overlay"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </section>
      <!-- banner ends -->

      <!-- about-us starts -->
      <section class="about-us pt-5 pb-6">
        <div class="container">
          <div class="about-image-box">
            <div class="row d-flex align-items-center justify-content-between">
              <div class="col-lg-7 col-sm-12 mb-4">
                <div class="about-content text-lg-end">
                  <h4 class="theme fs-3 d-inline-block">من نحن</h4>
                  <p class="border-b mb-2 pb-2">
                    إحدى الشركات الرائدة في مجال التطوير العقاري في المملكة
                    العربية السعودية .<br />
                    تأسست الشركة في عام 2003م نفذنا العديد من المشاريع العقارية
                    المتميزة منها:<br />
                    نفذنا 641 وحدة سكنية.<br />
                    قمنا ببيع أكثر من 756 وحدة سكنية .<br />
                    نتولى تسويق أكثر من821 وحدة سكنية حالياً.<br />
                    نتولى إدارة أملاك 384 وحدة سكنية.<br />
                    نتولى إدارة أملاك 46 وحدات تجارية (محلات ).<br />
                    لدينا مشاريع تحت الدراسة لتنفيذ 558 وحدة سكنية.
                  </p>
                </div>
              </div>
              <div class="col-lg-5 col-sm-12 mb-4">
                <div class="about-image p-3 box-shadow position-relative">
                  <img src="{{ asset('asset') }}/images/Background.png" alt="" class="w-100" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- about-us ends -->
      <!-- Our Services -->
      <section class="about-us bg-white pb-6 pt-0">
        <div class="container">
          <div class="section-title mb-6 pb-1 w-75 text-center mx-auto">
            <h2 class="m-0">خدماتنا</h2>
          </div>
          <!-- why us starts -->
          <div class="why-us">
            <div class="why-us-box">
              <div class="row">
                <div class="col-lg-4 rounded-2 col-md-6 mb-4">
                  <div
                    style="border-radius: 8px"
                    class="why-us-item text-center bg-lgrey"
                  >
                    <div class="why-us-icon">
                      <i class="flaticon-building theme"></i>
                    </div>
                    <div class="why-us-content">
                      <h3>
                        <a href="service.html">التطوير العقاري</a>
                      </h3>
                      <p class="mb-0">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 rounded-2 col-md-6 mb-4">
                  <div
                    style="border-radius: 8px"
                    class="why-us-item text-center bg-lgrey"
                  >
                    <div class="why-us-icon">
                      <i class="flaticon-global theme"></i>
                    </div>
                    <div class="why-us-content">
                      <h3>
                        <a href="service.html">التسويق العقـاري</a>
                      </h3>
                      <p class="mb-0">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 rounded-2 col-md-6 mb-4">
                  <div
                    style="border-radius: 8px"
                    class="why-us-item text-center bg-lgrey"
                  >
                    <div
                      class="why-us-icon d-flex justify-content-center align-items-center"
                      style="height: 89px"
                    >
                      <i class="fa-solid fa-building-circle-check theme"></i>
                    </div>
                    <div class="why-us-content">
                      <h3><a href="service.html">إدارة الأمــلاك</a></h3>
                      <p class="mb-0">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 rounded-2 col-md-6 mb-4">
                  <div
                    style="border-radius: 8px"
                    class="why-us-item text-center bg-lgrey"
                  >
                    <div
                      class="why-us-icon d-flex justify-content-center align-items-center"
                      style="height: 89px"
                    >
                      <i class="fa-solid fa-head-side-virus theme"></i>
                    </div>
                    <div class="why-us-content">
                      <h3>
                        <a href="service.html">الحلـول التمويليــة</a>
                      </h3>
                      <p class="mb-0">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 rounded-2 col-md-6 mb-4">
                  <div
                    style="border-radius: 8px"
                    class="why-us-item text-center bg-lgrey"
                  >
                    <div
                      class="why-us-icon d-flex justify-content-center align-items-center"
                      style="height: 89px"
                    >
                      <i class="fa-solid fa-money-bill-trend-up theme"></i>
                    </div>
                    <div class="why-us-content">
                      <h3><a href="service.html">الاستثمــار</a></h3>
                      <p class="mb-0">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 rounded-2 col-md-6 mb-4">
                  <div
                    style="border-radius: 8px"
                    class="why-us-item text-center bg-lgrey"
                  >
                    <div
                      class="why-us-icon d-flex justify-content-center align-items-center"
                      style="height: 89px"
                    >
                      <i class="fa-solid fa-dollar-sign theme"></i>
                    </div>
                    <div class="why-us-content">
                      <h3>
                        <a href="service.html">الاستشارات الفنية و المالية</a>
                      </h3>
                      <p class="mb-0">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- why us ends -->
        </div>
      </section>
      <!-- Our Services -->

      <!-- Counter -->
      <section style="border-radius: 8px" class="counter-main pb-0 pt-0">
        <div class="container text-center">
          <div class="section-title mb-6 pb-1 w-75 text-center mx-auto">
            <h2 class="m-0">ارقامنا تتحدث</h2>
          </div>
          <div class="counter text-center bg-lgrey p-5 pb-1 border">
            <div class="row d-flex align-items-center justify-content-center">
              <div
                class="col-lg-3 d-flex align-items-center justify-content-center col-md-6 col-sm-6 mb-4"
              >
                <div
                  class="counter-item d-flex align-items-center text-start border-end px-4"
                >
                  <div
                    class="counter-content d-flex flex-column align-items-center gap-2"
                  >
                    <i
                      class="fa-solid fa-users theme"
                      style="font-size: 40px"
                    ></i>
                    <h3 class="value mb-0 text-center">560</h3>
                    <span class="m-0 text-center">العملاء الراضيين</span>
                  </div>
                </div>
              </div>

              <div
                class="col-lg-3 d-flex align-items-center justify-content-center col-md-6 col-sm-6 mb-4"
              >
                <div
                  class="counter-item d-flex align-items-center text-start border-end px-4"
                >
                  <div
                    class="counter-content d-flex flex-column align-items-center gap-2"
                  >
                    <i
                      class="fa-solid fa-building theme"
                      style="font-size: 40px"
                    ></i>
                    <h3 class="value mb-0 text-center">530</h3>
                    <span class="m-0 text-center"> شقق تمليك</span>
                  </div>
                </div>
              </div>

              <div
                class="col-lg-3 d-flex align-items-center justify-content-center col-md-6 col-sm-6 mb-4"
              >
                <div
                  class="counter-item d-flex align-items-center text-start border-end px-4"
                >
                  <div
                    class="counter-content d-flex flex-column align-items-center gap-2"
                  >
                    <i
                      class="fa-solid fa-trowel-bricks theme"
                      style="font-size: 40px"
                    ></i>
                    <h3 class="value mb-0 text-center">624</h3>
                    <span class="m-0 text-center">مشاريع تحت الانشاء</span>
                  </div>
                </div>
              </div>

              <div
                class="col-lg-3 d-flex align-items-center justify-content-center col-md-6 col-sm-6 mb-4"
              >
                <div
                  class="counter-item d-flex align-items-center text-start px-4"
                >
                  <div
                    class="counter-content d-flex flex-column align-items-center gap-2"
                  >
                    <i
                      class="fa-regular fa-calendar-plus theme"
                      style="font-size: 40px"
                    ></i>
                    <h3 class="value mb-0 text-center">20</h3>
                    <span class="m-0 w- text-center">سنين الخبرة</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Counter -->

      <!-- Trending Starts -->
      <section class="trending">
        <div class="container">
          <div class="section-title mb-6 pb-1 w-75 mx-auto text-center">
            <h2 class="m-0">مشاريعنا</h2>
          </div>
          <div class="trend-box  p-3 pb-5 box-shadow" style="direction: ltr">
            <div class="row item-slider">
              <div class="col-lg-4 col-md-6 col-sm-6 mb-4  p-3 box-shadow" style="direction: rtl">
                <div
                  style="border-radius: 8px"
                  class="trend-item box-shadow rounded"
                >
                  <div class="trend-image">
                    <img src="{{ asset('asset') }}/images/Background.png" alt="image" />
                    <a href="#" class="flash bg-theme1 white px-3 py-2"
                      ><i class="fa fa-flash"></i
                    ></a>
                    <div
                      class="trend-meta d-flex align-items-center justify-content-between"
                    >
                      <div class="entry-author">
                        <img
                          src="{{ asset('asset') }}/images/Background.png"
                          alt=""
                          class="rounded-circle me-1"
                        />
                        <span>درب الحرمين </span>
                      </div>
                      <a
                        href="g{{ route('projects') }}"
                        class="tags bg-theme2 white px-3 py-1"
                        >للبيع</a
                      >
                    </div>
                  </div>
                  <div class="trend-content p-4">
                    <h3 class="theme">درب الحرمين</h3>
                    <h4>
                      <a href="g{{ route('projects') }}">300 وحدة سكنية </a>
                    </h4>
                    <div
                      class="entry-meta d-flex align-items-center justify-content-between border-b pb-1 mb-2"
                    >
                      <div class="entry-author">
                        <p>
                          السعر يبدا من<span class="d-block theme fw-bold"
                            >$63,000.00</span
                          >
                        </p>
                      </div>
                    </div>
                    <p class="mb-0">
                      Duis aute irure dolor in reprehenderit in voluptate velit
                      esse cillum
                    </p>
                  </div>
                  <ul
                    class="d-flex align-items-center justify-content-between bg-grey p-3 px-4"
                  >
                    <li class="me-2">عدد الغرف</li>
                    <li class="me-2">الدور</li>
                    <li class="me-2">الحي</li>
                    <li>المساحة</li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6 mb-4  p-3 box-shadow" style="direction: rtl">
                <div
                  style="border-radius: 8px"
                  class="trend-item box-shadow rounded"
                >
                  <div class="trend-image">
                    <img src="{{ asset('asset') }}/images/Background.png" alt="image" />
                    <a href="#" class="flash bg-theme1 white px-3 py-2"
                      ><i class="fa fa-flash"></i
                    ></a>
                    <div
                      class="trend-meta d-flex align-items-center justify-content-between"
                    >
                      <div class="entry-author">
                        <img
                          src="{{ asset('asset') }}/images/Background.png"
                          alt=""
                          class="rounded-circle me-1"
                        />
                        <span>درب الحرمين </span>
                      </div>
                      <a
                        href="g{{ route('projects') }}"
                        class="tags bg-theme2 white px-3 py-1"
                        >للبيع</a
                      >
                    </div>
                  </div>
                  <div class="trend-content p-4">
                    <h3 class="theme">درب الحرمين</h3>
                    <h4>
                      <a href="g{{ route('projects') }}">300 وحدة سكنية </a>
                    </h4>
                    <div
                      class="entry-meta d-flex align-items-center justify-content-between border-b pb-1 mb-2"
                    >
                      <div class="entry-author">
                        <p>
                          السعر يبدا من<span class="d-block theme fw-bold"
                            >$63,000.00</span
                          >
                        </p>
                      </div>
                    </div>
                    <p class="mb-0">
                      Duis aute irure dolor in reprehenderit in voluptate velit
                      esse cillum
                    </p>
                  </div>
                  <ul
                    class="d-flex align-items-center justify-content-between bg-grey p-3 px-4"
                  >
                    <li class="me-2">عدد الغرف</li>
                    <li class="me-2">الدور</li>
                    <li class="me-2">الحي</li>
                    <li>المساحة</li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6 mb-4  p-3 box-shadow" style="direction: rtl">
                <div
                  style="border-radius: 8px"
                  class="trend-item box-shadow rounded"
                >
                  <div class="trend-image">
                    <img src="{{ asset('asset') }}/images/Background.png" alt="image" />
                    <a href="#" class="flash bg-theme1 white px-3 py-2"
                      ><i class="fa fa-flash"></i
                    ></a>
                    <div
                      class="trend-meta d-flex align-items-center justify-content-between"
                    >
                      <div class="entry-author">
                        <img
                          src="{{ asset('asset') }}/images/Background.png"
                          alt=""
                          class="rounded-circle me-1"
                        />
                        <span>درب الحرمين </span>
                      </div>
                      <a
                        href="g{{ route('projects') }}"
                        class="tags bg-theme2 white px-3 py-1"
                        >للبيع</a
                      >
                    </div>
                  </div>
                  <div class="trend-content p-4">
                    <h3 class="theme">درب الحرمين</h3>
                    <h4>
                      <a href="g{{ route('projects') }}">300 وحدة سكنية </a>
                    </h4>
                    <div
                      class="entry-meta d-flex align-items-center justify-content-between border-b pb-1 mb-2"
                    >
                      <div class="entry-author">
                        <p>
                          السعر يبدا من<span class="d-block theme fw-bold"
                            >$63,000.00</span
                          >
                        </p>
                      </div>
                    </div>
                    <p class="mb-0">
                      Duis aute irure dolor in reprehenderit in voluptate velit
                      esse cillum
                    </p>
                  </div>
                  <ul
                    class="d-flex align-items-center justify-content-between bg-grey p-3 px-4"
                  >
                    <li class="me-2">عدد الغرف</li>
                    <li class="me-2">الدور</li>
                    <li class="me-2">الحي</li>
                    <li>المساحة</li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6 mb-4  p-3 box-shadow" style="direction: rtl">
                <div
                  style="border-radius: 8px"
                  class="trend-item box-shadow rounded"
                >
                  <div class="trend-image">
                    <img src="{{ asset('asset') }}/images/Background.png" alt="image" />
                    <a href="#" class="flash bg-theme1 white px-3 py-2"
                      ><i class="fa fa-flash"></i
                    ></a>
                    <div
                      class="trend-meta d-flex align-items-center justify-content-between"
                    >
                      <div class="entry-author">
                        <img
                          src="{{ asset('asset') }}/images/Background.png"
                          alt=""
                          class="rounded-circle me-1"
                        />
                        <span>درب الحرمين </span>
                      </div>
                      <a
                        href="g{{ route('projects') }}"
                        class="tags bg-theme2 white px-3 py-1"
                        >للبيع</a
                      >
                    </div>
                  </div>
                  <div class="trend-content p-4">
                    <h3 class="theme">درب الحرمين</h3>
                    <h4>
                      <a href="g{{ route('projects') }}">300 وحدة سكنية </a>
                    </h4>
                    <div
                      class="entry-meta d-flex align-items-center justify-content-between border-b pb-1 mb-2"
                    >
                      <div class="entry-author">
                        <p>
                          السعر يبدا من<span class="d-block theme fw-bold"
                            >$63,000.00</span
                          >
                        </p>
                      </div>
                    </div>
                    <p class="mb-0">
                      Duis aute irure dolor in reprehenderit in voluptate velit
                      esse cillum
                    </p>
                  </div>
                  <ul
                    class="d-flex align-items-center justify-content-between bg-grey p-3 px-4"
                  >
                    <li class="me-2">عدد الغرف</li>
                    <li class="me-2">الدور</li>
                    <li class="me-2">الحي</li>
                    <li>المساحة</li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6 mb-4  p-3 box-shadow" style="direction: rtl">
                <div
                  style="border-radius: 8px"
                  class="trend-item box-shadow rounded"
                >
                  <div class="trend-image">
                    <img src="{{ asset('asset') }}/images/Background.png" alt="image" />
                    <a href="#" class="flash bg-theme1 white px-3 py-2"
                      ><i class="fa fa-flash"></i
                    ></a>
                    <div
                      class="trend-meta d-flex align-items-center justify-content-between"
                    >
                      <div class="entry-author">
                        <img
                          src="{{ asset('asset') }}/images/Background.png"
                          alt=""
                          class="rounded-circle me-1"
                        />
                        <span>درب الحرمين </span>
                      </div>
                      <a
                        href="g{{ route('projects') }}"
                        class="tags bg-theme2 white px-3 py-1"
                        >للبيع</a
                      >
                    </div>
                  </div>
                  <div class="trend-content p-4">
                    <h3 class="theme">درب الحرمين</h3>
                    <h4>
                      <a href="g{{ route('projects') }}">300 وحدة سكنية </a>
                    </h4>
                    <div
                      class="entry-meta d-flex align-items-center justify-content-between border-b pb-1 mb-2"
                    >
                      <div class="entry-author">
                        <p>
                          السعر يبدا من<span class="d-block theme fw-bold"
                            >$63,000.00</span
                          >
                        </p>
                      </div>
                    </div>
                    <p class="mb-0">
                      Duis aute irure dolor in reprehenderit in voluptate velit
                      esse cillum
                    </p>
                  </div>
                  <ul
                    class="d-flex align-items-center justify-content-between bg-grey p-3 px-4"
                  >
                    <li class="me-2">عدد الغرف</li>
                    <li class="me-2">الدور</li>
                    <li class="me-2">الحي</li>
                    <li>المساحة</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="trend-btn text-center">
              <a
                style="border-radius: 8px"
                href="g{{ route('projects') }}"
                class="btn-btn"
              >
                عرض جميع المشاريع
              </a>
            </div>
          </div>
        </div>
      </section>
      <!-- Trending Ends -->

      <!-- Our Company -->
      <section class="discount-action pt-0">
        <div class="container">
          <div class="section-title my-6 pb-1 w-75 mx-auto text-center">
            <h2 class="m-0">شركاء النجاح</h2>
          </div>
          <div style="direction: ltr" class="partner-wrapper bg-lgrey p-4">
            <ul class="attract-slider">
              <li class="px-3">
                <a href="#"><img src="{{ asset('asset') }}/images/partner/Untitled design.zip - 1.png" alt="" /></a>
              </li>
              <li class="px-3">
                <a href="#"><img src="{{ asset('asset') }}/images/partner/Untitled design.zip - 2.png" alt="" /></a>
              </li>
              <li class="px-3">
                <a href="#"><img src="{{ asset('asset') }}/images/partner/Untitled design.zip - 3.png" alt="" /></a>
              </li>
              <li class="px-3">
                <a href="#"><img src="{{ asset('asset') }}/images/partner/Untitled design.zip - 4.png" alt="" /></a>
              </li>
              <li class="px-3">
                <a href="#"><img src="{{ asset('asset') }}/images/partner/Untitled design.zip - 5.png" alt="" /></a>
              </li>
              <li class="px-3">
                <a href="#"><img src="{{ asset('asset') }}/images/partner/Untitled design.zip - 6.png" alt="" /></a>
              </li>
              <li class="px-3">
                <a href="#"><img src="{{ asset('asset') }}/images/partner/Untitled design.zip - 7.png" alt="" /></a>
              </li>
              <li class="px-3">
                <a href="#"><img src="{{ asset('asset') }}/images/partner/Untitled design.zip - 8.png" alt="" /></a>
              </li>
              <li class="px-3">
                <a href="#"><img src="{{ asset('asset') }}/images/partner/Untitled design.zip - 9.png" alt="" /></a>
              </li>
              <li class="px-3">
                <a href="#"><img src="{{ asset('asset') }}/images/partner/Untitled design.zip - 10.png" alt="" /></a>
              </li>
              <li class="px-3">
                <a href="#"><img src="{{ asset('asset') }}/images/partner/Untitled design.zip - 11.png" alt="" /></a>
              </li>
              <li class="px-3">
                <a href="#"><img src="{{ asset('asset') }}/images/partner/Untitled design.zip - 12.png" alt="" /></a>
              </li>
              <li class="px-3">
                <a href="#"><img src="{{ asset('asset') }}/images/partner/Untitled design.zip - 13.png" alt="" /></a>
              </li>
              <li class="px-3">
                <a href="#"><img src="{{ asset('asset') }}/images/partner/Untitled design.zip - 14.png" alt="" /></a>
              </li>
              <li class="px-3">
                <a href="#"><img src="{{ asset('asset') }}/images/partner/Untitled design.zip - 15.png" alt="" /></a>
              </li>
              <li class="px-3">
                <a href="#"><img src="{{ asset('asset') }}/images/partner/Untitled design.zip - 16.png" alt="" /></a>
              </li>
              <li class="px-3">
                <a href="#"><img src="{{ asset('asset') }}/images/partner/Untitled design.zip - 17.png" alt="" /></a>
              </li>

            </ul>
          </div>
          <div class="text-center mt-3">
            <a style="border-radius: 8px" href="{{ route('about') }}" class="btn-btn">
              عرض المزيد
            </a>
          </div>
        </div>
      </section>
      <!-- Our Company -->

      <!-- about-us starts -->
      <section class="about-us bg-white pb-6 pt-0">
        <div class="container">
          <div class="row align-items-center my-6 text-center text-lg-end">
            <div class="col-lg-8">
              <div class="pb-1">
                <h2 class="mb-2">لماذا تختار روشم ؟</h2>
              </div>
            </div>
            <div class="col-lg-4">
              <a
                style="border-radius: 8px"
                href="{{ route('services') }}"
                class="btn-btn float-lg-end float-none"
                >عرض جميع المشاريع</a
              >
            </div>
          </div>
          <!-- why us starts -->
          <div class="why-us">
            <div class="why-us-box bg-lgrey">
              <div class="row p-5 rosem_bg">
                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                  <div
                    style="border-radius: 8px"
                    class="why-us-item text-center bg-lgrey"
                  >
                    <div class="why-us-icon">
                      <i class="flaticon-call theme"></i>
                    </div>
                    <div class="why-us-content">
                      <h4><a href="{{ route('about') }}">خدمات متكاملة</a></h4>
                      <p class="mb-0">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                  <div
                    style="border-radius: 8px"
                    class="why-us-item text-center bg-lgrey"
                  >
                    <div class="why-us-icon">
                      <i class="flaticon-global theme"></i>
                    </div>
                    <div class="why-us-content">
                      <h4><a href="{{ route('about') }}">جودة المنتج</a></h4>
                      <p class="mb-0">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                  <div
                    style="border-radius: 8px"
                    class="why-us-item text-center bg-lgrey"
                  >
                    <div class="why-us-icon">
                      <i class="flaticon-building theme"></i>
                    </div>
                    <div class="why-us-content">
                      <h4><a href="{{ route('about') }}"> تشطبيات فاخرة</a></h4>
                      <p class="mb-0">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt.
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                  <div
                    style="border-radius: 8px"
                    class="why-us-item text-center bg-lgrey"
                  >
                    <div class="why-us-icon">
                      <i class="flaticon-location-pin theme"></i>
                    </div>
                    <div class="why-us-content">
                      <h4><a href="{{ route('about') }}">المواقع الاستراتجية</a></h4>
                      <p class="mb-0">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- why us ends -->
        </div>
      </section>
      <!-- about-us ends -->
      <!-- testomonial start -->
      <section class="testimonial pb-5 pt-9">
        <div class="container">
          <div class="section-title mb-4 pb-1 w-75 mx-auto text-center">
            <h2 class="m-0">اراء العملاء</h2>
          </div>
          <div class="row review-slider bg-lgrey" style="direction: ltr">
            <div style="border-radius: 8px" class="col-sm-4 item">
              <div class="testimonial-item1 text-center">
                <div class="details">
                  <p class="m-0">
                    Lorem Ipsum is simply dummy text of the printing andypesetting
                    industry. Lorem ipsum a simple Lorem Ipsum has been the
                    industry's standard dummy hic et quidem. Dignissimos maxime
                    velit unde inventore quasi vero dolorem.
                  </p>
                </div>
                <div class="author-info mt-2">
                  <a href="#">
                    <img
                      style="
                        width: 100px;
                        height: 100px;
                        border-radius: 100%;
                        margin: auto;
                      "
                      src="{{ asset('asset') }}/images/Background.png"
                      alt=""
                    />
                  </a>
                  <div class="author-title">
                    <h4 class="m-0 theme2">عبدالله الزيات</h4>
                    <span>صاحب شركة النايف</span>
                  </div>
                </div>
                <i class="fa fa-quote-left mb-2"></i>
              </div>
            </div>
            <div style="border-radius: 8px" class="col-sm-4 item">
              <div class="testimonial-item1 text-center">
                <div class="details">
                  <p class="m-0">
                    Lorem Ipsum is simply dummy text of the printing andypesetting
                    industry. Lorem ipsum a simple Lorem Ipsum has been the
                    industry's standard dummy hic et quidem. Dignissimos maxime
                    velit unde inventore quasi vero dolorem.
                  </p>
                </div>
                <div class="author-info mt-2">
                  <a href="#"><img src="{{ asset('asset') }}/images/Background.png" alt="" /></a>
                  <div class="author-title">
                    <h4 class="m-0 theme2">عبدالله الزيات</h4>
                    <span>صاحب شركة نون</span>
                  </div>
                </div>
                <i class="fa fa-quote-left mb-2"></i>
              </div>
            </div>
            <div style="border-radius: 8px" class="col-sm-4 item">
              <div class="testimonial-item1 text-center">
                <div class="details">
                  <p class="m-0">
                    Lorem Ipsum is simply dummy text of the printing andypesetting
                    industry. Lorem ipsum a simple Lorem Ipsum has been the
                    industry's standard dummy hic et quidem. Dignissimos maxime
                    velit unde inventore quasi vero dolorem.
                  </p>
                </div>
                <div class="author-info mt-2">
                  <a href="#"><img src="{{ asset('asset') }}/images/Background.png" alt="" /></a>
                  <div class="author-title">
                    <h4 class="m-0 theme2">عبدالله الزيات</h4>
                    <span>صاحب شركة نون</span>
                  </div>
                </div>
                <i class="fa fa-quote-left mb-2"></i>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- testomonial-->

      <!--certificate-->
      <div class="certificate pt-2 my-4">
        <div class="container">
          <div class="section-title mt-3 mb-3 pb-1 w-75 mx-auto text-center">
            <h2 class="mt-3">الشهادات</h2>
          </div>
          <div class="row bg-lgrey py-3 px-2">
            <div
              class="col-lg-3 d-flex align-items-center justify-content-center"
            >
              <img
                style="width: 100%; max-height: 220px; max-width: 100%"
                src="{{ asset('asset') }}/images/11.svg"
                alt=""
              />
            </div>
            <div
              class="col-lg-3 d-flex align-items-center justify-content-center"
            >
              <img
                style="width: 100%; max-height: 220px; max-width: 100%"
                src="{{ asset('asset') }}/images/partner/Untitled design.zip - 21.png"
                alt=""
              />
            </div>
            <div
              class="col-lg-3 d-flex align-items-center justify-content-center"
            >
              <img
                style="width: 100%; max-height: 220px; max-width: 100%"
                src="{{ asset('asset') }}/images/33.svg"
                alt=""
              />
            </div>
            <div
              class="col-lg-3 d-flex align-items-center justify-content-center"
            >
              <img
                style="width: 100%; max-height: 220px; max-width: 100%"
                src="{{ asset('asset') }}/images/44.png"
                alt=""
              />
            </div>
          </div>
        </div>
      </div>
      <!--certificate-->
      <!-- Damns -->
      <section class="counter-main pb-0 pt-0">
        <div class="container text-center">
          <div class="section-title mb-4 pb-1 w-75 mx-auto text-center">
            <h2 class="m-0">الضمانات</h2>
          </div>
          <div class="counter text-center bg-lgrey p-5 pb-1 border">
            <div class="row">
              <div
                class="col-lg-3 d-flex align-items-center justify-content-center text-center col-md-6 col-sm-6 mb-4"
              >
                <div
                  class="counter-item d-flex align-items-center text-start border-end px-4"
                >
                  <div class="counter-content">
                    <img
                      style="
                        width: 100px;
                        height: 100px;
                        margin: 10px auto;
                        display: block;
                      "
                      src="{{ asset('asset') }}/images/lightning.png"
                      alt=""
                    />
                    <h2 style="color: #605098" class="value mb-0 text-center">
                      25
                    </h2>
                    <span style="color: #605098; font-size: 18px" class="m-0">
                      سنة على القواطع والافياش
                    </span>
                  </div>
                </div>
              </div>

              <div
                class="col-lg-3 text-center d-flex align-items-center justify-content-center col-md-6 col-sm-6 mb-4"
              >
                <div
                  class="counter-item d-flex align-items-center text-start border-end px-4"
                >
                  <div class="counter-content">
                    <img
                      style="
                        width: 100px;
                        height: 100px;
                        margin: 10px auto;
                        display: block;
                      "
                      src="{{ asset('asset') }}/images/skyline.png"
                      alt=""
                    />
                    <h2 style="color: #605098" class="value mb-0 text-center">
                      25
                    </h2>
                    <span style="color: #605098; font-size: 18px" class="m-0">
                      سنة على هياكل البناء
                    </span>
                  </div>
                </div>
              </div>

              <div
                class="col-lg-3 text-center d-flex align-items-center justify-content-center col-md-6 col-sm-6 mb-4"
              >
                <div
                  class="counter-item d-flex align-items-center text-start border-end px-4"
                >
                  <div class="counter-content">
                    <img
                      style="
                        width: 100px;
                        height: 100px;
                        margin: 10px auto;
                        display: block;
                      "
                      src="{{ asset('asset') }}/images/plumbing.png"
                      alt=""
                    />
                    <h2 style="color: #605098" class="value mb-0 text-center">
                      5
                    </h2>
                    <span style="color: #605098; font-size: 18px" class="m-0"
                      >سنوات على السباكة والكهرباء
                    </span>
                  </div>
                </div>
              </div>

              <div
                class="col-lg-3 text-center d-flex align-items-center justify-content-center col-md-6 col-sm-6 mb-4"
              >
                <div
                  class="counter-item d-flex align-items-center text-start px-4"
                >
                  <div class="counter-content">
                    <img
                      style="
                        width: 100px;
                        height: 100px;
                        margin: 10px auto;
                        display: block;
                      "
                      src="{{ asset('asset') }}/images/top.png"
                      alt=""
                    />
                    <h3 style="color: #605098" class="value mb-0 text-center">
                      1
                    </h3>
                    <span style="color: #605098; font-size: 18px" class="m-0"
                      >سنة مجاناً اتحاد الملاك</span
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Damn -->

@endsection
