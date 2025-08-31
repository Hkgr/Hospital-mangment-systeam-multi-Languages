@extends('Dashboard.layouts.master')

@section('css')
<link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection

@section('title')
{{ trans('sections_trans.add_sections') }}
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{ trans('sections_trans.add_sections') }}</h4>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')

@include('Dashboard.messages_alert')

<!-- row -->
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('Sections.store') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label>{{ trans('sections_trans.name_sections') }}</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col">
                            <label>{{ trans('sections_trans.description') }}</label>
                            <textarea class="form-control" name="description" rows="4"></textarea>
                        </div>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-success">
                        {{ trans('sections_trans.submit') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script src="{{ URL::asset('dashboard/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection