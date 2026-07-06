<?php

return [
    'section_anchors' => [
        'hero' => 'beranda',
        'keunggulan' => 'keunggulan',
        'layanan' => 'layanan',
        'tentang' => 'tentang',
        'filosofi' => 'filosofi',
        'visi_misi' => 'visi-misi',
        'nilai' => 'nilai',
        'prime' => 'prime',
        'struktur' => 'struktur',
        'komitmen' => 'komitmen',
        'legalitas' => 'legalitas',
        'hubungi_kami' => 'hubungi-kami',
        'lokasi' => 'lokasi',
    ],

    'section_labels' => [
        'hero' => 'Beranda (Hero)',
        'keunggulan' => 'Keunggulan',
        'layanan' => 'Layanan',
        'tentang' => 'Tentang Perusahaan',
        'filosofi' => 'Filosofi',
        'visi_misi' => 'Visi & Misi',
        'nilai' => 'Nilai Perusahaan',
        'prime' => 'PRIME Values',
        'struktur' => 'Struktur Organisasi',
        'komitmen' => 'Komitmen',
        'legalitas' => 'Dokumen Legalitas',
        'hubungi_kami' => 'Hubungi Kami',
        'lokasi' => 'Lokasi',
    ],

    'setting_labels' => [
        'company_name' => 'Nama Perusahaan',
        'page_title' => 'Judul Halaman (tab browser)',
        'meta_description' => 'Meta Description (SEO)',
        'footer_tagline' => 'Tagline Footer',
        'logo_path' => 'Path Logo (relatif ke public/)',
    ],

    'extra_fields' => [
        'hero' => [
            'title_prefix' => ['label' => 'Prefix Judul', 'type' => 'text'],
            'logo_tagline' => ['label' => 'Tagline Logo', 'type' => 'text'],
            'cta_primary_label' => ['label' => 'Tombol Utama — Label', 'type' => 'text'],
            'cta_primary_href' => ['label' => 'Tombol Utama — Link', 'type' => 'text'],
            'cta_secondary_label' => ['label' => 'Tombol Sekunder — Label', 'type' => 'text'],
            'cta_secondary_href' => ['label' => 'Tombol Sekunder — Link', 'type' => 'text'],
        ],
        'tentang' => [
            'title_highlight' => ['label' => 'Highlight Judul', 'type' => 'text'],
            'highlight_card_title' => ['label' => 'Kartu Highlight — Judul', 'type' => 'text'],
            'highlight_card_subtitle' => ['label' => 'Kartu Highlight — Subjudul', 'type' => 'text'],
        ],
        'visi_misi' => [
            'visi_badge' => ['label' => 'Badge Visi', 'type' => 'text'],
            'visi_title' => ['label' => 'Judul Visi', 'type' => 'text'],
            'visi_body' => ['label' => 'Isi Visi', 'type' => 'textarea'],
            'misi_badge' => ['label' => 'Badge Misi', 'type' => 'text'],
        ],
        'struktur' => [
            'top_role_label' => ['label' => 'Jabatan', 'type' => 'text'],
            'top_role_title' => ['label' => 'Nama', 'type' => 'text'],
            'top_role_image' => ['label' => 'Foto Posisi Atas (PNG/JPG/JPEG, Max 5MB, Potrait)', 'type' => 'file'],
        ],
        'hubungi_kami' => [
            'business_field' => ['label' => 'Bidang Usaha', 'type' => 'text'],
            'email' => ['label' => 'Email', 'type' => 'email'],
            'phone' => ['label' => 'Telepon (satu nomor per baris)', 'type' => 'textarea'],
        ],
        'lokasi' => [
            'address' => ['label' => 'Alamat (satu baris per enter)', 'type' => 'textarea'],
            'latitude' => ['label' => 'Latitude', 'type' => 'text'],
            'longitude' => ['label' => 'Longitude', 'type' => 'text'],
            'maps_embed_url' => ['label' => 'URL Embed Google Maps', 'type' => 'textarea'],
        ],
    ],

    'item_meta_fields' => [
        'filosofi' => [
            'icon' => ['label' => 'Path SVG Icon (d=...)', 'type' => 'textarea'],
        ],
        'prime' => [
            'letter' => ['label' => 'Huruf', 'type' => 'text', 'max' => 1],
        ],
        'tentang' => [
            'type' => ['label' => 'Tipe Item', 'type' => 'select', 'options' => ['bullet' => 'Bullet List', 'card' => 'Kartu Info']],
        ],
        'struktur' => [
            'type' => ['label' => 'Tipe', 'type' => 'select', 'options' => ['director' => 'Direktur', 'division' => 'Divisi']],
            'image' => ['label' => 'Foto / Gambar (PNG/JPG/JPEG, Max 5MB, Potrait)', 'type' => 'file'],
        ],
        'visi_misi' => [
            'type' => ['label' => 'Tipe', 'type' => 'select', 'options' => ['misi' => 'Poin Misi']],
        ],
        'hero' => [
            'type' => ['label' => 'Tipe', 'type' => 'select', 'options' => ['stat' => 'Statistik']],
        ],
        'legalitas' => [
            'image' => ['label' => 'Gambar / Scan Dokumen (PNG/JPG/JPEG, Max 5MB)', 'type' => 'file'],
        ],
    ],
];
