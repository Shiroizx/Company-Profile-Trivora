<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreLandingItemRequest;
use App\Http\Requests\Admin\UpdateLandingItemRequest;
use App\Models\LandingItem;
use App\Models\LandingSection;
use Illuminate\Http\RedirectResponse;

class LandingItemController extends Controller
{
    public function store(StoreLandingItemRequest $request, LandingSection $section): RedirectResponse
    {
        $data = $request->validated();
        $data['sort_order'] ??= ($section->items()->max('sort_order') ?? 0) + 1;

        if (isset($data['meta'])) {
            $data['meta'] = array_filter($data['meta'], fn ($v) => $v !== null && $v !== '');
        } else {
            $data['meta'] = [];
        }

        if ($request->hasFile('meta_files')) {
            foreach ($request->file('meta_files') as $key => $file) {
                $data['meta'][$key] = $file->store('landing/items', 'public');
            }
        }

        $section->items()->create($data);

        return redirect()
            ->route('admin.sections.edit', $section)
            ->with('success', 'Item berhasil ditambahkan.');
    }

    public function update(UpdateLandingItemRequest $request, LandingSection $section, LandingItem $item): RedirectResponse
    {
        abort_unless($item->landing_section_id == $section->id, 404);

        $data = $request->validated();

        $meta = $item->meta ?? [];
        if (isset($data['meta'])) {
            $newMeta = array_filter($data['meta'], fn ($v) => $v !== null && $v !== '');
            $meta = array_merge($meta, $newMeta);
        }

        if ($request->hasFile('meta_files')) {
            foreach ($request->file('meta_files') as $key => $file) {
                // Delete old file if exists
                if (!empty($meta[$key])) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($meta[$key]);
                }
                $meta[$key] = $file->store('landing/items', 'public');
            }
        }
        $data['meta'] = $meta;

        $item->update($data);

        return redirect()
            ->route('admin.sections.edit', $section)
            ->with('success', 'Item berhasil diperbarui.');
    }

    public function destroy(LandingSection $section, LandingItem $item): RedirectResponse
    {
        abort_unless($item->landing_section_id == $section->id, 404);

        $item->delete();

        return redirect()
            ->route('admin.sections.edit', $section)
            ->with('success', 'Item berhasil dihapus.');
    }
}
