@extends('Dashboard.layouts.master')
@section('title')
    تفاصيل الدكتور
@stop
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">تفاصيل الدكتور</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ صور الاشعة</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>تاريخ الفاتورة</th>
                                <th>اسم المريض</th>
                                <th>اسم الدكتور</th>
                                <th>المطلوب</th>
                                <th>حالة الفاتورة</th>
                                <th>العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rays as $ray)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ray->created_at }}</td>
                                    <td>{{ $ray->Patient->name }}</td>
                                    <td>{{ $ray->doctor->name }}</td>
                                    <td>{{ $ray->description }}</td>
                                    <td>
                                        @if($ray->case == 0)
                                            <span class="badge badge-danger">تحت الاجراء</span>
                                        @else
                                            <span class="badge badge-success">مكتملة</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('ray_view_rays', $ray->id) }}" class="btn btn-sm btn-primary">عرض الصور</a>
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
    <!-- /row -->
@endsection
@section('js')
@endsection