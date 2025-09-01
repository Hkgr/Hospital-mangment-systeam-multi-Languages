@extends('Dashboard.layouts.master')
@section('css')
<link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet" />
@endsection
@section('page-header')
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{ trans('Dashboard/AmbulanceCalls.Ambulance') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('Dashboard/AmbulanceCalls.Calls') }}</span>
        </div>
    </div>
</div>
@endsection
@section('content')
@include('Dashboard.messages_alert')
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('Dashboard/AmbulanceCalls.Phone') }}</th>
                                <th>{{ trans('Dashboard/AmbulanceCalls.CallTime') }}</th>
                                <th>{{ trans('Dashboard/AmbulanceCalls.AmbulanceCar') }}</th>
                                <th>{{ trans('Dashboard/AmbulanceCalls.Address') }}</th>
                                <th>{{ trans('Dashboard/AmbulanceCalls.Status') }}</th>
                                <th>{{ trans('Dashboard/AmbulanceCalls.Operations') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($calls as $call)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$call->phone}}</td>
                                <td>{{$call->call_time}}</td>
                                <td>{{$call->ambulance?->car_number}}</td>
                                <td>{{$call->address}}</td>
                                <td>
                                    @switch($call->status)
                                    @case('first_aid') {{ trans('Dashboard/AmbulanceCalls.FirstAid') }} @break
                                    @case('transfer_to_hospital') {{ trans('Dashboard/AmbulanceCalls.TransferToHospital') }} @break
                                    @case('transfer_to_another_hospital') {{ trans('Dashboard/AmbulanceCalls.TransferToAnotherHospital') }} @break
                                    @default {{ trans('Dashboard/AmbulanceCalls.Unknown') }}
                                    @endswitch
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">+</button>
                                        <div class="dropdown-menu">
                                            <form action="{{route('AmbulanceCalls.updateStatus',[$call->id,'first_aid'])}}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button class="dropdown-item">🩹 {{ trans('Dashboard/AmbulanceCalls.FirstAid') }}</button>
                                            </form>
                                            <form action="{{route('AmbulanceCalls.updateStatus',[$call->id,'transfer_to_hospital'])}}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button class="dropdown-item">🏥 {{ trans('Dashboard/AmbulanceCalls.TransferToHospital') }}</button>
                                            </form>
                                            <form action="{{route('AmbulanceCalls.updateStatus',[$call->id,'transfer_to_another_hospital'])}}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button class="dropdown-item">🏨 {{ trans('Dashboard/AmbulanceCalls.TransferToAnotherHospital') }}</button>
                                            </form>
                                            <form action="{{route('AmbulanceCalls.destroy',$call->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item">🗑️ {{ trans('Dashboard/AmbulanceCalls.Delete') }}</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection