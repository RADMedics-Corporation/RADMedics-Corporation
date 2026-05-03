<x-layout>
    <section class="min-h-screen w-full flex bg-white mt-5 md:mt-11 lg:mt-16">

        <div class="mx-auto w-full max-w-[1700px] px-4 sm:px-6 lg:px-8 py-32 flex flex-col">
            <h1 class="text-[#0ABAB5] font-bold tracking-wide text-center mb-12 text-6xl">
                OUR OFFERED COURSE
            </h1>

            <div class="flex flex-wrap justify-center gap-6">
                {{-- Emergency Medical Technician (EMT) - 40 Days Face-to-Face --}}
                <x-layouts.course-card
                    class="js-course-card opacity-0 translate-y-4 animate-[none] motion-safe:transition-all motion-safe:duration-700 motion-safe:ease-out will-change-transform will-change-opacity"
                    title="Emergency Medical Technician (EMT)"
                    mode="f2f"
                    image="images/course-image-1.jpg"
                    imageAlt="Emergency Medical Technician Training"
                    description="A 40-day intensive face-to-face program preparing future Emergency Medical Technicians in patient assessment, pre-hospital stabilization, trauma & medical emergency management, and safe transport."
                />

                {{-- Emergency Medical Responder (EMR) - 15 Days Face-to-Face --}}
                <x-layouts.course-card
                    class="js-course-card opacity-0 translate-y-4 animate-[none] motion-safe:transition-all motion-safe:duration-700 motion-safe:ease-out will-change-transform will-change-opacity"
                    title="Emergency Medical Responder (EMR)"
                    mode="hybrid"
                    image="images/course-image-2.jpg"
                    imageAlt="Emergency Medical Responder Training"
                    description="A 15-day foundational course for aspiring Emergency Medical Responders focusing on scene safety, initial patient care, basic airway management, bleeding control, shock prevention, and rapid activation of higher medical support."
                />

                {{-- Basic Life Support & First Aid (BLS - First Aid) - 7 Days --}}
                <x-layouts.course-card
                    class="js-course-card opacity-0 translate-y-4 animate-[none] motion-safe:transition-all motion-safe:duration-700 motion-safe:ease-out will-change-transform will-change-opacity"
                    title="Basic Life Support & First Aid"
                    mode="hybrid"
                    image="images/course-image-3.jpg"
                    imageAlt="Basic Life Support and First Aid Training"
                    description="A 7-day skills-based program covering high-quality CPR, AED use, airway & breathing support, wound and fracture management, environmental emergencies, and immediate life-saving interventions."
                />
            </div>

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