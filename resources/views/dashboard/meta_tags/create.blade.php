@extends('dashboard._layouts._app')
@section('scripts')
    <script src="{{ asset('dashboard/js/image_preview.js') }}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('site.add') Meta Tag</h4>
                </div>
                <div class="card-block" dir="rtl" style="text-align: right">
                    <div class="col-lg-6">
                        <fieldset class="form-group">
                            <form action="{{ route('dashboard.meta-tags.store') }}" method="POST">
                                @csrf

                                @include('dashboard._layouts._error')
                                <div class="form-group">
                                    <label for="page_route">Page Route</label>
                                    <input type="text" name="page_route" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="meta_title">Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea name="meta_description" class="form-control" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="canonical_link">Canonical Link</label>
                                    <input type="url" name="canonical_link" class="form-control" placeholder="Enter canonical link">
                                </div>

                                <div class="form-group">
                                    <label for="schema_markup">Schema Markup</label>
                                    <textarea name="schema_markup" class="form-control" rows="5" placeholder="Enter schema markup"></textarea>
                                </div>

                                <button class="btn btn-icon btn-info mr-1 mt-2">@lang('site.create') <i class="fa fa-save"
                                        style="position: relative"></i></button>
                            </form>
                        </fieldset>
                    </div>
                    <div class="col-lg-6">

                        <div class="form-group">
                            <img src="" style="width: 300px; display: none;" class="img-thumbnail image-preview"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Basic Inputs end -->
@endsection
