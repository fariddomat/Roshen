@extends('dashboard._layouts._app')
@section('title', 'Blogs')
@section('blogsActive', 'active')
@section('styles')
    {{-- <link href="{{asset('dashboard/css/datatables.min.css')}}" rel="stylesheet"> --}}
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.3/b-3.0.1/r-3.0.1/rr-1.5.0/datatables.min.css" rel="stylesheet">
    <style>
        table.dataTable thead>tr>th.dt-orderable-asc,
        table.dataTable thead>tr>th.dt-orderable-desc,
        table.dataTable thead>tr>td.dt-orderable-asc,
        table.dataTable thead>tr>td.dt-orderable-desc {
            text-align: right;
        }
    </style>
@endsection
@section('scripts')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdn.datatables.net/v/bs5/dt-2.0.3/b-3.0.1/r-3.0.1/rr-1.5.0/datatables.min.js" defer></script>

    <script>
        $(document).ready(function() {
            $('#Table').DataTable({
                responsive: true,
                searching: true,
                paging: false,
                info: false,
                sorting: false,
                language: {
                    // url: '//cdn.datatables.net/plug-ins/2.0.3/i18n/ar.json',
                },
            });
        });
    </script>
@endsection
@section('content')

    <!-- Striped rows start -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title"> المدونة</h4>
                    <a href="{{ route('dashboard.blogs.create') }}" class="btn btn-icon btn-info mr-1">@lang('site.create')
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

                    @if ($blogs->count() == 0)
                        <div class="table-responsive">
                            <h3 class="mr-3 mb-3" dir="rtl" style="text-align: right">@lang('site.no_data_found')</h3>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped table-scrollable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>العنوان</th>
                                        <th>الصورة</th>
                                        <th>التصنيف</th>
                                        <th class="none">عرض</th>
                                        <th class="none">عرض في الصفحة الرئيسية</th>
                                        <th>العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogs as $index => $blog)
                                        <tr>
                                            <td class="d-flex px-2 py-1">{{ $index + 1 }}</td>
                                            <td class="d-flex px-2 py-1">{{ $blog->title }}</td>
                                            <td class="d-flex px-2 py-1"><img class="avatar avatar-sm me-3 border-radius-lg"
                                                    src="{{ asset($blog->image) }}" alt=""></td>

                                            <td class="d-flex px-2 py-1">{{ $blog->Category->name }}</td>
                                            <td class="d-flex px-2 py-1">{{ $blog->showed == 1 ? 'نعم' : 'مخفي' }}</td>
                                            <td class="d-flex px-2 py-1">{{ $blog->show_at_home == 1 ? 'نعم' : 'مخفي' }}
                                            </td>
                                            <td class="d-flex px-2 py-1">
                                                <a href="{{ route('blog', $blog->slug) }}" class="btn btn-info btn-sm"
                                                    target="_blank"> عرض</a>
                                                <a href="{{ route('dashboard.blogs.edit', $blog->id) }}"
                                                    class="btn btn-info btn-sm">تعديل<i class="fas fa-edit"></i> </a>
                                                <form action="{{ route('dashboard.blogs.destroy', $blog->id) }}"
                                                    method="post" style="display: inline-block">
                                                    @csrf()
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger delete btn-sm"><i
                                                            class="fas fa-trash"></i> </button>
                                                </form><!-- end of form -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table><!-- end of table -->


                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
