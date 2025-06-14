@props([
  'slug',        // mens | womens | about | events
  'title',       // MENS | SHE | ABOUT US | EVENTS
  'sub' =>      'SHOP NOW', // subtexto opcional
  'srcBase',     // ruta base sin extensión (p.e. resources/images/mens)
])

@php
  $sizes  = [800, 1600];
  $fmts   = ['avif', 'webp'];
  $sets   = collect($fmts)->mapWithKeys(fn ($f) => [
      $f => collect($sizes)->map(fn ($w) =>
          Vite::asset("{$srcBase}.jpg?w={$w}&format={$f}") . " {$w}w"
      )->implode(', ')
  ]);
@endphp

<article
  class="category-card group relative isolate h-[120vw] md:h-[80vh] overflow-hidden"
  data-card>
  {{-- Imagen responsive --}}
  <picture class="absolute inset-0 -z-10 h-full w-full">
      <source type="image/avif" srcset="{{ $sets['avif'] }}" sizes="100vw">
      <source type="image/webp" srcset="{{ $sets['webp'] }}" sizes="100vw">
      <img  src="{{ Vite::asset("{$srcBase}.jpg?w=1600") }}"
            alt="{{ $title }} hero"
            class="h-full w-full object-cover" loading="lazy" decoding="async">
  </picture>

  {{-- Texto --}}
  <div class="card-label pointer-events-none"
       data-label>
      <h2 class="font-teko text-5xl md:text-7xl font-bold leading-none">
          {{ $title }}
      </h2>
      <p class="text-xs tracking-wide">{{ $sub }}→</p>
  </div>

  {{-- Link pantalla completa --}}
  <a href="{{ route($slug) }}" class="absolute inset-0 z-10" aria-label="{{ $title }}"></a>
</article>
