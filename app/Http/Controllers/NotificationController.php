<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function markAllRead(): RedirectResponse
    {
        Notification::where('user_id', Auth::id())
            ->update(['reader_status' => true]);

        return redirect()->back();
    }
}
