@extends('layouts.landing')

@section('title', $settings['page_title'] ?? 'PT Trivora Mitra Berkarya')

@section('content')
@php
    $hero = $sections['hero'] ?? null;
    $keunggulan = $sections['keunggulan'] ?? null;
    $layanan = $sections['layanan'] ?? null;
    $tentang = $sections['tentang'] ?? null;
    $filosofi = $sections['filosofi'] ?? null;
    $visiMisi = $sections['visi_misi'] ?? null;
    $nilai = $sections['nilai'] ?? null;
    $prime = $sections['prime'] ?? null;
    $struktur = $sections['struktur'] ?? null;
    $komitmen = $sections['komitmen'] ?? null;
    $hubungi = $sections['hubungi_kami'] ?? null;
    $lokasi = $sections['lokasi'] ?? null;
    $companyName = $settings['company_name'] ?? 'PT Trivora Mitra Berkarya';
    $logoPath = $settings['logo_path'] ?? 'asset/logo.jpeg';
@endphp

@if ($hero)
{{-- 1. Hero — Full-Bleed Cinematic --}}
<section id="beranda" class="relative min-h-[100dvh] overflow-hidden bg-navy-950 text-white flex flex-col justify-end">
    {{-- Full-bleed background image --}}
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('asset/pelabuhan.jpg') }}" alt="Background Pelabuhan" class="h-full w-full object-cover object-center opacity-50" />
        {{-- Bottom-up dark vignette for text readability --}}
        <div class="absolute inset-0 bg-linear-to-t from-navy-950 via-navy-950/70 to-navy-950/20"></div>
        {{-- Subtle side vignette --}}
        <div class="absolute inset-0 bg-linear-to-r from-navy-950/40 via-transparent to-navy-950/30"></div>
    </div>

    {{-- Subtle grid texture --}}
    <div class="pointer-events-none absolute inset-0 z-0 opacity-10">
        <svg class="h-full w-full" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="grid" width="60" height="60" patternUnits="userSpaceOnUse">
                    <path d="M 60 0 L 0 0 0 60" fill="none" stroke="rgb(255 255 255 / 0.08)" stroke-width="1"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#grid)"/>
        </svg>
    </div>

    {{-- Content: positioned at the bottom --}}
    <div class="relative z-10 mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8 pb-20 sm:pb-24 lg:pb-28 pt-40">
        <span data-aos="fade-up" class="section-label mb-8 text-gold-500 select-none">{{ $hero->section_label }}</span>

        <h1 data-aos="fade-up" data-aos-delay="100" class="font-display text-5xl font-extrabold leading-[0.95] text-white sm:text-7xl lg:text-8xl tracking-tight max-w-5xl">
            {{ $hero->extra['title_prefix'] ?? 'PT' }}
            <span class="text-gradient-gold block mt-1">{{ $hero->title }}</span>
        </h1>

        <p data-aos="fade-up" data-aos-delay="250" class="mt-8 max-w-xl text-base leading-relaxed text-silver-300/90 font-sans sm:text-lg">
            {{ $hero->subtitle }}
        </p>

        <div data-aos="fade-up" data-aos-delay="400" class="mt-10 flex flex-wrap gap-4 items-center">
            <a href="{{ $hero->extra['cta_primary_href'] ?? '#layanan' }}" data-nav-link class="group inline-flex items-center gap-3 rounded-full bg-linear-to-r from-gold-600 to-gold-500 px-7 py-3.5 text-sm font-bold text-white shadow-xl shadow-gold-500/20 transition-all duration-300 hover:scale-105 active:scale-[0.98]">
                {{ $hero->extra['cta_primary_label'] ?? 'Layanan Kami' }}
                <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
            <a href="{{ $hero->extra['cta_secondary_href'] ?? '#tentang' }}" data-nav-link class="inline-flex items-center gap-2.5 rounded-full border border-white/15 bg-white/5 px-7 py-3.5 text-sm font-bold text-white/90 backdrop-blur-sm transition-all duration-300 hover:border-white/30 hover:bg-white/10 hover:text-white">
                {{ $hero->extra['cta_secondary_label'] ?? 'Tentang Kami' }}
            </a>
        </div>

        {{-- Stats row --}}
        <div data-aos="fade-up" data-aos-delay="550" class="mt-20 flex flex-wrap gap-x-12 gap-y-6 border-t border-white/10 pt-10">
            @foreach ($hero->items as $stat)
                <div class="group">
                    <p class="font-display text-3xl font-extrabold text-gold-500 sm:text-4xl select-none">{{ $stat->title }}</p>
                    <p class="mt-1.5 text-[10px] uppercase tracking-[0.2em] text-silver-400/80 font-bold font-sans">{{ $stat->description }}</p>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Bottom edge mask --}}
    <div class="absolute -bottom-px left-0 right-0 z-10 translate-y-px">
        <svg viewBox="0 0 1440 60" class="w-full text-white" preserveAspectRatio="none">
            <path fill="currentColor" d="M0,60 L1440,60 L1440,0 C1080,45 360,45 0,0 Z"/>
        </svg>
    </div>
</section>
@endif

