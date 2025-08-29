@extends('Dashboard.layouts.master')
@section('title')
    تفاصيل المريض
@stop
@section('css')
<link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                @if(isset($patient))
                    <h4 class="content-title mb-0 my-auto">بيانات المريض</h4>
                    <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ $patient->name }}</span>
                @elseif(isset($laboratorie))
                    <h4 class="content-title mb-0 my-auto">صور التحاليل</h4>
                    <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ $laboratorie->Patient->name }}</span>
                @endif
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if(isset($patient))
        <div class="card">
            <div class="card-body">
                <h5 class="mb-3">قائمة التحاليل للمريض: {{ $patient->name }}</h5>
                <div class="table-responsive">
                    <table class="table table-hover text-md-nowrap text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الوصف</th>
                                <th>الطبيب</th>
                                <th>الحالة</th>
                                <th>إجراء</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($patient_Laboratories as $lab)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $lab->description }}</td>
                                    <td>{{ optional($lab->doctor)->name }}</td>
                                    <td>
                                        @if($lab->case == 0)
                                            <span class="badge badge-danger">غير مكتمل</span>
                                        @else
                                            <span class="badge badge-success">مكتمل</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" href="{{ route('view_laboratories', $lab->id) }}">
                                            <i class="fas fa-binoculars"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="5" class="text-muted">لا توجد تحاليل</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @elseif(isset($laboratorie))
        <div class="form-group">
            <label for="exampleFormControlTextarea1">تعليق فني المختبر</label>
            <textarea readonly class="form-control" id="exampleFormControlTextarea1" rows="3">{{$laboratorie->description_employee}}</textarea>
        </div>

        <div class="demo-gallery">
            <ul id="lightgallery" class="list-unstyled row row-sm pr-0">
                @foreach($laboratorie->images as $image)
                    <li class="col-sm-6 col-lg-4" data-responsive="{{URL::asset('Dashboard/img/laboratories/'.$image->filename)}}" data-src="{{URL::asset('Dashboard/img/laboratories/'.$image->filename)}}">
                        <a href="#">
                            <img width="50px" height="350px" class="img-responsive" src="{{URL::asset('Dashboard/img/laboratories/'.$image->filename)}}" alt="NoImg">
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
@section('js')
<script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
