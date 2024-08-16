@extends('dashboard._layouts._app')
@section('scripts')
<script src="{{asset('dashboard/js/image_preview.js')}}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('site.edit') تصنيف</h4>
                </div>
                <div class="card-block" dir="rtl" style="text-align: right">
                    <div class="col-lg-6">
                        <fieldset class="form-group">
                            <form action="{{ route('dashboard.blogcategories.update', $blogcategory->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                @include('dashboard._layouts._error')
                                <h5 class="mt-2">@lang('site.name')</h5>
                                <input value="{{ old('name', $blogcategory->name) }}" name="name" type="text"
                                    class="form-control" id="basicInput" required>


                                <button class="btn btn-icon btn-info mr-1 mt-2">@lang('site.edit') <i class="fa fa-edit"
                                        style="position: relative"></i></button>
                            </form>
                        </fieldset>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ $blogcategory->image_path }}" style=" margin-top: 10px; width: 250px; height: 170;"
                        alt="" class="img-thumbnail image-preview">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
