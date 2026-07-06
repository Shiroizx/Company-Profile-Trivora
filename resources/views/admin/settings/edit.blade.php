@extends('layouts.admin')

@section('title', 'Pengaturan Situs')
@section('heading', 'Pengaturan Situs')
@section('subheading', 'Informasi global: nama perusahaan, SEO, logo, footer')

@section('content')
<form action="{{ route('admin.settings.update') }}" method="POST" class="admin-card max-w-2xl space-y-5">
    @csrf
    @method('PUT')

    @foreach ($settings as $key => $setting)
        <div>
            <label for="setting_{{ $key }}" class="admin-label">
                {{ $labels[$key] ?? $key }}
            </label>
            @if ($key === 'meta_description')
                <textarea
                    id="setting_{{ $key }}"
                    name="settings[{{ $key }}]"
                    rows="3"
                    class="admin-input"
                >{{ old("settings.{$key}", $setting->value) }}</textarea>
            @else
                <input
                    type="text"
                    id="setting_{{ $key }}"
                    name="settings[{{ $key }}]"
                    value="{{ old("settings.{$key}", $setting->value) }}"
                    class="admin-input"
                >
            @endif
        </div>
    @endforeach

    <div class="flex gap-3 pt-2">
        <button type="submit" class="admin-btn-primary">Simpan Pengaturan</button>
        <a href="{{ route('admin.dashboard') }}" class="admin-btn-secondary">Batal</a>
    </div>
</form>
@endsection
