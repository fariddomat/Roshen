@extends('dashboard._layouts._app')
@section('scripts')
<script src="{{asset('dashboard/js/image_preview.js')}}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('site.edit') Meta Tag</h4>
                </div>
                <div class="card-block" dir="rtl" style="text-align: right">
                    <div class="col-lg-6">
                        <fieldset class="form-group">
                            <form action="{{ route('dashboard.meta-tags.update', $metaTag->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                @include('dashboard._layouts._error')
                                <div class="form-group">
                                    <label for="page_route">Page Route</label>
                                    <input type="text" name="page_route" class="form-control" value="{{ $metaTag->page_route }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="meta_title">Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control" value="{{ $metaTag->meta_title }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea name="meta_description" class="form-control" required>{{ $metaTag->meta_description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="canonical_link">Canonical Link</label>
                                    <input type="url" name="canonical_link" class="form-control" value="{{ $metaTag->canonical_link }}" placeholder="Enter canonical link">
                                </div>

                                <div class="form-group">
                                    <label for="schema_markup">Schema Markup</label>
                                    <textarea name="schema_markup" class="form-control" rows="5" placeholder="Enter schema markup">{{ $metaTag->schema_markup }}</textarea>
                                </div>


                                <button class="btn btn-icon btn-info mr-1 mt-2">@lang('site.edit') <i class="fa fa-edit"
                                        style="position: relative"></i></button>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
