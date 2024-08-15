@extends('home._layouts._app')

@section('style')
    <style>
        .aProject:hover {
            text-decoration: none;
            color: #2f2e33;
        }

        @media only screen and (max-width: 600px) {
            .table-responsive {
                border: none !important;
                border-bottom: 1px solid #ddd !important;
            }

            .tab-content {
                padding: 30px 0 !important;
            }

            .container-fluid {
                padding: 0 !important;
            }

            td {
                width: auto !important;
                font-size: 7px !important;
                margin: 2px;

            }

            td.back {
                font-size: 7px !important;
                width: auto !important;
                max-width: 180px;
            }

            td:first-child {
                left: : 0px !important;
                width: auto !important;
                box-shadow: none !important;
            }

            h1,
            .h1 {
                font-size: 1.77em;
            }
        }
    </style>
@endsection

@section('content')
    <section class="short-image no-padding agency margin-top-135">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-12 short-image-title">
                    <h5 class="subtitle-margin second-color">AlQodsi</h5>
                    <h1 class="second-color">تحديثات المشاريع</h1>
                    <div class="short-title-separator"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-light section-top-shadow " style="margin-top: 0">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-12">
                    <h4 class="title-negative-margin">Tabs<span class="special-color">.</span></h4>
                    <div class="title-separator-primary"></div>
                    <div class="margin-top-60 apartment-tabs">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            @foreach ($categories as $index => $category)
                                <li role="presentation" class="@if ($index == 0) active @endif">
                                    <a href="#{{ $category->id }}" aria-controls="{{ $category->id }}" role="tab"
                                        data-toggle="tab">
                                        <span>{{ $category->name }}</span>
                                        <div class="button-triangle2"></div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            @foreach ($categories as $index => $category)
                                <div role="tabpanel" class="tab-pane @if ($index == 0) active @endif"
                                    id="{{ $category->id }}">
                                    @if ($category->projects->count() == 0)
                                        <h2>لا يوجد تحديثات في هذا التصنيف بعد</h2>
                                    @endif
                                    @foreach ($category->projects as $index2 => $project)
                                        {{-- Apartments Reservation --}}
                                        <div class="row">
                                            @if ($project->floors->count() > 0)
                                                <!-- apartment check Area-->
                                                <div class="room-details-area pt-100 pb-70  ">
                                                    <div class="container-fluid m-0 p-0">
                                                        <div class="section-title-two text-center">
                                                            <div class="row margin-top-60">
                                                                <div class="col-xs-12 col-lg-12 text-center">
                                                                    <h1 class=""><a
                                                                            href="{{ route('project', $project->id) }}"
                                                                            class="aProject">{{ $project->name }}<span
                                                                                class="special-color">.</span></a></h1>
                                                                </div>
                                                                <div
                                                                    class="col-xs-8 col-xs-offset-2 col-sm-offset-4 col-sm-4">
                                                                    <div class="title-separator-primary2"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="container margin-top-30"
                                                            style="color: white; width: 100%">
                                                            <div class="table-responsive">



                                                                <table class="table mt-2 center"
                                                                    style="
                                    width: 100%;
                                    margin-bottom: 35px;">
                                                                    @if ($project->FloorRow($project->floors_count)->count() > 0)
                                                                        <tr style="justify-content: center">
                                                                            <td style="color: #2f2e33; border-top: none; ">

                                                                            </td>
                                                                            @foreach ($project->FloorRow($project->floors_count) as $key => $floor)
                                                                                <td
                                                                                    class=" @if ($floor->status == 'متاح') td1
                                                            @elseif ($floor->status == 'محجوز')
                                                            td2
                                                            @else
                                                            td3 @endif">
                                                                                    {{-- {{ $floor->apartment->count() }} --}}
                                                                                    {{ $floor->apartment->type }}
                                                                                    {{-- -
                                                            {{ $floor->apartment->code }} --}}
                                                                                </td>

                                                                                {{-- @if ($key == 0)
                                                              <td
                                                            style="width: 33% !important; color:transparent!important;box-shadow: none !important; translate: 0px 24px;">
                                                            .</td>
                                                             @endif --}}
                                                                            @endforeach
                                                                        </tr>
                                                                    @endif

                                                                    @for ($i = $project->floors_count - 1; $i >= 1; $i--)
                                                                        <tr style="justify-content: center">
                                                                            <td style="color: #2f2e33; border-top: none">
                                                                                الدور {{ $i }}
                                                                            </td>
                                                                            @php
                                                                                $check = false;
                                                                            @endphp
                                                                            @foreach ($project->FloorRow($i) as $key => $floor)
                                                                                {{-- @if ($key == $project->FloorRow($i)->count() - 1 && $floor->apartment->type == 'أمامية' && $project->backCount2($i) > 0)
                                                        <td class="m2">.</td>
                                                    @endif --}}

                                                                                {{-- @if (!$check && $floor->apartment->type == 'خلفية')
                                                        <td class="m1">.</td>
                                                    @endif --}}
                                                                                <td style="   border-radius: @if ($key == 0) 0 15px 15px 0px
                                                    @elseif ($key == $project->FloorRow($i)->count() - 1)
                                                    15px 0 0 15px @endif;
                                                    @if ($project->backCount2($i) == 1 && $check == false && $floor->apartment->type == 'خلفية') width:260px !important; @endif
                                                    "
                                                                                    class=" @if ($floor->status == 'متاح') td1
                                                    @elseif ($floor->status == 'محجوز')
                                                    td2
                                                    @else
                                                    td3 @endif @if ($floor->apartment->type == 'خلفية') back @endif">
                                                                                    {{ $floor->apartment->type }}
                                                                                    {{ $floor->apartment->code }}
                                                                                </td>


                                                                                {{-- @if ($project->backCount2($i) == 2 && $check == false && $floor->apartment->type == 'خلفية')
                                                        @php
                                                            $check = true;
                                                        @endphp
                                                        <td
                                                            style="color: transparent; width: 10px !important; border:none !important; box-shadow: none !important;">
                                                            .</td>
                                                    @endif --}}
                                                                            @endforeach
                                                                        </tr>
                                                                    @endfor
                                                                </table>


                                                            </div>
                                                            <div style="text-align: center">

                                                                {{-- <img src="{{ asset('1.png') }}" style="width: 60%; min-width: 300px; margin-top: 5px"> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End -->
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
