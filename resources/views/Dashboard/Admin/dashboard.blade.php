@extends('Dashboard.layouts.master')
@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('Dashboard/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('Dashboard/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="left-content">
		<div>
			<h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">لوحة التحكم</h2>
		</div>
	</div>
	<div class="main-dashboard-header-right">
		<div>
			<label class="tx-13">عدد الخدمات المفردة</label>
			<h5>{{App\Models\Service::count()}}</h5>
		</div>
		<div>
			<label class="tx-13">عدد الخدمات المجمعة</label>
			<h5>{{App\Models\Group::count()}}</h5>
		</div>
	</div>
</div>
<!-- /breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row row-sm">
	<div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
		<div class="card overflow-hidden sales-card bg-primary-gradient">
			<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
				<div class="">
					<h6 class="mb-3 tx-12 text-white">عدد الاطباء</h6>
				</div>
				<div class="pb-0 mt-0">
					<div class="d-flex">
						<div class="">
							<h4 class="tx-20 font-weight-bold mb-1 text-white">{{App\Models\Doctor::count()}}</h4>
						</div>
					</div>
				</div>
			</div>
			<span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
		</div>
	</div>
	<div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
		<div class="card overflow-hidden sales-card bg-danger-gradient">
			<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
				<div class="">
					<h6 class="mb-3 tx-12 text-white">عدد المرضي</h6>
				</div>
				<div class="pb-0 mt-0">
					<div class="d-flex">
						<div class="">
							<h4 class="tx-20 font-weight-bold mb-1 text-white">{{App\Models\Patient::count()}}</h4>
						</div>
					</div>
				</div>
			</div>
			<span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
		</div>
	</div>
	<div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
		<div class="card overflow-hidden sales-card bg-success-gradient">
			<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
				<div class="">
					<h6 class="mb-3 tx-12 text-white">عدد الاقسام</h6>
				</div>
				<div class="pb-0 mt-0">
					<div class="d-flex">
						<div class="">
							<h4 class="tx-20 font-weight-bold mb-1 text-white">{{App\Models\Section::count()}}</h4>
						</div>
					</div>
				</div>
			</div>
			<span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
		</div>
	</div>
</div>
<!-- row closed -->

<!-- row opened -->
<div class="row row-sm">

	<div class="col-md-12 col-lg-4 col-xl-4">
		<div class="card">
			<div class="card-header pb-1">
				<h3 class="card-title mb-2">أخر المرضى المسجلين</h3>
				<p class="tx-12 mb-0 text-muted">المرضى المسجلين من قسم الاستقبال</p>
			</div>
			<div class="card-body p-0 customers mt-1">
				<div class="list-group list-lg-group list-group-flush">
					@foreach($recentPatients as $patient)
					<div class="list-group-item list-group-item-action" href="#">
						<div class="media mt-0">
							@if($patient->image && $patient->image->filename)
							<img class="avatar-lg rounded-circle ml-3 my-auto" src="{{ URL::asset('Dashboard/img/patients/'.$patient->image->filename) }}" alt="Image description">
							@else
							<img class="avatar-lg rounded-circle ml-3 my-auto" src="{{ URL::asset('assets/img/faces/6.jpg') }}" alt="Image description">
							@endif
							<div class="media-body">
								<div class="d-flex align-items-center">
									<div class="mt-0">
									<h5 class="mb-1 tx-15">
										<a href="{{ route('Patients.show', $patient->id) }}" class="text-primary">
											{{ $patient->name }}
										</a>
									</h5>
										@php
										$invoice = App\Models\Invoice::where('patient_id', $patient->id)->latest()->first();
										$statusClasses = [1 => 'text-danger', 2 => 'text-warning', 3 => 'text-success'];
										$statusTexts = [1 => 'Pending', 2 => 'Review', 3 => 'Paid'];
										$currentStatus = $invoice->invoice_status ?? null;
										@endphp
										<p class="mb-0 tx-13 text-muted">User ID: #{{ $patient->id }}@if($currentStatus)<span class="ml-2 {{ $statusClasses[$currentStatus] }}">{{ $statusTexts[$currentStatus] }}</span>@endif</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-12 col-lg-8 col-xl-8">
		<div class="card card-table-two">
			<div class="d-flex justify-content-between">
				<h4 class="card-title mb-1">أعلى الأقسام دخلاً</h4>
				<i class="mdi mdi-dots-horizontal text-gray"></i>
			</div>
			<span class="tx-12 tx-muted mb-3 ">يحسب الدخل من مجموع الفواتير الداخلة للنظام لكل قسم.</span>
			<div class="table-responsive country-table">
				<table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
					<thead>
						<tr>
							<th class="wd-lg-40p">القسم</th>
							<th class="wd-lg-30p tx-right">الدخل</th>
							<th class="wd-lg-30p tx-right">عدد الأطباء</th>
						</tr>
					</thead>
					<tbody>
						@foreach($topSections as $section)
						<tr>
							<td>{{ $section->Section->name ?? __('Unknown') }}</td>
							<td class="tx-right tx-medium tx-inverse">{{ number_format($section->total_revenue,2) }}</td>
							<td class="tx-right tx-medium tx-inverse">{{ $section->patient_count }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- row closed -->

<!-- row opened -->
<!-- <div class="row row-sm">

	
</div> -->
<!-- <div class="col-xl-4 col-md-12 col-lg-6">
	<div class="card">
		<div class="card-header pb-1">
			<h3 class="card-title mb-2">Sales Activity</h3>
			<p class="tx-12 mb-0 text-muted">Sales activities are the tactics that salespeople use to achieve their goals and objective</p>
		</div>
		<div class="product-timeline card-body pt-2 mt-1">
			<ul class="timeline-1 mb-0">
				<li class="mt-0"> <i class="ti-pie-chart bg-primary-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Total Services</span> <a href="#" class="float-left tx-11 text-muted">3 days ago</a>
					<p class="mb-0 text-muted tx-12">{{ $totalServices }} Services</p>
				</li>
				<li class="mt-0"> <i class="mdi mdi-cart-outline bg-danger-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Paid Invoices</span> <a href="#" class="float-left tx-11 text-muted">35 mins ago</a>
					<p class="mb-0 text-muted tx-12">{{ $paidInvoices }} Paid</p>
				</li>
				<li class="mt-0"> <i class="ti-bar-chart-alt bg-success-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Total Profit</span> <a href="#" class="float-left tx-11 text-muted">50 mins ago</a>
					<p class="mb-0 text-muted tx-12">{{ number_format($totalProfit,2) }} Profit</p>
				</li>
				<li class="mt-0"> <i class="si si-eye bg-purple-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Customer Visits</span> <a href="#" class="float-left tx-11 text-muted">1 day ago</a>
					<p class="mb-0 text-muted tx-12">15% increased</p>
				</li>
				<li class="mt-0 mb-0"> <i class="icon-note icons bg-primary-gradient text-white product-icon"></i> <span class="font-weight-semibold mb-4 tx-14 ">Customer Reviews</span> <a href="#" class="float-left tx-11 text-muted">1 day ago</a>
					<p class="mb-0 text-muted tx-12">1.5k reviews</p>
				</li>
			</ul>
		</div>
	</div>
</div> -->
<!-- row opened -->
<div class="row row-sm row-deck">
	<div class="col-md-12 col-lg-4 col-xl-4">
		<div class="card card-dashboard-eight pb-2">
			<h6 class="card-title">أعلى الأطباء دخلاً</h6><span class="d-block mg-b-10 text-muted tx-12">يحسل دخل الطبيب من مجموع الفواتير الداخلة من المرضى المسجلين.</span>
			<div class="list-group">
				@foreach($topDoctors as $doctor)
				<div class="list-group-item @if($loop->first) border-top-0 @endif">
					<p class="mb-0">{{ $doctor->Doctor->name ?? __('Unknown') }}</p>
					<span>{{ number_format($doctor->total_revenue,2) }}</span>
				</div>
				@endforeach
			</div>
		</div>
	</div>

	<div class="col-md-12 col-lg-8 col-xl-8">
		<div class="card ">
			<div class="card-body">
            @php
                // إجمالي دخل الأقسام = مجموع مبالغ المرضى بجميع الفواتير
                $__sectionsRevenue = (float) App\Models\Invoice::sum('patient_amount');
                // نسبة الشريط مقارنة بالدخل الكلي (فواتير نقدية + سندات قبض)
                $__overallIncome = (float) (App\Models\Invoice::where('type', 1)->sum('patient_amount') + App\Models\ReceiptAccount::sum('amount'));
                $__sectionsPercent = $__overallIncome > 0 ? max(min(round(($__sectionsRevenue / $__overallIncome) * 100), 100), 0) : 0;
            @endphp
				<div class="row">
					<div class="col-md-6">
						<div class="d-flex align-items-center pb-2">
							<p class="mb-0">مجموع صافي الربح</p>
						</div>
                            <h4 class="font-weight-bold mb-2">{{ $__sectionsPercent }}%</h4>
						<div class="progress progress-style progress-sm">
                        <div class="progress-bar bg-primary-gradient" style="width: {{ $__sectionsPercent }}%" role="progressbar" aria-valuenow="{{ $__sectionsPercent }}" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
					<div class="col-md-6 mt-4 mt-md-0">
						<div class="d-flex align-items-center pb-2">
							<p class="mb-0">مجموع المستخدمين</p>
						</div>
						<h4 class="font-weight-bold mb-2">{{ $totalUsers }}</h4>
						<div class="progress progress-style progress-sm">
							<div class="progress-bar bg-danger-gradient wd-75" role="progressbar" aria-valuenow="20" aria-valuemin="40" aria-valuemax="20"></div>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /row -->
<!-- 
<div class="row row-sm">

	<div class="col-xl-4 col-md-12 col-lg-6">
		<div class="card">
			<div class="card-header pb-0">
				<h3 class="card-title mb-2">Recent Orders</h3>
				<p class="tx-12 mb-0 text-muted">An order is an investor's instructions to a broker or brokerage firm to purchase or sell</p>
			</div>
			<div class="card-body sales-info ot-0 pt-0 pb-0">
				<div id="chart" class="ht-150" data-orders='@json([$ordersDelivered, $ordersCancelled])'></div>
				<div class="row sales-infomation pb-0 mb-0 mx-auto wd-100p">
					<div class="col-md-6 col">
						<p class="mb-0 d-flex"><span class="legend bg-primary brround"></span>Delivered</p>
						<h3 class="mb-1">{{ $ordersDelivered }}</h3>
						<div class="d-flex">
							<p class="text-muted ">Last 6 months</p>
						</div>
					</div>
					<div class="col-md-6 col">
						<p class="mb-0 d-flex"><span class="legend bg-info brround"></span>Cancelled</p>
						<h3 class="mb-1">{{ $ordersCancelled }}</h3>
						<div class="d-flex">
							<p class="text-muted">Last 6 months</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-4 col-md-12 col-lg-6">

		<div class="card ">
			@php
				// صافي الربح المبسّط = فواتير نقدية + سندات قبض - سندات صرف
				$__cashInvoices = (float) \App\Models\Invoice::where('type', 1)->sum('patient_amount');
				$__receipts = (float) \App\Models\ReceiptAccount::sum('amount');
				$__payments = (float) \App\Models\PaymentAccount::sum('amount');
				$__income = $__cashInvoices + $__receipts; // إجمالي الدخل
				$__netProfit = $__income - $__payments; // صافي الربح
				$__grossFlow = max($__income + $__payments, 0.01);
				$__incomePercent = max(min(round((max($__income, 0) / $__grossFlow) * 100), 100), 0);
				$__expensePercent = max(min(round((($__payments) / $__grossFlow) * 100), 100), 0);
			@endphp
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="d-flex align-items-center pb-2">
						<p class="mb-0">إجمالي الدخل</p>
						</div>
						<h4 class="font-weight-bold mb-2">{{ number_format($__income, 2) }}</h4>
						<div class="progress progress-style progress-sm">
							<div class="progress-bar bg-primary-gradient" style="width: {{ $__incomePercent }}%" role="progressbar" aria-valuenow="{{ $__incomePercent }}" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
					<div class="col-md-6 mt-4 mt-md-0">
						<div class="d-flex align-items-center pb-2">
							<p class="mb-0">إجمالي المصروفات</p>
						</div>
						<h4 class="font-weight-bold mb-2">{{ number_format($__payments, 2) }}</h4>
						<div class="progress progress-style progress-sm">
							<div class="progress-bar bg-danger-gradient" style="width: {{ $__expensePercent }}%" role="progressbar" aria-valuenow="{{ $__expensePercent }}" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div> -->
<!-- row close -->


</div>
</div>
<!-- Container closed -->
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('Dashboard/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('Dashboard/plugins/raphael/raphael.min.js')}}"></script>
<!--Internal  Flot js-->
<script src="{{URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{URL::asset('Dashboard/js/dashboard.sampledata.js')}}"></script>
<script src="{{URL::asset('Dashboard/js/chart.flot.sampledata.js')}}"></script>
<!--Internal Apexchart js-->
<script src="{{URL::asset('Dashboard/js/apexcharts.js')}}"></script>
<!-- Internal Map -->
<script src="{{URL::asset('Dashboard/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('Dashboard/js/modal-popup.js')}}"></script>
<!--Internal  index js -->
<script src="{{URL::asset('Dashboard/js/index.js')}}"></script>
<!-- <script src="{{URL::asset('Dashboard/js/jquery.vmap.sampledata.js')}}"></script> -->
<script>
	// Render invoice status chart with dynamic data
	document.getElementById('bar').innerHTML = '';
	const seriesData = JSON.parse(document.getElementById('bar').dataset.series || '[]');
	var optionsBar = {
		chart: {
			height: 249,
			type: 'bar',
			toolbar: {
				show: false,
			},
		},
		colors: ["#036fe7", '#f93a5a', '#f7a556'],
		series: [{
			name: 'Invoices',
			data: seriesData,
		}],
		xaxis: {
			categories: ['success', 'Pending', 'Failed'],
		},
		plotOptions: {
			bar: {
				columnWidth: '50%',
				distributed: true,
			},
		},
		dataLabels: {
			enabled: false,
		},
		legend: {
			show: false,
		},
	};
	new ApexCharts(document.querySelector('#bar'), optionsBar).render();

	// Render recent orders chart with delivered vs cancelled
	document.getElementById('chart').innerHTML = '';
	const ordersData = JSON.parse(document.getElementById('chart').dataset.orders || '[]');
	var optionsOrders = {
		chart: {
			type: 'donut',
			height: 205,
		},
		labels: ['Delivered', 'Cancelled'],
		series: ordersData,
		colors: ['#036fe7', '#17a2b8']
	};
	new ApexCharts(document.querySelector('#chart'), optionsOrders).render();
</script>

@endsection
