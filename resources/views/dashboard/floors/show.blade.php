@extends('dashboard._layouts._app')
@section('head')
<style>



.td1 {
    background-color: #11857A !important;
    color: #fff !important;
}

.td2 {
    background-color: #5A4B93  !important;
    color: #fff !important;
}

.td3 {
    background-color: #DDD0C0 !important;
    color: #fff !important;

}</style>
@endsection
@section('content')
    <section class="basic-inputs">
        <div class="row match-height">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">تعديل حالة الشقق</h4>
                    </div>
                    <div class="card-block" dir="rtl" style="text-align: right">
                        <div class="card-body col-lg-12">
                            @if ($project->floors->count() == 0)
                                <p class="mr-4"> لم يتم إضافة شقق بعد</p>
                            @else
                                <fieldset class="form-group">
                                    <form action="{{ route('dashboard.floors.update') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')

                                        @include('dashboard._layouts._error')

                                        <div class="col-lg-6">



                                            <h5 class="mt-2">الشقة</h5>

                                            <select name="id" class="form-control" id="">

                                                @for ($i = 1; $i <= $project->floors_count; $i++)
                                                    @foreach ($project->FloorRow($i) as $key => $floor)
                                                        <option value="{{ $floor->id }}">الدور {{ $i }} -
                                                            الشقة
                                                            رقم {{ $key + 1 }} :
                                                            {{ $floor->apartment->type }} -
                                                            {{ $floor->apartment->code }}
                                                        </option>
                                                    @endforeach
                                                @endfor
                                                @foreach ($project->FloorRow($project->floors_count + 1) as $key => $floor)
                                                    <option value="{{ $floor->id }}">الملحق - الشقة
                                                        رقم {{ $key + 1 }} :
                                                        {{ $floor->apartment->type }} -
                                                        {{ $floor->apartment->code }}
                                                @endforeach
                                            </select>
                                            {{-- <input value="{{ old('apartment') }}" name="apartment" type="number" min="1"
                                        class="form-control" id="basicInput" required> --}}
                                            <h5 class="mt-2">الحالة</h5>
                                            <select name="status" class="form-control" id="">
                                                <option value="متاح">متاح</option>
                                                <option value="محجوز">محجوز</option>
                                                <option value="مباع">مباع</option>
                                            </select>

                                            <button class="btn btn-icon btn-info mr-1 mt-2">@lang('site.update') <i
                                                    class="fa fa-save" style="position: relative"></i></button>
                                        </div>

                                        <div class="col-lg-6">
                                            <table class="table table-striped table-scrollable mt-2">
                                                <tr>
                                                    <td
                                                        style="text-align: center;
                                   color: white;
                                   font-weight: bolder;
                                   font-size: 16px;
                                       background: #11857A">
                                                        متاح</td>
                                                    <td
                                                        style="text-align: center;
                                   color: white;
                                   font-weight: bolder;
                                   font-size: 16px;
                                       background-color: #5A4B93 ;">
                                                        محجوز</td>
                                                    <td
                                                        style="text-align: center;
                                   color: white;
                                   font-weight: bolder;
                                   font-size: 16px;
                                        background-color: #DDD0C0">
                                                        مباع</td>
                                                </tr>

                                            </table>
                                            <table class="table table-striped table-responsive table-scrollable mt-2">
                                                <tr>
                                                    <td>
                                                        الملاحق
                                                    </td>
                                                    @foreach ($project->FloorRow($project->floors_count) as $key => $floor)
                                                        {{-- @if ($key == $project->FloorRow($project->floors_count + 1)->count() - 1)
                                            <td class="m2">.</td>

                                            @endif --}}
                                                        <td colspan="3"
                                                            class=" @if ($floor->status == 'متاح') td1
                                                @elseif ($floor->status == 'محجوز')
                                                td2
                                                @else
                                                td3 @endif">
                                                            {{ $key + 1 }}
                                                            {{ $floor->apartment->type }} -
                                                            {{ $floor->apartment->code }}</td>

                                                        @if ($key == 0)
                                                            {{-- <td class="m1">.</td> --}}
                                                            {{-- <td style="width: 100%; color:transparent!important;box-shadow: none !important; translate: 0px 24px;">.</td> --}}
                                                        @endif
                                                    @endforeach
                                                </tr>
                                                @for ($i = $project->floors_count - 1; $i >= 1; $i--)
                                                    <tr>
                                                        <td>
                                                            الدور {{ $i }}
                                                        </td>
                                                        @foreach ($project->FloorRow($i) as $key => $floor)
                                                            <td colspan="@if ($project->backCount($i, $floor->apartment_id) == 2 && $floor->apartment->type == 'شقة خلفية') 1
                                                    @else
                                                    2 @endif"
                                                                class=" @if ($floor->status == 'متاح') td1
                                                    @elseif ($floor->status == 'محجوز')
                                                    td2
                                                    @else
                                                    td3 @endif">
                                                                {{ $key + 1 }}
                                                                {{ $floor->apartment->type }} -
                                                                {{ $floor->apartment->code }}</td>
                                                        @endforeach
                                                    </tr>
                                                @endfor
                                            </table>
                                        </div>
                                    </form>
                                </fieldset>
                            @endif
                        </div>
                    </div>
                    <div class="card-block" dir="rtl" style="text-align: right">
                        <a href="{{ route('dashboard.floors.index', $project->id) }}" type="button"
                            class="btn btn-icon btn-primary" style="  min-width: 100px;">إدارة الشقق قي الأدوار<i
                                class="fa fa-edit" style="position: relative;"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Basic Inputs end -->
@endsection
