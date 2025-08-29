@extends('Dashboard.layouts.master')
@section('css')
<link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet" />
@endsection
@section('page-header')
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الاسعاف</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ مكالمات الاسعاف</span>
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
                                <th>رقم الاتصال</th>
                                <th>زمن الاتصال</th>
                                <th>سيارة الاسعاف</th>
                                <th>عنوان الاتصال</th>
                                <th>الحالة</th>
                                <th>العمليات</th>
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
                                    @case('first_aid') اسعاف اولي @break
                                    @case('transfer_to_hospital') نقل الى المشفى @break
                                    @case('transfer_to_another_hospital') نقل الى مشفى اخر @break
                                    @default غير معروف
                                    @endswitch
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">+</button>
                                        <div class="dropdown-menu">
                                            <form action="{{route('AmbulanceCalls.updateStatus',[$call->id,'first_aid'])}}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button class="dropdown-item">🩹 اسعاف اولي</button>
                                            </form>
                                            <form action="{{route('AmbulanceCalls.updateStatus',[$call->id,'transfer_to_hospital'])}}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button class="dropdown-item">🏥 تحويل الى قسم داخل المشفى</button>
                                            </form>
                                            <form action="{{route('AmbulanceCalls.updateStatus',[$call->id,'transfer_to_another_hospital'])}}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button class="dropdown-item">🏨 تحويل الى مشفى اخر</button>
                                            </form>
                                            <form action="{{route('AmbulanceCalls.destroy',$call->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item">🗑️ حذف</button>
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