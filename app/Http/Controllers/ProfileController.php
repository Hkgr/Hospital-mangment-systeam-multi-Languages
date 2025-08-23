<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user   = null;
        $folder = '';

        if (auth('admin')->check()) {
            $user = auth('admin')->user();
            $folder = 'admins';
        } elseif (auth('doctor')->check()) {
            $user = auth('doctor')->user();
            $folder = 'doctors';
        } elseif (auth('patient')->check()) {
            $user = auth('patient')->user();
            $folder = 'patients';
        } elseif (auth('laboratorie_employee')->check()) {
            $user = auth('laboratorie_employee')->user();
            $folder = 'laboratorie_employees';
        } elseif (auth('ray_employee')->check()) {
            $user = auth('ray_employee')->user();
            $folder = 'ray_employees';
        } elseif (auth()->check()) {
            $user = auth()->user();
            $folder = 'users';
        }

        if (!$user) {
            abort(403);
        }

        // اجعل المحلل (Intelephense) يفهم أن $user نموذج Eloquent
        /** @var \App\Models\Admin|\App\Models\Doctor|\App\Models\Patient|\App\Models\LaboratorieEmployee|\App\Models\RayEmployee|\App\Models\User $user */

        if ($request->filled('name')) {
            $user->name = $request->input('name');
        }
        if ($request->filled('description')) {
            $user->description = $request->input('description');
        }
        if ($request->filled('facebook_url')) {
            $user->facebook_url = $request->input('facebook_url');
        }
        if ($request->filled('twitter_url')) {
            $user->twitter_url = $request->input('twitter_url');
        }
        if ($request->filled('linkedin_url')) {
            $user->linkedin_url = $request->input('linkedin_url');
        }
        if ($request->filled('phone')) {
            $user->phone = $request->input('phone');
        }
        if ($request->filled('email')) {
            $user->email = $request->input('email');
        }
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();

            // تأكد أن المجلد موجود
            $path = public_path('Dashboard/img/' . $folder);
            if (! is_dir($path)) {
                @mkdir($path, 0755, true);
            }

            $file->move($path, $filename);
            if ($user->image) {
                $user->image->update(['filename' => $filename]);
            } else {
                $user->image()->create(['filename' => $filename]);
            }        }

        $user->save();

        return back()->with('status', __('تم التحديث بنجاح'));
    }
}
