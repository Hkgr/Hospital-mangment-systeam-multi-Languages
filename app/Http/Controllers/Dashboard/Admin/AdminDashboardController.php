<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Events\MyEvent;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\Section;
use App\Models\Service;
use App\Models\Admin;
use App\Models\RayEmployee;
use App\Models\LaboratorieEmployee;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Trigger existing event for consistency
        event(new MyEvent('hello'));

        $invoicePending = Invoice::where('invoice_status', 1)->count();
        $invoiceReview = Invoice::where('invoice_status', 2)->count();
        $invoiceCompleted = Invoice::where('invoice_status', 3)->count();
        // Delivered (paid) and cancelled orders in the last 6 months
        $ordersDelivered = Invoice::where('invoice_status', 3)
            ->where('invoice_date', '>=', now()->subMonths(6))
            ->count();
        $ordersCancelled = Invoice::whereIn('invoice_status', [4, 5])
            ->where('invoice_date', '>=', now()->subMonths(6))
            ->count();
        $recentPatients = Patient::with('image')
            ->latest()
            ->take(4)
            ->get();

        // Revenue and patient statistics grouped by section
        $sectionStats = Invoice::select(
            'section_id',
            DB::raw('SUM(total_with_tax) as total_revenue'),
            DB::raw('COUNT(DISTINCT patient_id) as patient_count')
        )
            ->groupBy('section_id')
            ->with('Section')
            ->orderByDesc(DB::raw('SUM(total_with_tax)'))
            ->get();

        // Top sections by revenue for dedicated table
        $topSections = $sectionStats->take(5);

        // Top doctors by generated revenue
        $topDoctors = Invoice::select(
            'doctor_id',
            DB::raw('SUM(total_with_tax) as total_revenue'),
            DB::raw('COUNT(id) as invoice_count')
        )
            ->groupBy('doctor_id')
            ->with('Doctor')
            ->orderByDesc('total_revenue')
            ->take(3)
            ->get();

        $totalServices = Service::count();
        $paidInvoices = $invoiceCompleted;
        $totalRevenue = Invoice::where('invoice_status', 3)->sum('total_with_tax');
        $totalProfit = $totalRevenue;

        $doctorCount = Doctor::count();
        $patientCount = Patient::count();
        $adminCount = Admin::count();
        $rayCount = RayEmployee::count();
        $labCount = LaboratorieEmployee::count();
        $totalUsers = $doctorCount + $patientCount + $adminCount + $rayCount + $labCount;

        return view('Dashboard.Admin.dashboard', compact(
            'invoicePending',
            'invoiceReview',
            'invoiceCompleted',
            'sectionStats',
            'recentPatients',
            'topDoctors',
            'topSections',
            'totalServices',
            'paidInvoices',
            'totalProfit',
            'ordersDelivered',
            'ordersCancelled',
            'totalRevenue',
            'totalUsers'
        ));
    }
}
