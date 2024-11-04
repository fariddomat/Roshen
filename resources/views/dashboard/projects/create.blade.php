@extends('dashboard._layouts._app')
@section('scripts')
    <script src="{{ asset('dashboard/js/image_preview.js') }}?v=1"></script>

    <script type="text/javascript">
        var imageGalleryBrowseUrl = "{{ route('dashboard.imageGallery.browser') }}";
        var imageGalleryUploadUrl = "{{ route('dashboard.imageGallery.uploader') }}";
    </script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('dashboard/js/about.js') }}"></script>
@endsection

@section('content')
    <form action="{{ route('dashboard.projects.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('site.add') @lang('site.project')</h4>

                    </div>
                    <div class="card-block " dir="rtl" style="text-align: right">
                        <div class="" style="text-align: right">
                            <fieldset class="form-group">


                                @include('dashboard._layouts._error')
                                <div class="col-lg-6">

                                    <h5 class="mt-2">الحي</h5>
                                    <select name="category" id="" class="form-control">
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <h5 class="mt-2">@lang('site.name')</h5>
                                    <input value="{{ old('name') }}" name="name" type="text" class="form-control"
                                        id="basicInput" required>

                                    <h5 for="slug" class="mt-2"> الرابط Link </h5>
                                    <input type="text" name="slug" class="form-control" value="{{ old('slug') }}"
                                        required>

                                    <h5 class="mt-2">@lang('site.scheme_name')</h5>
                                    <input value="{{ old('scheme_name') }}" name="scheme_name" type="text"
                                        class="form-control" id="basicInput" required>
                                    {{-- date_of_build --}}
                                    <h5 class="mt-2">تاريخ البناء</h5>
                                    <input type="date" name="date_of_build" value="{{ old('date_of_build') }}"
                                        id="basicInput" class="form-control">

                                    <h5 class="mt-2">@lang('site.address')</h5>
                                    <textarea id="quality_safty" name="address" class="form-control" id="basicTextarea" rows="3" required>{{ old('address') }}</textarea>

                                    {{-- address_location --}}
                                    <h5 class="mt-2">الموقع على الخريطة - iframe (اختياري)</h5>
                                    <textarea name="address_location" class="form-control" id="" rows="3">{{ old('address_location') }}</textarea>


                                    {{-- virtual --}}
                                    <h5 class="mt-2">يوتيوب (اختياري)</h5>
                                    <textarea name="virtual_location" class="form-control" id="" rows="3">{{ old('virtual_location') }}</textarea>

                                    <h5 class="mt-2">حالة المشروع</h5>
                                    <select name="status" id="" class="form-control">
                                        <option value="مكتمل">مكتمل</option>
                                        <option value="قيد الانشاء">قيد الانشاء</option>
                                        <option value="تحت الانشاء">تحت الانشاء</option>
                                        <option value="تحت التشطيب">تحت التشطيب</option>
                                        <option value="على وشك الانتهاء">على وشك الانتهاء</option>
                                        <option value="غير متاح للعرض">غير متاح للعرض</option>

                                        <option value="تم البيع">تم البيع</option>
                                    </select>
                                    <h5 class="mt-2">نسبة التنفيذ</h5>
                                    <input value="{{ old('status_percent', 0) }}" name="status_percent" type="number"
                                        min="0" max="100" class="form-control" id="basicInput" required>


                                </div>
                                <div class="col-lg-6">
                                    <h5 class="mt-2">@lang('site.floors_count') </h5>
                                    <input value="{{ old('floors_count', 5) }}" name="floors_count" type="number"
                                        min="1" class="form-control" id="basicInput" required>

                                    {{-- <h5 class="mt-2">@lang('site.apartments_count') في الطابق</h5>
                                    <select name="floor_apartments_count" id="" class="form-control">
                                        <option value="2">شقتين</option>
                                        <option value="3">ثلاث شقق (2 أمامي - 1 خلفي)</option>
                                        <option value="4">أربع شقق (2 أمامي - 2 خلفي)</option>
                                    </select> --}}

                                    {{-- <h5 class="mt-2">@lang('site.appendix_count')</h5>
                                    <input value="2" disabled min="0" name="appendix_count"
                                        type="number" class="form-control" id="basicInput" required> --}}


                                    <h5 class="mt-2">@lang('site.description')</h5>
                                    <textarea id="about_me" name="details" class="form-control" id="basicTextarea" rows="3" required>{{ old('details') }}</textarea>
                                    <h5 class="mt-2">@lang('site.image') رئيسية</h5>
                                    <input value="{{ old('poster') }}" name="poster" type="file"
                                        class="form-control image" id="basicInput" required>
                                    <div class="row mt-1">
                                        <img class="col-lg-3 img-thumbnail image-preview"
                                            style="width: 300px; display: none;" src="" alt="">
                                    </div>
                                    <h5 class="mt-2">@lang('site.image') غلاف</h5>
                                    <input value="{{ old('cover_img') }}" name="cover_img" type="file"
                                        class="form-control image2" id="basicInput" required>
                                    <div class="row mt-1">
                                        <img class="col-lg-3 img-thumbnail image2-preview"
                                            style="width: 300px; display: none;" src="" alt="">
                                    </div>


                                    <h5 class="mt-2">صور المشروع</h5>
                                    <input value="{{ old('img[]') }}" name="img[]" multiple type="file"
                                        class="form-control" id="basicInput">

                                    <h5 class="mt-2"> pdf ملفات المشروع (اختياري)</h5>
                                    <input type="file" value="{{ old('pdfs[]') }}" name="pdfs[]" multiple
                                        class="form-control" id="basicInput">
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
                                    <input value="{{ old('farea') }}" name="farea" type="number" min="0"
                                        class="form-control" id="basicInput" required>

                                    <h5 class="mt-2">السعر</h5>
                                    <input value="{{ old('fprice') }}" name="fprice" type="number" min="0"
                                        class="form-control" id="basicInput" required>
                                </div>
                                <div class="col-lg-6 mt-3">

                                    <h5 class="mt-2"> التفاصيل</h5>
                                    <textarea id="summernote3" name="fdetails" class="form-control" id="">
                                    {{ old('fdetails') }}
                                </textarea>
                                    <h5 class="mt-2">@lang('site.image')</h5>
                                    <input value="{{ old('fimg') }}" name="fimg" type="file"
                                        class="form-control" id="basicInput" required>

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
                                    <input value="{{ old('barea') }}" name="barea" type="number" min="0"
                                        class="form-control" id="basicInput" required>

                                    <h5 class="mt-2">السعر</h5>
                                    <input value="{{ old('bprice') }}" name="bprice" type="number" min="0"
                                        class="form-control" id="basicInput" required>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <h5 class="mt-2"> التفاصيل</h5>
                                    <textarea id="summernote4" name="bdetails" class="form-control" id="">
                                    {{ old('bdetails') }}
                                </textarea>
                                    <h5 class="mt-2">@lang('site.image')</h5>
                                    <input value="{{ old('bimg') }}" name="bimg" type="file"
                                        class="form-control" id="basicInput" required>

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
                                    <input value="{{ old('aarea') }}" name="aarea" type="number" min="0"
                                        class="form-control" id="basicInput">

                                    <h5 class="mt-2">السعر</h5>
                                    <input value="{{ old('aprice') }}" name="aprice" type="number" min="0"
                                        class="form-control" id="basicInput">
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <h5 class="mt-2"> التفاصيل</h5>
                                    <textarea id="summernote5" name="adetails" class="form-control" id="">
                                    {{ old('adetails') }}
                                </textarea>
                                    <h5 class="mt-2">@lang('site.image')</h5>
                                    <input value="{{ old('aimg') }}" name="aimg" type="file"
                                        class="form-control" id="basicInput">

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


                    </div>
                    <div class="card-block">
                        <div class="" style="text-align: right">
                            <fieldset class="form-group">
                                <div class="col-lg-6 mt-3">
                                    <textarea id="who" name="pdetails" class="form-control" id="" required>
                                    {{ old('pdetails') }}
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
                        <div class="" style="float: right">
                            <div class="col-lg-12">
                                <button class="btn btn-icon btn-info mr-1 mt-3">@lang('site.create') <i class="fa fa-save"
                                        style="position: relative"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection
