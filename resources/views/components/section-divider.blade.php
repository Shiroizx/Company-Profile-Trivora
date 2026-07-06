{{-- Section Divider with Infinite Marquee Text --}}
@props([
    'words' => ['Trivora', 'Mitra', 'Berkarya', 'Profesional', 'Terpercaya', 'Andal'],
    'reverse' => false,
    'dark' => false,
])
<div class="section-divider {{ $dark ? 'bg-navy-950' : '' }}">
    <div class="marquee-track {{ $reverse ? 'marquee-track-reverse' : '' }}">
        {{-- Duplicate content for seamless loop —  2 copies --}}
        @for ($copy = 0; $copy < 2; $copy++)
            <div class="marquee-content" aria-hidden="{{ $copy > 0 ? 'true' : 'false' }}">
                @foreach ($words as $word)
                    <span class="marquee-diamond">◆</span>
                    <span class="marquee-text {{ $dark ? '!text-gold-500/20' : '' }}">{{ $word }}</span>
                    <span class="marquee-dot {{ $dark ? '!bg-gold-500/15' : '' }}"></span>
                @endforeach
            </div>
        @endfor
    </div>
</div>