@if ($keunggulan)
@php $keunggulanParagraphs = $keunggulan->body ? preg_split('/\n\n+/', trim($keunggulan->body)) : []; @endphp
{{-- 2. Keunggulan Kami — Clean Premium Asymmetric Grid --}}
<section id="keunggulan" class="relative z-20 bg-white py-24 lg:py-32">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="grid items-start gap-10 lg:grid-cols-12 lg:gap-20 mb-20">
            <div class="lg:col-span-5">
                <span data-aos="fade-up" class="section-label">{{ $keunggulan->section_label }}</span>
                <h2 data-aos="fade-up" data-aos-delay="100" class="mt-4 font-display text-4xl font-extrabold leading-tight text-navy-900 sm:text-5xl tracking-tight">
                    {{ $keunggulan->title }}
                </h2>
            </div>
            <div class="lg:col-span-7 lg:pt-6">
                @foreach ($keunggulanParagraphs as $i => $paragraph)
                    <p data-aos="fade-up" data-aos-delay="{{ 150 + ($i * 80) }}" class="{{ $i === 0 ? '' : 'mt-5' }} text-base leading-relaxed font-sans {{ $i === 0 ? 'text-navy-700 font-medium' : 'text-navy-600' }}">
                        {{ $paragraph }}
                    </p>
                @endforeach
            </div>
        </div>

        {{-- Asymmetric Bento Grid --}}
        <div class="grid gap-8 lg:grid-cols-12">
            @foreach ($keunggulan->items as $index => $item)
                @php
                    // Asymmetric grid pattern for 4 items: 7-5 split, then 5-7 split
                    $colSpan = 'lg:col-span-6'; // fallback
                    if ($index === 0) {
                        $colSpan = 'lg:col-span-7';
                    } elseif ($index === 1) {
                        $colSpan = 'lg:col-span-5';
                    } elseif ($index === 2) {
                        $colSpan = 'lg:col-span-5';
                    } elseif ($index === 3) {
                        $colSpan = 'lg:col-span-7';
                    }
                @endphp
                <div 
                    data-aos="fade-up" 
                    data-aos-delay="{{ $index * 100 }}"
                    class="{{ $colSpan }} group"
                >
                    <div class="h-full rounded-2xl border border-silver-200/80 bg-white p-10 lg:p-12 shadow-xs shadow-navy-950/[0.02] hover:shadow-md hover:shadow-navy-950/[0.04] hover:border-gold-500/40 transition-all duration-300 flex flex-col justify-between relative overflow-hidden">
                        {{-- Watermark number --}}
                        <span class="absolute -right-4 -top-6 font-display text-9xl font-black text-navy-950/[0.02] select-none leading-none group-hover:text-gold-500/[0.05] transition duration-500">
                            {{ $loop->iteration }}
                        </span>

                        <div>
                            {{-- Number tag --}}
                            <span class="font-display text-4xl font-extrabold text-gold-500/40 block mb-6 group-hover:text-gold-500 transition duration-300">
                                {{ sprintf("%02d", $loop->iteration) }}
                            </span>
                            
                            <h3 class="font-sans text-xl font-bold text-navy-900 group-hover:text-gold-700 transition duration-300">
                                {{ $item->title }}
                            </h3>
                            <p class="mt-4 text-sm leading-relaxed text-navy-600 font-sans max-w-xl">
                                {{ $item->description }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if ($layanan)
{{-- 3. Layanan --}}
<section id="layanan" class="section-alt py-24 lg:py-32">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl text-center mb-16">
            <span data-aos="fade-up" class="section-label justify-center">{{ $layanan->section_label }}</span>
            <h2 data-aos="fade-up" data-aos-delay="100" class="mt-4 font-display text-4xl font-extrabold text-navy-900 sm:text-5xl">
                {{ $layanan->title }}
            </h2>
            <p data-aos="fade-up" data-aos-delay="200" class="mt-4 text-base text-navy-600">
                {{ $layanan->subtitle }}
            </p>
        </div>
        
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 items-start">
            @php
                $icons = [
                    'keagenan' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12v18H3V3z"/>', // maritime port/office
                    'chartering' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>', // contract document
                    'bongkar' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>', // cargo cube
                    'crew' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0A5.971 5.971 0 006 18.72m12 0v.03m-12 0v.03m0-3.203a3 3 0 01-4.682 2.72A9.094 9.094 0 005.1 18.24m5.4-12.49a3 3 0 11-6 0 3 3 0 016 0zm8 0a3 3 0 11-6 0 3 3 0 016 0z"/>', // crew change users
                    'default' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.875M2.25 5.25l4.5-1.875M2.25 12.75l4.5-1.875M12.75 5.25h.008v.008h-.008V5.25zm.008 3h-.008v.008h.008V8.25zm-.008 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z"/>'
                ];
            @endphp
            @foreach ($layanan->items as $index => $item)
                @php
                    $lowerTitle = strtolower($item->title);
                    $svgIcon = $icons['default'];
                    if (str_contains($lowerTitle, 'agen') || str_contains($lowerTitle, 'kapal') || str_contains($lowerTitle, 'ship')) {
                        $svgIcon = $icons['keagenan'];
                    } elseif (str_contains($lowerTitle, 'charter') || str_contains($lowerTitle, 'sewa') || str_contains($lowerTitle, 'broker') || str_contains($lowerTitle, 'carter')) {
                        $svgIcon = $icons['chartering'];
                    } elseif (str_contains($lowerTitle, 'muat') || str_contains($lowerTitle, 'bongkar') || str_contains($lowerTitle, 'stevedor') || str_contains($lowerTitle, 'cargo')) {
                        $svgIcon = $icons['bongkar'];
                    } elseif (str_contains($lowerTitle, 'crew') || str_contains($lowerTitle, 'awak') || str_contains($lowerTitle, 'kru') || str_contains($lowerTitle, 'personel')) {
                        $svgIcon = $icons['crew'];
                    }
                    
                    // Asymmetric Staggered vertical shift
                    $staggerClass = '';
                    if ($index % 3 === 1) {
                        $staggerClass = 'lg:translate-y-8';
                    } elseif ($index % 3 === 2) {
                        $staggerClass = 'lg:translate-y-4';
                    }
                @endphp
                {{-- Double-Bezel Enclosure --}}
                <div data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" class="relative rounded-[2rem] bg-navy-950/[0.03] p-2.5 border border-silver-250/50 shadow-md backdrop-blur-xs transition-all duration-500 hover:scale-[1.03] hover:-translate-y-1 hover:shadow-xl group {{ $staggerClass }}">
                    {{-- Inner Core --}}
                    <article class="h-full rounded-[calc(2rem-0.625rem)] bg-white p-8 flex flex-col items-start shadow-[inset_0_1px_1px_rgba(255,255,255,0.9)] border border-white">
                        <div class="mb-6 inline-flex rounded-2xl bg-gold-500/10 p-4 text-gold-600 transition-all duration-500 group-hover:bg-gold-500/20 group-hover:scale-110 group-hover:text-gold-700">
                            <svg class="h-6.5 w-6.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                {!! $svgIcon !!}
                            </svg>
                        </div>
                        <h3 class="font-display text-xl font-bold text-navy-900 group-hover:text-gold-700 transition duration-300 font-sans">
                            {{ $item->title }}
                        </h3>
                        <p class="mt-3 text-sm leading-relaxed text-navy-600 font-sans">
                            {{ $item->description }}
                        </p>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<x-section-divider :words="['Tentang', 'Trivora', 'Mitra', 'Berkarya', 'Sejak 2019', 'Indonesia']" />

@if ($tentang)
@php
    $tentangBullets = $tentang->items->filter(fn ($i) => ($i->meta['type'] ?? '') === 'bullet');
    $tentangCards = $tentang->items->filter(fn ($i) => ($i->meta['type'] ?? '') === 'card');
    $tentangParagraphs = $tentang->body ? preg_split('/\n\n+/', trim($tentang->body)) : [];
@endphp
{{-- 4. Tentang Perusahaan — Clean Editorial Split --}}
<section id="tentang" class="section-light py-24 lg:py-32">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-stretch gap-0 lg:grid-cols-2">
            {{-- Left: Image — edge-to-edge, no floating bezels --}}
            <div class="relative" data-aos="fade-right">
                <div class="overflow-hidden rounded-2xl lg:rounded-r-none lg:rounded-l-2xl h-full min-h-[400px] lg:min-h-0">
                    <img src="{{ asset('asset/pelabuhan2.png') }}" alt="Operasional Pelabuhan PT Trivora Mitra Berkarya" class="h-full w-full object-cover object-center" />
                </div>
            </div>

            {{-- Right: Editorial text — generous whitespace, clean hierarchy --}}
            <div class="flex flex-col justify-center py-12 px-6 sm:py-16 sm:px-10 lg:py-20 lg:pl-16 lg:pr-4" data-aos="fade-left">
                <span class="section-label">{{ $tentang->section_label }}</span>
                <h2 class="mt-5 font-display text-4xl font-extrabold text-navy-900 sm:text-5xl leading-[1.1] tracking-tight">
                    {{ $tentang->title }} <span class="text-gradient-gold">{{ $tentang->extra['title_highlight'] ?? '' }}</span>
                </h2>

                <div class="mt-8 space-y-4 font-sans text-navy-600 text-sm leading-relaxed">
                    @foreach ($tentangParagraphs as $i => $paragraph)
                        <p class="{{ $i === 0 ? 'text-base text-navy-800 font-medium leading-relaxed' : '' }}">
                            @if ($i === 0)
                                <span class="font-display text-4xl font-extrabold text-gold-600 float-left mr-2.5 leading-none">
                                    {{ mb_substr($companyName, 0, 1) }}
                                </span>
                                <strong class="text-navy-900">{{ mb_substr($companyName, 1) }}</strong>{{ Str::after($paragraph, $companyName) }}
                            @else
                                {{ $paragraph }}
                            @endif
                        </p>
                    @endforeach
                </div>

                <ul class="mt-10 grid gap-3 sm:grid-cols-2 font-sans">
                    @foreach ($tentangBullets as $item)
                        <li class="flex items-start gap-3 text-xs font-semibold text-navy-700">
                            <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-gold-500/10 text-gold-600">
                                <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            <span class="pt-0.5">{{ $item->title }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- Sub-cards row --}}
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 mt-20">
            <div data-aos="fade-up" class="rounded-2xl border border-silver-200/60 bg-white p-8 flex items-center transition duration-300 hover:border-silver-300">
                <div class="flex items-center gap-5 w-full">
                    <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-gold-500/10 text-gold-600">
                        <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-.778.099-1.533.284-2.253"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-display text-3xl font-extrabold text-gold-600 leading-none select-none">{{ $tentang->extra['highlight_card_title'] ?? '' }}</p>
                        <p class="text-[10px] font-bold tracking-[0.18em] text-navy-500 uppercase mt-2 font-sans">{{ $tentang->extra['highlight_card_subtitle'] ?? '' }}</p>
                    </div>
                </div>
            </div>

            @foreach ($tentangCards as $item)
                <div data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}" class="rounded-2xl border border-silver-200/60 bg-white p-8 group transition duration-300 hover:border-silver-300">
                    <h3 class="font-display text-lg font-bold text-navy-900 group-hover:text-gold-700 transition duration-300 font-sans">{{ $item->title }}</h3>
                    <p class="mt-3 text-sm leading-relaxed text-navy-600 font-sans">{{ $item->description }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if ($filosofi)
{{-- 5. Filosofi Perusahaan --}}
<section id="filosofi" class="section-alt relative py-24 lg:py-32">
    {{-- Large editorial watermark background --}}
    <div class="absolute inset-x-0 top-1/2 -translate-y-1/2 overflow-hidden pointer-events-none select-none z-0">
        <span class="font-display text-[14vw] font-black text-navy-900/[0.02] uppercase tracking-[0.1em] block text-center leading-none">
            {{ $filosofi->title }}
        </span>
    </div>

    <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl text-center mb-16">
            <span data-aos="fade-up" class="section-label justify-center">{{ $filosofi->section_label }}</span>
            <h2 data-aos="fade-up" data-aos-delay="100" class="mt-4 font-display text-4xl font-extrabold text-navy-900 sm:text-5xl">
                {{ $filosofi->title }}
            </h2>
            <p data-aos="fade-up" data-aos-delay="200" class="mt-4 text-base text-navy-655 max-w-2xl mx-auto">
                {{ $filosofi->subtitle }}
            </p>
        </div>
        
        <div class="grid gap-8 md:grid-cols-3">
            @foreach ($filosofi->items as $index => $item)
                {{-- Double-Bezel Architecture --}}
                <div data-aos="fade-up" data-aos-delay="{{ $index * 150 }}" class="relative rounded-[2rem] bg-navy-950/[0.03] p-2 border border-silver-250/50 shadow-md backdrop-blur-xs transition-all duration-500 hover:scale-[1.03] hover:-translate-y-1 hover:shadow-xl group">
                    <article class="h-full rounded-[calc(2rem-0.5rem)] bg-white p-8 flex flex-col items-start shadow-[inset_0_1px_1px_rgba(255,255,255,0.9)] border border-white">
                        <div class="relative flex h-14 w-14 items-center justify-center rounded-2xl bg-gold-500/10 text-gold-600 group-hover:bg-gold-500/20 group-hover:scale-110 transition duration-300">
                            <svg class="h-6.5 w-6.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $item->meta['icon'] ?? '' }}"/>
                            </svg>
                        </div>
                        
                        <h3 class="mt-6 font-display text-xl font-bold text-navy-900 group-hover:text-gold-700 transition duration-300 font-sans">
                            {{ $item->title }}
                        </h3>
                        <p class="mt-3 text-sm leading-relaxed text-navy-600 font-sans">
                            {{ $item->description }}
                        </p>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if ($visiMisi)
{{-- 6. Visi & Misi --}}
<section id="visi-misi" class="section-light py-24 lg:py-32">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl text-center mb-16">
            <span data-aos="fade-up" class="section-label justify-center">{{ $visiMisi->section_label }}</span>
            <h2 data-aos="fade-up" data-aos-delay="100" class="mt-4 font-display text-4xl font-extrabold text-navy-900 sm:text-5xl">
                {{ $visiMisi->title }}
            </h2>
        </div>
        
        <div class="grid items-start gap-12 lg:grid-cols-12 lg:gap-16 relative">
            {{-- Left: Vision column --}}
            <div data-aos="fade-right" class="lg:col-span-5 flex flex-col items-start pr-4">
                <span class="inline-flex rounded-full border border-gold-500/30 bg-gold-500/10 px-4 py-1 text-xs font-bold uppercase tracking-wider text-gold-600 font-sans">
                    {{ $visiMisi->extra['visi_badge'] ?? 'Visi' }}
                </span>
                <h3 class="mt-6 font-display text-2.5xl font-bold text-navy-900 leading-tight font-sans">
                    {{ $visiMisi->extra['visi_title'] ?? '' }}
                </h3>
                <p class="mt-4 text-base leading-relaxed text-navy-655 font-sans">
                    {{ $visiMisi->extra['visi_body'] ?? '' }}
                </p>
            </div>
            
            {{-- Vertical Divider Line --}}
            <div class="hidden lg:block lg:col-span-1 justify-self-center h-full min-h-[300px]">
                <div class="w-px h-full bg-linear-to-b from-silver-300/10 via-silver-300 to-silver-300/10"></div>
            </div>
            
            {{-- Right: Mission column --}}
            <div data-aos="fade-left" class="lg:col-span-6 flex flex-col items-start pl-4">
                <span class="inline-flex rounded-full border border-navy-900/10 bg-navy-900/5 px-4 py-1 text-xs font-bold uppercase tracking-wider text-navy-700 font-sans">
                    {{ $visiMisi->extra['misi_badge'] ?? 'Misi' }}
                </span>
                <ul class="mt-6 space-y-6 font-sans">
                    @foreach ($visiMisi->items as $item)
                        <li class="flex items-start gap-4 group">
                            <span class="mt-0.5 flex h-7.5 w-7.5 shrink-0 items-center justify-center rounded-full bg-gold-500/10 font-display text-xs font-extrabold text-gold-600 group-hover:bg-gold-500 group-hover:text-white transition duration-300">
                                {{ sprintf("%02d", $loop->iteration) }}
                            </span>
                            <span class="text-sm sm:text-base leading-relaxed text-navy-700 pt-1 group-hover:text-navy-950 transition duration-300">{{ $item->title }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
@endif

<x-section-divider :words="['Nilai', 'Perusahaan', 'Etos Kerja', 'Prinsip', 'Budaya', 'Standar']" :reverse="true" />

@if ($nilai)
{{-- 7. Nilai-nilai Perusahaan — Ultra-Minimalist Consulting Grid --}}
<section id="nilai" class="bg-white py-24 lg:py-32 relative overflow-hidden">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="flex flex-col items-start justify-between gap-6 lg:flex-row lg:items-end pb-12">
            <div class="max-w-xl">
                <span data-aos="fade-up" class="section-label">{{ $nilai->section_label }}</span>
                <h2 data-aos="fade-up" data-aos-delay="100" class="mt-4 font-display text-4xl font-extrabold text-navy-900 sm:text-5xl tracking-tight">
                    {{ $nilai->title }}
                </h2>
            </div>
            <p data-aos="fade-up" data-aos-delay="200" class="max-w-md text-base leading-relaxed text-navy-600 font-sans">
                {{ $nilai->subtitle }}
            </p>
        </div>

        {{-- Pristine Flat Grid --}}
        <div class="grid gap-px bg-silver-200/60 border border-silver-200/60 rounded-2xl overflow-hidden sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($nilai->items as $index => $item)
                <div data-aos="fade-up" data-aos-delay="{{ $index * 80 }}" class="bg-white p-8 lg:p-10 group transition-colors duration-300 hover:bg-silver-50/70">
                    {{-- Lightweight monogram --}}
                    <span class="font-display text-2xl font-extrabold text-gold-600/70 select-none group-hover:text-gold-600 transition duration-300">
                        {{ mb_substr($item->title, 0, 1) }}
                    </span>

                    <h3 class="mt-4 text-base font-bold text-navy-900 font-sans">
                        {{ $item->title }}
                    </h3>
                    <p class="mt-2.5 text-sm leading-relaxed text-navy-500 font-sans">
                        {{ $item->description }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if ($prime)
{{-- 8. PRIME Values — Dark Typographic List --}}
<section id="prime" class="relative bg-navy-950 text-white py-24 lg:py-32 overflow-hidden">
    {{-- Massive watermark letters --}}
    <div class="absolute inset-0 flex items-center justify-center pointer-events-none select-none z-0 overflow-hidden">
        <span class="font-display text-[25vw] font-black text-white/[0.02] tracking-[0.15em] leading-none">
            PRIME
        </span>
    </div>

    <div class="relative z-10 mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="mb-16 max-w-2xl">
            <span class="inline-flex items-center gap-3 text-xs font-bold uppercase tracking-[0.25em] text-gold-400">
                {{ $prime->section_label }}
            </span>
            <h2 class="mt-4 font-display text-4xl font-extrabold text-white sm:text-5xl tracking-tight">
                <span class="text-gradient-gold">PRIME</span> Values
            </h2>
            <p class="mt-5 text-base text-silver-400 leading-relaxed font-sans">
                {{ $prime->subtitle }}
            </p>
        </div>

        {{-- Stacked typographic list --}}
        <div class="border-t border-white/10">
            @foreach ($prime->items as $i => $item)
                <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}" class="group border-b border-white/10 py-10 sm:py-12 flex flex-col gap-4 sm:flex-row sm:items-start sm:gap-10 relative">
                    {{-- Letter pill --}}
                    <div class="flex items-center gap-4 sm:w-48 shrink-0">
                        <span class="font-display text-5xl sm:text-6xl font-black text-white/[0.06] group-hover:text-white/[0.12] transition duration-500 select-none leading-none">
                            {{ $item->meta['letter'] ?? '' }}
                        </span>
                        <span class="text-xs font-bold uppercase tracking-[0.2em] text-gold-500 font-sans">
                            {{ $item->meta['letter'] ?? '' }}
                        </span>
                    </div>

                    {{-- Content --}}
                    <div class="flex-1">
                        <h3 class="text-xl sm:text-2xl font-bold text-white group-hover:text-gold-400 transition duration-300 font-sans">
                            {{ $item->title }}
                        </h3>
                        <p class="mt-3 text-sm sm:text-base leading-relaxed text-silver-400 font-sans max-w-2xl">
                            {{ $item->description }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if ($struktur)
@php
    $strukturDirectors = $struktur->items->filter(fn ($i) => ($i->meta['type'] ?? '') === 'director');
    $strukturDivisions = $struktur->items->filter(fn ($i) => ($i->meta['type'] ?? '') === 'division');
@endphp
{{-- 9. Struktur Organisasi --}}
<section id="struktur" class="section-alt relative py-32 lg:py-40 overflow-hidden bg-grid-glow">
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-10">
        <div class="mx-auto max-w-3xl text-center">
            <span data-aos="fade-up" class="section-label justify-center">{{ $struktur->section_label }}</span>
            <h2 data-aos="fade-up" data-aos-delay="100" class="mt-4 font-display text-4xl font-extrabold text-navy-900 sm:text-5xl">
                {{ $struktur->title }}
            </h2>
            <p data-aos="fade-up" data-aos-delay="200" class="mt-4 text-base text-navy-600">
                {{ $struktur->subtitle }}
            </p>
        </div>

        <div class="mt-16 flex flex-col items-center">
            {{-- Top Role --}}
            <div data-aos="zoom-in" class="group relative w-64 aspect-[3/4] overflow-hidden rounded-[2rem] border border-silver-300 shadow-xl transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:border-gold-500/30 sm:w-72">
                @if (!empty($struktur->extra['top_role_image']))
                    <img src="{{ asset('storage/' . $struktur->extra['top_role_image']) }}" alt="{{ $struktur->extra['top_role_title'] ?? '' }}" class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105">
                @else
                    <div class="absolute inset-0 flex flex-col items-center justify-center bg-linear-to-br from-navy-800 to-navy-950 text-white/10">
                        <svg class="h-32 w-32" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" /></svg>
                    </div>
                @endif
                <div class="absolute inset-0 bg-linear-to-t from-navy-950 via-navy-900/40 to-transparent opacity-90 transition-opacity duration-300 group-hover:opacity-100"></div>
                <div class="absolute inset-x-0 bottom-0 flex flex-col items-center justify-end p-6 text-center z-10">
                    <p class="mb-1 text-[11px] font-bold uppercase tracking-widest text-gold-400">{{ $struktur->extra['top_role_label'] ?? '' }}</p>
                    <h3 class="font-display text-xl font-bold text-white sm:text-2xl">{{ $struktur->extra['top_role_title'] ?? '' }}</h3>
                </div>
            </div>

            {{-- Connecting Line 1 --}}
            @if ($strukturDirectors->count() > 0 || $strukturDivisions->count() > 0)
                <div class="my-6 h-14 w-px border-l-2 border-dashed border-gold-500/40"></div>
            @endif

            {{-- Directors --}}
            @if ($strukturDirectors->count() > 0)
                <div class="flex flex-wrap justify-center gap-6 sm:gap-8">
                    @foreach ($strukturDirectors as $item)
                        <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 150 }}" class="group relative w-56 aspect-[3/4] overflow-hidden rounded-[2rem] border border-silver-300 shadow-lg transition-all duration-500 hover:-translate-y-2 hover:shadow-xl hover:border-gold-500/30 sm:w-60">
                            @if (!empty($item->meta['image']))
                                <img src="{{ asset('storage/' . $item->meta['image']) }}" alt="{{ $item->title }}" class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105">
                            @else
                                <div class="absolute inset-0 flex flex-col items-center justify-center bg-linear-to-br from-navy-800 to-navy-950 text-white/10">
                                    <svg class="h-24 w-24" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" /></svg>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-linear-to-t from-navy-950 via-navy-900/40 to-transparent opacity-90 transition-opacity duration-300 group-hover:opacity-100"></div>
                            <div class="absolute inset-x-0 bottom-0 flex flex-col items-center justify-end p-5 text-center z-10">
                                <p class="mb-1 text-[10px] font-bold uppercase tracking-widest text-gold-400">{{ $item->title }}</p>
                                <h3 class="font-display text-lg font-bold text-white">{{ $item->description }}</h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- Connecting Line 2 --}}
            @if ($strukturDivisions->count() > 0 && $strukturDirectors->count() > 0)
                <div class="my-8 h-14 w-px border-l-2 border-dashed border-silver-300"></div>
            @endif

            {{-- Divisions --}}
            @if ($strukturDivisions->count() > 0)
                <div class="flex flex-wrap justify-center gap-4 sm:gap-6">
                    @foreach ($strukturDivisions as $item)
                        <div data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}" class="group relative w-44 aspect-[3/4] overflow-hidden rounded-[2rem] bg-silver-150 border border-silver-250 shadow-md transition-all duration-500 hover:-translate-y-1 hover:shadow-lg hover:border-gold-500/30 sm:w-48">
                            @if (!empty($item->meta['image']))
                                <img src="{{ asset('storage/' . $item->meta['image']) }}" alt="{{ $item->title }}" class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                            @else
                                <div class="absolute inset-0 flex flex-col items-center justify-center bg-linear-to-br from-navy-800 to-navy-950 text-white/10">
                                    <svg class="h-16 w-16" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" /></svg>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-linear-to-t from-navy-950 via-navy-900/40 to-transparent opacity-90 transition-opacity duration-300 group-hover:opacity-100"></div>
                            <div class="absolute inset-x-0 bottom-0 flex flex-col items-center justify-end p-4 text-center z-10">
                                <p class="mb-0.5 text-[9px] font-bold uppercase tracking-wider text-gold-400">{{ $item->title }}</p>
                                <h3 class="font-display text-sm font-bold text-white">{{ $item->description }}</h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>
