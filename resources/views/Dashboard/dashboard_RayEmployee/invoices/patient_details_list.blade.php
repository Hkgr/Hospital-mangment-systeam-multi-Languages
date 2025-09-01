@extends('Dashboard.layouts.master')
@section('title')
    {{ trans('Dashboard/RayEmployee.PatientDetails') }}
@stop
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('Dashboard/RayEmployee.PatientDetails') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('Dashboard/RayEmployee.XRayImages') }}</span>
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
                                <th>{{ trans('Dashboard/RayEmployee.InvoiceDate') }}</th>
                                <th>{{ trans('Dashboard/RayEmployee.PatientName') }}</th>
                                <th>{{ trans('Dashboard/RayEmployee.DoctorName') }}</th>
                                <th>{{ trans('Dashboard/RayEmployee.Description') }}</th>
                                <th>{{ trans('Dashboard/RayEmployee.InvoiceStatus') }}</th>
                                <th>{{ trans('Dashboard/RayEmployee.Operations') }}</th>
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
                                            <span class="badge badge-danger">{{ trans('Dashboard/RayEmployee.UnderProcessing') }}</span>
                                        @else
                                            <span class="badge badge-success">{{ trans('Dashboard/RayEmployee.Completed') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('ray_view_rays', $ray->id) }}" class="btn btn-sm btn-primary">{{ trans('Dashboard/RayEmployee.ViewImages') }}</a>
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