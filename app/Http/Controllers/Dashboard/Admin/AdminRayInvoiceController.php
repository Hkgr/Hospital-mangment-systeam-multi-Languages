<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ray;

class AdminRayInvoiceController extends Controller
{
    public function index()
    {
        $invoices = Ray::with(['Patient','doctor'])->latest()->get();
        return view('Dashboard.dashboard_Admin.rays.invoices', compact('invoices'));
    }
}