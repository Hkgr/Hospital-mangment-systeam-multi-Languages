<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Events\AmbulanceCallCreated;
use App\Models\Admin;
use App\Models\Ambulance;
use App\Models\AmbulanceCall;
use App\Models\Notification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AmbulanceCallController extends Controller
{
    /**
     * Store a newly created ambulance call.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'phone' => ['required', 'string'],
            'details' => ['required', 'string'],
            'address' => ['required', 'string'],
        ]);

        $ambulance = Ambulance::available()->first();

        if (!$ambulance) {
            return back()->with('error', 'عذراً، لا توجد سيارات إسعاف متاحة حالياً');
        }

        $callData = [
            'phone' => $data['phone'],
            'details' => $data['details'],
            'address' => $data['address'],
            'call_time' => now(),
        ];

        $callData['ambulance_id'] = $ambulance->id;
        $ambulance->is_available = 0;
        $ambulance->save();

        AmbulanceCall::create($callData);
        foreach (Admin::all() as $admin) {
            Notification::create([
                'user_id' => $admin->id,
                'message' => 'مكالمة إسعاف جديدة: ' . $callData['details'],
            ]);
        }
        event(new AmbulanceCallCreated($callData));

        return back()->with('success', __('تم إرسال طلب الإسعاف بنجاح'));

        
    }
}