@extends('dashboard._layouts._app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>تعديل FAQ</h4>
    </div>
    <div class="card-body" style="padding: 1rem;">
        <form action="{{ route('dashboard.service-faqs.update', $serviceFAQ) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="service_id">الخدمة</label>
                <select name="service_id" id="service_id" class="form-control" required>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}" {{ $service->id == $serviceFAQ->service_id ? 'selected' : '' }}>
                            {{ $service->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="question">السؤال</label>
                <input type="text" name="question" id="question" class="form-control" value="{{ $serviceFAQ->question }}" required>
            </div>
            <div class="form-group">
                <label for="answer">الجواب</label>
                <textarea name="answer" id="answer" class="form-control" rows="5" required>{{ $serviceFAQ->answer }}</textarea>
            </div>
            <button class="btn btn-primary">تعديل</button>
        </form>
    </div>
</div>
@endsection
