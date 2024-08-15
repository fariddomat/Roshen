@extends('dashboard._layouts._app')

@section('content')
    <!-- Striped rows start -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">سياسة الخصوصية</h4>
                    <a href="{{ route('dashboard.privacies.create') }}" class="btn btn-icon btn-info mr-1 mt-2" style="margin-top: 25px">@lang('site.create') <i
                            class="fa fa-plus" style="position: relative"></i></a>
                </div>
                <div class="card-block">
                    <div class="card-body " style="float: right">


                    </div>

                    @if ($privacies->count() == 0)
                        <div class="table-responsive">
                            <h3 class="mr-3 mb-3" dir="rtl" style="text-align: right">@lang('site.no_data_found')</h3>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped table-scrollable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">المحتوى</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($privacies as $index => $privacy)
                                        <tr dir="rtl" style=" text-align: right;">
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td dir="rtl">{!! Str::limit(strip_tags($privacy->content), 250 , ' ...') !!}</td>
                                            <td class="form-group">

                                                <a href="{{ route('dashboard.privacies.edit', $privacy->id) }}" type="button"
                                                    class="btn btn-icon btn-warning mr-1"
                                                    style="  min-width: 100px;">@lang('site.edit') <i class="fa fa-edit"
                                                        style="position: relative;"></i></a>

                                                <form action="{{ route('dashboard.privacies.destroy', $privacy->id) }}"
                                                    method="POST" style="display: inline-block">
                                                    @csrf
                                                    @method('delete')

                                                    <button type="submit" class="btn btn-icon btn-danger mr-1 delete"
                                                        style="  min-width: 102px;">@lang('site.delete') <i class="fa fa-trash"
                                                            style="position: relative;"></i></button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
    <!-- Striped rows end -->
@endsection
