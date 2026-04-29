<x-layout>
    <div class="w-full h-screen flex relative">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img src="/images/ems-placeholder.jpg"
                 alt="Emergency Medics"
                 class="w-full h-full object-cover"/>
        </div>

        <!-- Right: Login Section -->
        <div class="relative z-10 md:w-1/3 w-full flex items-center justify-center h-screen bg-white/10 backdrop-blur-xl md:ml-auto">
            <!-- Login Content -->
            <div class="w-full min-h-screen flex flex-col items-center justify-center px-2 md:px-8 pt-12 md:pt-24">
                <!-- Logo -->
                <img src="/images/radmedics-logo.png"
                     alt="RADMedics Logo"
                     class="w-36 h-36 mb-6"/>
                <!-- Title and Subtitle -->
                <h2 class="text-2xl md:text-3xl font-bold text-white mb-3 text-center">Welcome to RADMedics!</h2>
                <p class="text-sm font-extralight text-white mb-6 text-center flex items-center justify-center">
                    <span class="mr-2">&darr;</span>
                    Please login to continue.
                </p>
                    @livewire('auth.login')
                <!-- Terms and Privacy -->
                <p class="text-sm font-extralight text-white text-center leading-relaxed mb-2 px-2">
                    By using this service, you acknowledge that you have read, understood, and agree to the RADMedics Website
                    <a href="{{ url('/terms-of-service') }}" class="underline text-blue-500 hover:text-cyan"><br>Terms of Service</a>
                    and
                    <a href="{{ url('/privacy-policy') }}" class="underline text-blue-500 hover:text-cyan">Privacy Policy</a>.
                </p>
            </div>
        </div>
    </div>
</x-layout>
