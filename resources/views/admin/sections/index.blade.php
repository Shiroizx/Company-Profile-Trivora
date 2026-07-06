@extends('layouts.admin')

@section('title', 'Section Landing')
@section('heading', 'Section Landing Page')
@section('subheading', 'Edit konten per bagian halaman utama')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.dashboard') }}" class="admin-btn-secondary">
        &larr; Kembali ke Dashboard
    </a>
</div>

<div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
    @foreach ($sections as $section)
        <a href="{{ route('admin.sections.edit', $section) }}" class="admin-card group transition hover:border-gold-500/50 hover:shadow-md">
            <div class="flex items-start justify-between gap-3">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-gold-600">
                        #{{ $section->sort_order }}
                    </p>
                    <h2 class="mt-1 font-semibold text-navy-900 group-hover:text-gold-700">
                        {{ $sectionLabels[$section->slug] ?? $section->slug }}
                    </h2>
                    <p class="mt-2 line-clamp-2 text-sm text-navy-600">{{ $section->title ?? $section->section_label }}</p>
                </div>
                @if ($section->is_active)
                    <span class="shrink-0 rounded-full bg-green-100 px-2 py-0.5 text-xs text-green-800">Aktif</span>
                @endif
            </div>
            <p class="mt-4 text-xs text-silver-600">{{ $section->items_count }} item konten</p>
        </a>
    @endforeach
</div>
@endsection
