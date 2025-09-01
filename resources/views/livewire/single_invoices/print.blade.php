@extends('Dashboard.layouts.master')
@section('title')
    {{ trans('invoices.PrintInvoices') }}
@stop
@section('css')
    <style>
        @media print {
            #print_Button {
                display: none;
            }
        }
    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('invoices.Invoices') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('invoices.PrintInvoices') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-md-12 col-xl-12">
            <div class=" main-content-body-invoice" id="print">
                <div class="card card-invoice">
                    <div class="card-body">
                        <div class="invoice-header">
                            <h1 class="invoice-title">{{ trans('invoices.SingleServiceInvoice') }}</h1>
                            <div class="billed-from">
                                <h6>{{ trans('invoices.SingleServiceInvoice') }}</h6>
                                <p>جامعة حلب الحرة<br>
                                    Tel No: 00905528779087<br>
                                    Email: info@moh.gov.sy</p>
                            </div><!-- billed-from -->
                        </div><!-- invoice-header -->
                        <div class="row mg-t-20">

                            <div class="col-md">
                                <label class="tx-gray-600">{{ trans('invoices.InvoiceInfo') }}</label>
                                {{--                                <p class="invoice-info-row"><span>اسم الخدمه</span> <span>{{$single_invoice->Service->name}}</span></p>--}}
                                {{--                                <p class="invoice-info-row"><span>اسم المريض</span> <span>{{$single_invoice->patient->name}}</span></p>--}}
                                <p class="invoice-info-row"><span>{{ trans('invoices.InvoiceDate') }}</span> <span>{{ Request::get('invoice_date') }}</span></p>
                                <p class="invoice-info-row"><span>{{ trans('invoices.Doctor') }}</span> <span></span>{{ Request::get('doctor_id') }}</p>
                                <p class="invoice-info-row"><span>{{ trans('invoices.Section') }}</span> <span></span>{{ Request::get('section_id') }}</p>
                            </div>
                        </div>
                        <div class="table-responsive mg-t-40">
                            <table class="table table-invoice border text-md-nowrap mb-0">
                                <thead>
                                <tr>
                                    <th class="wd-20p">#</th>
                                    <th class="wd-40p">{{ trans('invoices.ServiceName') }}</th>
                                    <th class="tx-center">{{ trans('invoices.ServicePrice') }}</th>
                                    <th class="tx-right">{{ trans('invoices.InvoiceType') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td class="tx-12">{{ Request::get('Service_id') }}</td>
                                    <td class="tx-center">{{ Request::get('price') }}</td>
                                    <td class="tx-right">{{ Request::get('type') == 1 ? trans('invoices.Cash') : trans('invoices.Credit') }}</td>
                                </tr>
                                <tr>
                                    <td class="valign-middle" colspan="2" rowspan="4">
                                        <div class="invoice-notes">
                                            <label class="main-content-label tx-13"></label>
                                        </div><!-- invoice-notes -->
                                    </td>
                                    <td class="tx-right">{{ trans('invoices.Total') }}</td>
                                    <td class="tx-right" colspan="2"> {{number_format(Request::get('price'), 2)}}</td>
                                </tr>
                                <tr>
                                    <td class="tx-right">{{ trans('invoices.DiscountValue') }}</td>
                                    <td class="tx-right" colspan="2">{{Request::get('discount_value')}}</td>
                                </tr>
                                <tr>
                                    <td class="tx-right">{{ trans('invoices.TaxRate') }}</td>
                                    <td class="tx-right" colspan="2">% {{Request::get('tax_rate')}}</td>
                                </tr>
                                <tr>
                                    <td class="tx-right tx-uppercase tx-bold tx-inverse">{{ trans('invoices.TotalWithTax') }}</td>
                                    <td class="tx-right" colspan="2">
                                        <h4 class="tx-primary tx-bold">{{number_format(Request::get('total_with_tax'), 2)}}</h4>

                                    </td>
                                </tr>
                                @if(Request::get('insurance_name'))
                                    <tr>
                                        <td class="tx-right">{{ trans('invoices.Insurance_Company') }}</td>
                                        <td class="tx-right" colspan="2">{{ Request::get('insurance_name') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="tx-right">{{ trans('invoices.Insurance_Share') }}</td>
                                        <td class="tx-right" colspan="2">{{ number_format(Request::get('insurance_amount'), 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="tx-right">{{ trans('invoices.Patient_Share') }}</td>
                                        <td class="tx-right" colspan="2">{{ number_format(Request::get('patient_amount'), 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="tx-right">{{ trans('invoices.Insurance_Discount') }}</td>
                                        <td class="tx-right" colspan="2">% {{ Request::get('insurance_discount') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="tx-right">{{ trans('invoices.Company_Rate') }}</td>
                                        <td class="tx-right" colspan="2">% {{ Request::get('company_rate') }}</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <hr class="mg-b-40">
                        <a href="#" class="btn btn-danger float-left mt-3 mr-2" id="print_Button" onclick="printDiv()">
                            <i class="mdi mdi-printer ml-1"></i>{{ trans('invoices.PrintButton') }}
                        </a>
                    </div>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{URL::asset('Admin/assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>


    <script type="text/javascript">
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>
@endsection
