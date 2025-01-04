@extends('dashboard._layouts._app')

@section('content')
    <!-- Striped rows start -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">طلبات الانضمام</h4>
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

                    <div class="card-body " style="float: right">

                        {{-- <a href="{{ route('dashboard.setting.export-csv') }}"
                            class="btn btn-icon btn-info mr-1">حفظ ك CSV <i class="fa fa-save"
                                style="position: relative"></i></a> --}}

                    </div>
                    @if ($newsletters->count() == 0)
                        <div class="table-responsive">
                            <h3 class="mr-3 mb-3" dir="rtl" style="text-align: right">@lang('site.no_data_found')</h3>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped table-scrollable">
                                <thead>
                                    <tr>
                                        <th scope="col">@lang('site.phone')</th>
                                        <th scope="col">التاريخ</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($newsletters as $index => $item)
                                        <tr dir="rtl" style=" text-align: right;">
                                            <td>{{ $item->mobile }}</td>
                                            <td>{{ $item->created_at }}</td>


                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="text-center m-auto">{{ $newsletters->appends(request()->query())->links() }}
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
    <!-- Striped rows end -->
@endsection
