<footer class="large-cont">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <h1 class="second-color">النشرة البريدية<span class="special-color">.</span></h1>
                <div class="footer-title-separator"></div>
                <h4 class="footer-p" style="color: white">اشترك بالنشرة البريدية للحصول على آخر تحديثات المشاريع.</h4>
                <form action="{{ route('promoters') }}" method="post" class="form-inline footer-newsletter">
                    @csrf
                    <input type="email" name="email" class="form-control" id="exampleInputEmail2" placeholder="أدخل البريد الالكتروني" style="" required>
                    <button type="submit" name="go" aria-label="go" class="btn"><i class="fa fa-lg fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
    </div>
</footer>
<footer class="small-cont">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-4 small-cont">
                <img src="{{ asset('alqodsi.png') }}" style="max-height: 75px" alt="" class="img-responsive footer-logo" />
            </div>
            <div class="col-xs-12 col-md-4 footer-copyrights">
                <a href="{{ route('privacy') }}">سياسة الخصوصية</a>
            </div>
            <div class="col-xs-12 col-md-4 footer-copyrights">
                &copy; Copyright 2023 <a href="https://joudtech.sa/" target="blank">Joudtech</a>. All rights reserved.
            </div>
        </div>
    </div>
</footer>
