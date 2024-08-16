@extends('home._layouts._app')

@section('style')


@endsection
@section('scripts')

@endsection
@section('content')

<div class="container">
    <div
      class="page-cover pb-3"
      style="
        background-image: url(images/Background.png) !important;
        background-position: center !important;
        background-size: cover !important;
        height: 400px;
        border-radius: 8px;
      "
    ></div>
  </div>
  <!-- about-us starts -->
  <section class="about-us pb-10">
    <div class="container">
      <div class="about-image-box">
        <div class="row">
          <div class="col-lg-8 col-sm-12 pe-4">
            <div class="about-content">
              <h2 class="mb-3">عنوان الخدمه</h2>
              <div class="about-image bordernone mb-3">
                <img src="{{ asset('asset') }}/images/Background.png" alt="" class="w-100" />
              </div>
              <p class="border-b mb-3 pb-3">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat
                <br /><br />Duis aute irure dolor in reprehenderit in
                voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa
                qui officia deserunt mollit anim id est laborum.
              </p>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                irure dolor in reprehenderit in voluptate velit esse cillum
                dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                cupidatat non proident, sunt in culpa qui officia deserunt
                mollit anim id est laborum. <br /><br />
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                irure dolor in reprehenderit in voluptate velit esse cillum
                dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                cupidatat non proident.
              </p>
              <a
                href="contactPage"
                class="btn-btn d-block m-auto"
                style="width: fit-content"
                >طلب الخدمه</a
              >
            </div>
          </div>
          <div class="col-lg-4 col-sm-12 ps-4">
            <div class="sidebar-sticky">
              <div class="list-sidebar">
                <div class="sidebar-item mb-4">
                  <h3 class="">خدمات أخرى</h3>
                  <ul class="sidebar-category">
                    <li><a href="#">Property Management</a></li>
                    <li><a href="#">Mortage Services</a></li>
                    <li><a href="#">Consulting</a></li>
                    <li class="active"><a href="#">Home Buying</a></li>
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

