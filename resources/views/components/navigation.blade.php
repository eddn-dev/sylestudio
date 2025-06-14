@php
$links = [
    ['label' => 'Home',     'route' => route('home')],
    ['label' => "Men's",    'route' => route('mens')],
    ['label' => "Women's",  'route' => route('womens')],
    ['label' => 'About Us', 'route' => route('about')],
    ['label' => 'Events',   'route' => route('events')],
];
@endphp

<header x-data="navbar()" class="fixed inset-x-0 top-0 z-50">
    {{-- ───────────────── NAV BAR ───────────────── --}}
    <nav id="mainNav"
         class="flex h-16 items-center px-4 md:px-8 transition-colors duration-300
                bg-transparent text-on-primary">

        {{-- 1) MÓVIL: buscar (oculto ≥ md) --}}
        <div class="flex md:hidden flex-1">
            <button aria-label="Search" class="mr-4">
                <svg class="h-6 w-6 stroke-current"><use xlink:href="#icon-search"/></svg>
            </button>
        </div>

        <div class="flex-1 hidden md:flex space-x-6">
            @foreach ($links as $link)
                <x-nav-link
                    :href="$link['route']"
                    :active="request()->url() === $link['route']">
                    {{ $link['label'] }}
                </x-nav-link>
            @endforeach
        </div>

        <x-nav-logo class="shrink-0 mr-4 md:mr-8" />

        <div class="flex flex-1 justify-end items-center space-x-6">
            {{-- Desktop --}}
            <div class="hidden md:flex items-center space-x-6">
                <button aria-label="Account"><svg class="h-5 w-5 stroke-current"><use xlink:href="#icon-user"/></svg></button>
                <button aria-label="Search"><svg class="h-5 w-5 stroke-current"><use xlink:href="#icon-search"/></svg></button>
                <button aria-label="Wishlist"><svg class="h-5 w-5 stroke-current"><use xlink:href="#icon-heart"/></svg></button>
                <button aria-label="Cart"><svg class="h-5 w-5 stroke-current"><use xlink:href="#icon-bag"/></svg></button>
            </div>

            {{-- Móvil --}}
            <button aria-label="Cart" class="md:hidden">
                <svg class="h-6 w-6 stroke-current"><use xlink:href="#icon-bag"/></svg>
            </button>
            <button @click="toggle" aria-label="Open menu" class="md:hidden">
                <svg class="h-6 w-6 stroke-current"><use xlink:href="#icon-menu"/></svg>
            </button>
        </div>
    </nav>

    {{-- ──────────────── DRAWER MÓVIL ─────────────── --}}
    <aside  x-show="open"
            x-transition.opacity
            x-cloak
            role="menu"
            class="fixed inset-0 z-40 flex flex-col bg-surface text-on-surface">
        <div class="flex items-center justify-between h-16 px-4 border-b border-outline">
            <span class="text-lg font-bold">Menu</span>
            <button @click="toggle" aria-label="Close">
                <svg class="h-6 w-6 stroke-current"><use xlink:href="#icon-close"/></svg>
            </button>
        </div>

        <nav class="p-4 space-y-1">
            @foreach ($links as $link)
                <x-responsive-nav-link
                    :href="$link['route']"
                    :active="request()->url() === $link['route']">
                    {{ $link['label'] }}
                </x-responsive-nav-link>
            @endforeach
        </nav>
    </aside>

    {{-- Script inline para registrar el componente y cargar el módulo JS --}}
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('navbar', () => ({
                open: false,
                toggle() {
                    this.open = !this.open;
                    window.dispatchEvent(new Event(this.open ? 'nav:open' : 'nav:close'));
                }
            }));
        });
    </script>
</header>
