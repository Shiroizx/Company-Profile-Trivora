<?php

namespace Database\Seeders;

use App\Models\LandingItem;
use App\Models\LandingSection;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class LandingPageSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedSiteSettings();
        $this->seedSections();
    }

    private function seedSiteSettings(): void
    {
        $settings = [
            'company_name' => 'PT Trivora Mitra Berkarya',
            'page_title' => 'PT Trivora Mitra Berkarya — Jasa Keagenan Kapal',
            'meta_description' => 'PT Trivora Mitra Berkarya — Jasa keagenan kapal profesional, andal, dan terpercaya di Indonesia.',
            'footer_tagline' => 'Jasa Keagenan Kapal — Partner Maritim Terpercaya',
            'logo_path' => 'asset/logo.jpeg',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }

    private function seedSections(): void
    {
        LandingItem::query()->delete();
        LandingSection::query()->delete();

        $sections = [
            [
                'slug' => 'hero',
                'section_label' => 'Jasa Keagenan Kapal',
                'title' => 'Trivora Mitra Berkarya',
                'subtitle' => 'Mitra strategis Anda dalam layanan keagenan kapal — menghadirkan solusi maritim yang profesional, efisien, dan berstandar internasional di pelabuhan Indonesia.',
                'extra' => [
                    'title_prefix' => 'PT',
                    'logo_tagline' => 'Karya Terbaik, Solusi Terpercaya',
                    'cta_primary_label' => 'Layanan Kami',
                    'cta_primary_href' => '#layanan',
                    'cta_secondary_label' => 'Tentang Kami',
                    'cta_secondary_href' => '#tentang',
                ],
                'sort_order' => 1,
                'items' => [
                    ['title' => '24/7', 'description' => 'Operasional Pelabuhan', 'meta' => ['type' => 'stat']],
                    ['title' => '100%', 'description' => 'Kepatuhan Regulasi', 'meta' => ['type' => 'stat']],
                    ['title' => '∞', 'description' => 'Komitmen Kualitas', 'meta' => ['type' => 'stat']],
                ],
            ],
            [
                'slug' => 'keunggulan',
                'section_label' => 'Keunggulan Kami',
                'title' => 'Mengapa Memilih Trivora?',
                'body' => "Kami memahami bahwa setiap menit sandar kapal berdampak pada biaya operasional. Oleh karena itu, PT Trivora Mitra Berkarya berkomitmen menghadirkan layanan keagenan yang cepat, akurat, dan bebas hambatan birokrasi.\n\nKombinasi pengalaman lapangan, jaringan pelabuhan, dan sistem pelaporan modern menjadikan kami mitra ideal untuk armada Anda.",
                'sort_order' => 2,
                'items' => [
                    ['title' => 'Respons 24/7', 'description' => 'Tim operasional siap melayani kebutuhan kapal kapan pun dibutuhkan.'],
                    ['title' => 'Jaringan Luas', 'description' => 'Relasi kuat dengan otoritas pelabuhan, terminal, dan mitra logistik.'],
                    ['title' => 'Biaya Transparan', 'description' => 'Struktur biaya jelas tanpa biaya tersembunyi yang mengejutkan.'],
                    ['title' => 'Tenaga Ahli', 'description' => 'Staf berpengalaman di regulasi maritim dan prosedur pelabuhan Indonesia.'],
                ],
            ],
            [
                'slug' => 'layanan',
                'section_label' => 'Bidang Usaha',
                'title' => 'Layanan Keagenan Kapal',
                'subtitle' => 'Solusi lengkap untuk kebutuhan kapal Anda di pelabuhan Indonesia.',
                'sort_order' => 3,
                'items' => [
                    ['title' => 'Port Agency', 'description' => 'Layanan keagenan kapal lengkap termasuk koordinasi kedatangan, sandar, dan keberangkatan.'],
                    ['title' => 'Ship Husbandry', 'description' => 'Pengurusan kebutuhan kapal: suplai, perbaikan, crew change, dan layanan pendukung.'],
                    ['title' => 'Dokumentasi Maritim', 'description' => 'Pengurusan dokumen kapal, izin sandar, clearance, dan pelaporan otoritas.'],
                    ['title' => 'Koordinasi Bongkar Muat', 'description' => 'Fasilitasi operasi bongkar muat bersama operator pelabuhan dan stevedoring.'],
                    ['title' => 'Customs & Immigration', 'description' => 'Koordinasi dengan bea cukai dan imigrasi untuk awak dan barang kapal.'],
                    ['title' => 'Emergency Response', 'description' => 'Dukungan darurat 24/7 untuk situasi kritis di pelabuhan.'],
                ],
            ],
            [
                'slug' => 'tentang',
                'section_label' => 'Tentang Perusahaan',
                'title' => 'Mitra Keagenan Kapal yang',
                'body' => "PT Trivora Mitra Berkarya adalah perusahaan yang bergerak di bidang jasa keagenan kapal (ship agency), melayani kebutuhan armada domestik maupun internasional di berbagai pelabuhan strategis Indonesia.\n\nDengan tim profesional berpengalaman di industri maritim, kami mengelola seluruh aspek keagenan kapal — mulai dari kedatangan, bongkar muat, dokumentasi, hingga keberangkatan — dengan standar keselamatan dan kepatuhan regulasi tertinggi.",
                'extra' => [
                    'title_highlight' => 'Andal & Berpengalaman',
                    'highlight_card_title' => 'Ship Agency',
                    'highlight_card_subtitle' => 'Fokus utama bisnis kami',
                ],
                'sort_order' => 4,
                'items' => [
                    ['title' => 'Terdaftar dan beroperasi sesuai regulasi maritim Indonesia', 'meta' => ['type' => 'bullet']],
                    ['title' => 'Jaringan koordinasi dengan otoritas pelabuhan & bea cukai', 'meta' => ['type' => 'bullet']],
                    ['title' => 'Pengalaman menangani berbagai tipe kapal & kargo', 'meta' => ['type' => 'bullet']],
                    ['title' => 'Visi Jangka Panjang', 'description' => 'Menjadi agen kapal terdepan di Indonesia', 'meta' => ['type' => 'card']],
                    ['title' => 'Operasi Nasional', 'description' => 'Melayani pelabuhan-pelabuhan strategis', 'meta' => ['type' => 'card']],
                    ['title' => 'Tim Profesional', 'description' => 'Ahli maritim & logistik pelabuhan', 'meta' => ['type' => 'card']],
                    ['title' => 'Teknologi & Sistem', 'description' => 'Pelaporan real-time & transparan', 'meta' => ['type' => 'card']],
                ],
            ],
            [
                'slug' => 'filosofi',
                'section_label' => 'Filosofi Perusahaan',
                'title' => 'Landasan Filosofi Kami',
                'subtitle' => 'Filosofi perusahaan menjadi kompas dalam setiap keputusan operasional dan hubungan dengan pemilik kapal, awak, serta mitra pelabuhan.',
                'sort_order' => 5,
                'items' => [
                    [
                        'title' => 'Integritas Maritim',
                        'description' => 'Menjunjung tinggi kejujuran, transparansi, dan etika dalam setiap layanan keagenan kapal.',
                        'meta' => ['icon' => 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z'],
                    ],
                    [
                        'title' => 'Kolaborasi & Sinergi',
                        'description' => 'Berkolaborasi erat dengan pemangku kepentingan pelabuhan untuk kelancaran operasi kapal.',
                        'meta' => ['icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z'],
                    ],
                    [
                        'title' => 'Keunggulan Berkelanjutan',
                        'description' => 'Terus meningkatkan kualitas layanan demi kepuasan jangka panjang para klien maritim.',
                        'meta' => ['icon' => 'M13 10V3L4 14h7v7l9-11h-7z'],
                    ],
                ],
            ],
            [
                'slug' => 'visi_misi',
                'section_label' => 'Visi & Misi',
                'title' => 'Arah & Tujuan Perusahaan',
                'extra' => [
                    'visi_badge' => 'Visi',
                    'visi_title' => 'Menjadi Perusahaan Keagenan Kapal Terpercaya',
                    'visi_body' => 'Menjadi mitra keagenan kapal terdepan dan terpercaya di Indonesia yang dikenal karena profesionalisme, kecepatan respons, serta kepatuhan penuh terhadap standar keselamatan dan regulasi maritim internasional.',
                    'misi_badge' => 'Misi',
                ],
                'sort_order' => 6,
                'items' => [
                    ['title' => 'Menyediakan layanan keagenan kapal yang komprehensif, efisien, dan berkualitas tinggi.', 'meta' => ['type' => 'misi']],
                    ['title' => 'Membangun hubungan jangka panjang dengan pemilik kapal melalui layanan prima.', 'meta' => ['type' => 'misi']],
                    ['title' => 'Mengembangkan kompetensi SDM dan sistem operasional secara berkelanjutan.', 'meta' => ['type' => 'misi']],
                    ['title' => 'Mendukung kelancaran arus logistik maritim nasional melalui pelayanan pelabuhan yang handal.', 'meta' => ['type' => 'misi']],
                ],
            ],
            [
                'slug' => 'nilai',
                'section_label' => 'Nilai Perusahaan',
                'title' => 'Nilai-Nilai yang Kami Junjung',
                'subtitle' => 'Nilai-nilai ini menjadi pedoman perilaku setiap insan PT Trivora Mitra Berkarya dalam menjalankan tugas.',
                'sort_order' => 7,
                'items' => [
                    ['title' => 'Profesionalisme', 'description' => 'Bertindak profesional dalam setiap interaksi dengan klien dan mitra.'],
                    ['title' => 'Integritas', 'description' => 'Jujur, transparan, dan dapat dipercaya dalam seluruh aspek bisnis.'],
                    ['title' => 'Komitmen', 'description' => 'Berkomitmen penuh pada kesuksesan operasi kapal klien.'],
                    ['title' => 'Inovasi', 'description' => 'Terus berinovasi dalam proses dan solusi layanan maritim.'],
                    ['title' => 'Keselamatan', 'description' => 'Mengutamakan keselamatan awak, kapal, dan lingkungan pelabuhan.'],
                    ['title' => 'Kerja Sama', 'description' => 'Membangun sinergi dengan semua pemangku kepentingan pelabuhan.'],
                ],
            ],
            [
                'slug' => 'prime',
                'section_label' => 'Core Value',
                'title' => 'PRIME Values',
                'subtitle' => 'Lima pilar utama yang mendefinisikan standar layanan keagenan kapal PT Trivora Mitra Berkarya.',
                'sort_order' => 8,
                'items' => [
                    ['title' => 'Professional', 'description' => 'Profesional dalam setiap tahap layanan — dari komunikasi hingga eksekusi di lapangan.', 'meta' => ['letter' => 'P']],
                    ['title' => 'Reliable', 'description' => 'Dapat diandalkan dengan respons cepat dan solusi tepat waktu untuk kebutuhan kapal.', 'meta' => ['letter' => 'R']],
                    ['title' => 'Integrity', 'description' => 'Integritas tanpa kompromi dalam dokumentasi, biaya, dan koordinasi otoritas.', 'meta' => ['letter' => 'I']],
                    ['title' => 'Maritime Excellence', 'description' => 'Keunggulan maritim melalui pengetahuan regulasi, prosedur pelabuhan, dan standar internasional.', 'meta' => ['letter' => 'M']],
                    ['title' => 'Efficiency', 'description' => 'Efisiensi operasional untuk meminimalkan waktu sandar dan memaksimalkan produktivitas kapal.', 'meta' => ['letter' => 'E']],
                ],
            ],
            [
                'slug' => 'struktur',
                'section_label' => 'Struktur Organisasi',
                'title' => 'Struktur Organisasi Perusahaan',
                'subtitle' => 'Tata kelola yang jelas untuk memastikan layanan keagenan kapal berjalan efektif dan terkoordinasi.',
                'extra' => [
                    'top_role_label' => 'Direktur Utama',
                    'top_role_title' => 'Board of Directors',
                ],
                'sort_order' => 9,
                'items' => [
                    ['title' => 'Direktur Operasional', 'description' => 'Operasi Pelabuhan & Kapal', 'meta' => ['type' => 'director', 'level' => 2]],
                    ['title' => 'Direktur Komersial', 'description' => 'Pemasaran & Hubungan Klien', 'meta' => ['type' => 'director', 'level' => 2]],
                    ['title' => 'Direktur Keuangan', 'description' => 'Keuangan & Administrasi', 'meta' => ['type' => 'director', 'level' => 2]],
                    ['title' => 'Divisi Keagenan Kapal', 'meta' => ['type' => 'division', 'level' => 3]],
                    ['title' => 'Divisi Dokumentasi', 'meta' => ['type' => 'division', 'level' => 3]],
                    ['title' => 'Divisi Logistik Pelabuhan', 'meta' => ['type' => 'division', 'level' => 3]],
                    ['title' => 'Divisi HSSE & Compliance', 'meta' => ['type' => 'division', 'level' => 3]],
                ],
            ],
            [
                'slug' => 'komitmen',
                'section_label' => 'Komitmen Perusahaan',
                'title' => 'Komitmen Kami kepada Anda',
                'sort_order' => 10,
                'items' => [
                    ['title' => 'Kepatuhan Regulasi', 'description' => 'Mematuhi seluruh peraturan maritim, pelabuhan, dan lingkungan yang berlaku.'],
                    ['title' => 'Kualitas Layanan', 'description' => 'Memberikan layanan keagenan kapal berstandar internasional tanpa kompromi.'],
                    ['title' => 'Keselamatan Kerja', 'description' => 'Menerapkan prosedur K3 dan keselamatan operasional di setiap aktivitas pelabuhan.'],
                    ['title' => 'Keberlanjutan', 'description' => 'Mendukung praktik maritim yang berkelanjutan dan ramah lingkungan.'],
                ],
            ],
            [
                'slug' => 'hubungi_kami',
                'section_label' => 'Kontak',
                'title' => 'Hubungi Kami',
                'subtitle' => 'Siap menjadi mitra keagenan kapal terpercaya untuk armada Anda.',
                'extra' => [
                    'business_field' => 'Jasa Keagenan Kapal (Ship Agency)',
                    'email' => 'trivora.mitraberkarya@gmail.com',
                    'phone' => '+628138287909',
                ],
                'sort_order' => 11,
            ],
            [
                'slug' => 'lokasi',
                'section_label' => 'Lokasi Kantor',
                'title' => 'Alamat & Peta Lokasi',
                'subtitle' => 'Kunjungi kantor PT Trivora Mitra Berkarya di Jakarta Utara',
                'extra' => [
                    'address' => "Jl. Swasembada Barat XXV No 19 RT007 RW011,\nKebon Bawang, Tj Priok,\nJakarta Utara, DKI Jakarta",
                    'latitude' => -6.1165186661461854,
                    'longitude' => 106.88536856947965,
                    'maps_embed_url' => 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d991.7763368174332!2d106.88536856947965!3d-6.1165186661461854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwMDYnNTkuNSJTIDEwNsKwNTMnMDkuNiJF!5e0!3m2!1sid!2sid!4v1780325610067!5m2!1sid!2sid',
                ],
                'sort_order' => 12,
            ],
        ];

        foreach ($sections as $data) {
            $items = $data['items'] ?? [];
            unset($data['items']);

            $section = LandingSection::create($data);

            foreach ($items as $index => $item) {
                $section->items()->create([
                    'title' => $item['title'],
                    'description' => $item['description'] ?? null,
                    'meta' => $item['meta'] ?? null,
                    'sort_order' => $index + 1,
                ]);
            }
        }
    }
}
