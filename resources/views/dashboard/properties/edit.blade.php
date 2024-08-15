@extends('dashboard._layouts._app')

@section('content')
    <section class="basic-inputs">
        <div class="row match-height">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('site.edit') @lang('site.propertie')</h4>
                    </div>
                    <div class="card-body" dir="rtl" style="text-align: right">
                        <div class="card-body col-lg-6">
                            <fieldset class="form-group">
                                <form action="{{ route('dashboard.properties.update', $propertie->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    @include('dashboard._layouts._error')
                                    <h5 class="mt-2">@lang('site.name')</h5>
                                    <input value="{{ old('name', $propertie->name) }}" name="name" type="text" class="form-control" id="basicInput">
                                    <h5 class="mt-2">@lang('site.description')</h5>
                                    <textarea name="description" class="form-control" id="basicTextarea" rows="3">{{ old('description', $propertie->description) }}</textarea>
                                    <h5 class="mt-2">@lang('site.image')</h5>
                                    <input name="img" type="file" class="form-control" id="basicInput">
                                    <img src="{{ $propertie->image_path }}"
                                    style=" margin-top: 10px; width: 250px; height: 170;" alt="">

                                    <button
                                        class="btn btn-icon btn-info mr-1 mt-2">@lang('site.edit') <i class="fa fa-edit"
                                            style="position: relative"></i></button>
                                </form>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Basic Inputs end -->
@endsection
