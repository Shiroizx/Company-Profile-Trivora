<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateLandingSectionRequest;
use App\Models\LandingSection;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LandingSectionController extends Controller
{
    public function index(): View
    {
        $sections = LandingSection::query()
            ->withCount('items')
            ->orderBy('sort_order')
            ->get();

        return view('admin.sections.index', [
            'sections' => $sections,
            'sectionLabels' => config('landing.section_labels', []),
        ]);
    }

    public function edit(LandingSection $section): View
    {
        $section->load('items');

        return view('admin.sections.edit', [
            'section' => $section,
            'sectionLabel' => config("landing.section_labels.{$section->slug}", $section->slug),
            'extraFields' => config("landing.extra_fields.{$section->slug}", []),
            'itemMetaFields' => config("landing.item_meta_fields.{$section->slug}", []),
        ]);
    }

    public function update(UpdateLandingSectionRequest $request, LandingSection $section): RedirectResponse
    {
        $data = $request->validated();
        $data['is_active'] = $request->boolean('is_active');

        $extra = $section->extra ?? [];
        if (isset($data['extra'])) {
            $newExtra = array_filter($data['extra'], fn ($v) => $v !== null && $v !== '');
            $extra = array_merge($extra, $newExtra);
        }

        if ($request->hasFile('extra_files')) {
            foreach ($request->file('extra_files') as $key => $file) {
                // Delete old file if exists
                if (!empty($extra[$key])) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($extra[$key]);
                }
                $extra[$key] = $file->store('landing/sections', 'public');
            }
        }
        $data['extra'] = $extra;

        $section->update($data);

        return redirect()
            ->route('admin.sections.edit', $section)
            ->with('success', 'Section berhasil diperbarui.');
    }
}
