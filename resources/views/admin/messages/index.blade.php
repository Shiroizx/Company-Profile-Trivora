@extends('layouts.admin')

@section('title', 'Pesan Masuk')
@section('heading', 'Pesan Masuk')
@section('subheading', 'Kelola pesan dan masukan dari pengunjung website')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.dashboard') }}" class="admin-btn-secondary">
        &larr; Kembali ke Dashboard
    </a>
</div>

<div class="admin-card overflow-hidden p-0 shadow-md">
    <div class="border-b border-silver-200 bg-silver-50/50 px-6 py-5 flex items-center justify-between">
        <h2 class="font-bold text-navy-900">Kotak Masuk</h2>
        <span class="text-xs text-navy-500 font-medium">Total: {{ $messages->total() }} Pesan</span>
    </div>

    @if ($messages->isEmpty())
        <div class="p-12 text-center text-silver-500">
            <svg class="mx-auto h-12 w-12 text-silver-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0a2 2 0 01-2 2H6a2 2 0 01-2-2m16 0l-8 4-8-4m18 8h-18" />
            </svg>
            <p class="text-sm font-semibold">Tidak ada pesan masuk.</p>
            <p class="text-xs mt-1 text-silver-400">Belum ada pengunjung yang mengirimkan pesan melalui formulir kontak.</p>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-silver-50 text-[11px] uppercase tracking-wider text-navy-500 font-bold border-b border-silver-200">
                    <tr>
                        <th class="px-6 py-4 w-28">Status</th>
                        <th class="px-6 py-4">Pengirim</th>
                        <th class="px-6 py-4">Subjek</th>
                        <th class="px-6 py-4">Tanggal</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-silver-200">
                    @foreach ($messages as $message)
                        <tr class="hover:bg-silver-50 {{ !$message->is_read ? 'bg-gold-50/20 font-semibold' : '' }}">
                            <td class="px-6 py-4">
                                @if (!$message->is_read)
                                    <span class="inline-flex rounded-full bg-gold-100 px-2.5 py-0.5 text-xs font-bold text-gold-800 ring-1 ring-gold-500/20">Baru</span>
                                @else
                                    <span class="inline-flex rounded-full bg-silver-200 px-2.5 py-0.5 text-xs font-medium text-navy-600">Dibaca</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-navy-900 font-medium">{{ $message->name }}</div>
                                <div class="text-xs text-navy-500 font-normal">
                                    {{ $message->email ?? '—' }}
                                    @if($message->phone) | {{ $message->phone }} @endif
                                </div>
                                @if($message->ip_address)
                                    <div class="text-[10px] text-silver-500 font-mono mt-0.5">IP: {{ $message->ip_address }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 max-w-xs truncate text-navy-600">
                                {{ $message->subject ?? '(Tanpa Subjek)' }}
                            </td>
                            <td class="px-6 py-4 text-xs text-navy-500">
                                {{ $message->created_at->format('d M Y H:i') }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-3">
                                    @if($message->ip_address)
                                    <form action="{{ route('admin.messages.reset-limit') }}" method="POST" class="inline">
                                        @csrf
                                        <input type="hidden" name="ip_address" value="{{ $message->ip_address }}">
                                        <button type="submit" class="text-xs font-medium text-gold-600 hover:text-gold-800 transition" title="Reset Rate Limit IP ini">Reset IP</button>
                                    </form>
                                    @endif
                                    <a href="{{ route('admin.messages.show', $message) }}" class="text-sm font-semibold text-navy-700 hover:text-gold-600 transition">Detail</a>
                                    
                                    <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-sm font-semibold text-red-600 hover:text-red-800 transition">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if ($messages->hasPages())
            <div class="border-t border-silver-300 px-6 py-4">
                {{ $messages->links() }}
            </div>
        @endif
    @endif
</div>
@endsection
