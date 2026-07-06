<?php

use App\Models\LandingSection;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        // Shift hubungi_kami and lokasi to make room
        LandingSection::where('slug', 'hubungi_kami')->update(['sort_order' => 12]);
        LandingSection::where('slug', 'lokasi')->update(['sort_order' => 13]);

        LandingSection::updateOrCreate(
            ['slug' => 'legalitas'],
            [
                'section_label' => 'Dokumen Legalitas',
                'title' => 'Legalitas Perusahaan',
                'subtitle' => 'Bukti komitmen dan kepatuhan hukum PT Trivora Mitra Berkarya dalam menjalankan kegiatan usaha.',
                'sort_order' => 11,
                'is_active' => true,
            ]
        );
    }

    public function down(): void
    {
        LandingSection::where('slug', 'legalitas')->delete();

        // Restore original sort order
        LandingSection::where('slug', 'hubungi_kami')->update(['sort_order' => 11]);
        LandingSection::where('slug', 'lokasi')->update(['sort_order' => 12]);
    }
};
