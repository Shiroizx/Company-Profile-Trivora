@extends('layouts.admin')

@section('title', 'Dashboard')
@section('heading', 'Dashboard')
@section('subheading', 'Ringkasan konten landing page')

@section('content')
<div class="mb-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
    <div class="admin-stat-card group">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-xs font-bold text-navy-500 uppercase tracking-wider">Total Section</p>
                <p class="mt-2 font-display text-4xl font-bold text-navy-900 group-hover:text-gold-600 transition-colors">{{ $sectionsCount }}</p>
            </div>
            <div class="admin-stat-icon-wrapper">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
            </div>
        </div>
    </div>
    <div class="admin-stat-card group">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-xs font-bold text-navy-500 uppercase tracking-wider">Item Konten</p>
                <p class="mt-2 font-display text-4xl font-bold text-navy-900 group-hover:text-gold-600 transition-colors">{{ $itemsCount }}</p>
            </div>
            <div class="admin-stat-icon-wrapper">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            </div>
        </div>
    </div>
    <div class="admin-stat-card group">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-xs font-bold text-navy-500 uppercase tracking-wider">Pesan Baru</p>
                <p class="mt-2 font-display text-4xl font-bold text-navy-900 group-hover:text-gold-600 transition-colors">
                    {{ \App\Models\Message::where('is_read', false)->count() }}
                    <span class="text-sm font-medium text-silver-400">/ {{ \App\Models\Message::count() }}</span>
                </p>
            </div>
            <div class="admin-stat-icon-wrapper">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
            </div>
        </div>
    </div>
    <div class="admin-stat-card group">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-xs font-bold text-navy-500 uppercase tracking-wider">Pengaturan</p>
                <p class="mt-2 font-display text-4xl font-bold text-navy-900 group-hover:text-gold-600 transition-colors">{{ $settingsCount }}</p>
            </div>
            <div class="admin-stat-icon-wrapper">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
        </div>
    </div>
</div>

<div class="mb-8">
    <h2 class="mb-4 text-sm uppercase tracking-wider font-bold text-navy-700">Aksi Cepat</h2>
    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <a href="{{ route('admin.settings.edit') }}" class="admin-action-card group">
            <div class="admin-action-icon group-hover:bg-gold-50 group-hover:text-gold-600">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
            </div>
            <div>
                <p class="text-sm font-bold text-navy-900 group-hover:text-gold-700">Pengaturan</p>
                <p class="text-xs text-navy-500 mt-0.5">Ubah identitas web</p>
            </div>
        </a>
        <a href="{{ route('admin.sections.index') }}" class="admin-action-card group">
            <div class="admin-action-icon group-hover:bg-gold-50 group-hover:text-gold-600">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
            </div>
            <div>
                <p class="text-sm font-bold text-navy-900 group-hover:text-gold-700">Section Landing</p>
                <p class="text-xs text-navy-500 mt-0.5">Edit teks & konten</p>
            </div>
        </a>
        <a href="{{ route('admin.messages.index') }}" class="admin-action-card group">
            <div class="admin-action-icon group-hover:bg-gold-50 group-hover:text-gold-600">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <div>
                <p class="text-sm font-bold text-navy-900 group-hover:text-gold-700">Pesan Masuk</p>
                <p class="text-xs text-navy-500 mt-0.5">Baca respon pengunjung</p>
            </div>
        </a>
        <a href="{{ url('/') }}" target="_blank" rel="noopener" class="admin-action-card group">
            <div class="admin-action-icon group-hover:bg-gold-50 group-hover:text-gold-600">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
            </div>
            <div>
                <p class="text-sm font-bold text-navy-900 group-hover:text-gold-700">Preview Web</p>
                <p class="text-xs text-navy-500 mt-0.5">Buka di tab baru</p>
            </div>
        </a>
    </div>
</div>

<div class="admin-card overflow-hidden p-0 shadow-md">
    <div class="border-b border-silver-200 bg-silver-50/50 px-6 py-5">
        <h2 class="font-bold text-navy-900">Daftar Section Aktif</h2>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-silver-50 text-[11px] uppercase tracking-wider text-navy-500 font-bold border-b border-silver-200">
                <tr>
                    <th class="px-6 py-4">Section</th>
                    <th class="px-6 py-4">Judul</th>
                    <th class="px-6 py-4">Item</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-silver-200">
                @foreach ($sections as $section)
                    <tr class="hover:bg-silver-50">
                        <td class="px-6 py-4 font-medium text-navy-900">
                            {{ $sectionLabels[$section->slug] ?? $section->slug }}
                        </td>
                        <td class="max-w-xs truncate px-6 py-4 text-navy-600">{{ $section->title ?? '—' }}</td>
                        <td class="px-6 py-4 text-navy-600">{{ $section->items_count }}</td>
                        <td class="px-6 py-4">
                            @if ($section->is_active)
                                <span class="inline-flex rounded-full bg-green-50 px-2.5 py-1 text-[11px] font-bold text-green-700 ring-1 ring-inset ring-green-600/20">Aktif</span>
                            @else
                                <span class="inline-flex rounded-full bg-silver-100 px-2.5 py-1 text-[11px] font-bold text-navy-600 ring-1 ring-inset ring-silver-500/20">Nonaktif</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.sections.edit', $section) }}" class="text-sm font-medium text-gold-600 hover:text-gold-700">Edit →</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
