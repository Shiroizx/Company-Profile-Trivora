<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingItem;
use App\Models\LandingSection;
use App\Models\SiteSetting;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $sections = LandingSection::query()
            ->withCount('items')
            ->orderBy('sort_order')
            ->get();

        return view('admin.dashboard', [
            'sectionsCount' => $sections->count(),
            'itemsCount' => LandingItem::count(),
            'settingsCount' => SiteSetting::count(),
            'sections' => $sections,
            'sectionLabels' => config('landing.section_labels', []),
        ]);
    }
}
