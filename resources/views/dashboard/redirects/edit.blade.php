@extends('dashboard._layouts._app')
@section('scripts')
<script src="{{asset('dashboard/js/image_preview.js')}}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('site.edit') Redirect</h4>
                </div>
                <div class="card-block" dir="rtl" style="text-align: right">
                    <div class="col-lg-6">
                        <fieldset class="form-group">
                            <form action="{{ route('dashboard.redirects.update', $redirect->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                @include('dashboard._layouts._error')
                                <div class="form-group">
                                    <label for="source_url">Source URL</label>
                                    <input type="text" name="source_url" class="form-control" value="{{ $redirect->source_url }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="destination_url">Destination URL</label>
                                    <input type="url" name="destination_url" class="form-control" value="{{ $redirect->destination_url }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="status_code">Status Code</label>
                                    <select name="status_code" class="form-control">
                                        <option value="301" {{ $redirect->status_code == 301 ? 'selected' : '' }}>301 (Permanent Redirect)</option>
                                        <option value="302" {{ $redirect->status_code == 302 ? 'selected' : '' }}>302 (Temporary Redirect)</option>
                                        <option value="307" {{ $redirect->status_code == 307 ? 'selected' : '' }}>307 (Temporary Redirect)</option>
                                    </select>
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
