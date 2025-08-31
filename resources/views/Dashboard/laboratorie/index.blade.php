@extends('Dashboard.layouts.master')
@section('title')
    الكشوفات
@stop
@section('css')
<link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet" />
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">المختبر</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الكشوفات</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
@include('Dashboard.messages_alert')
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover text-md-nowrap text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم الخدمة</th>
                                <th>اسم الدكتور</th>
                                <th>اسم موظف المختبر</th>
                                <th>حالة الكشف</th>
                                <th>عرض التحليل</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($laboratories as $lab)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$lab->description}}</td>
                                <td>{{$lab->doctor->name}}</td>
                                <td>{{$lab->employee->name}}</td>
                                @if($lab->case == 0)
                                <td class="text-danger">غير مكتملة</td>
                                @else
                                <td class="text-success">مكتملة</td>
                                @endif
                                <td>
                                    <a class="btn btn-sm btn-warning" href="{{ route('admin.laboratorie.show', $lab->id) }}"><i class="fas fa-binoculars"></i></a>
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
