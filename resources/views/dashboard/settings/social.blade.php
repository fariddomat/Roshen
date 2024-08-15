@extends('dashboard._layouts._app')

@section('content')
    <!-- Striped rows start -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">حسابات مواقع التواصل الاجتماعي</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            {{-- <li><a data-action="close"><i class="ft-x"></i></a></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="card-block" style="direction: rtl; text-align: right">

                    <form action="{{ route('dashboard.setting.settings') }}" method="POST">
                        @csrf
                        @method('post')
                        @include('dashboard._layouts._error')

                        <div class="row pr-2 pl-2">
                            @php
                            $social_sites=[ 'snapchat','twitter','instagram', 'whatsapp'];
                           @endphp
                           @foreach ($social_sites as $social_site)

                               {{-- client id --}}
                               <div class="form-group col-md-6">
                                 <label for="{{$social_site}}_link" class="text-capitalize">رابط {{$social_site}} </label>
                                 <input type="text" class="form-control" name="{{$social_site}}_link" id="{{$social_site}}_link"
                                   value="{{setting($social_site.'_link')}}" aria-describedby="helpId" placeholder="https://www.website.com/username">
                               </div>
                           @endforeach
                        </div>


                        <div class="form-group mr-2">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>حفظ</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Striped rows end -->
@endsection
