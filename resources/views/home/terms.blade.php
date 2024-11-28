@extends('home._layouts._app')

@section('content')
    <section class="no-padding agency mt-2">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-12">
                    {{-- <h5 class="subtitle-margin second-color">AlQodsi</h5> --}}
                    <h1 class="second-color">الشروط والأحكام</h1>
                </div>
            </div>
            <div class="row">
                @foreach ($terms as $term)
                    <div class="col-xs-12 col-lg-12">
                        {!! $term->content !!}
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
