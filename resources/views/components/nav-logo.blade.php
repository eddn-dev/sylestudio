{{-- resources/views/components/nav-logo.blade.php --}}
<a href="{{ route('home') }}" class="relative shrink-0 h-8 md:h-10">
    <picture class="logo--white block ">
        <source type="image/avif" srcset="{{ $white['avif'] }}">
        <source type="image/webp" srcset="{{ $white['webp'] }}">
        <img src="{{ Vite::asset('resources/images/Logo_SyleStudio_Syle_W.png?w=120') }}"
             alt="SyleStudio Logo claro" width="120" height="40"
             loading="eager" decoding="async" class="" />
    </picture>

    <picture class="logo--black absolute inset-0  opacity-0 pointer-events-none transition-opacity duration-300">
        <source type="image/avif" srcset="{{ $black['avif'] }}">
        <source type="image/webp" srcset="{{ $black['webp'] }}">
        <img src="{{ Vite::asset('resources/images/Logo_SyleStudio_Syle_B.png?w=120') }}"
             alt="" aria-hidden="true" width="120" height="40"
             loading="eager" decoding="async" class="" />
    </picture>
</a>