<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Events\MyEvent;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
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
        $sectionStats = Invoice::select(
            'section_id',
            DB::raw('SUM(total_with_tax) as total_revenue'),
            DB::raw('COUNT(DISTINCT patient_id) as patient_count')
        )
            ->groupBy('section_id')
            ->with('Section')
            ->get();

        return view('Dashboard.Admin.dashboard', compact(
            'invoicePending',
            'invoiceReview',
            'invoiceCompleted',
            'sectionStats'
        ));
    }
}
