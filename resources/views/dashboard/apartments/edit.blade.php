@extends('dashboard._layouts._app')
@section('scripts')
<script src="{{asset('dashboard/js/image_preview.js')}}"></script>
@endsection
@section('content')
    <section class="basic-inputs">
        <div class="row match-height">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('site.edit') شقة</h4>
                    </div>
                    <div class="card-block" dir="rtl" style="text-align: right">
                        <div class="card-body col-lg-12">
                            <fieldset class="form-group">
                                <form action="{{ route('dashboard.apartments.update', $apartment->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    @include('dashboard._layouts._error')
                                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                                    <div class="col-lg-12">
                                        <h5 class="mt-2">نوع الشقة </h5>
                                        <select name="type" id="" class="form-control">
                                            <option value="أمامية"
                                                @if ($apartment->type == 'أمامية') selectedselected @endif>أمامية</option>
                                            {{-- <option value="خلفية" @if ($apartment->type == 'خلفية') selected @endif>خلفية
                                            </option> --}}
                                            <option value="داخلية" @if ($apartment->type == 'داخلية') selected @endif>داخلية
                                            </option>

                                            <option value="ملحق" @if ($apartment->type == 'ملحق') selected @endif>ملحق
                                            </option>
                                        </select>
                                        <h5 class="mt-2">رمز الشقة</h5>
                                        <input value="{{ old('code', $apartment->code) }}" name="code" type="text"
                                            class="form-control" id="basicInput" required>

                                        <h5 class="mt-2">عدد الغرف</h5>
                                        <input value="{{ old('room_count', $apartment->room_count) }}" name="room_count"
                                            type="number" min="0" class="form-control" id="basicInput" required>
                                        {{-- <h5 class="mt-2">عدد هذا النوع في الطابق الواحد</h5>
                                        <input value="{{ old('count', $apartment->count) }}" name="count" type="number" min="0"
                                            class="form-control" id="basicInput" disabled required> --}}
                                        <h5 class="mt-2">المساحة</h5>
                                        <input value="{{ old('area', $apartment->area) }}" name="area" type="number"
                                            min="0" class="form-control" id="basicInput" required>
                                        <h5 class="mt-2">معلومات عن الشقة</h5>
                                        <textarea name="about" id="ab" class="form-control">{{ old('about', $apartment->about) }}</textarea>
                                        <h5 class="mt-2">السعر (اختياري)</h5>
                                        <input value="{{ old('price', $apartment->price) }}" name="price" type="number"
                                            min="0" class="form-control" id="basicInput">
                                        {{-- <h5 class="mt-2">سعر البنك (اختياري)</h5>
                                        <input value="{{ old('price_bank', $apartment->price_bank) }}" name="price_bank" type="number"
                                            min="0" class="form-control" id="basicInput"> --}}


                                        <h5 class="mt-2"> التفاصيل</h5>
                                        <textarea id="de" name="details" class="form-control" id="" cols="30" rows="10">
                                                {{ old('details', $apartment->details) }}
                                            </textarea>

                                            <h5 class="mt-2">صور الشقة</h5>
                                            <input value="{{ old('img[]') }}" name="img[]" multiple type="file"
                                                class="form-control" id="basicInput">

                                            <h5 class="mt-2">جولة افتراضية - iframe (اختياري)</h5>
                                        <textarea name="virtual_location" class="form-control" id="" rows="3">{{ old('virtual_location', $apartment->virtual_location) }}</textarea>

                                        <h5 class="mt-2">يتوتيوب - Youtube (اختياري)</h5>
                                        <textarea name="youtube" class="form-control" id="" rows="3">{{ old('youtube', $apartment->youtube) }}</textarea>

                                        <h5 class="mt-2"> pdf ملفات المشروع (اختياري)</h5>
                                        <input type="file"  value="{{ old('pdfs[]') }}"  name="pdfs[]" multiple
                                        class="form-control" id="basicInput">
                                        <h5 class="mt-2">لديك {{ $apartment->pdfs->count() }} ملف
                                        </h5>
                                        {{-- @if($project->pdfs->count() > 0)
                                        <a href="{{ route('dashboard.projects.deletePdf', $project->id) }}" class="btn btn-danger">حذف ال pdf</a>
                                        @endif --}}
                                    </div>
                                    <div class="col-lg-6">

                                        {{-- @if ($apartment->apartmentImages->count() > 0)
                                                <div class="row mt-1">
                                                    @foreach ($apartment->images_path as $item)
                                                        <img class="col-lg-3"  src="{{ $item }}" alt="Images" style="max-width: 300px; margin:15px 0">
                                                    @endforeach
                                                </div>
                                            @endif --}}
                                    </div>


                                    <div class="col-lg-12">

                                        <button class="btn btn-icon btn-info mr-1 mt-2">@lang('site.update') <i
                                                class="fa fa-save" style="position: relative"></i></button>
                                    </div>
                                </form>

                                @if ($apartment->apartmentImages->count() > 0)
                                <div class="row mt-1">
                                    @foreach ($apartment->apartmentImages as $projectImage)
                                        <div class="col-lg-3 col-md-4 col-sm-6 position-relative"
                                            style="margin: 15px 0;">
                                            <img src="{{ asset('uploads/images/apartments/' . $apartment->id . '/' . $projectImage->img) }}"
                                                alt="Images"
                                                style="max-width: 100%; height: auto; display: block;">
                                            <form action="{{ route('dashboard.removeImage.apartment', $projectImage->id) }}"
                                                method="POST" class="position-absolute"
                                                style="top: 10px; right: 10px;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    style="padding: 0 5px;">X</button>
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Basic Inputs end -->
@endsection
