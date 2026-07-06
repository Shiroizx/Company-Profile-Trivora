@extends('layouts.admin')

@section('title', 'Edit ' . $sectionLabel)
@section('heading', $sectionLabel)
@section('subheading', 'Slug: ' . $section->slug)

@section('content')
<div class="mb-4 flex flex-wrap gap-3">
    <a href="{{ route('admin.sections.index') }}" class="admin-btn-secondary">← Semua Section</a>
    <a href="{{ url('/#' . (config('landing.section_anchors.'.$section->slug) ?? $section->slug)) }}" target="_blank" rel="noopener" class="admin-btn-secondary">
        Lihat di Situs
    </a>
</div>

{{-- Form Section --}}
<form action="{{ route('admin.sections.update', $section) }}" method="POST" class="admin-card mb-8 space-y-5" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <h2 class="border-b border-silver-200 pb-3 font-semibold text-navy-900">Informasi Section</h2>

    <div class="grid gap-5 sm:grid-cols-2">
        <div>
            <label class="admin-label">Label Section</label>
            <input type="text" name="section_label" value="{{ old('section_label', $section->section_label) }}" class="admin-input">
        </div>
        <div>
            <label class="admin-label">Judul Utama</label>
            <input type="text" name="title" value="{{ old('title', $section->title) }}" class="admin-input">
        </div>
        <div class="sm:col-span-2">
            <label class="admin-label">Subjudul / Tagline</label>
            <textarea name="subtitle" rows="2" class="admin-input">{{ old('subtitle', $section->subtitle) }}</textarea>
        </div>
        <div class="sm:col-span-2">
            <label class="admin-label">Isi Paragraf (pisahkan paragraf dengan baris kosong)</label>
            <textarea name="body" rows="5" class="admin-input">{{ old('body', $section->body) }}</textarea>
        </div>
        <div class="flex items-center gap-2">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" id="is_active" class="rounded border-silver-300 text-gold-600 focus:ring-gold-500" {{ old('is_active', $section->is_active) ? 'checked' : '' }}>
            <label for="is_active" class="text-sm font-medium text-navy-700">Section aktif (tampil di landing)</label>
        </div>
    </div>

    @if (count($extraFields) > 0)
        <h3 class="border-t border-silver-200 pt-5 font-semibold text-navy-900">Pengaturan Khusus Section</h3>
        <div class="grid gap-5 sm:grid-cols-2">
            @foreach ($extraFields as $key => $field)
                <div class="{{ ($field['type'] ?? 'text') === 'textarea' ? 'sm:col-span-2' : '' }}">
                    <label class="admin-label">{{ $field['label'] }}</label>
                    @if (($field['type'] ?? 'text') === 'textarea')
                        <textarea name="extra[{{ $key }}]" rows="{{ $key === 'address' ? 4 : 3 }}" class="admin-input">{{ old("extra.{$key}", $section->extra[$key] ?? '') }}</textarea>
                    @elseif (($field['type'] ?? 'text') === 'file')
                        <input
                            type="file"
                            name="extra_files[{{ $key }}]"
                            class="admin-input"
                            accept="image/png, image/jpeg, image/jpg"
                        >
                        @if(!empty($section->extra[$key]))
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $section->extra[$key]) }}" alt="Current Image" class="h-24 w-auto rounded border border-silver-300 object-cover">
                            </div>
                        @endif
                    @else
                        <input
                            type="{{ $field['type'] ?? 'text' }}"
                            name="extra[{{ $key }}]"
                            value="{{ old("extra.{$key}", $section->extra[$key] ?? '') }}"
                            class="admin-input"
                        >
                    @endif
                </div>
            @endforeach
        </div>
    @endif

    <div class="flex gap-3 border-t border-silver-200 pt-4">
        <button type="submit" class="admin-btn-primary">Simpan Section</button>
    </div>
</form>

{{-- Items --}}
<div class="mb-6">
    <h2 class="font-display text-xl font-bold text-navy-900">Item Konten ({{ $section->items->count() }})</h2>
    <p class="mt-1 text-sm text-navy-600">Kartu layanan, poin visi-misi, nilai PRIME, dll.</p>
</div>

<div class="space-y-6">
    @foreach ($section->items as $item)
        <div class="admin-card">
            <form action="{{ route('admin.items.update', [$section, $item]) }}" method="POST" class="space-y-4" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-2 flex items-center justify-between">
                    <span class="text-xs font-semibold uppercase tracking-wider text-gold-600">Item #{{ $item->sort_order }}</span>
                </div>

                @include('admin.sections.partials.item-fields', [
                    'item' => $item,
                    'itemMeta' => $item->meta ?? [],
                    'itemMetaFields' => $itemMetaFields,
                    'prefix' => '',
                ])

                <div class="flex flex-wrap gap-3 border-t border-silver-200 pt-4">
                    <button type="submit" class="admin-btn-primary">Simpan Item</button>
                </div>
            </form>
            <form action="{{ route('admin.items.destroy', [$section, $item]) }}" method="POST" class="mt-3 border-t border-silver-200 pt-3" onsubmit="return confirm('Hapus item ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="admin-btn-danger">Hapus Item</button>
            </form>
        </div>
    @endforeach
</div>

{{-- Tambah Item --}}
<div class="admin-card mt-8 border-2 border-dashed border-gold-500/40 bg-gold-500/5">
    <h3 class="mb-4 font-semibold text-navy-900">Tambah Item Baru</h3>
    <form action="{{ route('admin.items.store', $section) }}" method="POST" class="space-y-4" enctype="multipart/form-data">
        @csrf
        @include('admin.sections.partials.item-fields', [
            'item' => null,
            'itemMeta' => [],
            'itemMetaFields' => $itemMetaFields,
            'prefix' => '',
        ])
        <button type="submit" class="admin-btn-primary">Tambah Item</button>
    </form>
</div>
@endsection
