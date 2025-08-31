<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Section;
use App\Models\Service;
use App\Models\Insurance;
use App\Models\RayEmployee;
use App\Models\LaboratorieEmployee;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');

        // Search translatable "name" attribute in current locale
        $locale = app()->getLocale();
        $like = "%{$q}%";

        $doctors = Doctor::query()
            ->whereTranslationLike('name', $like, $locale)
            ->orWhere('email', 'like', $like)
            ->orWhere('phone', 'like', $like)
            ->limit(20)->get();

        $patients = Patient::query()
            ->whereTranslationLike('name', $like, $locale)
            ->orWhere('email', 'like', $like)
            ->orWhere('Phone', 'like', $like)
            ->limit(20)->get();

        $sections = Section::query()
            ->whereTranslationLike('name', $like, $locale)
            ->limit(20)->get();

        $services = Service::query()
            ->whereTranslationLike('name', $like, $locale)
            ->limit(20)->get();

        $insurances = class_exists(Insurance::class)
            ? Insurance::query()->whereTranslationLike('name', $like, $locale)->limit(20)->get()
            : collect();

        $rayEmployees = RayEmployee::query()
            ->where('name', 'like', $like)
            ->orWhere('email', 'like', $like)
            ->orWhere('phone', 'like', $like)
            ->limit(20)->get();

        $laboratorieEmployees = LaboratorieEmployee::query()
            ->where('name', 'like', $like)
            ->orWhere('email', 'like', $like)
            ->orWhere('phone', 'like', $like)
            ->limit(20)->get();

        return view('Dashboard.search-results', compact(
            'q',
            'doctors',
            'patients',
            'sections',
            'services',
            'insurances',
            'rayEmployees',
            'laboratorieEmployees'
        ));
    }
}
