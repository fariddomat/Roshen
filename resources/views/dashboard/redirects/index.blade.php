@extends('dashboard._layouts._app')

@section('content')
    <!-- Striped rows start -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Redirect</h4>
                    <a href="{{ route('dashboard.redirects.create') }}" class="btn btn-primary">إضافة Redirect</a>

                </div>
                <div class="card-block">

                        <div class="table-responsive">
                            <table class="table table-striped table-scrollable">

                                <thead>
                                    <tr>
                                        <th>Source URL</th>
                                        <th>Destination URL</th>
                                        <th>Status Code</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($redirects as $redirect)
                                        <tr>
                                            <td>{{ $redirect->source_url }}</td>
                                            <td>{{ $redirect->destination_url }}</td>
                                            <td>{{ $redirect->status_code }}</td>
                                            <td>
                                                <a href="{{ route('dashboard.redirects.edit', $redirect->id) }}" class="btn btn-sm btn-warning">تعديل</a>
                                                <form action="{{ route('dashboard.redirects.destroy', $redirect->id) }}" method="POST" style="display:inline;">
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
