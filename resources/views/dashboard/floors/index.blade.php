@extends('dashboard._layouts._app')

@section('content')
    @if ($project->floors->count() > 0)
    <section class="basic-inputs">
        <div class="row match-height">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            هل ترغب بإعادة تهيئة الشقق وحذف القيم القديمة؟</h4>
                    </div>
                    <div style="text-align: right; margin: 25px">

                    <a href="{{ route('dashboard.floors.destroy', $project->id) }}" class="btn btn-danger mr-3">تهيئة</a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    @else
    <form action="{{ route('dashboard.floors.store') }}" method="post">
        @extends('dashboard._layouts._error')
        @csrf
        <input type="hidden" name="project_id" value="{{ $project->id }}">
        <section class="basic-inputs">
            <div class="row match-height">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">تحديد الشقق في الأدوار</h4>
                        </div>

                    </div>
                </div>

            </div>
        </section>
        </div>
        @for ($i = 1; $i <= $project->floors_count - 1; $i++)
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">الدور رقم {{ $i }}</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-plus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>

                        </div>
                        <div class="card-block" dir="rtl" style="text-align: right">
                            <div class="card-block " style="text-align: right">
                                <fieldset class="form-group">


                                    @include('dashboard._layouts._error')
                                    <div class="col-lg-6">
                                        @foreach ($apartments as $apartment)
                                            <h5 class="mt-2">النوع: {{ $apartment->type }} - الرمز: {{ $apartment->code }}
                                            </h5>
                                            <input value="{{ old('apartment_id[]', $apartment->id) }}" name="apartment_id[]"
                                                type="hidden"><input value="{{ old('floor_id[]', $i) }}" name="floor_id[]"
                                                type="hidden">
                                            <input value="{{ old('counts[]', 2) }}" name="counts[]" type="number"
                                                min="0" max="4" class="form-control" id="basicInput" required>
                                        @endforeach

                                    </div>




                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">الملاحق</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-plus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>

                    </div>
                    <div class="card-block" dir="rtl" style="text-align: right">
                        <div class="card-block " style="text-align: right">
                            <fieldset class="form-group">


                                @include('dashboard._layouts._error')
                                <div class="col-lg-6">
                                    @foreach ($project->apartments->where('appendix', 'on') as $apartment)
                                        <h5 class="mt-2">النوع: {{ $apartment->type }} - الرمز: {{ $apartment->code }}
                                        </h5>
                                        <input value="{{ old('apartment_id[]', $apartment->id) }}" name="apartment_id[]"
                                            type="hidden"><input value="{{ old('floor_id[]', $i) }}" name="floor_id[]"
                                            type="hidden">
                                        <input value="{{ old('counts[]', 2) }}" name="counts[]" type="number"
                                            min="1" max="4" class="form-control" id="basicInput" required>
                                    @endforeach

                                </div>




                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic Inputs end -->

        <button type="submit" class="btn btn-primary">حفظ</button>
    </form>
    @endif
@endsection
