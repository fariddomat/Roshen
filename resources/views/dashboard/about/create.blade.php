@extends('dashboard._layouts._app')

@section('scripts')
    <script type="text/javascript">
        var imageGalleryBrowseUrl = "{{ route('dashboard.imageGallery.browser') }}";
        var imageGalleryUploadUrl = "{{ route('dashboard.imageGallery.uploader') }}";
    </script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('dashboard/js/about.js') }}"></script>
@endsection

@section('content')
    <div class="col-lg-12">

        <div class="card">
            <div class="card-header">
                <h4>About</h4>
            </div>
            <div class="card-block">

                <form action="{{ route('dashboard.about.store') }}" method="post" enctype="multipart/form-data">
                    @csrf()
                    @include('dashboard._layouts._error')

                    <div class="form-group mb-3">
                        <label for="who" class="form-label">صورة من نحن؟</label>
                        <input type="file" name="who_are_we_image" class="form-control">    
                    </div>
                    <div class="form-group mb-3">
                       <img src="{{ asset('uploads/about/'.$about->who_are_we_image) }}" style="max-width: 150px" alt="">
                    </div>

                    <div class="form-group mb-3">
                        <label for="who" class="form-label">من نحن؟</label>
                        <textarea class="form-control" id="who_are_we" name="who_are_we" rows="5" dir="rtl">{{ old('who_are_we') ?? isset($about) ? $about->who_are_we : '' }}</textarea>
                    </div>

                    <hr>
                    <div class="form-group mb-3">
                        <label for="message" class="form-label">رسالتنا</label>
                        <textarea class="form-control" id="message" name="message" rows="5" dir="rtl">{{ old('message') ?? isset($about) ? $about->message : '' }}</textarea>
                    </div>

                    <hr>
                    <div class="form-group mb-3">
                        <label for="vision" class="form-label">رؤيتنا</label>
                        <textarea class="form-control" id="vision" name="vision" rows="5" dir="rtl">{{ old('vision') ?? isset($about) ? $about->vision : '' }}</textarea>
                    </div>

                    <hr>
                    <div class="form-group mb-3">
                        <label for="quality_safty" class="form-label">قيمنا</label>
                        <textarea class="form-control" id="values" name="values" rows="5" dir="rtl">{{ old('values') ?? isset($about) ? $about->values : '' }}</textarea>
                    </div>
                    <hr>
                    <div class="form-group mb-3">
                        <label for="quality_safty" class="form-label">أهدافنا</label>
                        <textarea class="form-control" id="goals" name="goals" rows="5" dir="rtl">{{ old('goals') ?? isset($about) ? $about->goals : '' }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Save </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
