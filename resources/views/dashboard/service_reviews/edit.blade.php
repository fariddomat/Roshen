@extends('dashboard._layouts._app')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">تعديل تقييم</h4>
            </div>
            <div class="card-body" style="padding: 1rem;">
                <form action="{{ route('dashboard.service_reviews.update', $serviceReview->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="service_id">الخدمة</label>
                        <select name="service_id" id="service_id" class="form-control @error('service_id') is-invalid @enderror">
                            @foreach($services as $service)
                                <option value="{{ $service->id }}" {{ $serviceReview->service_id == $service->id ? 'selected' : '' }}>
                                    {{ $service->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('service_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $serviceReview->name) }}">
                        @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">العنوان</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $serviceReview->title) }}">
                        @error('title')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">الوصف</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description', $serviceReview->description) }}</textarea>
                        @error('description')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="img">الصورة</label>
                        <div class="mb-2">
                            @if ($serviceReview->img)
                                <img src="{{ $serviceReview->image_path }}" alt="Reviewer Image" style="max-height: 150px;">
                            @endif
                        </div>
                        <input type="file" name="img" id="img" class="form-control-file @error('img') is-invalid @enderror">
                        @error('img')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">تعديل</button>
                    <a href="{{ route('dashboard.service_reviews.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
