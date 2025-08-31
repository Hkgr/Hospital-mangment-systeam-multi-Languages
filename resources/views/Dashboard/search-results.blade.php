@extends('Dashboard.layouts.master')

@section('title')
    نتائج البحث
@stop

@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">نتائج البحث</h4>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            @if($q)
                <h5 class="mb-4">نتائج البحث عن: {{ $q }}</h5>
            @endif

            @if($doctors->count())
                <h6>الأطباء</h6>
                <ul>
                    @foreach($doctors as $doctor)
                        <li>
                            <a href="{{ route('Doctors.show', $doctor->id) }}">{!! str_ireplace($q, '<mark>'.$q.'</mark>', $doctor->name) !!}</a>
                        </li>
                    @endforeach
                </ul>
            @endif

            @if($patients->count())
                <h6>المرضى</h6>
                <ul>
                    @foreach($patients as $patient)
                        <li>
                            <a href="{{ route('Patients.show', $patient->id) }}">{!! str_ireplace($q, '<mark>'.$q.'</mark>', $patient->name) !!}</a>
                        </li>
                    @endforeach
                </ul>
            @endif

            @if(isset($sections) && $sections->count())
                <h6>الأقسام</h6>
                <ul>
                    @foreach($sections as $section)
                        <li>
                            <a href="{{ route('Sections.index') }}">{!! str_ireplace($q, '<mark>'.$q.'</mark>', $section->name) !!}</a>
                        </li>
                    @endforeach
                </ul>
            @endif

            @if(isset($services) && $services->count())
                <h6>الخدمات</h6>
                <ul>
                    @foreach($services as $service)
                        <li>
                            <a href="{{ route('Service.index') }}">{!! str_ireplace($q, '<mark>'.$q.'</mark>', $service->name) !!}</a>
                        </li>
                    @endforeach
                </ul>
            @endif

            @if(isset($insurances) && $insurances->count())
                <h6>شركات التأمين</h6>
                <ul>
                    @foreach($insurances as $insurance)
                        <li>
                            <a href="{{ route('insurance.index') }}">{!! str_ireplace($q, '<mark>'.$q.'</mark>', $insurance->name) !!}</a>
                        </li>
                    @endforeach
                </ul>
            @endif

            @if(isset($rayEmployees) && $rayEmployees->count())
                <h6>موظفو الأشعة</h6>
                <ul>
                    @foreach($rayEmployees as $emp)
                        <li>
                            <a href="{{ route('ray_employee.index') }}">{!! str_ireplace($q, '<mark>'.$q.'</mark>', $emp->name) !!}</a>
                        </li>
                    @endforeach
                </ul>
            @endif

            @if(isset($laboratorieEmployees) && $laboratorieEmployees->count())
                <h6>موظفو المخبر</h6>
                <ul>
                    @foreach($laboratorieEmployees as $emp)
                        <li>
                            <a href="{{ route('laboratorie_employee.index') }}">{!! str_ireplace($q, '<mark>'.$q.'</mark>', $emp->name) !!}</a>
                        </li>
                    @endforeach
                </ul>
            @endif

            @if(!$doctors->count() && !$patients->count() && (!isset($sections) || !$sections->count()) && (!isset($services) || !$services->count()) && (!isset($insurances) || !$insurances->count()) && (!isset($rayEmployees) || !$rayEmployees->count()) && (!isset($laboratorieEmployees) || !$laboratorieEmployees->count()))
                <p>لا توجد نتائج</p>
            @endif
        </div>
    </div>
@endsection
