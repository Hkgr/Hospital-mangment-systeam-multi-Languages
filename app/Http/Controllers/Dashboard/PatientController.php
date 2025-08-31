<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientRequest;
use App\Interfaces\Patients\PatientRepositoryInterface;
use App\Models\Ray;
use App\Models\Laboratorie;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    private $Patient;

    public function __construct(PatientRepositoryInterface $Patient)
    {
        $this->Patient = $Patient;
    }

    public function index()
    {
        return $this->Patient->index();
    }


    public function create()
    {
        return$this->Patient->create();
    }


    public function store(StorePatientRequest $request)
    {
       return $this->Patient->store($request);
    }


    public function show($id)
    {
        return $this->Patient->show($id);
    }


    public function edit($id)
    {
        return $this->Patient->edit($id);
    }


    public function update(StorePatientRequest $request)
    {
        return $this->Patient->update($request);
    }


    public function destroy(Request $request)
    {
       return $this->Patient->destroy($request);
    }
    public function viewRays($id) {
        $rays = Ray::findOrFail($id);
        return view('Dashboard.dashboard_RayEmployee.invoices.patient_details', compact('rays'));
    }

    public function viewLaboratories($id) {
        $laboratorie = Laboratorie::findOrFail($id);
        return view('Dashboard.dashboard_LaboratorieEmployee.invoices.patient_details', compact('laboratorie'));
    }
}
