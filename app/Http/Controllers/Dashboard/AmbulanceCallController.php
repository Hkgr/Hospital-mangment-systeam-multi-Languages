<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AmbulanceCall;
use Illuminate\Http\Request;

class AmbulanceCallController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $calls = AmbulanceCall::with('ambulance')->get();
        return view('Dashboard.AmbulanceCalls.index', compact('calls'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStatus(Request $request, $id, $status)
    {
        $call = AmbulanceCall::findOrFail($id);
        $call->status = $status;
        $call->save();

        
        if ($status !== 'unknown' && $call->ambulance) {
            $call->ambulance->is_available = 1;
            $call->ambulance->save();
        }
        
        session()->flash('edit');
        return redirect()->route('AmbulanceCalls.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        AmbulanceCall::destroy($id);
        session()->flash('delete');
        return redirect()->route('AmbulanceCalls.index');
    }
}