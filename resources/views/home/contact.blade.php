@extends('home._layouts._app')
@section('style')
    <style>
        input,
        .form-submit-cont {
            border-radius: 15px;
        }

        textarea {
            border-radius: 15px 15px 0px 0px;
        }

        #form-submit {
                width: 100%;
                border-radius: 0px 0px 15px 15px;
            }
        @media only screen and (max-width:600px) {

            input,
            .form-submit-cont {
                max-width: 90%;
                border-radius: 15px;
            }

            textarea {
                max-width: 90%;
                border-radius: 15px 15px 0px 0px;
            }

            #form-submit {
                width: 100%;
                border-radius: 0px 0px 15px 15px;
            }
        }
    </style>
@endsection
@section('content')
    <section class="section-light section-both-shadow top-padding-45 margin-top-135">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6 margin-top-45">
                    <h1 class="negative-margin">للاستفسار عن خدماتنا بشكل كامل</h1>
                    <h2 class="negative-margin margin-top-30">تواصل معنا</h2>

                </div>
                <div class="col-xs-12 col-md-6 margin-top-45">
                    <form name="contact-from" id="contact-form" action="{{ route('contact') }}" method="post">
                        @csrf
                        @extends('admin._layouts._error')
                        <div id="form-result"></div>
                        <input name="name" id="name" type="text" class="input-short main-input required,all"
                            placeholder="الاسم بالكامل *"
                            style="  float: right;
                            margin-left: 15px;" required />
                        <input name="phone" id="phone" type="text" class="input-short pull-right main-input ,all"
                            placeholder="رقم الهاتف *" required />
                        <input name="email" id="mail" type="email" class="input-full main-input ,email"
                            placeholder="البريد الالكتروني" />
                        <textarea name="message" id="message" class="input-full contact-textarea main-input required,email"
                            placeholder="رسالتك *" required></textarea>
                        <div class="form-submit-cont">
                            <button type="submit" class="button-primary pull-right" id="form-submit">
                                <span>ارسال</span>
                                <div class="button-triangle"></div>
                                <div class="button-triangle2"></div>
                                <div class="button-icon"><i class="fa fa-paper-plane"></i></div>
                            </button>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </section>
@endsection
