@extends('dashboard._layouts._app')
@section('scripts')
    <script src="{{ asset('dashboard/js/image_preview.js?v=1') }}"></script>

    <script type="text/javascript">
        var imageGalleryBrowseUrl = "{{ route('dashboard.imageGallery.browser') }}";
        var imageGalleryUploadUrl = "{{ route('dashboard.imageGallery.uploader') }}";
    </script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('dashboard/js/about.js') }}"></script>
@endsection
@section('content')
    <form action="{{ route('dashboard.projects.update', $project->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('site.edit') @lang('site.project')</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                {{-- <li><a data-action="close"><i class="ft-x"></i></a></li> --}}
                            </ul>
                        </div>

                    </div>
                    <div class="card-block" dir="rtl" style="text-align: right">
                        <div class="card-body " style="text-align: right">
                            <fieldset class="form-group">


                                @include('dashboard._layouts._error')
                                <div class="col-lg-6">

                                    <h5 class="mt-2">الحي</h5>
                                    <select name="category" id="" class="form-control">
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $project->category_id) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <h5 class="mt-2">@lang('site.name')</h5>
                                    <input value="{{ old('name', $project->name) }}" name="name" type="text"
                                        class="form-control" id="basicInput" required>
                                    <h5 for="slug" class="mt-2"> الرابط Link </h5>
                                    <input type="text" name="slug" class="form-control" value="{{ old('slug', $project->slug) }}"
                                        required>
                                    <h5 class="mt-2">@lang('site.scheme_name')</h5>
                                    <input value="{{ old('scheme_name', $project->scheme_name) }}" name="scheme_name"
                                        type="text" class="form-control" id="basicInput" required>
                                    {{-- date_of_build --}}
                                    <h5 class="mt-2">تاريخ البناء</h5>
                                    <input type="date" name="date_of_build"
                                        value="{{ old('date_of_build', $project->date_of_build) }}" id="basicInput"
                                        class="form-control">


                                    <h5 class="mt-2">@lang('site.address')</h5>
                                    <textarea id="about_me" name="address" class="form-control" id="basicTextarea" rows="3" required>{{ old('address', $project->address) }}</textarea>

                                    {{-- address_location --}}
                                    <h5 class="mt-2">الموقع على الخريطة - iframe (اختياري)</h5>
                                    <textarea name="address_location" class="form-control" id="" rows="3">{{ old('address_location', $project->address_location) }}</textarea>

                                    <h5 class="mt-2">يوتيوب (اختياري)</h5>
                                    <textarea name="virtual_location" class="form-control" id="" rows="3">{{ old('virtual_location', $project->virtual_location) }}</textarea>

                                    <h5 class="mt-2">حالة المشروع</h5>
                                    <select name="status" id="" class="form-control">
                                        <option value="مكتمل" selected>مكتمل</option>
                                        <option value="قيد الانشاء" @if ($project->status == 'قيد الانشاء') selected @endif>قيد
                                            الانشاء</option>
                                        <option value="تحت الانشاء"@if ($project->status == 'تحت الانشاء') selected @endif>تحت
                                            الانشاء</option>
                                        <option value="تحت التشطيب"@if ($project->status == 'تحت التشطيب') selected @endif>تحت
                                            التشطيب</option>
                                        <option value="على وشك الانتهاء"@if ($project->status == 'على وشك الانتهاء') selected @endif>
                                            على وشك الانتهاء</option>
                                        <option value="غير متاح للعرض" @if ($project->status == 'غير متاح للعرض') selected @endif>غير
                                            متاح للعرض</option>
                                        <option value="تم البيع" @if ($project->status == 'تم البيع') selected @endif>تم البيع
                                        </option>

                                    </select>
                                    <h5 class="mt-2">نسبة التنفيذ</h5>
                                    <input value="{{ old('status_percent', $project->status_percent) }}"
                                        name="status_percent" type="number" min="0" max="100"
                                        class="form-control" id="basicInput" required>


                                </div>
                                <div class="col-lg-6">
                                    <h5 class="mt-2">@lang('site.floors_count')</h5>
                                    <input value="{{ old('floors_count', $project->floors_count) }}" name="floors_count"
                                        type="number" min="1" class="form-control" id="basicInput" required>


                                    <h5 class="mt-2">@lang('site.description')</h5>
                                    <textarea id="quality_safty" name="details" class="form-control" id="basicTextarea" rows="3" required>{{ old('details', $project->details) }}</textarea>
                                    <h5 class="mt-2">@lang('site.image') رئيسية</h5>
                                    <input value="{{ old('poster') }}" name="poster" type="file"
                                        class="form-control image" id="basicInput">
                                    <div class="row mt-1">
                                        <img class="col-lg-3 img-thumbnail image-preview"
                                            src="{{ $project->poster_path }}" alt="Images">
                                    </div>

                                    <h5 class="mt-2">@lang('site.image') الغلاف</h5>
                                    <input value="{{ old('cover_img') }}" name="cover_img" type="file"
                                        class="form-control image2" id="basicInput">
                                    <div class="row mt-1">
                                        <img class="col-lg-3 img-thumbnail image2-preview"
                                            src="{{ $project->cover_img_path }}" alt="Images">
                                    </div>

                                    <h5 class="mt-2">صور المشروع</h5>
                                    <input value="{{ old('img[]') }}" name="img[]" multiple type="file"
                                        class="form-control" id="basicInput">





                                    <h5 class="mt-2"> pdf ملفات المشروع (اختياري)</h5>
                                    <input type="file" value="{{ old('pdfs[]') }}" name="pdfs[]" multiple
                                        class="form-control" id="basicInput">
                                    <h5 class="mt-2">لديك {{ $project->pdfs->count() }} ملف
                                    </h5>
                                    @if ($project->pdfs->count() > 0)
                                        <a href="{{ route('dashboard.projects.deletePdf', $project->id) }}"
                                            class="btn btn-danger">حذف ال pdf</a>
                                    @endif
                                </div>




                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">معلومات الشقق الأمامية</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>

                    </div>
                    <div class="card-block">
                        <div class="card-body " style="text-align: right">


                            <fieldset class="form-group">
                                <div class="col-lg-6  mt-3">
                                    <h5 class="mt-2">المساحة</h5>
                                    <input value="{{ old('farea', $project->front_apartment->area) }}" name="farea"
                                        type="number" min="0" class="form-control" id="basicInput" required>

                                    <h5 class="mt-2">السعر</h5>
                                    <input value="{{ old('fprice', $project->front_apartment->price) }}" name="fprice"
                                        type="number" min="0" class="form-control" id="basicInput" required>
                                </div>
                                <div class="col-lg-6 mt-3">

                                    <h5 class="mt-2"> التفاصيل</h5>
                                    <textarea id="summernote3"  name="fdetails" class="form-control" id="">
                                    {{ old('fdetails', $project->front_apartment->details) }}
                                </textarea>
                                    <h5 class="mt-2">@lang('site.image')</h5>
                                    <input value="{{ old('fimg') }}" name="fimg" type="file"
                                        class="form-control" id="basicInput">
                                    <img class="col-lg-3 mt-1" src="{{ $project->front_apartment->image_path }}"
                                        alt="Images">

                                </div>
                        </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">معلومات الشقق الخلفية</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>

                    </div>
                    <div class="card-block">
                        <div class="card-body " style="text-align: right">

                            <fieldset class="form-group">
                                <div class="col-lg-6 mt-3">
                                    <h5 class="mt-2">المساحة</h5>
                                    <input value="{{ old('barea', $project->back_apartment->area) }}" name="barea"
                                        type="number" min="0" class="form-control" id="basicInput" required>

                                    <h5 class="mt-2">السعر</h5>
                                    <input value="{{ old('bprice', $project->back_apartment->price) }}" name="bprice"
                                        type="number" min="0" class="form-control" id="basicInput" required>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <h5 class="mt-2"> التفاصيل</h5>
                                    <textarea id="summernote4"  name="bdetails" class="form-control" id="">
                                    {{ old('bdetails', $project->back_apartment->details) }}
                                </textarea>
                                    <h5 class="mt-2">@lang('site.image')</h5>
                                    <input value="{{ old('bimg') }}" name="bimg" type="file"
                                        class="form-control" id="basicInput">
                                    <img class="col-lg-3 mt-1" src="{{ $project->back_apartment->image_path }}"
                                        alt="Images">

                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">معلومات الملاحق</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>

                    </div>
                    <div class="card-block">
                        <div class="card-body " style="text-align: right">

                            <fieldset class="form-group">
                                <div class="col-lg-6 mt-3">
                                    <h5 class="mt-2">المساحة</h5>
                                    <input value="{{ old('aarea', $project->appendix_apartment->area ?? '') }}"
                                        name="aarea" type="number" min="0" class="form-control"
                                        id="basicInput">

                                    <h5 class="mt-2">السعر</h5>
                                    <input value="{{ old('aprice', $project->appendix_apartment->price ?? '') }}"
                                        name="aprice" type="number" min="0" class="form-control"
                                        id="basicInput">
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <h5 class="mt-2"> التفاصيل</h5>
                                    <textarea id="summernote5"  name="adetails" class="form-control" id="">
                                    {{ old('adetails', $project->appendix_apartment->details ?? '') }}
                                </textarea>
                                    <h5 class="mt-2">@lang('site.image')</h5>
                                    <input value="{{ old('aimg') }}" name="aimg" type="file"
                                        class="form-control" id="basicInput">
                                    @if ($project->appendix_apartment)
                                        <img class="col-lg-3 mt-1" src="{{ $project->appendix_apartment->image_path }}"
                                            alt="Images">
                                    @endif
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">ميزات المشاريع</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                {{-- <li><a data-action="close"><i class="ft-x"></i></a></li> --}}
                            </ul>
                        </div>

                    </div>
                    <div class="card-block">
                        <div class="card-body " style="text-align: right">
                            <fieldset class="form-group">
                                <div class="col-lg-6 mt-3">
                                    <textarea id="who" name="pdetails" class="form-control" id="" required>
                                    {{ old('pdetails', $project->propertie->details) }}
                                </textarea>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-block">
                        <div class="card-body " style="float: right">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-icon btn-info mr-1 mt-3">@lang('site.update') <i
                                        class="fa fa-save" style="position: relative"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>

    <div class="row">
        @if ($project->projectImages->count() > 0)
            <div class="row mt-1">
                @foreach ($project->projectImages as $projectImage)
                    <div class="col-lg-3 col-md-4 col-sm-6 position-relative" style="margin: 15px 0;">
                        <img src="{{ asset('uploads/images/' . $project->id . '/' . $projectImage->img) }}"
                            alt="Images" style="max-width: 100%; height: auto; display: block;">
                        <form action="{{ route('dashboard.removeImage', $projectImage->id) }}" method="POST"
                            class="position-absolute" style="top: 10px; right: 10px;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" style="padding: 0 5px;">X</button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
