
@extends('Dashboard.layouts.master')
@section('title')
    {{trans('main-sidebar_trans.Single_service')}}
@stop
@section('css')
    <!--Internal   Notify -->
    <link href="{{URL::asset('Dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('main-sidebar_trans.Services')}}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('main-sidebar_trans.Single_service')}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.messages_alert')
    <!-- row -->
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">
                            {{trans('Insurance.add_insurances')}}
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example2">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th> {{trans('Insurance.name')}}</th>
                                <th> {{trans('Insurance.insurance_code')}}</th>
                                <th> {{trans('Insurance.discount_percentage')}}</th>
                                <th> {{trans('Insurance.company_rate')}}</th>
                                <th> {{trans('doctor.status')}}</th>
                                <th> {{trans('Insurance.note')}}</th>
                                <th>{{trans('Services.created_at')}}</th>
                                <th>{{trans('doctor.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Insurances as $Insurance)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$Insurance->name}}</td>
                                    <td>{{$Insurance->insurance_code}}</td>
                                    <td>{{$Insurance->discount_percentage}}</td>
                                    <td>{{$Insurance->company_rate}}</td>
                                    <td>
                                        <div
                                            class="dot-label bg-{{$Insurance->status == 1 ? 'success':'danger'}} ml-1"></div>
                                        {{$Insurance->status == 1 ? trans('doctor.Enabled'):trans('doctor.Not_enabled')}}
                                    </td>
                                    <td> {{ Str::limit($Insurance->note, 50) }}</td>
                                    <td>{{ $Insurance->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                           data-toggle="modal" href="#edit{{$Insurance->id}}"><i
                                                class="las la-pen"></i></a>
                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                           data-toggle="modal" href="#delete{{$Insurance->id}}"><i
                                                class="las la-trash"></i></a>
                                    </td>
                                </tr>

                                @include('Dashboard.Services.Insurance.edit')
                                @include('Dashboard.Services.Insurance.delete')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->

    @include('Dashboard.Services.Insurance.add')
    <!-- /row -->

    </div>
    <!-- row closed -->

    <!-- Container closed -->

    <!-- main-content closed -->
@endsection
@section('js')

@endsection
