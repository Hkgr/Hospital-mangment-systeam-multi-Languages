@extends('Dashboard.layouts.master')

@section('css')
<!--Internal Sumoselect css-->
<link rel="stylesheet" href="{{ URL::asset('Dashboard/plugins/sumoselect/sumoselect-rtl.css') }}">
<link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
<!-- Internal Select2 css -->
<link href="{{ URL::asset('Dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
<!--Internal  Datetimepicker-slider css -->
<link href="{{ URL::asset('Dashboard/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css') }}" rel="stylesheet">
<link href="{{ URL::asset('Dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css') }}" rel="stylesheet">
<link href="{{ URL::asset('Dashboard/plugins/pickerjs/picker.min.css') }}" rel="stylesheet">
<!-- Internal Spectrum-colorpicker css -->
<link href="{{ URL::asset('Dashboard/plugins/spectrum-colorpicker/spectrum.css') }}" rel="stylesheet">
@endsection

@section('title')
اضف موعد
@stop

@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">المواعيد</h4>
            <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضف موعد</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')
@include('Dashboard.messages_alert')

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('appointments.store') }}" method="POST">
                    @csrf
                    <div class="pd-30 pd-sm-40 bg-gray-200">

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label for="patient_id">المريض</label>
                            </div>
                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <select id="patient_id" name="patient_id" class="form-control SlectBox">
                                    <option value="" selected>مريض جديد</option>
                                    @foreach($patients as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label for="name">اسم المريض</label>
                            </div>
                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <input id="name" class="form-control" name="name" type="text" autofocus>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label for="email">{{ trans('doctors.email') }}</label>
                            </div>
                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <input id="email" class="form-control" name="email" type="email"
                                    placeholder="البريد الالكتروني">
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label for="section_id">{{ trans('doctors.section') }}</label>
                            </div>
                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <select id="section_id" name="section_id" class="form-control SlectBox">
                                    <option value="" selected disabled>------</option>
                                    @foreach($Section as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label for="doctor_id">الدكتور</label>
                            </div>
                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <select id="doctor_id" name="doctor_id" class="form-control SlectBox">
                                    <option value="" selected disabled>------</option>
                                    @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label for="phone">رقم الهاتف</label>
                            </div>
                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <input id="phone" class="form-control" name="phone" type="text"
                                    placeholder="رقم الهاتف" required>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20 new-patient-field">
                            <div class="col-md-1">
                                <label for="Gender">الجنس</label>
                            </div>
                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <select id="Gender" class="form-control" name="Gender">
                                    <option value="">------</option>
                                    <option value="1">ذكر</option>
                                    <option value="2">انثي</option>
                                </select>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20 new-patient-field">
                            <div class="col-md-1">
                                <label for="Blood_Group">فصلية الدم</label>
                            </div>
                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <select id="Blood_Group" class="form-control" name="Blood_Group">
                                    <option value="">------</option>
                                    <option value="O-">O-</option>
                                    <option value="O+">O+</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                </select>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20 new-patient-field">
                            <div class="col-md-1">
                                <label for="Address">العنوان</label>
                            </div>
                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <textarea id="Address" class="form-control" name="Address"></textarea>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label for="notes">ملاحظات</label>
                            </div>
                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <textarea id="notes" class="form-control" name="notes" placeholder="ملاحظات"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5" type="submit">
                                <span class="txt">تأكيد</span>
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src); // free memory
        }
    };
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var patientSelect = document.getElementById('patient_id');
        var fields = document.querySelectorAll('.new-patient-field');

        function toggleFields() {
            var isNew = patientSelect.value === '';
            fields.forEach(function(row) {
                row.style.display = isNew ? '' : 'none';
                row.querySelectorAll('input, select, textarea').forEach(function(el) {
                    el.disabled = !isNew;
                });
            });
        }
        patientSelect.addEventListener('change', toggleFields);
        toggleFields();
    });
</script>
<!--Internal  Form-elements js-->
<script src="{{ URL::asset('Dashboard/js/select2.js') }}"></script>
<script src="{{ URL::asset('Dashboard/js/advanced-form-elements.js') }}"></script>

<!--Internal Sumoselect js-->
<script src="{{ URL::asset('Dashboard/plugins/sumoselect/jquery.sumoselect.js') }}"></script>

<!--Internal  Notify js -->
<script src="{{ URL::asset('dashboard/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('/plugins/notify/js/notifit-custom.js') }}"></script>

<!--Internal  Datepicker js -->
<script src="{{ URL::asset('dashboard/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
<!--Internal  jquery.maskedinput js -->
<script src="{{ URL::asset('dashboard/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{ URL::asset('dashboard/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
<!-- Internal Select2.min js -->
<script src="{{ URL::asset('dashboard/plugins/select2/js/select2.min.js') }}"></script>
<!--Internal Ion.rangeSlider.min js -->
<script src="{{ URL::asset('dashboard/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{ URL::asset('dashboard/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
<!-- Ionicons js -->
<script src="{{ URL::asset('dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
<!--Internal  pickerjs js -->
<script src="{{ URL::asset('dashboard/plugins/pickerjs/picker.min.js') }}"></script>
<!-- Internal form-elements js -->
<script src="{{ URL::asset('dashboard/js/form-elements.js') }}"></script>
@endsection