<?php

namespace App\Http\Controllers;

use App\Models\LandingSection;
use App\Models\Message;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $sections = LandingSection::query()
            ->where('is_active', true)
            ->with('items')
            ->orderBy('sort_order')
            ->get()
            ->keyBy('slug');

        $settings = SiteSetting::query()
            ->pluck('value', 'key');

        ViewFacade::share('settings', $settings);

        return view('home', [
            'sections' => $sections,
            'settings' => $settings,
        ]);
    }

    public function storeMessage(Request $request): RedirectResponse|JsonResponse
    {
        // Rate Limiter: max 3 messages per day per IP to prevent spam
        $ip = $request->ip();
        if (\Illuminate\Support\Facades\RateLimiter::tooManyAttempts('send-message:'.$ip, 3)) {
            $seconds = \Illuminate\Support\Facades\RateLimiter::availableIn('send-message:'.$ip);
            
            $hours = floor($seconds / 3600);
            $minutes = floor(($seconds % 3600) / 60);
            $remainingSeconds = $seconds % 60;
            
            $timeParts = [];
            if ($hours > 0) {
                $timeParts[] = "{$hours} jam";
            }
            if ($minutes > 0) {
                $timeParts[] = "{$minutes} menit";
            }
            if ($hours == 0 && $minutes == 0) {
                $timeParts[] = "{$remainingSeconds} detik";
            }
            $timeString = implode(' ', $timeParts);

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'message' => "Terlalu banyak mengirim pesan. Anda telah mencapai batas maksimal (3 pesan/hari). Silakan coba lagi dalam {$timeString}."
                ], 429);
            }

            return redirect()->back()
                ->withInput()
                ->withErrors(['message' => "Terlalu banyak mengirim pesan. Anda telah mencapai batas maksimal (3 pesan/hari). Silakan coba lagi dalam {$timeString}."]);
        }

        // Validate inputs
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        // Security against XSS: strip HTML and PHP tags from inputs
        $validated['name'] = strip_tags(trim($validated['name']));
        $validated['email'] = $validated['email'] ? strip_tags(trim($validated['email'])) : null;
        $validated['phone'] = $validated['phone'] ? strip_tags(trim($validated['phone'])) : null;
        $validated['subject'] = $validated['subject'] ? strip_tags(trim($validated['subject'])) : null;
        $validated['message'] = strip_tags(trim($validated['message']));

        // Eloquent handles parameter binding under the hood which fully prevents SQL Injection
        $validated['ip_address'] = $ip;
        Message::create($validated);

        // Record Rate Limiter Hit: 86400 seconds = 1 day
        \Illuminate\Support\Facades\RateLimiter::hit('send-message:'.$ip, 86400);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'message' => 'Pesan Anda telah berhasil dikirim ke admin. Terima kasih!'
            ]);
        }

        return redirect()->back()->with('success_message', 'Pesan Anda telah berhasil dikirim ke admin. Terima kasih!');
    }

    public function sitemap(): \Illuminate\Http\Response
    {
        $url = url('/');
        $lastmod = now()->toAtomString();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        $xml .= '    <url>' . "\n";
        $xml .= '        <loc>' . htmlspecialchars($url) . '</loc>' . "\n";
        $xml .= '        <lastmod>' . $lastmod . '</lastmod>' . "\n";
        $xml .= '        <changefreq>monthly</changefreq>' . "\n";
        $xml .= '        <priority>1.0</priority>' . "\n";
        $xml .= '    </url>' . "\n";
        $xml .= '</urlset>';

        return response($xml)->header('Content-Type', 'text/xml');
    }
}
