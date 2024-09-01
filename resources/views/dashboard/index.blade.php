@extends('dashboard._layouts._app')
@section('head')
    <style>
        .card{
            padding-top: 35px;
            padding-bottom: 50px;
            padding-right: 5px;
            border-radius: 15px;
        }
    </style>
@endsection
@section('content')
    <div class="row" style="text-align: right; direction: rtl">
        <div class="col-xl-3 col-lg-6 col-md-12">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('dashboard.categories.index') }}" style="text-decoration: none; color: inherit;">
                            الأحياء
                            <span class="badge badge-light">{{ $categories }}</span>
                            <i class="fa fa-list-alt float-right"></i>
                        </a>
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-12">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('dashboard.projects.index') }}" style="text-decoration: none; color: inherit;">
                            المشاريع
                            <span class="badge badge-light">{{ $projects }}</span>
                            <i class="fa fa-building float-right"></i>
                        </a>
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-12">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('dashboard.setting.newsletter') }}" style="text-decoration: none; color: inherit;">
                            طلبات الانضمام
                            <span class="badge badge-light">{{ $newsLetter }}</span>
                            <i class="fa fa-home float-right"></i>
                        </a>
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-12">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('dashboard.setting.contact') }}" style="text-decoration: none; color: inherit;">
                            طلبات التواصل
                            <span class="badge badge-light">{{ $contacts }}</span>
                            <i class="fa fa-envelope float-right"></i>
                        </a>
                    </h5>
                </div>
            </div>
        </div>
    </div>
@endsection
