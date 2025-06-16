{{-- resources/views/pages/home.blade.php --}}
@extends('layouts.app')

@php
    $widths   = [800, 1600];
    $formats  = ['avif', 'webp'];

    // Creamos un arreglo
    $sources = collect($formats)->mapWithKeys(function ($format) use ($widths) {
        $set = collect($widths)->map(function ($w) use ($format) {
            return Vite::asset("resources/images/hero.png?w={$w}&format={$format}") . " {$w}w";
        })->implode(', ');

        return [$format => $set];
    });
@endphp

@section('content')
<section id="hero" class="relative h-[100vh] overflow-hidden">
    {{-- 2. Picture responsivo --}}
    <picture class="absolute inset-0 w-full h-full">
        {{-- AVIF first (mayor compresión) --}}
        <source
            type="image/avif"
            srcset="{{ $sources['avif'] }}"
            sizes="(min-width: 1024px) 50vw, 100vw">

        {{-- WebP fallback --}}
        <source
            type="image/webp"
            srcset="{{ $sources['webp'] }}"
            sizes="(min-width: 1024px) 50vw, 100vw">

        {{-- Fallback JPG para navegadores muy viejos --}}
        <img
            src="{{ Vite::asset('resources/images/hero.jpg?w=1600') }}"
            alt="Modelo vistiendo Sylestudio"
            class="w-full h-full object-cover"
            width="1600"
            height="900"
            loading="eager"
            decoding="async">
    </picture>

    {{-- 3. Overlay + contenido --}}
    <div class="absolute inset-0 bg-black/40"></div>

    <div class="absolute inset-0 flex items-center justify-center text-center text-white">
        <x-primary-button class="w-40">Buy Now</x-primary-button>
    </div>
</section>
<section id="categories" class="grid grid-cols-1 md:grid-cols-2 gap-1 p-1">
    {{-- 4. Tarjetas de categorías --}}
    <x-category-card slug="mens"    title="MENS"    sub="SHOP NOW"  src-base="resources/images/mens"   />
    <x-category-card slug="womens"  title="SHE"     sub="SHOP NOW"  src-base="resources/images/womens" />
    <x-category-card slug="about"   title="ABOUT"   sub="MEET US"   src-base="resources/images/about"  />
    <x-category-card slug="events"  title="EVENTS"  sub="OUR EVENTS"  src-base="resources/images/events" />
</section>
@include('sections.join'){{-- Espacio para scroll y ver el efecto de parallax --}}
@endsection
