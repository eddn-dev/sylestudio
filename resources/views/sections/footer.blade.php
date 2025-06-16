{{-- 4. Contacto & RRSS --}}
@php
    $socials = [
        [
            'net'   => 'facebook',
            'label' => 'Facebook',
            'url'   => 'https://www.facebook.com/sylestudio',        // ← cambia cuando esté lista
        ],
        [
            'net'   => 'instagram',
            'label' => 'Instagram',
            'url'   => 'https://www.instagram.com/sylestudio.mx',    // ejemplo distinto
        ],
        [
            'net'   => 'tiktok',
            'label' => 'TikTok',
            'url'   => 'https://www.tiktok.com/@sylestudio',         // user preceded by @
        ],
        [
            'net'   => 'x',
            'label' => 'X (Twitter)',
            'url'   => 'https://x.com/sylestudio_',                  // handle con guion bajo
        ],
    ];
@endphp

<footer class="bg-neutral-950 text-on-primary" role="contentinfo">
    <div class="mx-auto max-w-7xl px-6 py-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12">

        {{-- 1. Logo + misión --}}
        <div class="space-y-4">
            <x-nav-logo/>
            <p class="text-sm max-w-xs">
                Street-ready garments for the ones who dare. <br>
                Crafted in Mexico. Worn worldwide.
            </p>
        </div>

        {{-- 2. Sitemap --}}
        <nav aria-label="Primary navigation">
            <h3 class="font-semibold mb-4 uppercase text-xs tracking-wider">Explore</h3>
            <ul class="space-y-2">
                <li><a href="{{ route('home')   }}"   class="footer-link">Home</a></li>
                <li><a href="{{ route('mens')   }}"   class="footer-link">Men's</a></li>
                <li><a href="{{ route('womens') }}"   class="footer-link">Women's</a></li>
                <li><a href="{{ route('about')  }}"   class="footer-link">About Us</a></li>
                <li><a href="{{ route('events') }}"   class="footer-link">Events</a></li>
            </ul>
        </nav>

        {{-- 3. Newsletter --}}
        <div>
            <h3 class="font-semibold mb-4 uppercase text-xs tracking-wider">Join the Club</h3>
            <form action="{{ route('home') }}" method="POST" class="space-y-4" aria-label="Newsletter">
                @csrf
                <x-form-input name="email" type="email" placeholder="Email address" required onblack />
                <x-primary-button class="w-full sm:w-auto">Subscribe</x-primary-button>
            </form>
        </div>

        {{-- 4. Contacto & RRSS --}}
        <div class="space-y-4">
            <h3 class="font-semibold mb-4 uppercase text-xs tracking-wider">Get in touch</h3>

            <ul class="text-sm space-y-2">
                <li>Email: <a href="mailto:contacto@sylestudio.com" class="footer-link">contacto@sylestudio.com</a></li>
                <li>Phone: <a href="tel:+525588061595" class="footer-link">+52&nbsp;55&nbsp;8806&nbsp;1595</a></li>
            </ul>

            <div class="flex space-x-4 mt-6">
                @foreach ($socials as $s)
                <a href="{{ $s['url'] }}"
                    class="group p-2 hover:bg-white/10"
                    aria-label="{{ $s['label'] }}"
                    target="_blank" rel="noopener">
                    <svg class="h-5 w-5 fill-current transition-colors group-hover:text-white text-on-primary/70">
                        <use xlink:href="#icon-{{ $s['net'] }}"/>
                    </svg>
                    <span class="sr-only">{{ $s['label'] }}</span>
                </a>
                @endforeach
            </div>
        </div>
    </div>

    {{-- línea inferior --}}
    <div class="border-t border-outline-variant py-6 text-xs text-center tracking-wide">
        © {{ now()->year }} Syle Studio — All rights reserved.
    </div>
</footer>