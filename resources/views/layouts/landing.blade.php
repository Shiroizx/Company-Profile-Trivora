<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $settings['meta_description'] ?? 'PT Trivora Mitra Berkarya — Jasa keagenan kapal profesional, andal, dan terpercaya di Indonesia.' }}">
    <title>@yield('title', $settings['company_name'] ?? 'PT Trivora Mitra Berkarya')</title>
    <link rel="icon" href="{{ asset($settings['logo_path'] ?? 'asset/logo.jpeg') }}" type="image/jpeg">

    @include('components.seo-head')

    @fonts
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-silver-100">
    @php
        $navProfile = [
            'tentang' => 'Tentang',
            'filosofi' => 'Filosofi',
            'visi-misi' => 'Visi & Misi',
            'nilai' => 'Nilai',
            'prime' => 'PRIME',
            'struktur' => 'Struktur',
            'komitmen' => 'Komitmen',
        ];
        if (isset($sections['legalitas']) && $sections['legalitas']->is_active) {
            $navProfile['legalitas'] = 'Legalitas';
        }
        $navKontak = [
            'hubungi-kami' => 'Hubungi Kami',
            'lokasi' => 'Lokasi',
        ];
    @endphp

    <nav id="main-nav">
        <div id="main-nav-container">
            <div id="main-nav-inner">
                <a href="#beranda" class="group shrink-0" data-nav-link>
                    <img
                        src="{{ asset($settings['logo_path'] ?? 'asset/logo.jpeg') }}"
                        alt="{{ $settings['company_name'] ?? 'PT Trivora Mitra Berkarya' }}"
                        class="h-9 w-auto rounded-lg bg-white px-1.5 py-0.5 shadow-md ring-1 ring-silver-300/80 transition group-hover:shadow-lg sm:h-10"
                        width="180"
                        height="48"
                    />
                </a>

                {{-- Desktop navigation --}}
                <div class="hidden items-center gap-1 lg:flex">
                    <a href="#beranda" data-nav-link class="nav-link">Beranda</a>
                    <a href="#keunggulan" data-nav-link class="nav-link">Keunggulan</a>
                    <a href="#layanan" data-nav-link class="nav-link">Layanan</a>

                    <div class="nav-dropdown group relative" data-nav-group="profile">
                        <button type="button" class="nav-link flex items-center gap-1.5" aria-haspopup="true" aria-expanded="false" data-dropdown-trigger>
                            Profile
                            <svg class="h-3 w-3 opacity-60 transition group-hover:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div class="nav-dropdown-menu invisible absolute left-1/2 -translate-x-1/2 top-full z-50 mt-2 min-w-[12rem] opacity-0 transition-all duration-300 group-hover:visible group-hover:opacity-100 group-hover:translate-y-1">
                            @foreach ($navProfile as $id => $label)
                                <a href="#{{ $id }}" data-nav-link class="nav-dropdown-item">{{ $label }}</a>
                            @endforeach
                        </div>
                    </div>

                    <div class="nav-dropdown group relative" data-nav-group="kontak">
                        <button type="button" class="nav-link flex items-center gap-1.5" aria-haspopup="true" aria-expanded="false" data-dropdown-trigger>
                            Kontak
                            <svg class="h-3 w-3 opacity-60 transition group-hover:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div class="nav-dropdown-menu invisible absolute left-1/2 -translate-x-1/2 top-full z-50 mt-2 min-w-[12rem] opacity-0 transition-all duration-300 group-hover:visible group-hover:opacity-100 group-hover:translate-y-1">
                            @foreach ($navKontak as $id => $label)
                                <a href="#{{ $id }}" data-nav-link class="nav-dropdown-item">{{ $label }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <a href="#hubungi-kami" data-nav-link class="hidden shrink-0 rounded-full bg-linear-to-r from-gold-600 to-gold-500 px-5 py-2 text-xs font-bold text-white shadow-md shadow-gold-500/20 transition duration-300 hover:scale-105 hover:shadow-lg hover:shadow-gold-500/30 lg:inline-block">
                        Hubungi Kami
                    </a>

                    <button id="menu-toggle" type="button" aria-expanded="false" aria-controls="mobile-menu" class="group relative inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-silver-250 bg-white/80 text-navy-700 shadow-sm backdrop-blur-sm transition-all duration-300 hover:bg-silver-100 hover:text-gold-600 lg:hidden">
                        <span class="sr-only">Buka menu</span>
                        <div class="relative flex h-3.5 w-4 flex-col justify-between transition-transform duration-300">
                            <span class="h-[2px] w-4 rounded-full bg-current transition-all duration-300 origin-center group-[.menu-open]:rotate-45 group-[.menu-open]:translate-y-[5.5px]"></span>
                            <span class="h-[2px] w-4 rounded-full bg-current transition-all duration-300 group-[.menu-open]:scale-x-0"></span>
                            <span class="h-[2px] w-4 rounded-full bg-current transition-all duration-300 origin-center group-[.menu-open]:-rotate-45 group-[.menu-open]:-translate-y-[5.5px]"></span>
                        </div>
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile navigation (Floating overlay) --}}
        <div id="mobile-menu" class="lg:hidden">
            <div class="flex flex-col gap-1">
                <a href="#beranda" data-nav-link class="nav-mobile-link">Beranda</a>
                <a href="#keunggulan" data-nav-link class="nav-mobile-link">Keunggulan</a>
                <a href="#layanan" data-nav-link class="nav-mobile-link">Layanan</a>

                <div class="border-t border-silver-200/60 my-2"></div>

                <details class="nav-mobile-group">
                    <summary class="nav-mobile-link cursor-pointer list-none flex items-center justify-between [&::-webkit-details-marker]:hidden">
                        <span>Profile</span>
                        <svg class="h-4 w-4 opacity-60 transition duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                    </summary>
                    <div class="mt-1 ml-2 flex flex-col border-l border-silver-200 pl-2">
                        @foreach ($navProfile as $id => $label)
                            <a href="#{{ $id }}" data-nav-link class="nav-mobile-sublink">{{ $label }}</a>
                        @endforeach
                    </div>
                </details>

                <details class="nav-mobile-group mt-1">
                    <summary class="nav-mobile-link cursor-pointer list-none flex items-center justify-between [&::-webkit-details-marker]:hidden">
                        <span>Kontak</span>
                        <svg class="h-4 w-4 opacity-60 transition duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                    </summary>
                    <div class="mt-1 ml-2 flex flex-col border-l border-silver-200 pl-2">
                        @foreach ($navKontak as $id => $label)
                            <a href="#{{ $id }}" data-nav-link class="nav-mobile-sublink">{{ $label }}</a>
                        @endforeach
                    </div>
                </details>
                
                <div class="border-t border-silver-200/60 my-3"></div>

                <a href="#hubungi-kami" data-nav-link class="block w-full text-center rounded-xl bg-linear-to-r from-gold-600 to-gold-500 py-3 text-sm font-bold text-white shadow-md shadow-gold-500/10">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="relative overflow-hidden bg-navy-950 pt-20 pb-12 text-silver-300">
        {{-- Background Image with increased opacity --}}
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('asset/pelabuhan2.png') }}" alt="Footer Background" class="h-full w-full object-cover opacity-25" />
            <div class="absolute inset-0 bg-linear-to-t from-navy-950 via-navy-950/80 to-navy-950/50"></div>
        </div>
        {{-- Subtle grid texture --}}
        <div class="absolute inset-0 z-0 opacity-5">
            <svg class="h-full w-full" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="footer-grid" width="40" height="40" patternUnits="userSpaceOnUse">
                        <path d="M 40 0 L 0 0 0 40" fill="none" stroke="currentColor" stroke-width="1"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#footer-grid)"/>
            </svg>
        </div>

        <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            {{-- Massive company name — visual anchor --}}
            <div class="mb-16 lg:mb-20">
                <h2 class="font-display text-5xl sm:text-7xl lg:text-8xl font-extrabold text-white/[0.07] leading-[0.85] tracking-tight select-none">
                    {{ $settings['company_name'] ?? 'PT Trivora Mitra Berkarya' }}
                </h2>
            </div>

            {{-- Main footer content — staggered horizontal --}}
            <div class="grid grid-cols-1 gap-12 md:grid-cols-12 lg:gap-8">
                {{-- Logo & Tagline --}}
                <div class="md:col-span-4 flex flex-col gap-5">
                    <img
                        src="{{ asset($settings['logo_path'] ?? 'asset/logo.jpeg') }}"
                        alt="{{ $settings['company_name'] ?? 'PT Trivora Mitra Berkarya' }}"
                        class="h-12 w-auto self-start rounded-lg bg-white px-2 py-1 shadow-md"
                        width="160"
                        height="48"
                    />
                    <p class="text-sm leading-relaxed text-silver-400 max-w-xs font-sans">
                        {{ $settings['footer_tagline'] ?? 'Jasa Keagenan Kapal — Partner Maritim Terpercaya di Seluruh Perairan Indonesia.' }}
                    </p>
                </div>

                {{-- Navigation links — grouped horizontal --}}
                <div class="md:col-span-4 flex gap-12 sm:gap-16">
                    <div>
                        <h5 class="text-[10px] font-bold uppercase tracking-[0.25em] text-gold-500 font-sans">Navigasi</h5>
                        <ul class="mt-5 space-y-3 text-sm">
                            <li><a href="#beranda" class="transition duration-200 hover:text-white font-sans">Beranda</a></li>
                            <li><a href="#keunggulan" class="transition duration-200 hover:text-white font-sans">Keunggulan</a></li>
                            <li><a href="#layanan" class="transition duration-200 hover:text-white font-sans">Layanan</a></li>
                            <li><a href="#hubungi-kami" class="transition duration-200 hover:text-white font-sans">Hubungi Kami</a></li>
                        </ul>
                    </div>
                    <div>
                        <h5 class="text-[10px] font-bold uppercase tracking-[0.25em] text-gold-500 font-sans">Profil</h5>
                        <ul class="mt-5 space-y-3 text-sm">
                            @php
                                $navProfile = [
                                    'tentang' => 'Tentang Kami',
                                    'filosofi' => 'Filosofi',
                                    'visi-misi' => 'Visi & Misi',
                                    'nilai' => 'Nilai Perusahaan',
                                    'struktur' => 'Struktur Organisasi',
                                ];
                            @endphp
                            @foreach ($navProfile as $id => $label)
                                <li><a href="#{{ $id }}" class="transition duration-200 hover:text-white font-sans">{{ $label }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                {{-- Contact info --}}
                <div class="md:col-span-4">
                    <h5 class="text-[10px] font-bold uppercase tracking-[0.25em] text-gold-500 font-sans">Kontak</h5>
                    <ul class="mt-5 space-y-4 text-sm text-silver-400">
                        @php
                            $email = isset($sections['hubungi_kami']) && isset($sections['hubungi_kami']->extra['email']) ? $sections['hubungi_kami']->extra['email'] : ($settings['email'] ?? '');
                            $phone = isset($sections['hubungi_kami']) && isset($sections['hubungi_kami']->extra['phone']) ? $sections['hubungi_kami']->extra['phone'] : ($settings['phone'] ?? '');
                            $phoneLines = !empty($phone) ? array_filter(array_map('trim', explode("\n", str_replace("\r", "", $phone)))) : [];
                        @endphp
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
                                <li class="flex items-start gap-3">
                                    <svg class="mt-0.5 h-4 w-4 shrink-0 text-gold-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    <a href="{{ $lineWaLink }}" target="_blank" rel="noopener noreferrer" class="transition duration-200 hover:text-white leading-tight font-sans">
                                        @if(!empty($label))
                                            <span class="text-silver-500 text-[10px] block leading-none mb-0.5 font-sans">{{ trim($label, ': ') }}</span>
                                        @endif
                                        <span class="text-sm">{{ $number }}</span>
                                    </a>
                                </li>
                            @endforeach
                        @elseif ($phone)
                            @php
                                $waNumber = preg_replace('/[^0-9]/', '', $phone);
                                if (substr($waNumber, 0, 1) === '0') {
                                    $waNumber = '62' . substr($waNumber, 1);
                                }
                                $waLink = "https://wa.me/{$waNumber}?text=" . urlencode('Halo, saya ingin bertanya tentang layanan PT Trivora Mitra Berkarya.');
                            @endphp
                            <li class="flex items-start gap-3">
                                <svg class="mt-0.5 h-4 w-4 shrink-0 text-gold-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                <a href="{{ $waLink }}" target="_blank" rel="noopener noreferrer" class="transition duration-200 hover:text-white font-sans text-sm">{{ $phone }}</a>
                            </li>
                        @endif
                        @if ($email)
                            <li class="flex items-start gap-3">
                                <svg class="mt-0.5 h-4 w-4 shrink-0 text-gold-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <a href="mailto:{{ $email }}" class="transition duration-200 hover:text-white break-all font-sans text-sm">{{ $email }}</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>

            {{-- Copyright --}}
            <div class="mt-16 border-t border-white/10 pt-8 text-center text-xs text-silver-500 font-sans">
                <p>&copy; {{ date('Y') }} {{ $settings['company_name'] ?? 'PT Trivora Mitra Berkarya' }}. Hak cipta dilindungi.</p>
            </div>
        </div>
    </footer>

    {{-- Floating WhatsApp Button --}}
    @php
        $phone = '';
        if (isset($sections['hubungi_kami']) && isset($sections['hubungi_kami']->extra['phone'])) {
            $phone = $sections['hubungi_kami']->extra['phone'];
        } elseif (isset($settings['phone'])) {
            $phone = $settings['phone'];
        }

        $phoneLines = !empty($phone) ? array_filter(array_map('trim', explode("\n", str_replace("\r", "", $phone)))) : [];
    @endphp

    @if (count($phoneLines) > 1)
        {{-- Floating WhatsApp widget with popover --}}
        <div class="fixed bottom-6 right-6 z-50 sm:bottom-8 sm:right-8" id="wa-widget">
            {{-- Popover menu --}}
            <div id="wa-popover" class="invisible absolute bottom-16 right-0 mb-3 w-64 rounded-2xl border border-silver-200/80 bg-white/95 p-4 shadow-2xl backdrop-blur-md transition-all duration-300 translate-y-3 opacity-0">
                <div class="mb-3 border-b border-silver-100 pb-2">
                    <p class="text-xs font-bold uppercase tracking-wider text-navy-900 font-sans">Hubungi Kami via WhatsApp</p>
                    <p class="mt-0.5 text-[11px] text-navy-500 font-sans leading-none">Pilih kontak admin di bawah ini:</p>
                </div>
                <div class="space-y-2 max-h-[240px] overflow-y-auto pr-1">
                    @foreach ($phoneLines as $index => $line)
                        @php
                            $label = 'Admin ' . ($index + 1);
                            $number = $line;
                            if (strpos($line, ':') !== false) {
                                $parts = explode(':', $line, 2);
                                $label = trim($parts[0]);
                                $number = trim($parts[1]);
                            }
                            
                            $cleanNumber = preg_replace('/[^0-9]/', '', $number);
                            if (substr($cleanNumber, 0, 1) === '0') {
                                $cleanNumber = '62' . substr($cleanNumber, 1);
                            }
                            $lineWaLink = "https://wa.me/{$cleanNumber}?text=" . urlencode('Halo, saya ingin bertanya tentang layanan PT Trivora Mitra Berkarya.');
                        @endphp
                        <a href="{{ $lineWaLink }}" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 rounded-xl border border-silver-100 bg-silver-50/50 p-2.5 transition duration-200 hover:border-gold-500/30 hover:bg-gold-500/5 hover:text-gold-600">
                            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-[#25D366]/10 text-[#25D366]">
                                <svg class="h-4.5 w-4.5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/>
                                </svg>
                            </div>
                            <div class="text-left leading-tight">
                                <p class="text-xs font-bold text-navy-900 font-sans leading-none">{{ $label }}</p>
                                <p class="text-[10px] text-navy-500 font-sans mt-1">{{ $number }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            
            {{-- Floating Button to toggle popover --}}
            <button id="wa-toggle-btn"
               class="flex h-14 w-14 items-center justify-center rounded-full bg-[#25D366] text-white shadow-lg shadow-[#25D366]/30 transition-all duration-300 hover:scale-110 hover:bg-[#20ba5a] hover:shadow-xl focus:outline-none"
               aria-label="Tampilkan Pilihan WhatsApp" aria-haspopup="true" aria-expanded="false">
                <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/>
                </svg>
            </button>
        </div>
        
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const widget = document.getElementById('wa-widget');
                const btn = document.getElementById('wa-toggle-btn');
                const popover = document.getElementById('wa-popover');
                
                if (btn && popover) {
                    btn.addEventListener('click', function(e) {
                        e.stopPropagation();
                        const isExpanded = btn.getAttribute('aria-expanded') === 'true';
                        
                        if (isExpanded) {
                            closeWaPopover();
                        } else {
                            openWaPopover();
                        }
                    });
                    
                    document.addEventListener('click', function(e) {
                        if (widget && !widget.contains(e.target)) {
                            closeWaPopover();
                        }
                    });
                    
                    document.addEventListener('keydown', function(e) {
                        if (e.key === 'Escape') {
                            closeWaPopover();
                        }
                    });
                    
                    function openWaPopover() {
                        btn.setAttribute('aria-expanded', 'true');
                        popover.classList.remove('invisible', 'translate-y-3', 'opacity-0');
                        popover.classList.add('translate-y-0', 'opacity-100');
                    }
                    
                    function closeWaPopover() {
                        btn.setAttribute('aria-expanded', 'false');
                        popover.classList.remove('translate-y-0', 'opacity-100');
                        popover.classList.add('translate-y-3', 'opacity-0');
                        setTimeout(() => {
                            if (btn.getAttribute('aria-expanded') === 'false') {
                                popover.classList.add('invisible');
                            }
                        }, 300);
                    }
                }
            });
        </script>
    @else
        @php
            $firstPhone = count($phoneLines) > 0 ? $phoneLines[0] : $phone;
            $waNumber = $firstPhone ?: '6281234567890';
            $waNumber = preg_replace('/[^0-9]/', '', $waNumber);
            if (substr($waNumber, 0, 1) === '0') {
                $waNumber = '62' . substr($waNumber, 1);
            }
            $waText = urlencode('Halo, saya ingin bertanya tentang layanan PT Trivora Mitra Berkarya.');
            $waLink = "https://wa.me/{$waNumber}?text={$waText}";
        @endphp
        {{-- Single phone number: direct link --}}
        <a href="{{ $waLink }}" target="_blank" rel="noopener noreferrer" 
           class="fixed bottom-6 right-6 z-50 flex h-14 w-14 items-center justify-center rounded-full bg-[#25D366] text-white shadow-lg shadow-[#25D366]/30 transition-all duration-300 hover:scale-110 hover:bg-[#20ba5a] hover:shadow-xl sm:bottom-8 sm:right-8"
           aria-label="Chat WhatsApp">
            <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/>
            </svg>
        </a>
    @endif

    {{-- AOS Animation Script --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                once: true,
                easing: 'ease-out-cubic',
                offset: 50
            });
        });
    </script>

    {{-- Floating Toast Container --}}
    <div id="toast-container" class="fixed top-6 right-6 z-[9999] flex flex-col gap-3"></div>

    <script>
        window.showSuccessToast = function(message) {
            const container = document.getElementById('toast-container');
            if (!container) return;

            const toastId = 'toast-' + Math.random().toString(36).substring(2, 9);
            const html = `
                <div id="${toastId}" class="flex max-w-md items-center gap-3.5 rounded-2xl border border-green-200 bg-white/95 px-5 py-4 shadow-2xl backdrop-blur-md transition-all duration-500 translate-y-4 opacity-0">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-green-500/10 text-green-600">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-bold text-navy-900 font-sans">Berhasil!</p>
                        <p class="mt-0.5 text-xs text-navy-600 leading-relaxed font-sans">${message}</p>
                    </div>
                    <button onclick="closeToast('${toastId}')" class="text-silver-400 hover:text-navy-950 transition">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            `;
            
            container.insertAdjacentHTML('beforeend', html);
            const toast = document.getElementById(toastId);
            
            // Trigger animate in
            setTimeout(() => {
                toast.classList.remove('translate-y-4', 'opacity-0');
                toast.classList.add('translate-y-0', 'opacity-100');
            }, 50);

            // Auto close after 6 seconds
            setTimeout(() => {
                closeToast(toastId);
            }, 6000);
        };

        window.closeToast = function(toastId) {
            const toast = document.getElementById(toastId);
            if (toast) {
                toast.classList.remove('translate-y-0', 'opacity-100');
                toast.classList.add('translate-y-4', 'opacity-0');
                setTimeout(() => {
                    toast.remove();
                }, 500);
            }
        };

        @if (session('success_message'))
            document.addEventListener('DOMContentLoaded', function() {
                window.showSuccessToast("{{ session('success_message') }}");
            });
        @endif
    </script>
</body>
</html>