@endif

<x-section-divider :words="['Komitmen', 'Dedikasi', 'Tanggung Jawab', 'Konsistensi', 'Kepercayaan', 'Loyalitas']" />

@if ($komitmen)
{{-- 10. Komitmen Perusahaan --}}
<section id="komitmen" class="section-light relative py-32 lg:py-48 bg-white overflow-hidden border-b border-silver-200/50">
    <div class="absolute inset-0 bg-radial-to-b from-gold-500/[0.02] via-transparent to-transparent pointer-events-none"></div>
    
    <div class="relative mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 text-center">
        <span data-aos="fade-up" class="section-label justify-center">{{ $komitmen->section_label }}</span>
        <h2 data-aos="fade-up" data-aos-delay="100" class="mt-6 font-display text-4xl font-extrabold leading-tight text-navy-900 sm:text-5xl lg:text-6xl tracking-tight">
            {{ $komitmen->title }}
        </h2>
        
        <div class="mt-20 space-y-16">
            @foreach ($komitmen->items as $index => $item)
                <div data-aos="fade-up" data-aos-delay="{{ $index * 150 }}" class="max-w-2xl mx-auto group">
                    <span class="font-display text-xs font-bold uppercase tracking-[0.2em] text-gold-500/70 block mb-3 select-none">
                        — {{ $item->title }} —
                    </span>
                    <p class="font-display text-xl sm:text-2xl leading-relaxed text-navy-800 font-medium group-hover:text-gold-700 transition duration-500">
                        "{{ $item->description }}"
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if ($sections['legalitas'] ?? null)
@php
    $legalitas = $sections['legalitas'];
