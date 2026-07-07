<?php

namespace Tests\Feature;

use App\Models\SiteSetting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeoTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Seed site settings for test
        SiteSetting::create(['key' => 'company_name', 'value' => 'PT Trivora Mitra Berkarya']);
        SiteSetting::create(['key' => 'page_title', 'value' => 'PT Trivora Mitra Berkarya — Jasa Keagenan Kapal']);
        SiteSetting::create(['key' => 'meta_description', 'value' => 'Jasa keagenan kapal profesional di Indonesia.']);
        SiteSetting::create(['key' => 'google_verification_code', 'value' => 'google12345code']);
        SiteSetting::create(['key' => 'google_analytics_id', 'value' => 'G-12345ABCDE']);
    }

    public function test_sitemap_xml_returns_correct_response_and_structure(): void
    {
        $response = $this->get('/sitemap.xml');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/xml; charset=UTF-8');
        
        $content = $response->getContent();
        $this->assertStringContainsString('<?xml version="1.0" encoding="UTF-8"?>', $content);
        $this->assertStringContainsString('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">', $content);
        $this->assertStringContainsString('<loc>' . url('/') . '</loc>', $content);
        $this->assertStringContainsString('<changefreq>monthly</changefreq>', $content);
        $this->assertStringContainsString('<priority>1.0</priority>', $content);
    }

    public function test_homepage_contains_seo_meta_tags_and_integrations(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        // Check canonical, robots
        $response->assertSee('<meta name="robots" content="index, follow">', false);
        $response->assertSee('<link rel="canonical" href="' . url('/') . '">', false);

        // Check GSC verification tag
        $response->assertSee('<meta name="google-site-verification" content="google12345code">', false);

        // Check Google Analytics script
        $response->assertSee('https://www.googletagmanager.com/gtag/js?id=G-12345ABCDE', false);
        $response->assertSee("gtag('config', 'G-12345ABCDE');", false);

        // Check Open Graph / Twitter Cards
        $response->assertSee('<meta property="og:type" content="website">', false);
        $response->assertSee('<meta property="og:title" content="PT Trivora Mitra Berkarya — Jasa Keagenan Kapal">', false);
        $response->assertSee('<meta property="og:description" content="Jasa keagenan kapal profesional di Indonesia.">', false);
        
        // Check Schema JSON-LD
        $response->assertSee('"@type": "LocalBusiness"', false);
        $response->assertSee('"name": "PT Trivora Mitra Berkarya"', false);
    }
}
