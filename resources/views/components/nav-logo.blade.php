{{-- resources/views/components/logo.blade.php --}}
@php
    // helper para crear srcset automáticamente
    function logoSrcSet($name) {
        $sizes = [120, 240];                 // 1× y 2×
        $fmts  = ['avif', 'webp'];           // orden de preferencia

        return collect($fmts)->mapWithKeys(function ($fmt) use ($name, $sizes) {
            $list = collect($sizes)->map(fn ($w) =>
                Vite::asset("resources/images/{$name}.png?w={$w}&format={$fmt}") . " {$w}w"
            )->implode(', ');
            return [$fmt => $list];
        });
    }

    $white = logoSrcSet('Logo_SyleStudio_Syle_W');
    $black = logoSrcSet('Logo_SyleStudio_Syle_B');
@endphp

<a href="{{ route('home') }}" class="relative shrink-0 h-8 md:h-10">
    {{-- Logo claro (default) --}}
    <picture class="logo--white block h-full w-auto">
        <source type="image/avif" srcset="{{ $white['avif'] }}">
        <source type="image/webp" srcset="{{ $white['webp'] }}">
        <img src="{{ Vite::asset('resources/images/Logo_SyleStudio_Syle_W.png?w=120') }}"
             alt="SyleStudio Logo claro"
             width="120" height="40"
             loading="eager" decoding="async"
             class="h-full w-auto" />
    </picture>

    {{-- Logo oscuro (opacity 0 por defecto) --}}
    <picture class="logo--black absolute inset-0 h-full w-auto opacity-0 pointer-events-none transition-opacity duration-300">
        <source type="image/avif" srcset="{{ $black['avif'] }}">
        <source type="image/webp" srcset="{{ $black['webp'] }}">
        <img src="{{ Vite::asset('resources/images/Logo_SyleStudio_Syle_B.png?w=120') }}"
             alt="" aria-hidden="true"
             width="120" height="40"
             loading="eager" decoding="async"
             class="h-full w-auto" />
    </picture>
</a>
