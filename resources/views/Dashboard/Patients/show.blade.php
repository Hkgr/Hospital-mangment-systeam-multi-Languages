@extends('Dashboard.layouts.master')
@section('css')

@endsection
@section('title')
معلومات المريض
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">سجل المرضى</h4><span
                class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{$Patient->name}}</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row opened -->
<div class="row row-sm">
    <div class="col-lg-12 col-md-12">
        <div class="card" id="basic-alert">
            <div class="card-body">
                <div class="text-wrap">
                    <div class="example">
                        <div class="panel panel-primary tabs-style-1">
                            <div class=" tab-menu-heading">
                                <div class="tabs-menu1">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs main-nav-line">
                                        <li class="nav-item"><a href="#tab1" class="nav-link active"
                                                data-toggle="tab">معلومات المريض</a></li>
                                        <li class="nav-item"><a href="#tab2" class="nav-link" data-toggle="tab">الفواتير</a>
                                        </li>
                                        <li class="nav-item"><a href="#tab3" class="nav-link" data-toggle="tab">المدفوعات</a>
                                        </li>
                                        <li class="nav-item"><a href="#tab4" class="nav-link" data-toggle="tab">كشف
                                                حساب</a></li>
                                        <li class="nav-item"><a href="#tab5" class="nav-link" data-toggle="tab">الاشعه</a>
                                        </li>
                                        <li class="nav-item"><a href="#tab6" class="nav-link" data-toggle="tab">المختبر</a>
                                        </li>
                                        <li class="nav-item"><a href="#tab7" class="nav-link" data-toggle="tab">المواعيد</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#tab8" class="nav-link" data-toggle="tab">التشخيص</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
                                <div class="tab-content">


                                    {{-- Strat Show Information Patient --}}

                                    <div class="tab-pane active" id="tab1">
                                        <br>
                                        <div class="table-responsive">
                                            <table class="table table-hover text-md-nowrap text-center">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>اسم المريض</th>
                                                        <th>رقم الهاتف</th>
                                                        <th>البريد الالكتورني</th>
                                                        <th>تاريخ الميلاد</th>
                                                        <th>النوع</th>
                                                        <th>فصيلة الدم</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>{{$Patient->name}}</td>
                                                        <td>{{$Patient->Phone}}</td>
                                                        <td>{{$Patient->email}}</td>
                                                        <td>{{$Patient->Date_Birth}}</td>
                                                        <td>{{$Patient->Gender == 1 ? '`ذكر' :  'انثي'}}</td>
                                                        <td>{{$Patient->Blood_Group}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    {{-- End Show Information Patient --}}



                                    {{-- Start Invices Patient --}}

                                    <div class="tab-pane" id="tab2">

                                        <div class="table-responsive">
                                            <table class="table table-hover text-md-nowrap text-center">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>اسم الخدمه</th>
                                                        <th>تاريخ الفاتوره</th>
                                                        <th>الاجمالي مع الضريبه</th>
                                                        <th>شركة التأمين</th>
                                                        <th>حصة المريض</th>
                                                        <th>حصة التأمين</th>
                                                        <th>نوع الفاتوره</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($invoices as $invoice)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$invoice->Service->name ?? $invoice->Group->name}}</td>
                                                        <td>{{$invoice->invoice_date}}</td>
                                                        <td>{{ number_format($invoice->total_with_tax, 2) }}</td>
                                                        <td>{{ optional($invoice->insurance)->name }}</td>
                                                        <td>{{ number_format($invoice->patient_amount, 2) }}</td>
                                                        <td>{{ $invoice->insurance_id ? number_format($invoice->insurance_amount, 2) : '--' }}</td>
                                                        <td>{{$invoice->type == 1 ? 'نقدي' : 'اجل'}}</td>
                                                    </tr>
                                                    <br>
                                                    @endforeach
                                                    <tr>
                                                        <th colspan="5" scope="row" class="alert alert-success">
                                                            الاجمالي
                                                        </th>
                                                        <td class="alert alert-primary">{{ number_format($invoices->sum('patient_amount'), 2) }}</td>
                                                        <td class="alert alert-primary">{{ number_format($invoices->sum('insurance_amount'), 2) }}</td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    {{-- End Invices Patient --}}



                                    {{-- Start Receipt Patient  --}}

                                    <div class="tab-pane" id="tab3">
                                        <div class="table-responsive">
                                            <table class="table table-hover text-md-nowrap text-center">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>تاريخ الاضافه</th>
                                                        <th>المبلغ</th>
                                                        <th>البيان</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($receipt_accounts as $receipt_account)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$receipt_account->date}}</td>
                                                        <td>{{$receipt_account->amount}}</td>
                                                        <td>{{$receipt_account->description}}</td>
                                                    </tr>
                                                    <br>
                                                    @endforeach
                                                    <tr>
                                                        <th scope="row" class="alert alert-success">الاجمالي
                                                        </th>
                                                        <td colspan="4"
                                                            class="alert alert-primary">{{ number_format( $receipt_accounts->sum('amount') , 2)}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    {{-- End Receipt Patient  --}}


                                    {{-- Start payment accounts Patient --}}
                                    <div class="tab-pane" id="tab4">
                                        <div class="table-responsive">
                                            <table class="table table-hover text-md-nowrap text-center" id="example1">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>تاريخ الاضافه</th>
                                                        <th>الوصف</th>
                                                        <th>مدبن</th>
                                                        <th>دائن</th>
                                                        <th>الرصيد النهائي</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($Patient_accounts as $Patient_account)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$Patient_account->date}}</td>
                                                        <td>
                                                            @if($Patient_account->invoice_id == true)
                                                            {{$Patient_account->invoice->Service->name ?? $Patient_account->invoice->Group->name }}

                                                            @elseif($Patient_account->receipt_id == true)
                                                            {{$Patient_account->ReceiptAccount->description}}

                                                            @elseif($Patient_account->Payment_id == true)
                                                            {{$Patient_account->PaymentAccount->description}}
                                                            @endif

                                                        </td>
                                                        <td>{{ $Patient_account->Debit}}</td>
                                                        <td>{{ $Patient_account->credit}}</td>
                                                        <td></td>
                                                    </tr>
                                                    <br>
                                                    @endforeach
                                                    <tr>
                                                        <th colspan="3" scope="row" class="alert alert-success">
                                                            الاجمالي
                                                        </th>
                                                        <td class="alert alert-primary">{{ number_format( $Debit = $Patient_accounts->sum('Debit'), 2) }}</td>
                                                        <td class="alert alert-primary">{{ number_format( $credit = $Patient_accounts->sum('credit'), 2) }}</td>
                                                        <td class="alert alert-danger">
                                                            <span class="text-danger"> {{$Debit - $credit}} {{ $Debit-$credit > 0 ? 'مدين' :'دائن'}}</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>

                                        <br>

                                    </div>

                                    {{-- End payment accounts Patient --}}

                                    {{-- Start Appointments Patient --}}
                                    <div class="tab-pane" id="tab7">
                                        <div class="table-responsive">
                                            <table class="table table-hover text-md-nowrap text-center">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>الطبيب</th>
                                                        <th>تاريخ الموعد</th>
                                                        <th>الحالة</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($appointments as $appointment)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $appointment->doctor->name ?? '' }}</td>
                                                        <td>{{ $appointment->appointment }}</td>
                                                        <td>{{ $appointment->type }}</td>
                                                    </tr>
                                                    <br>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{-- End Appointments Patient --}}


                                    <div class="tab-pane" id="tab5">
                                        <div class="table-responsive">
                                            <table class="table table-hover text-md-nowrap text-center">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>المطلوب</th>
                                                        <th>اسم الدكتور</th>
                                                        <th>اسم دكتور الأشعة</th>
                                                        <th>ملاحظة دكتور الأشعة</th>
                                                        <th>العمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($rays as $ray)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $ray->description }}</td>
                                                        <td>{{ $ray->doctor->name }}</td>
                                                        <td>{{ $ray->employee->name }}</td>
                                                        <td>{{ $ray->description_employee }}</td>
                                                        <td>
                                                            @if($ray->employee_id !== null)
                                                            <a class="btn btn-primary btn-sm"
                                                                href="{{ route('admin.rays.view', $ray->id) }}">
                                                                عرض الأشعة
                                                            </a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab6">
                                        <div class="table-responsive">
                                            <table class="table table-hover text-md-nowrap text-center">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>المطلوب</th>
                                                        <th>اسم الدكتور</th>
                                                        <th>اسم دكتور المختبر</th>
                                                        <th>ملاحظة المختبر</th>
                                                        <th>العمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($laboratories as $lab)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $lab->description }}</td>
                                                        <td>{{ $lab->doctor->name }}</td>
                                                        <td>{{ $lab->employee->name }}</td>
                                                        <td>{{ $lab->description_employee }}</td>
                                                        <td>
                                                            @if($lab->employee_id !== null)
                                                            <a class="btn btn-primary btn-sm"
                                                                href="{{ route('admin.laboratories.view', $lab->id) }}">
                                                                عرض التحليل
                                                            </a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab8">
                                        <br>
                                        <div class="vtimeline">
                                            @foreach($patient_records as $patient_record)
                                            <div class="timeline-wrapper {{ $loop->iteration % 2 == 0 ? 'timeline-inverted' : '' }} timeline-wrapper-primary">
                                                <div class="timeline-badge"><i class="las la-check-circle"></i></div>
                                                <div class="timeline-panel">
                                                    <div class="timeline-heading">
                                                        <h6 class="timeline-title">{{$patient_record->diagnosis}}</h6>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <p>{{$patient_record->medicine}}</p>
                                                    </div>
                                                    <div class="timeline-footer d-flex align-items-center flex-wrap">
                                                        <i class="fas fa-user-md"></i>&nbsp;
                                                        <span>{{$patient_record->Doctor->name}}</span>
                                                        <span class="mr-auto">
                                                            <i class="fe fe-calendar text-muted mr-1"></i>{{$patient_record->date}}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Prism Precode -->
                </div>
            </div>
        </div>
    </div>


</div>
</div>
<!-- /row -->
</div>
<!-- Container closed -->
</div>
@endsection
@section('js')
@endsection