<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateSiteSettingsRequest;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SiteSettingController extends Controller
{
    public function edit(): View
    {
        $settings = SiteSetting::query()
            ->orderBy('key')
            ->get()
            ->keyBy('key');

        return view('admin.settings.edit', [
            'settings' => $settings,
            'labels' => config('landing.setting_labels', []),
        ]);
    }

    public function update(UpdateSiteSettingsRequest $request): RedirectResponse
    {
        $allowedKeys = SiteSetting::query()->pluck('key');

        foreach ($request->validated('settings') as $key => $value) {
            if ($allowedKeys->contains($key)) {
                SiteSetting::query()->where('key', $key)->update(['value' => $value ?? '']);
            }
        }

        return redirect()
            ->route('admin.settings.edit')
            ->with('success', 'Pengaturan situs berhasil disimpan.');
    }
}