@endphp
{{-- Dokumen Legalitas Section --}}
<section id="legalitas" class="section-alt py-24 lg:py-32">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center mx-auto max-w-3xl mb-16">
            <span data-aos="fade-up" class="section-label inline-block">{{ $legalitas->section_label }}</span>
            <h2 data-aos="fade-up" data-aos-delay="100" class="mt-4 font-display text-3xl font-extrabold text-navy-900 sm:text-4xl">
                {{ $legalitas->title }}
            </h2>
            <p data-aos="fade-up" data-aos-delay="200" class="mt-4 text-base text-navy-600">
                {{ $legalitas->subtitle }}
            </p>
        </div>

        @if ($legalitas->items->count() > 0)
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($legalitas->items as $item)
                    <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" class="card-glass card-interactive p-6 flex flex-col justify-between group overflow-hidden relative">
                        <div class="absolute -right-6 -top-6 h-20 w-20 rounded-full bg-gold-500/5 group-hover:bg-gold-500/10 transition duration-300"></div>
                        
                        <div>
                            @if (!empty($item->meta['image']))
                                <div class="aspect-4/3 w-full overflow-hidden rounded-lg bg-silver-100 border border-silver-200 mb-5 relative group/img">
                                    <img src="{{ asset('storage/' . $item->meta['image']) }}" alt="{{ $item->title }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                                    
                                    {{-- Hover overlay zoom-in --}}
                                    <a href="{{ asset('storage/' . $item->meta['image']) }}" target="_blank" rel="noopener noreferrer" class="absolute inset-0 bg-navy-950/60 opacity-0 flex items-center justify-center transition-opacity duration-300 group-hover/img:opacity-100 text-white font-sans text-xs font-semibold gap-1.5">
                                        <svg class="h-5 w-5 text-gold-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7" />
                                        </svg>
                                        Lihat Dokumen
                                    </a>
                                </div>
                            @else
                                <div class="aspect-4/3 w-full overflow-hidden rounded-lg bg-navy-900/10 border border-silver-200 mb-5 flex items-center justify-center text-navy-800/30">
                                    <svg class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                            @endif

                            <h3 class="font-display text-base font-bold text-navy-900 group-hover:text-gold-700 transition duration-300 font-sans">
                                {{ $item->title }}
                            </h3>
                            @if ($item->description)
                                <p class="mt-2 text-xs font-medium text-silver-600 font-sans tracking-wide uppercase">
                                    {{ $item->description }}
                                </p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-8 text-silver-500 bg-white/50 rounded-2xl border border-dashed border-silver-300 font-sans">
                Belum ada dokumen legalitas yang ditambahkan.
            </div>
        @endif
    </div>
