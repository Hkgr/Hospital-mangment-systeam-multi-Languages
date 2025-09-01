@extends('Dashboard.layouts.master')
@section('css')
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{ trans('Dashboard/Patient.Patient') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('Dashboard/Patient.Records') }}</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-body">
                <div class="vtimeline">
                    @foreach($records as $record)
                    <div class="timeline-wrapper {{ $loop->first ? '' : 'timeline-inverted' }} timeline-wrapper-primary">
                        <div class="timeline-badge"><i class="las la-check-circle"></i></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h6 class="timeline-title">{{$record->diagnosis}}</h6>
                            </div>
                            <div class="timeline-body">
                                <p>{{$record->medicine}}</p>
                            </div>
                            <div class="timeline-footer d-flex align-items-center flex-wrap">
                                <i class="fas fa-user-md"></i>&nbsp;
                                <span>{{$record->Doctor->name}}</span>
                                <span class="mr-auto"><i class="fe fe-calendar text-muted mr-1"></i>{{$record->date}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Row -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
@endsection