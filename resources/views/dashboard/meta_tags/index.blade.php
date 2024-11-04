@extends('dashboard._layouts._app')

@section('content')
    <!-- Striped rows start -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Meta Tags</h4>
                    <a href="{{ route('dashboard.meta-tags.create') }}" class="btn btn-primary">إضافة Meta Tag</a>

                </div>
                <div class="card-block">

                        <div class="table-responsive">
                            <table class="table table-striped table-scrollable">

                        <thead>
                            <tr>
                                <th>Page Route</th>
                                <th>Meta Title</th>
                                <th>Meta Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($metaTags as $metaTag)
                                <tr>
                                    <td>{{ $metaTag->page_route }}</td>
                                    <td>{{ $metaTag->meta_title }}</td>
                                    <td>{{ Str::limit($metaTag->meta_description, 50) }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.meta-tags.edit', $metaTag->id) }}" class="btn btn-sm btn-warning">تعديل</a>
                                        <form action="{{ route('dashboard.meta-tags.destroy', $metaTag->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                            </table>
                        </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Striped rows end -->
@endsection
