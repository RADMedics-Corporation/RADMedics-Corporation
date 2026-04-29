<x-layout>
    <section class="min-h-screen w-full flex bg-white mt-5 md:mt-11 lg:mt-16">

        <div class="mx-auto w-full max-w-[1700px] px-4 sm:px-6 lg:px-8 py-32 flex flex-col">
            <h1 class="text-[#0ABAB5] font-bold tracking-wide text-center mb-12 text-6xl">
                OUR COURSES
            </h1>

            <livewire:course-list />

            {{-- Animation for Cards --}}
            <script>
                window.addEventListener('DOMContentLoaded', () => {
                    const cards = document.querySelectorAll('.js-course-card');
                    cards.forEach((el, idx) => {
                        setTimeout(() => {
                            el.classList.remove('opacity-0','translate-y-4');
                            el.classList.add('opacity-100','translate-y-0');
                        }, 100 + idx * 120);
                    });
                });
            </script>
        </div>
    </section>
</x-layout>
