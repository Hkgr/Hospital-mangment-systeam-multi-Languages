@extends('Dashboard.layouts.master')
@section('title')
    {{ trans('Dashboard/LaboratorieEmployee.DoctorAnalysisImages') }}
@stop
@section('css')
<link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet" />
@endsection
@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('Dashboard/LaboratorieEmployee.DoctorAnalysisImages') }}</h4>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover text-md-nowrap text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('Dashboard/LaboratorieEmployee.PatientName') }}</th>
                            <th>{{ trans('Dashboard/LaboratorieEmployee.Description') }}</th>
                            <th>{{ trans('Dashboard/LaboratorieEmployee.Status') }}</th>
                            <th>{{ trans('Dashboard/LaboratorieEmployee.Operations') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($laboratories as $lab)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ optional($lab->Patient)->name }}</td>
                                <td>{{ $lab->description }}</td>
                                <td>
                                    @if($lab->case == 0)
                                        <span class="badge badge-danger">{{ trans('Dashboard/LaboratorieEmployee.Incomplete') }}</span>
                                    @else
                                        <span class="badge badge-success">{{ trans('Dashboard/LaboratorieEmployee.Completed') }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-warning" href="{{ route('view_laboratories', $lab->id) }}">
                                        <i class="fas fa-binoculars"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="text-muted">{{ trans('Dashboard/LaboratorieEmployee.NoData') }}</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection

