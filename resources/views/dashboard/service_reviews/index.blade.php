@extends('dashboard._layouts._app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">تقييمات الخدمات</h4>
                <a href="{{ route('dashboard.service_reviews.create') }}" class="btn btn-info">@lang('site.create')</a>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الخدمة</th>
                            <th>الاسم</th>
                            <th>الوصف</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reviews as $index => $review)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $review->service->name }}</td>
                            <td>{{ $review->name }}</td>
                            <td>{{ $review->title }}</td>
                            <td>
                                <a href="{{ route('dashboard.service_reviews.edit', $review->id) }}" class="btn btn-warning">تعديل</a>
                                <form action="{{ route('dashboard.service_reviews.destroy', $review->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">No reviews found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $reviews->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
