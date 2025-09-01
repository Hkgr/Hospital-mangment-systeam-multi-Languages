@extends('Dashboard.layouts.master')
@section('title')
{{ trans('Dashboard/RayEmployee.CompletedInvoices') }}
@stop
@section('css')


<link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet" />

@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{ trans('Dashboard/RayEmployee.CompletedInvoices') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('Dashboard/RayEmployee.Invoices') }}</span>
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoices as $invoice)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $invoice->created_at }}</td>
                                <td>
                                    <a href="{{ route('ray_patient_details', $invoice->patient_id) }}">
                                        {{ $invoice->Patient->name }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('ray_doctor_details', $invoice->doctor_id) }}">
                                        {{ $invoice->doctor->name }}
                                    </a>
                                </td>
                                <td>{{ $invoice->description }}</td>
                                <td>
                                    @if($invoice->case == 0)
                                    <span class="badge badge-danger">{{ trans('Dashboard/RayEmployee.UnderProcessing') }}</span>
                                    @else
                                    <span class="badge badge-success">{{ trans('Dashboard/RayEmployee.Completed') }}</span>
                                    @endif
                                </td>


                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- bd -->
        </div><!-- bd -->
    </div>
    <!--/div-->

    <!-- /row -->
</div>
<!-- row closed -->

<!-- Container closed -->

<!-- main-content closed -->
@endsection
@section('js')

<!--Internal  Notify js -->
<script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>

@endsection