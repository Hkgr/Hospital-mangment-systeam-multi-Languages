<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function markAllRead(): RedirectResponse
    {
        $userId = auth('admin')->id()
            ?? auth('doctor')->id()
            ?? auth('patient')->id()
            ?? auth('laboratorie_employee')->id()
            ?? auth('ray_employee')->id()
            ?? auth()->id();

        if (! $userId) {
            return redirect()->back();
        }

        Notification::where('user_id', $userId)->update(['reader_status' => true]);

        return redirect()->back();
    }
}
