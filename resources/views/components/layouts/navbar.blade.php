@props(['variant' => 'solid'])

@php
    $isTransparent = in_array($variant, ['transparent', 'transparent-white']);
    $navWrapperClasses = $isTransparent
        ? 'bg-transparent shadow-none'
        : 'bg-white shadow-lg';
    $baseLinkColor = $variant === 'transparent-white' ? 'text-white' : 'text-cyan';
@endphp

<nav id="site-nav" class="{{ $navWrapperClasses }} fixed top-0 w-full z-20 transition-all duration-300">
    <div class="max-w-7xl mx-auto flex items-center justify-between h-24">
        <!-- Logo + Company Name + Tagline -->
        <div class="flex items-center justify-center w-full space-x-2 lg:-mx-20 lg:space-x-4 lg:justify-start lg:w-auto">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="group flex items-center justify-center w-full space-x-2 lg:space-x-4 lg:justify-start lg:w-auto">
                <img src="/images/radmedics-logo.png"
                    alt="RADMedics Logo"
                    class="w-12 h-12 sm:w-14 sm:h-14 lg:w-16 lg:h-16 rounded-full shadow"/>
                <!-- Company Name (stacked) -->
                <div class="flex flex-col leading-none items-start">
                    <span class="text-base sm:text-lg lg:text-xl font-bold {{ $baseLinkColor }} tracking-wide -mb-1 group-hover:text-dark-teal group-hover:scale-105 transition-all duration-200 origin-center inline-block" style="letter-spacing:0.18em;">RADMEDICS</span>
                    <span class="text-base sm:text-lg lg:text-xl font-bold {{ $baseLinkColor }} -mt-1 group-hover:text-dark-teal group-hover:scale-105 transition-all duration-200 origin-center inline-block">CORPORATION</span>
                </div>
            </a>
            <!-- Tagline Pill -->
            <div class="bg-dark-teal rounded-xl px-2 py-1 sm:px-3 sm:py-2 text-white italic text-xs sm:text-xs lg:text-xs font-sans w-fit text-center shadow hidden sm:block">
                Response Advocates for Development of Medics
            </div>
        </div>

        <!-- Desktop Navigation -->
    <div class="hidden lg:flex items-center gap-x-6 -mx-20">
            @php
                $navItems = [
                    ['route' => 'landing-page', 'label' => 'HOME'],
                    ['route' => 'about', 'label' => 'ABOUT US'],
                    ['route' => 'offered-course', 'label' => 'COURSES'],
                    ['route' => 'updates', 'label' => 'UPDATES'],
                    ['route' => 'contact', 'label' => 'CONTACT'],
                ];
            @endphp
            @foreach($navItems as $item)
                @php
                    $exists = \Illuminate\Support\Facades\Route::has($item['route']);
                    $isActive = $item['route'] !== 'landing-page' && request()->routeIs($item['route']);
                    $url = $exists ? route($item['route']) : '#';
                    $colorClass = $isActive ? 'text-dark-teal' : $baseLinkColor;
                @endphp
                <a href="{{ $url }}" class="px-3 font-semibold text-base relative group flex items-center nav-link">
                    <span class="{{ $colorClass }} transition-all duration-200 group-hover:text-dark-teal group-hover:scale-105">
                        {{ $item['label'] }}
                    </span>
                    <span class="absolute left-0 -bottom-1 h-[2px] bg-dark-teal transition-all duration-300 origin-left {{ $isActive ? 'w-full scale-x-100' : 'w-0 scale-x-0 group-hover:w-full group-hover:scale-x-100' }}"></span>
                </a>
            @endforeach
            <a href="{{ route('login') }}" class="bg-dark-teal hover:bg-cyan rounded-lg px-6 py-2 font-semibold text-base text-white flex items-center transform transition-all duration-200 hover:scale-105">
                LOGIN
            </a>
        </div>

        <!-- Mobile Hamburger -->
        <button id="menu-toggle" aria-controls="mobile-menu" aria-expanded="false" class="lg:hidden focus:outline-none">
            <span class="sr-only">Toggle menu</span>
            <svg id="icon-open" class="w-8 h-8 text-dark-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg id="icon-close" class="w-8 h-8 text-dark-teal hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu"
        class="fixed inset-0 bg-dark-teal bg-opacity-95 transform -translate-x-full
            transition-transform duration-300 ease-in-out lg:hidden z-50">
        <button id="menu-close" aria-label="Close menu"
            class="absolute top-4 right-4 focus:outline-none">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <div class="mt-20 px-6 space-y-6">
            @php
                $mobileNavItems = [
                    ['route' => 'landing-page', 'label' => 'HOME'],
                    ['route' => 'about', 'label' => 'ABOUT US'],
                    ['route' => 'offered-course', 'label' => 'COURSES'],
                    ['route' => 'updates', 'label' => 'UPDATES'],
                    ['route' => 'contact', 'label' => 'CONTACT'],
                    ['route' => 'login', 'label' => 'LOGIN'],
                ];
            @endphp
            @foreach($mobileNavItems as $item)
                @php
                    $exists = \Illuminate\Support\Facades\Route::has($item['route']);
                    $isActive = $item['route'] !== 'landing-page' && request()->routeIs($item['route']);
                    $url = $exists ? route($item['route']) : '#';
                @endphp
                <a href="{{ $url }}" class="block font-bold text-lg {{ $isActive ? 'text-cyan' : 'text-white' }} transition-colors duration-200 hover:text-cyan">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggle = document.getElementById('menu-toggle');
            const menu = document.getElementById('mobile-menu');
            const openIcon = document.getElementById('icon-open');
            const closeIcon = document.getElementById('icon-close');
            const closeBtn = document.getElementById('menu-close');

            function setNavOffset(){
                const nav = document.getElementById('site-nav');
                if(!nav) return;
                document.documentElement.style.setProperty('--nav-height', nav.offsetHeight + 'px');
            }

            function toggleMenu() {
                const expanded = toggle.getAttribute('aria-expanded') === 'true';
                toggle.setAttribute('aria-expanded', !expanded);
                menu.classList.toggle('translate-x-0');
                openIcon.classList.toggle('hidden');
                closeIcon.classList.toggle('hidden');
            }

            toggle.addEventListener('click', toggleMenu);
            closeBtn.addEventListener('click', toggleMenu);
            window.addEventListener('resize', setNavOffset);
            setNavOffset();
        });
    </script>
</nav>
