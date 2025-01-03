@extends('home._layouts._app')

@section('content')
    <section class="short-image no-padding agency margin-top-135">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-12">
                    {{-- <h5 class="subtitle-margin second-color">AlQodsi</h5> --}}
                    <h1 class="second-color">سياسة الخصوصية</h1>
                </div>
            </div>
            <div class="row">
                @foreach ($privacies as $privacy)
                    <div class="col-xs-12 col-lg-12">
                        {!! $privacy->content !!}
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
