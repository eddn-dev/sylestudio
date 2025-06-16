@php
  //  — fuentes responsive para la imagen —
  $w   = [800,1600];
  $fmt = ['avif','webp'];
  $src = collect($fmt)->mapWithKeys(fn($f)=>[
      $f => collect($w)->map(fn($px)=> Vite::asset("resources/images/club.jpg?w={$px}&format={$f}") . " {$px}w")->implode(', ')
  ]);
@endphp

<section id="join" class="grid grid-cols-1 md:grid-cols-2">
    {{-- Bloque de texto ------------------------------------------------ --}}
    <div class="flex flex-col justify-center px-8 py-16 md:px-20 bg-outline-variant text-on-primary space-y-6">
        <h2 class="font-teko text-4xl md:text-6xl font-bold leading-tight uppercase">
            Join our Club
        </h2>

        <p class="max-w-md text-sm">
            It's not for everyone. It's for us.
        </p>

        <form action="{{ route('home') }}" method="POST" class="max-w-md space-y-6">
            @csrf
            <div>
                <x-form-input name="email" type="email" placeholder="Email address" required onblack />
            </div>

            <x-primary-button class="w-full md:w-48">
                Subscribe
                <svg class="ml-auto h-3 w-3 stroke-current">
                    <use xlink:href="#icon-arrow-right"/>
                </svg>
            </x-primary-button>
        </form>
    </div>

    {{-- Imagen con max height de 400px -------------------------------------------- --}}
    <picture class="h-80 md:h-auto max-h-[400px] overflow-hidden">
        {{-- Imagen responsive --}}
        <source type="image/avif" srcset="{{ $src['avif'] }}" sizes="50vw">
        <source type="image/webp" srcset="{{ $src['webp'] }}" sizes="50vw">
        <img src="{{ Vite::asset('resources/images/club.jpg?w=1600') }}"
             alt="Community gathering by the sea"
             class="h-full w-full object-cover grayscale"
             loading="lazy" decoding="async">
    </picture>
</section>
