{{-- SEO Meta Tags Partial --}}
{{-- This partial is isolated to avoid Blade @if/@endif parse conflicts in the main layout --}}

@php
    $companyName = $settings['company_name'] ?? 'PT Trivora Mitra Berkarya';
    $metaDesc = $settings['meta_description'] ?? 'PT Trivora Mitra Berkarya — Jasa keagenan kapal profesional, andal, dan terpercaya di Indonesia.';
    $logoUrl = asset($settings['logo_path'] ?? 'asset/logo.jpeg');
    $currentUrl = url()->current();
    $siteUrl = url('/');
    $pageTitle = $companyName;

    $hubungiSection = $sections['hubungi_kami'] ?? null;
    $lokasiSection = $sections['lokasi'] ?? null;

    $phoneNum = ($hubungiSection && isset($hubungiSection->extra['phone']))
        ? str_replace(["\r", "\n"], ", ", trim($hubungiSection->extra['phone']))
        : '+628138287909';

    $addressVal = ($lokasiSection && isset($lokasiSection->extra['address']))
        ? str_replace(["\r", "\n"], " ", trim($lokasiSection->extra['address']))
        : 'Jl. Swasembada Barat XXV No 19 RT007 RW011, Kebon Bawang, Tj Priok, Jakarta Utara, DKI Jakarta';

    $latitudeVal = ($lokasiSection && isset($lokasiSection->extra['latitude']))
        ? $lokasiSection->extra['latitude']
        : -6.116518;

    $longitudeVal = ($lokasiSection && isset($lokasiSection->extra['longitude']))
        ? $lokasiSection->extra['longitude']
        : 106.885368;

    $gscCode = $settings['google_verification_code'] ?? '';
    $gaId = $settings['google_analytics_id'] ?? '';
@endphp

<meta name="robots" content="index, follow">

@if($gscCode)
<meta name="google-site-verification" content="{{ $gscCode }}">
@endif

<link rel="canonical" href="{{ $currentUrl }}">

{{-- Open Graph / Facebook --}}
<meta property="og:type" content="website">
<meta property="og:url" content="{{ $currentUrl }}">
<meta property="og:title" content="{{ $pageTitle }}">
<meta property="og:description" content="{{ $metaDesc }}">
<meta property="og:image" content="{{ $logoUrl }}">

{{-- Twitter --}}
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ $currentUrl }}">
<meta property="twitter:title" content="{{ $pageTitle }}">
<meta property="twitter:description" content="{{ $metaDesc }}">
<meta property="twitter:image" content="{{ $logoUrl }}">

{{-- Structured Data (JSON-LD) --}}
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'LocalBusiness',
    'name' => $companyName,
    'image' => $logoUrl,
    '@id' => $siteUrl,
    'url' => $siteUrl,
    'telephone' => $phoneNum,
    'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => $addressVal,
        'addressLocality' => 'Jakarta Utara',
        'addressRegion' => 'DKI Jakarta',
        'postalCode' => '14320',
        'addressCountry' => 'ID',
    ],
    'geo' => [
        '@type' => 'GeoCoordinates',
        'latitude' => (float) $latitudeVal,
        'longitude' => (float) $longitudeVal,
    ],
    'openingHoursSpecification' => [
        '@type' => 'OpeningHoursSpecification',
        'dayOfWeek' => ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'],
        'opens' => '00:00',
        'closes' => '23:59',
    ],
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>

@if($gaId)
<script async src="https://www.googletagmanager.com/gtag/js?id={{ $gaId }}"></script>
<script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments)}gtag('js',new Date());gtag('config','{{ $gaId }}');</script>
@endif
