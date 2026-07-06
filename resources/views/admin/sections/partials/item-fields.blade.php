@php
    $prefix = $prefix ?? '';
    $itemMeta = $itemMeta ?? [];

    $titleLabel = 'Judul / Teks *';
    $descLabel = 'Deskripsi';

    if (isset($section)) {
        if ($section->slug === 'struktur') {
            $titleLabel = 'Jabatan *';
            $descLabel = 'Nama';
        }
    }
@endphp

<div class="grid gap-4 sm:grid-cols-2">
    <div class="sm:col-span-2">
        <label class="admin-label">{{ $titleLabel }}</label>
        <input type="text" name="{{ $prefix }}title" value="{{ old($prefix.'title', $item->title ?? '') }}" required class="admin-input">
    </div>

    <div class="sm:col-span-2">
        <label class="admin-label">{{ $descLabel }}</label>
        <textarea name="{{ $prefix }}description" rows="2" class="admin-input">{{ old($prefix.'description', $item->description ?? '') }}</textarea>
    </div>

    <div>
        <label class="admin-label">Urutan</label>
        <input type="number" name="{{ $prefix }}sort_order" value="{{ old($prefix.'sort_order', $item->sort_order ?? 0) }}" min="0" class="admin-input">
    </div>

    @foreach ($itemMetaFields as $metaKey => $field)
        <div class="{{ ($field['type'] ?? 'text') === 'textarea' ? 'sm:col-span-2' : '' }}">
            <label class="admin-label">{{ $field['label'] }}</label>
            @if (($field['type'] ?? 'text') === 'select')
                <select name="{{ $prefix }}meta[{{ $metaKey }}]" class="admin-input">
                    <option value="">— Pilih —</option>
                    @foreach ($field['options'] as $optValue => $optLabel)
                        <option value="{{ $optValue }}" @selected(old($prefix."meta.{$metaKey}", $itemMeta[$metaKey] ?? '') === $optValue)>
                            {{ $optLabel }}
                        </option>
                    @endforeach
                </select>
            @elseif (($field['type'] ?? 'text') === 'textarea')
                <textarea name="{{ $prefix }}meta[{{ $metaKey }}]" rows="2" class="admin-input">{{ old($prefix."meta.{$metaKey}", $itemMeta[$metaKey] ?? '') }}</textarea>
            @elseif (($field['type'] ?? 'text') === 'file')
                <input
                    type="file"
                    name="{{ $prefix }}meta_files[{{ $metaKey }}]"
                    class="admin-input"
                    accept="image/png, image/jpeg, image/jpg"
                >
                @if(!empty($itemMeta[$metaKey]))
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $itemMeta[$metaKey]) }}" alt="Current Image" class="h-24 w-auto rounded border border-silver-300 object-cover">
                    </div>
                @endif
            @else
                <input
                    type="text"
                    name="{{ $prefix }}meta[{{ $metaKey }}]"
                    value="{{ old($prefix."meta.{$metaKey}", $itemMeta[$metaKey] ?? '') }}"
                    class="admin-input"
                    @if (isset($field['max'])) maxlength="{{ $field['max'] }}" @endif
                >
            @endif
        </div>
    @endforeach
</div>
