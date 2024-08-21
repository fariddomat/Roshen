@extends('dashboard._layouts._app')
@section('title', 'Update Blog')
@section('blogsActive', 'active')

@section('scripts')
    <script type="text/javascript">
        var imageGalleryBrowseUrl = "{{ route('dashboard.imageGallery.browser') }}";
        var imageGalleryUploadUrl = "{{ route('dashboard.imageGallery.uploader') }}";
    </script>
    <script src="{{ asset('dashboard/js/image_preview.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('dashboard/js/blog.js') }}"></script>
    <script>
        $(function() {
            $("#delete-index-img").on("click", function() {
                $("#index-img").attr("src", "");
                $(".del").hide();
                $(".logo").val(null);
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
                $.ajax({
                    url: "{{ route('dashboard.blogs.indexImage.destroy', $blog->id) }}",
                    type: "DELETE",
                    data: {
                        _token: CSRF_TOKEN
                    },
                    dataType: "JSON",
                    success: function(data) {
                        //done.
                    },
                });
            });
        });
    </script>
@endsection

@section('content')
    <div class="card">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="card-header">تعديل مقال</div>
        </div>
        <div>
            @include('partials._errors')
        </div>
        <div class="container">

            <div class="row justify-content-center">
                <div class="card-block">
                    <form action="{{ route('dashboard.blogs.update', $blog->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf()
                        {{ method_field('put') }}

                        <div class="form-group mb-3">
                            <label for="title" class="form-label">العنوان</label>
                            <input type="text" name="title" class="form-control"
                                value="{{ $blog->title }}" dir="rtl">
                        </div>
                        {{-- <div class="form-group mb-3">
                    <label for="title" class="form-label">Title in English</label>
                    <input type="text" name="title" class="form-control"
                        value="{{ $blog->title }}">
                </div> --}}

                        <div class="form-group mb-3">
                            <label for="slug" class="form-label">الرابط Link</label>
                            <input type="text" name="slug" class="form-control" value="{{ $blog->slug }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="introduction" class="form-label">تعريف - Introduction </label>
                            <textarea class="form-control" id="introduction" name="introduction" rows="5" dir="rtl">{{ $blog->introduction }}</textarea>
                        </div>

                        {{-- <div class="form-group mb-3">
                    <label for="introduction" class="form-label">Introduction in English</label>
                    <textarea class="form-control" id="introduction" name="introduction"
                        rows="5">{{ $blog->introduction }}</textarea>
                </div> --}}

                        <div class="form-group mb-3">
                            <label for="content_table" class="form-label">جدول المحتويات - Content table</label>
                            <textarea class="form-control" id="content_table" name="content_table" rows="5" dir="rtl">{{ $blog->content_table }}</textarea>
                        </div>

                        {{-- <div class="form-group mb-3">
                    <label for="content_table" class="form-label">Content table in English</label>
                    <textarea class="form-control" id="content_table" name="content_table"
                        rows="5">{{ $blog->content_table }}</textarea>
                </div> --}}

                        <div class="form-group mb-3">
                            <label for="first_paragraph" class="form-label">النص الأول - First paragraph</label>
                            <textarea class="form-control" id="first_paragraph" name="first_paragraph" rows="5" dir="rtl">{{ $blog->first_paragraph }}</textarea>
                        </div>

                        {{-- <div class="form-group mb-3">
                    <label for="first_paragraph" class="form-label">First paragraph in English</label>
                    <textarea class="form-control" id="first_paragraph" name="first_paragraph"
                        rows="5">{{ $blog->first_paragraph }}</textarea>
                </div> --}}

                        <div class="form-group mb-3">
                            <label for="description" class="form-label">الوصف - Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5" dir="rtl">{{ $blog->description }}</textarea>
                        </div>

                        {{-- <div class="form-group mb-3">
                    <label for="description" class="form-label">Description in English</label>
                    <textarea class="form-control" id="description" name="description"
                        rows="5">{{ $blog->description }}</textarea>
                </div> --}}

                        <div class="form-group mb-3">
                            <label for="category" class="form-label">اختر تصنيف</label>
                            <select class="form-control" name="category" id="category">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $blog->blog_category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <input class="" type="checkbox" value="1" id="showed" name="showed"
                                {{ $blog->showed == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="showed">
                                عرض
                            </label>
                        </div>

                        <div class="form-group mb-3">
                            <input class="" type="checkbox" value="1" id="show_at_home" name="show_at_home"
                                {{ $blog->show_at_home == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="show_at_home">
                                عرض في الصفحة الرئيسية
                            </label>
                        </div>

                        <div class="form-group mb-3">
                            <label for="author_name" class="form-label">اسم الكاتب</label>
                            <input type="text" name="author_name" class="form-control"
                                value="{{ $blog->author_name }}" dir="rtl">
                        </div>
                        {{-- <div class="form-group mb-3">
                    <label for="author_name" class="form-label">Author Name in English</label>
                    <input type="text" name="author_name" class="form-control"
                        value="{{ $blog->author_name }}">
                </div> --}}

                        <div class="form-group mb-3">
                            <label for="author_title" class="form-label">وصف الكاتب</label>
                            <input type="text" name="author_title" class="form-control"
                                value="{{ $blog->author_title }}" dir="rtl">
                        </div>
                        {{-- <div class="form-group mb-3">
                    <label for="author_title" class="form-label">Author Title in English</label>
                    <input type="text" name="author_title" class="form-control"
                        value="{{ $blog->author_title }}">
                </div> --}}

                        <div class="form-group mb-3">
                            <label>صورة الكاتب</label>
                            <input type="file" name="author_image" class="form-control about-me-image">
                        </div>


                        <div class="form-group mb-3">
                            <label>الصورة</label>
                            <input type="file" name="image" class="form-control image">
                        </div>

                        <div class="form-group mb-3">
                            <img src="{{ asset($blog->image) }}" style="width: 300px;"
                                class="img-thumbnail image-preview" alt="">
                        </div>

                        <div class="form-group mb-3">
                            <label>الصورة الرئيسية
                            </label>
                            <input type="file" name="index_image" class="form-control logo">
                        </div>

                        <div class="form-group mb-3">
                            @if ($blog->index_image)
                                <div class="img-wrap del">
                                    <span id="delete-index-img" class="close" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Delete">&times;</span>
                                    <img id="index-img" src="{{ asset($blog->index_image) }}" style="width: 300px;"
                                        class="img-thumbnail logo-preview" alt="">
                                </div>
                            @else
                                <img src="" style="width: 300px; display: none;"
                                    class="img-thumbnail logo-preview" alt="">
                            @endif
                        </div>


                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> تعديل
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
