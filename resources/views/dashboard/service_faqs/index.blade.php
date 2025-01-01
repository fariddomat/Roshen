@extends('dashboard._layouts._app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4>الأسئلة الشائعة للخدمات</h4>
        <a href="{{ route('dashboard.service-faqs.create') }}" class="btn btn-primary">Add FAQ</a>
    </div>
    <div class="card-body">
        @if ($faqs->isEmpty())
            <p>No FAQs found.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الخدمة</th>
                        <th>السؤال</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($faqs as $index => $faq)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $faq->service->name }}</td>
                            <td>{{ $faq->question }}</td>
                            <td>
                                <a href="{{ route('dashboard.service-faqs.edit', $faq->id) }}" class="btn btn-warning">تعديل</a>
                                <form action="{{ route('dashboard.service-faqs.destroy', $faq->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $faqs->links() }}
        @endif
    </div>
</div>
@endsection
