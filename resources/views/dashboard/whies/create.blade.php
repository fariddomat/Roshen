@extends('dashboard._layouts._app')
@section('scripts')
    <script src="{{ asset('dashboard/js/image_preview.js') }}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('site.add') </h4>
                </div>
                <div class="card-block" dir="rtl" style="text-align: right">
                    <div class="col-lg-6">
                        <fieldset class="form-group">
                            <form action="{{ route('dashboard.whies.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('POST')

                                @include('dashboard._layouts._error')
                                <h5 class="mt-2">@lang('site.name')</h5>
                                <input value="{{ old('name') }}" name="name" type="text" class="form-control"
                                    id="basicInput" required>
                                <h5 class="mt-2">icon</h5>
                                <input value="{{ old('icon') }}" name="icon" type="text" class="form-control"
                                    id="basicInput" required>
                                <h5 class="mt-2">القيمة</h5>
                                <input value="{{ old('value') }}" name="value" type="text" class="form-control"
                                    id="basicInput" required>

                                <button class="btn btn-icon btn-info mr-1 mt-2">@lang('site.create') <i class="fa fa-save"
                                        style="position: relative"></i></button>
                            </form>
                        </fieldset>
                    </div>
                    <div class="col-lg-6">

                        <div class="form-group">
                            <img src="" style="width: 300px; display: none;" class="img-thumbnail image-preview"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Basic Inputs end -->
@endsection