@extends('dashboard._layouts._app')

@section('content')
    <!-- Striped rows start -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">الوسطاء</h4>
                    <a href="{{ route('dashboard.promoters.create') }}" class="btn btn-icon btn-info mr-1">@lang('site.create') <i
                            class="fa fa-plus" style="position: relative"></i></a>
                    <a href="{{ route('dashboard.promoters.notify') }}" class="btn btn-icon btn-info mr-1">إرسال إشعار <i
                            class="fa fa-bell" style="position: relative"></i></a>
                </div>
                <div class="card-block">
                    <div class="card-body " style="float: right">


                    </div>
                    <form action="" class="col-md-12">
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" name="search" id="search" autofocus
                                value="{{ request()->search }}" aria-describedby="helpId" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-primary col-md-2"><i class="fa fa-search"
                                style="position: relative" aria-hidden="true"></i>
                            @lang('site.search')</button>



                    </form>

                    @if ($promoters->count() == 0)
                        <div class="table-responsive">
                            <h3 class="mr-3 mb-3" dir="rtl" style="text-align: right">@lang('site.no_data_found')</h3>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped table-scrollable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">@lang('site.name')</th>
                                        <th scope="col">@lang('site.email')</th>
                                        <th scope="col">@lang('site.action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($promoters as $index => $promoter)
                                        <tr dir="rtl" style=" text-align: right;">
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td dir="rtl">{{ $promoter->name }}</td>
                                            <td>{{ $promoter->email }}</td>
                                            <td class="form-group">

                                                <a href="{{ route('dashboard.promoters.edit', $promoter->id) }}" type="button"
                                                    class="btn btn-icon btn-warning mr-1"
                                                    style="  min-width: 100px;">@lang('site.edit') <i class="fa fa-edit"
                                                        style="position: relative;"></i></a>

                                                <form action="{{ route('dashboard.promoters.destroy', $promoter->id) }}"
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
                        <div class="text-center m-auto">{{ $promoters->appends(request()->query())->links() }}
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
    <!-- Striped rows end -->
@endsection
