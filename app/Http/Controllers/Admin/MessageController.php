<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MessageController extends Controller
{
    public function index(): View
    {
        $messages = Message::query()
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.messages.index', compact('messages'));
    }

    public function show(Message $message): View
    {
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }

        return view('admin.messages.show', compact('message'));
    }

    public function resetLimit(Request $request): RedirectResponse
    {
        $ip = $request->input('ip_address');
        if ($ip) {
            \Illuminate\Support\Facades\RateLimiter::clear('send-message:'.$ip);
            return redirect()->back()->with('success', "Batas pengiriman (Rate Limit) untuk IP {$ip} berhasil direset.");
        }
        return redirect()->back()->with('error', 'IP Address tidak valid.');
    }

    public function destroy(Message $message): RedirectResponse
    {
        if ($message->ip_address) {
            \Illuminate\Support\Facades\RateLimiter::clear('send-message:'.$message->ip_address);
        }
        
        $message->delete();

        return redirect()->route('admin.messages.index')->with('success', 'Pesan berhasil dihapus dan batas pengiriman (Rate Limit) IP tersebut telah direset.');
    }
}
