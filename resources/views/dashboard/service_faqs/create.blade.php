@extends('dashboard._layouts._app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>إضافة FAQ</h4>
    </div>
    <div class="card-body" style="padding: 1rem;">
        <form action="{{ route('dashboard.service-faqs.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="service_id">الخدمة</label>
                <select name="service_id" id="service_id" class="form-control" required>
                    <option value="" disabled selected>Select Service</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="question">السؤال</label>
                <input type="text" name="question" id="question" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="answer">الجواب</label>
                <textarea name="answer" id="answer" class="form-control" rows="5" required></textarea>
            </div>
            <button class="btn btn-primary">إضافة</button>
        </form>
    </div>
</div>
@endsection
