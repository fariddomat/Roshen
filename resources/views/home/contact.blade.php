@extends('home._layouts._app')
@section('header')
    header_menu-g
@endsection
@section('style')
    <style>
        h3 {
            font-size: 2.5rem !important;
        }

        p {
            font-size: 1.5rem !important;
        }

        a {

            font-size: 1rem !important;
            font-weight: bold !important;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            font-size: 1.3rem !important;
        }
    </style>
@endsection
@section('content')
    <!-- contact starts -->
    <section class="contact-main pt-0 pb-10 bg-white">
        <div class="map">
            <div style="width: 100%">
                <div class="section-title mb-6 pb-1 w-75 text-center mx-auto">
                    <h1 style="
                        color: #10887c;
                        line-height: 1.2;
                        margin-bottom: 1rem !important;
                        ">تواصل معنا
                    </h1>
                </div>
                {!! setting('site_title') !!}
            </div>
        </div>
        <div class="container">
            <div class="contact-info-main bg-grey">
                <div class="row">
                    <div class="col-lg-10 col-offset-lg-1 mx-auto">
                        <div class="contact-info pt-10 pb-10 px-5">
                            <div class="contact-info-title text-center mb-4 px-5">
                                <h3 class="mb-1">معلومات التواصل معنا</h3>
                                <p class="mb-0"> نسعى لارضائكم دائماً من خلال قسم خدمات العملاء لدينا</p>
                            </div>
                            <div class="contact-info-content row mb-1">
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="info-item bg-lgrey px-4 py-5 border-all text-center">
                                        <div class="info-icon mb-2">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <div class="info-content">
                                            <p style="font-size: 18px" class="m-0"> <a
                                                    href="{{ setting('site_location') }}">جدة، المملكة العربية السعودية</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="info-item bg-lgrey px-4 py-5 border-all text-center">
                                        <div class="info-icon mb-2">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <div class="info-content">
                                            <p style="font-size: 18px" class="m-0"><a
                                                    href="tel:{{ setting('site_phone') }}">{{ setting('site_phone') }}</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 mb-4">
                                    <div class="info-item bg-lgrey px-4 py-5 border-all text-center">
                                        <div class="info-icon mb-2">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <div class="info-content ps-4">
                                            <p style="font-size: 18px" class="m-0"> <a
                                                    href="mailto:{{ setting('site_email') }}">{{ setting('site_email') }}</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="contact-form1" class="contact-form px-5">
                                <div class="contact-info-title text-center mb-4 px-5">
                                    <h3 class="mb-1">خدمة عملاء مميزة</h3>

                                </div>
                                <div id="contactform-error-msg"></div>

                                <form method="post" action="{{ route('contact') }}" name="contactform" id="contactform">
                                    @include('layouts._error')
                                    @csrf

                                    <div class="form-group mb-2">
                                        <input type="text" name="name" class="form-control" id="llastname"
                                            placeholder=" *الاسم " />
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="البريد الالكتروني" />
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="text" name="phone" class="form-control" id="phnumber"
                                            placeholder=" *رقم  الجوال" />

                                        <div class="form-group mb-2">
                                            <select class="form-control mt-2" id="dropdown" name="service_id">
                                                <option value="" disabled selected>اختر الخدمة</option>
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="textarea mb-2">
                                            <textarea name="message" placeholder=" *اكتب رسالتك نسعد بها"></textarea>
                                        </div>
                                        <div class="comment-btn text-center">
                                            <button type="submit"
                                                style="background-color: #6f42c1; color: white;  font-size: 1.5rem;"
                                                class="btn px-5" id="submit2">ارسال الرسالة</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact Ends -->
@endsection
