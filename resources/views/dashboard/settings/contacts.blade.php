@extends('dashboard._layouts._app')

@section('content')
    <!-- Striped rows start -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">الرسائل</h4>
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

                        <a href="{{ route('dashboard.setting.export-csv') }}"
                            class="btn btn-icon btn-info mr-1">حفظ ك CSV <i class="fa fa-save"
                                style="position: relative"></i></a>

                    </div>
                    @if ($contacts->count() == 0)
                        <div class="table-responsive">
                            <h3 class="mr-3 mb-3" dir="rtl" style="text-align: right">@lang('site.no_data_found')</h3>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped table-scrollable">
                                <thead>
                                    <tr>
                                        <th scope="col">@lang('site.name')</th>
                                        <th scope="col">@lang('site.phone')</th>
                                        <th scope="col">@lang('site.email')</th>
                                        <th scope="col">الرسالة</th>
                                        <th scope="col">التاريخ</th>
                                        <th scope="col">العمليات</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $index => $contact)
                                        <tr dir="rtl" style=" text-align: right;">
                                            <td dir="rtl">{{ $contact->name }}</td>
                                            <td>{{ $contact->phone }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->message }}</td>
                                            <td>{{ $contact->created_at->diffforhumans() }}</td>
                                            <td>
                                                @if ($contact->status != 'read')
                                                <form action="{{ route('dashboard.setting.markAsRead', $contact->id) }}"
                                                    method="POST" style="display: inline-block">
                                                    @csrf
                                                    @method('Post')

                                                    <button type="submit" class="btn btn-icon btn-success mr-1"
                                                        style=""> <i class="fa fa-eye"
                                                        style="position: relative;"></i></button>
                                                </form>
                                                @else

                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="text-center m-auto">{{ $contacts->appends(request()->query())->links() }}
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
    <!-- Striped rows end -->
@endsection
