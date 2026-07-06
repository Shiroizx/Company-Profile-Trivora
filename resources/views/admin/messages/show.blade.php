@extends('layouts.admin')

@section('title', 'Detail Pesan')
@section('heading', 'Detail Pesan')
@section('subheading', 'Membaca detail pesan masuk dari pengunjung')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.messages.index') }}" class="admin-btn-secondary">
        ← Kembali ke Kotak Masuk
    </a>
</div>

<div class="grid gap-6 lg:grid-cols-3">
    {{-- Left: sender details --}}
    <div class="admin-card h-fit">
        <h3 class="font-semibold text-navy-900 border-b border-silver-300 pb-3 mb-4">Informasi Pengirim</h3>
        
        <div class="space-y-4">
            <div>
                <p class="text-xs uppercase tracking-wider text-navy-500 font-bold">Nama Lengkap</p>
                <p class="mt-1 font-semibold text-navy-900">{{ $message->name }}</p>
            </div>
            
            <div>
                <p class="text-xs uppercase tracking-wider text-navy-500 font-bold">Email</p>
                <p class="mt-1">
                    @if($message->email)
                        <a href="mailto:{{ $message->email }}" class="font-semibold text-gold-600 hover:text-gold-700 hover:underline break-all">{{ $message->email }}</a>
                    @else
                        <span class="text-silver-500">—</span>
                    @endif
                </p>
            </div>

            <div>
                <p class="text-xs uppercase tracking-wider text-navy-500 font-bold">Telepon</p>
                <p class="mt-1">
                    @if($message->phone)
                        @php
                            $waNumber = preg_replace('/[^0-9]/', '', $message->phone);
                            if (substr($waNumber, 0, 1) === '0') {
                                $waNumber = '62' . substr($waNumber, 1);
                            }
                            $waText = urlencode('Halo ' . $message->name . ', terima kasih atas pesan Anda di PT Trivora Mitra Berkarya.');
                            $waLink = "https://wa.me/{$waNumber}?text={$waText}";
                        @endphp
                        <a href="{{ $waLink }}" target="_blank" rel="noopener noreferrer" class="font-semibold text-green-600 hover:text-green-700 hover:underline flex items-center gap-1.5 mt-0.5">
                            {{ $message->phone }}
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.557-5.34 11.897-11.948 11.897-2.013-.002-3.993-.513-5.739-1.488L0 24zm6.305-1.654c1.677.995 3.325 1.52 5.683 1.522 5.922 0 10.741-4.785 10.745-10.663.002-2.848-1.107-5.526-3.123-7.543C17.6 3.644 14.935 2.537 12.09 2.536 6.169 2.536 1.348 7.323 1.345 13.2c-.001 2.405.63 4.417 1.745 6.036L2.1 22.135l3.896-1.021z"/></svg>
                        </a>
                    @else
                        <span class="text-silver-500">—</span>
                    @endif
                </p>
            </div>

            <div>
                <p class="text-xs uppercase tracking-wider text-navy-500 font-bold">Waktu Pengiriman</p>
                <p class="mt-1 font-semibold text-navy-850">{{ $message->created_at->format('d M Y, H:i') }}</p>
            </div>

            @if($message->ip_address)
                <div class="border-t border-silver-300 pt-4 mt-4">
                    <p class="text-xs uppercase tracking-wider text-navy-500 font-bold">IP Address</p>
                    <div class="mt-2 flex items-center justify-between gap-2 bg-silver-50 border border-silver-250 p-2.5 rounded-xl">
                        <span class="font-mono text-xs font-semibold text-navy-900">{{ $message->ip_address }}</span>
                        <form action="{{ route('admin.messages.reset-limit') }}" method="POST" class="inline">
                            @csrf
                            <input type="hidden" name="ip_address" value="{{ $message->ip_address }}">
                            <button type="submit" class="text-xs font-bold text-gold-600 hover:text-gold-700 bg-gold-50 hover:bg-gold-100/80 px-2 py-1 rounded-lg border border-gold-300/40 transition">
                                Reset Limit
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
        
        <div class="mt-8 border-t border-silver-300 pt-6">
            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="admin-btn-danger w-full justify-center">
                    Hapus Pesan Ini
                </button>
            </form>
        </div>
    </div>

    {{-- Right: message subject & body --}}
    <div class="admin-card lg:col-span-2">
        <div>
            <span class="text-xs uppercase tracking-wider text-navy-500 font-bold">Subjek Pesan</span>
            <h2 class="mt-1.5 font-display text-2xl font-bold text-navy-900">{{ $message->subject ?? '(Tanpa Subjek)' }}</h2>
        </div>
        
        <div class="mt-8 border-t border-silver-300 pt-6">
            <span class="text-xs uppercase tracking-wider text-navy-500 font-bold">Isi Pesan</span>
            <div class="mt-4 rounded-xl bg-silver-50 border border-silver-250 p-6 text-navy-850 leading-relaxed whitespace-pre-line text-base">
                {!! nl2br(e($message->message)) !!}
            </div>
        </div>
    </div>
</div>
@endsection
