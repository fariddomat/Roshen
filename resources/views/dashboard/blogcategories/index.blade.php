@extends('dashboard._layouts._app')

@section('content')
    <!-- Striped rows start -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">تصنيفات المدونة</h4>
                    <a href="{{ route('dashboard.blogcategories.create') }}" class="btn btn-icon btn-info mr-1">@lang('site.create')
                        <i class="fa fa-plus" style="position: relative"></i></a>

                </div>
                <div class="card-block">

                    <form action="" class="col-md-12">
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" name="search" id="search" autofocus
                                value="{{ request()->search }}" aria-describedby="helpId" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-primary col-md-2"><i class="fa fa-search"
                                style="position: relative" aria-hidden="true"></i>
                            @lang('site.search')</button>



                    </form>

                    @if ($blogcategories->count() == 0)
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
                                        <th scope="col">@lang('site.action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogcategories as $index => $blogcategory)
                                        <tr dir="rtl" style=" text-align: right;">
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td dir="rtl">{{ $blogcategory->name }}</td>
                                            <td class="form-group">

                                                <a href="{{ route('dashboard.blogcategories.edit', $blogcategory->id) }}" type="button"
                                                    class="btn btn-icon btn-warning mr-1"
                                                    style="  min-width: 100px;">@lang('site.edit') <i class="fa fa-edit"
                                                        style="position: relative;"></i></a>

                                                <form action="{{ route('dashboard.blogcategories.destroy', $blogcategory->id) }}"
                                                    method="POST" style="display: inline-block">
                                                    @csrf
                                                    @method('delete')

                                                    <button type="submit" class="btn btn-icon btn-danger mr-1 delete"
                                                        style="  min-width: 102px;">@lang('site.delete') <i
                                                            class="fa fa-trash" style="position: relative;"></i></button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="text-center m-auto">{{ $blogcategories->appends(request()->query())->links() }}
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
    <!-- Striped rows end -->
@endsection