</section>
@endif

@if ($hubungi)
@php
    $email = $hubungi->extra['email'] ?? '';
    $phone = $hubungi->extra['phone'] ?? '';
    $phoneLines = !empty($phone) ? array_filter(array_map('trim', explode("\n", str_replace("\r", "", $phone)))) : [];
    
    $firstPhone = count($phoneLines) > 0 ? $phoneLines[0] : '';
    $waNumber = $firstPhone ?: '6281234567890';
    $waNumber = preg_replace('/[^0-9]/', '', $waNumber);
    if (substr($waNumber, 0, 1) === '0') {
        $waNumber = '62' . substr($waNumber, 1);
    }
    $waText = urlencode('Halo, saya ingin bertanya tentang layanan PT Trivora Mitra Berkarya.');
    $waLink = "https://wa.me/{$waNumber}?text={$waText}";
@endphp
{{-- 11. Hubungi Kami --}}
<section id="hubungi-kami" class="section-alt py-24 lg:py-32">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-12 lg:gap-16 lg:items-center">
            
            {{-- Left column: contact information info-graphic --}}
            <div class="lg:col-span-7">
                <span data-aos="fade-up" class="section-label">{{ $hubungi->section_label }}</span>
                <h2 data-aos="fade-up" data-aos-delay="100" class="mt-4 font-display text-3xl font-extrabold text-navy-900 sm:text-4xl">
                    {{ $hubungi->title }}
                </h2>
                <p data-aos="fade-up" data-aos-delay="200" class="mt-4 text-base text-navy-600 max-w-xl">
                    {{ $hubungi->subtitle }}
                </p>
                
                {{-- Horizontal Info grid --}}
                <div class="mt-10 grid gap-6 sm:grid-cols-2">
                    <div class="flex gap-4">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gold-500/10 text-gold-600">
                            <svg class="h-5.5 w-5.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold tracking-wider text-silver-500 uppercase">Perusahaan</p>
                            <p class="mt-1 font-semibold text-navy-900">{{ $companyName }}</p>
                        </div>
                    </div>
                    
                    <div class="flex gap-4">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gold-500/10 text-gold-600">
                            <svg class="h-5.5 w-5.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4.674 2.816A1.002 1.002 0 0014 9H9.326a1.002 1.002 0 00-.674.184l-4.1 3.5a1.003 1.003 0 00-.326.716V17a2 2 0 002 2h12a2 2 0 002-2v-3.6a1 1 0 00-.326-.716l-4.1-3.5z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold tracking-wider text-silver-500 uppercase">Bidang Usaha</p>
                            <p class="mt-1 text-sm font-semibold text-navy-700">{{ $hubungi->extra['business_field'] ?? '' }}</p>
                        </div>
                    </div>
                    
                    <div class="flex gap-4">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gold-500/10 text-gold-600">
                            <svg class="h-5.5 w-5.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold tracking-wider text-silver-500 uppercase">Email</p>
                            <p class="mt-1 text-sm font-semibold text-navy-700">
                                <a href="mailto:{{ $email }}" class="transition hover:text-gold-600 break-all">{{ $email }}</a>
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex gap-4">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gold-500/10 text-gold-600">
                            <svg class="h-5.5 w-5.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold tracking-wider text-silver-500 uppercase">Telepon</p>
                            <div class="mt-1 flex flex-col gap-1.5">
                                @if (count($phoneLines) > 0)
                                    @foreach ($phoneLines as $line)
                                        @php
                                            $label = '';
                                            $number = $line;
                                            if (strpos($line, ':') !== false) {
                                                $parts = explode(':', $line, 2);
                                                $label = trim($parts[0]) . ': ';
                                                $number = trim($parts[1]);
                                            }
                                            
                                            $cleanNumber = preg_replace('/[^0-9]/', '', $number);
                                            if (substr($cleanNumber, 0, 1) === '0') {
                                                $cleanNumber = '62' . substr($cleanNumber, 1);
                                            }
                                            $lineWaLink = "https://wa.me/{$cleanNumber}?text=" . urlencode('Halo, saya ingin bertanya tentang layanan PT Trivora Mitra Berkarya.');
                                        @endphp
                                        <p class="text-sm font-semibold text-navy-700 leading-tight">
                                            <a href="{{ $lineWaLink }}" target="_blank" rel="noopener noreferrer" class="transition hover:text-gold-600">
                                                @if(!empty($label))
                                                    <span class="text-silver-500 font-medium text-xs">{{ trim($label, ': ') }}</span><br>
                                                @endif
                                                {{ $number }}
                                            </a>
                                        </p>
                                    @endforeach
                                @else
                                    <p class="text-sm font-semibold text-navy-700">
                                        <a href="{{ $waLink }}" target="_blank" rel="noopener noreferrer" class="transition hover:text-gold-600">{{ $phone }}</a>
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Right column: contact form card --}}
            <div class="lg:col-span-5">
                <div data-aos="zoom-in" class="card-glass p-8 sm:p-10 relative overflow-hidden group hover:border-gold-500/30">
                    <div class="absolute -right-10 -bottom-10 h-32 w-32 rounded-full bg-gold-500/5 group-hover:bg-gold-500/10 transition duration-300"></div>
                    
                    <h3 class="font-display text-2xl font-bold text-navy-900">Hubungi Kami</h3>
                    <p class="mt-2 text-sm leading-relaxed text-navy-650">
                        Kirimkan pesan Anda secara langsung kepada admin kami menggunakan formulir di bawah ini.
                    </p>

                    {{-- Alert Container for dynamic response --}}
                    <div id="form-alert-container">
                        @if (session('success_message'))
                            <div class="mt-6 rounded-2xl border border-green-200 bg-green-50 p-4 text-sm text-green-800">
                                <div class="flex items-start gap-3">
                                    <svg class="h-5 w-5 shrink-0 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>{{ session('success_message') }}</span>
                                </div>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="mt-6 rounded-2xl border border-red-200 bg-red-50 p-4 text-sm text-red-800">
                                <ul class="list-inside list-disc space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    
                    <form id="contact-form" action="{{ route('messages.store') }}" method="POST" class="mt-6 space-y-4 relative z-10">
                        @csrf
                        <div>
                            <label for="form_name" class="block text-xs font-bold uppercase tracking-wider text-navy-700 mb-1.5">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" name="name" id="form_name" value="{{ old('name') }}" required 
                                   class="w-full rounded-xl border border-silver-250 bg-white/50 px-4 py-3 text-sm text-navy-800 placeholder:text-silver-400 focus:border-gold-500 focus:bg-white focus:outline-none focus:ring-0 transition-all duration-300"
                                   placeholder="Nama Anda">
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2">
                            <div>
                                <label for="form_email" class="block text-xs font-bold uppercase tracking-wider text-navy-700 mb-1.5">Email</label>
                                <input type="email" name="email" id="form_email" value="{{ old('email') }}"
                                       class="w-full rounded-xl border border-silver-250 bg-white/50 px-4 py-3 text-sm text-navy-800 placeholder:text-silver-400 focus:border-gold-500 focus:bg-white focus:outline-none focus:ring-0 transition-all duration-300"
                                       placeholder="nama@email.com">
                            </div>
                            <div>
                                <label for="form_phone" class="block text-xs font-bold uppercase tracking-wider text-navy-700 mb-1.5">Telepon</label>
                                <input type="text" name="phone" id="form_phone" value="{{ old('phone') }}"
                                       class="w-full rounded-xl border border-silver-250 bg-white/50 px-4 py-3 text-sm text-navy-800 placeholder:text-silver-400 focus:border-gold-500 focus:bg-white focus:outline-none focus:ring-0 transition-all duration-300"
                                       placeholder="08123456789">
                            </div>
                        </div>

                        <div>
                            <label for="form_subject" class="block text-xs font-bold uppercase tracking-wider text-navy-700 mb-1.5">Subjek</label>
                            <input type="text" name="subject" id="form_subject" value="{{ old('subject') }}"
                                   class="w-full rounded-xl border border-silver-250 bg-white/50 px-4 py-3 text-sm text-navy-800 placeholder:text-silver-400 focus:border-gold-500 focus:bg-white focus:outline-none focus:ring-0 transition-all duration-300"
                                   placeholder="Topik Pesan">
                        </div>

                        <div>
                            <label for="form_message" class="block text-xs font-bold uppercase tracking-wider text-navy-700 mb-1.5">Pesan <span class="text-red-500">*</span></label>
                            <textarea name="message" id="form_message" rows="4" required
                                      class="w-full rounded-xl border border-silver-250 bg-white/50 px-4 py-3 text-sm text-navy-800 placeholder:text-silver-400 focus:border-gold-500 focus:bg-white focus:outline-none focus:ring-0 transition-all duration-300"
                                      placeholder="Tuliskan pesan Anda disini...">{{ old('message') }}</textarea>
                        </div>

                        <button type="submit" class="mt-4 flex w-full items-center justify-center gap-2.5 rounded-full bg-linear-to-r from-gold-600 to-gold-500 py-3.5 text-sm font-bold text-white shadow-lg shadow-gold-500/20 transition duration-300 hover:scale-[1.02] hover:from-gold-500 hover:to-gold-400">
                            Kirim Pesan
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>

    {{-- Contact Form AJAX Handler --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('contact-form');
            if (!form) return;
            
            const alertContainer = document.getElementById('form-alert-container');
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;

            form.addEventListener('submit', function (e) {
                e.preventDefault();

                // Set loading state
                submitBtn.disabled = true;
                submitBtn.innerHTML = `
                    <svg class="animate-spin h-5 w-5 text-white" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Mengirim...</span>
                `;

                // Clear previous alerts
                alertContainer.innerHTML = '';

                const formData = new FormData(form);

                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(async response => {
                    const contentType = response.headers.get('content-type');
                    let data = {};
                    
                    if (contentType && contentType.includes('application/json')) {
                        data = await response.json();
                    } else {
                        const text = await response.text();
                        console.error('Non-JSON response received:', text);
                        throw new Error(`Server returned non-JSON response (Status: ${response.status})`);
                    }
                    
                    if (response.ok) {
                        // Success
                        form.reset();
                        
                        // Show floating toast
                        if (window.showSuccessToast) {
                            window.showSuccessToast(data.message);
                        } else {
                            alertContainer.innerHTML = `
                                <div class="mt-6 rounded-2xl border border-green-200 bg-green-50 p-4 text-sm text-green-800">
                                    <div class="flex items-start gap-3">
                                        <svg class="h-5 w-5 shrink-0 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>${data.message}</span>
                                    </div>
                                </div>
                            `;
                        }
                    } else {
                        // Validation or custom error
                        let errorMsg = '';
                        if (data.errors) {
                            errorMsg = '<ul class="list-inside list-disc space-y-1">';
                            Object.values(data.errors).forEach(errArray => {
                                errArray.forEach(err => {
                                    errorMsg += `<li>${err}</li>`;
                                });
                            });
                            errorMsg += '</ul>';
                        } else {
                            errorMsg = data.message || 'Terjadi kesalahan. Silakan coba lagi.';
                        }

                        alertContainer.innerHTML = `
                            <div class="mt-6 rounded-2xl border border-red-200 bg-red-50 p-4 text-sm text-red-800">
                                ${errorMsg}
                            </div>
                        `;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alertContainer.innerHTML = `
                        <div class="mt-6 rounded-2xl border border-red-200 bg-red-50 p-4 text-sm text-red-800">
                            Terjadi kesalahan koneksi. Silakan coba lagi.
                        </div>
                    `;
                })
                .finally(() => {
                    // Restore button state
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnText;
                });
            });
        });
    </script>
</section>
@endif

@if ($lokasi)
@php
    $lat = $lokasi->extra['latitude'] ?? '';
    $lng = $lokasi->extra['longitude'] ?? '';
    $mapsUrl = "https://www.google.com/maps/search/?api=1&query={$lat},{$lng}";
    $addressLines = $lokasi->extra['address'] ? explode("\n", $lokasi->extra['address']) : [];
@endphp
{{-- 12. Alamat & Peta Lokasi --}}
<section id="lokasi" class="section-light py-24 lg:py-32 bg-grid-glow border-t border-silver-200/50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl text-center mb-16">
            <span data-aos="fade-up" class="section-label justify-center">{{ $lokasi->section_label }}</span>
            <h2 data-aos="fade-up" data-aos-delay="100" class="mt-4 font-display text-4xl font-extrabold text-navy-900 sm:text-5xl">
                {{ $lokasi->title }}
            </h2>
            <p data-aos="fade-up" data-aos-delay="200" class="mt-4 text-base text-navy-655 max-w-xl mx-auto">
                {{ $lokasi->subtitle }}
            </p>
        </div>

        {{-- Overlapping Map Container --}}
        <div class="relative w-full rounded-[2.5rem] overflow-hidden border border-silver-250/50 shadow-xl bg-silver-50 h-[650px] sm:h-[600px] lg:h-[550px] flex flex-col justify-end lg:justify-start">
            {{-- Map IFrame (Takes full container width and height) --}}
            <div class="absolute inset-0 z-0 w-full h-[350px] lg:h-full">
                <iframe
                    src="{{ $lokasi->extra['maps_embed_url'] ?? '' }}"
                    class="w-full h-full border-0 focus:outline-none"
                    allowfullscreen
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Lokasi {{ $companyName }} di Google Maps"
                ></iframe>
            </div>
            
            {{-- Floating Address Card Overlay --}}
            <div data-aos="fade-right" class="relative z-10 m-4 lg:m-10 lg:w-[26rem] card-glass p-8 lg:p-10 border-white bg-white/95 shadow-2xl rounded-[2rem] flex flex-col justify-between self-start">
                <div class="absolute -right-6 -top-6 h-20 w-20 rounded-full bg-gold-500/5 group-hover:bg-gold-500/10 transition duration-300"></div>
                
                <div class="flex items-start gap-4">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-gold-500/10 text-gold-600">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-display text-xl font-bold text-navy-900 leading-none">Alamat Kantor</h3>
                        <p class="mt-2 text-[10px] font-semibold tracking-wide text-silver-500 uppercase font-sans">{{ $companyName }}</p>
                    </div>
                </div>
                
                <address class="mt-6 not-italic leading-relaxed text-navy-655 text-sm font-sans">
                    @foreach ($addressLines as $line)
                        {{ $line }}@if (! $loop->last)<br>@endif
                    @endforeach
                </address>
                
                <div class="mt-8 flex flex-col sm:flex-row gap-4">
                    <a
                        href="{{ $mapsUrl }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center justify-center gap-2.5 rounded-full bg-linear-to-r from-gold-600 to-gold-500 px-6 py-3.5 text-xs font-bold text-white shadow-lg shadow-gold-500/20 transition duration-300 hover:scale-105 hover:from-gold-500 hover:to-gold-400 active:scale-[0.98] font-sans"
                    >
                        Petunjuk Arah
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                    <a
                        href="{{ $mapsUrl }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center justify-center gap-1.5 text-xs font-bold text-gold-600 transition duration-200 hover:text-gold-500 hover:gap-2 font-sans"
                    >
                        Buka di Google Maps
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@endsection
