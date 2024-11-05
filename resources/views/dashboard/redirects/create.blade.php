@extends('dashboard._layouts._app')
@section('scripts')
    <script src="{{ asset('dashboard/js/image_preview.js') }}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('site.add') Redirect</h4>
                </div>
                <div class="card-block" dir="rtl" style="text-align: right">
                    <div class="col-lg-6">
                        <fieldset class="form-group">
                            <form action="{{ route('dashboard.redirects.store') }}" method="POST">
                                @csrf

                                @include('dashboard._layouts._error')
                                <div class="form-group">
                                    <label for="source_url">Source URL</label>
                                    <input type="text" name="source_url" class="form-control" placeholder="Enter source URL" required>
                                </div>

                                <div class="form-group">
                                    <label for="destination_url">Destination URL</label>
                                    <input type="url" name="destination_url" class="form-control" placeholder="Enter full destination URL" required>
                                </div>

                                <div class="form-group">
                                    <label for="status_code">Status Code</label>
                                    <select name="status_code" class="form-control">
                                        <option value="301">301 (Permanent Redirect)</option>
                                        <option value="302">302 (Temporary Redirect)</option>
                                        <option value="307">307 (Temporary Redirect)</option>
                                    </select>
                                </div>
                                <button class="btn btn-icon btn-info mr-1 mt-2">@lang('site.create') <i class="fa fa-save"
                                        style="position: relative"></i></button>
                            </form>
                        </fieldset>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Basic Inputs end -->
@endsection
