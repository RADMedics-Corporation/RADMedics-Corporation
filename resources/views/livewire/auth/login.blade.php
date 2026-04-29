<div class="flex flex-col gap-6 w-full">

    <!-- Header -->
    <div class="text-center mb-2">
        <h3 class="text-xl font-semibold text-white">Log in to your account</h3>
        <p class="text-white/70 text-sm mt-1">Enter your email and password below to log in</p>
    </div>

    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="login" class="flex flex-col gap-6">

        <!-- Email -->
        <div>
            <label class="block text-sm font-medium text-white/90 mb-1.5">Email address</label>
            <input
                wire:model="email"
                type="email"
                required
                autofocus
                autocomplete="email"
                placeholder="you@example.com"
                class="w-full px-5 py-3.5 bg-white/95 text-gray-900 rounded-xl border border-white/30 focus:border-blue-400 focus:ring-2 focus:ring-blue-400/30 outline-none transition"
            />
            @error('email')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label class="block text-sm font-medium text-white/90 mb-1.5">Password</label>
            <div class="relative">
                <input
                    wire:model="password"
                    type="password"
                    required
                    autocomplete="current-password"
                    placeholder="••••••••"
                    class="w-full px-5 py-3.5 bg-white/95 text-gray-900 rounded-xl border border-white/30 focus:border-blue-400 focus:ring-2 focus:ring-blue-400/30 outline-none transition"
                />
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                       wire:navigate
                       class="absolute right-5 top-1/2 -translate-y-1/2 text-xs text-blue-300 hover:text-blue-200">
                        Forgot?
                    </a>
                @endif
            </div>
            @error('password')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember Me -->
        <label class="flex items-center gap-2 cursor-pointer">
            <input
                type="checkbox"
                wire:model="remember"
                class="w-4 h-4 rounded border-white/40 bg-white/10 text-blue-600 focus:ring-blue-500"
            >
            <span class="text-sm text-white/80">Remember me</span>
        </label>

        <!-- Submit Button -->
        <button
            type="submit"
            class="w-full py-4 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 transition font-semibold text-white rounded-2xl shadow-lg shadow-blue-500/30">
            Log in
        </button>
    </form>

    @if (Route::has('register'))
        <div class="text-center text-sm text-white/70 mt-4">
            Don't have an account?
            <a href="{{ route('register') }}" wire:navigate class="text-blue-400 hover:text-blue-300 font-medium">Sign up</a>
        </div>
    @endif
</div>

