<div>
    <div class="max-w-3xl mx-auto pt-32 pb-8 md:pt-0 md:pb-0 md:mt-[var(--nav-height)] md:min-h-[calc(100vh-var(--nav-height))] md:flex md:items-center md:justify-center">

        @if(session()->has('message'))
            <div class="bg-green-100 text-green-800 p-4 rounded my-4">{{ session('message') }}</div>
        @endif

        <div id="transition-card"
            class="rounded-[32px] shadow-lg overflow-hidden bg-white transition-all duration-500 ease-out w-full md:my-8">

            <!-- Header -->
            <div class="bg-cyan px-8 py-6">
                <h2 class="text-white font-bold text-4xl uppercase">
                    Enrollment Form
                </h2>
            </div>

            <!-- Form -->
            <form wire:submit.prevent="submit" class="px-8 py-8 space-y-6" aria-label="Enrollment Form">

                @if(!Auth::check())
                    <!-- Name -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <label for="first_name" class="font-semibold text-dark-teal mb-1 block">
                                First Name <span class="text-dark-teal">*</span>
                            </label>

                            <input
                                type="text"
                                name="first_name"
                                wire:model.defer="first_name"
                                required
                                placeholder="First Name"
                                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-dark-teal transition"
                            />
                            @error('first_name') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="last_name" class="font-semibold text-dark-teal mb-1 block">
                                Last Name <span class="text-dark-teal">*</span>
                            </label>

                            <input
                                type="text"
                                name="last_name"
                                required
                                placeholder="Last Name"
                                wire:model.defer="last_name"
                                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-dark-teal transition"
                            />
                            @error('last_name') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>

                    </div>

                    <!-- Contact -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <label for="phone" class="font-semibold text-dark-teal mb-1 block">
                                Phone Number <span class="text-dark-teal">*</span>
                            </label>

                            <input
                                type="tel"
                                name="phone"
                                required
                                wire:model.defer="phone"
                                placeholder="Phone Number"
                                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-dark-teal transition"
                            />
                            @error('phone') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="email" class="font-semibold text-dark-teal mb-1 block">
                                Email Address <span class="text-dark-teal">*</span>
                            </label>

                            <input
                                type="email"
                                name="email"
                                wire:model.defer="email"
                                required
                                placeholder="Email Address"
                                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-dark-teal transition"
                            />
                            @error('email') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="password" class="font-semibold text-dark-teal mb-1 block">
                                Password <span class="text-dark-teal">*</span>
                            </label>

                            <input
                                type="password"
                                name="password"
                                wire:model.defer="password"
                                required
                                placeholder="Password"
                                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-dark-teal transition"
                            />
                            @error('password') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="password_confirmation" class="font-semibold text-dark-teal mb-1 block">
                                Confirm Password <span class="text-dark-teal">*</span>
                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                wire:model.defer="password_confirmation"
                                required
                                placeholder="Confirm Password"
                                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-dark-teal transition"
                            />
                            @error('password_confirmation') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                    </div>
                @endif

                <!-- Course -->
                <div>
                    <label for="course" class="font-semibold text-dark-teal mb-1 block">
                        Course <span class="text-dark-teal">*</span>
                    </label>

                    <select
                        id="course"
                        name="course"
                        wire:model.live="course_id"
                        required
                        class="w-full border border-gray-300 rounded-md px-4 py-2 bg-white text-gray-800"
                    >

                    <option value="">Select Course</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                    </select>
                </div>


                <!-- Proof of Payment -->
                <div>
                    <label for="proof_of_payment" class="font-semibold text-dark-teal mb-2 block">
                        Proof of Payment
                    </label>

                    <div class="border border-dashed border-gray-300 rounded-xl p-10 text-center">

                        <div class="flex justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-10 h-10 text-gray-400"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 0115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                            </svg>
                        </div>

                        <p class="text-sm text-gray-600 mb-1">
                            Select a file or drag and drop here
                        </p>

                        <p class="text-xs text-gray-400 mb-4">
                            JPG, PNG or PDF, file size no more than 10MB
                        </p>

                        <input
                            type="file"
                            id="proof_of_payment"
                            wire:model="proof_of_payment"
                            name="proof_of_payment"
                            class="hidden"
                        />

                        <label
                            for="proof_of_payment"
                            class="inline-block bg-cyan text-white text-sm px-4 py-2 rounded-md cursor-pointer hover:bg-dark-teal transition"
                        >
                            Select File
                        </label>
                        @error('proof_of_payment')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Proof of Experience -->
                <div wire:key="experience-section-{{ $course_id ?? 'none' }}">
                    @if($this->requiresExperience)
                        <div>
                            <label for="proof_of_experience" class="font-semibold text-dark-teal mb-2 block">
                                Proof of Experience <span class="text-red-600">*</span>
                            </label>

                            <div class="border border-dashed border-gray-300 rounded-xl p-10 text-center">

                                <div class="flex justify-center mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-10 h-10 text-gray-400"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.5"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 0115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                    </svg>
                                </div>

                                <p class="text-sm text-gray-600 mb-1">
                                    Select a file or drag and drop here
                                </p>

                                <p class="text-xs text-gray-400 mb-4">
                                    JPG, PNG or PDF, file size no more than 10MB
                                </p>

                                <input
                                    type="file"
                                    id="proof_of_experience"
                                    wire:model="proof_of_experience"
                                    name="proof_of_experience"
                                    class="hidden"
                                />

                                <label
                                    for="proof_of_experience"
                                    class="inline-block bg-cyan text-white text-sm px-4 py-2 rounded-md cursor-pointer hover:bg-dark-teal transition"
                                >
                                    Select File
                                </label>
                                @error('proof_of_experience')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Consent -->
                <div class="flex items-start space-x-2">

                    <input
                        type="checkbox"
                        id="consent"
                        wire:model="consent"
                        name="consent"
                        class="accent-cyan-500 w-5 h-5 border-gray-300 rounded focus:ring-dark-teal mt-1"
                    />

                    <label for="consent" class="text-gray-700 text-sm leading-relaxed">
                        I agree to receive SMS notifications, alerts, and occasional marketing messages from RADMedics Corporation, which may include updated information, reminders, and promotional offers regarding the company's events and services.
                    </label>

                </div>

                <!-- Submit -->
                <div>
                    <button
                        type="submit"
                        wire:loading.attr="disabled"
                        class="w-full bg-cyan text-white font-semibold py-2 rounded-md shadow transition hover:bg-dark-teal"
                    >
                        <span wire:loading.remove>Submit</span>
                        <span wire:loading>Processing...</span>
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>
