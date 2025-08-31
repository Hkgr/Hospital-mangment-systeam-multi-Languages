<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Laboratorie;

class LaboratorieController extends Controller
{
    public function index()
    {
        $laboratories = Laboratorie::with(['doctor', 'Patient', 'employee'])->get();
        return view('Dashboard.laboratorie.index', compact('laboratories'));
    }

    public function show(Laboratorie $laboratorie)
    {
        $laboratorie->load(['doctor', 'Patient', 'employee']);
        return view('Dashboard.laboratorie.show', compact('laboratorie'));
    }
}