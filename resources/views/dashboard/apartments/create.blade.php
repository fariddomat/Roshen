@extends('dashboard._layouts._app')
@section('scripts')
    <script src="{{ asset('dashboard/js/image_preview.js') }}"></script>
@endsection
@section('content')
    <section class="basic-inputs">
        <div class="row match-height">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('site.add') شقة</h4>
                    </div>
                    <div class="card-block" dir="rtl" style="text-align: right">
                        <div class="card-body col-lg-12">
                            <fieldset class="form-group">
                                <form action="{{ route('dashboard.apartments.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')

                                    @include('dashboard._layouts._error')
                                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                                    <div class="col-lg-12">
                                        <h5 class="mt-2">نوع الشقة</h5>
                                        <select name="type" id="" class="form-control">
                                            <option value="أمامية">أمامية</option>
                                            <option value="خلفية">خلفية</option>
                                            <option value="داخلية">داخلية</option>
                                            <option value="ملحق">ملحق</option>
                                        </select>
                                        <h5 class="mt-2">رمز الشقة</h5>
                                        <input value="{{ old('code') }}" name="code" type="text"
                                            class="form-control" id="basicInput" required>

                                        <h5 class="mt-2">عدد الغرف</h5>
                                        <input value="{{ old('room_count') }}" min="0" name="room_count"
                                            type="number" class="form-control" id="basicInput" required>
                                        {{-- <h5 class="mt-2">عدد هذا النوع في الطابق الواحد</h5>
                                        <input value="{{ old('count') }}" name="count" type="number" min="1" max="{{ $project->floor_apartments_count }}"
                                            class="form-control" id="basicInput" required> --}}
                                        <h5 class="mt-2">المساحة</h5>
                                        <input value="{{ old('area') }}" name="area" type="number" min="0"
                                            class="form-control" id="basicInput" required>
                                        <h5 class="mt-2">معلومات عن الشقة</h5>
                                        <textarea name="about" id="ab" class="form-control">{{ old('about') }}</textarea>

                                        <h5 class="mt-2">السعر (اختياري)</h5>
                                        <input value="{{ old('price') }}" name="price" type="number" min="0"
                                            class="form-control" id="basicInput">
                                        <h5 class="mt-2">سعر البنك (اختياري)</h5>
                                        <input value="{{ old('price_bank') }}" name="price_bank" type="number"
                                            min="0" class="form-control" id="basicInput">


                                        <h5 class="mt-2"> التفاصيل</h5>
                                        <textarea id="de" name="details" class="form-control" id="" cols="30" rows="10">
                                                {{ old('details') }}
                                            </textarea>
                                            <h5 class="mt-2">صور الشقة</h5>
                                            <input value="{{ old('img[]') }}" name="img[]" multiple type="file"
                                                class="form-control" id="basicInput">


                                        <h5 class="mt-2">جولة افتراضية - iframe (اختياري)</h5>
                                        <textarea name="virtual_location" class="form-control" id="" rows="3">{{ old('virtual_location') }}</textarea>



                                        <h5 class="mt-2">يتوتيوب - Youtube (اختياري)</h5>
                                        <textarea name="youtube" class="form-control" id="" rows="3">{{ old('youtube') }}</textarea>

                                    </div>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            {{-- <img src="" style="width: 300px; display: none;"
                                                class="img-thumbnail image-preview" alt=""> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-12">

                                        <button class="btn btn-icon btn-info mr-1 mt-2">@lang('site.create') <i
                                                class="fa fa-save" style="position: relative"></i></button>
                                    </div>
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
