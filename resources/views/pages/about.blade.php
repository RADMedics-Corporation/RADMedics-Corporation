<x-layout>
@php
    $galleryImages = [
        ['src' => 'images/about-us-1.jpg', 'alt' => ''],
        ['src' => 'images/about-us-2.jpg', 'alt' => '']
    ];
        $portrait_1_Image =
        ['src' => 'images/what-we-do-1.jpg', 'alt' => 'what we do'];
        $portrait_2_Image =
        ['src' => 'images/our-mission-1.jpg', 'alt' => 'our mission'];

        $landscape_1_Image =
        ['src' => 'images/our-vision-1.jpg', 'alt' => 'our vision'];
@endphp


<div class="font-poppins pt-32 sm:pt-32 px-4 sm:px-6 lg:px-8">
    <div class="max-w-screen-2xl mx-auto space-y-52 sm:space-y-48">

    <section class="scroll-ani text-center space-y-12 opacity-0 translate-y-4 transition-all duration-[1000ms] ease-in-out">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-semibold uppercase tracking-wide text-[#0ABAB5]">
                ABOUT US
            </h1>
            <x-layouts.image-box variant="ver-1" :images="$galleryImages"/>
            <div class="max-w-5xl mx-auto">
                <x-layouts.text-box variant="ver-1">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                </x-layouts.text-box>
            </div>
        </section>

    <section class="scroll-ani flex flex-col lg:flex-row items-center gap-12 lg:gap-16 xl:gap-24 opacity-0 translate-y-4 transition-all duration-[500ms] ease-in-out">
            <div class="w-full lg:w-1/2">
                <x-layouts.image-box variant="ver-2" :image="$portrait_1_Image"/>
            </div>
            <div class="w-full lg:w-1/2 space-y-6 flex flex-col justify-center">
                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold uppercase tracking-wide text-[#0ABAB5] text-center">
                    WHAT WE DO
                </h2>
                <x-layouts.text-box variant="ver-2">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                </x-layouts.text-box>
            </div>
        </section>

    <section class="scroll-ani flex flex-col lg:flex-row-reverse items-center gap-12 lg:gap-16 xl:gap-24 opacity-0 translate-y-4 transition-all duration-[1000ms] ease-in-out">
            <div class="w-full lg:w-2/5">
                <x-layouts.image-box variant="ver-3" :image="$landscape_1_Image"/>
            </div>
            <div class="w-full lg:w-3/5 space-y-6 flex flex-col justify-center">
                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold uppercase tracking-wide text-[#0ABAB5] text-center">
                    OUR MISSION
                </h2>
                <x-layouts.text-box variant="ver-3">
                    To empower and equip aspiring emergency medical professionals with comprehensive education and top-tier training in our emergency medical services program. Through strategic community partnerships and our unwavering commitment to promoting exceptional pre-hospital care, we aim to develop a cadre of highly skilled and compassionate healthcare providers.
                </x-layouts.text-box>
            </div>
        </section>

    <section class="scroll-ani flex flex-col lg:flex-row items-center gap-12 lg:gap-16 xl:gap-24 opacity-0 translate-y-4 transition-all duration-[1000ms] ease-in-out">
            <div class="w-full lg:w-2/5">
                <x-layouts.image-box variant="ver-4" :image="$portrait_2_Image"/>
            </div>
            <div class="w-full lg:w-3/5 space-y-6 flex flex-col justify-center">
                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold uppercase tracking-wide text-[#0ABAB5] text-center">
                    OUR VISION
                </h2>
                <x-layouts.text-box variant="ver-2">
                    Be at the forefront of transforming pre-hospital care, setting new standards of excellence in both the local community and the nation. We strive to enhance the quality of emergency medical services, ensuring that every individual receives the best possible care in times of crisis.
                </x-layouts.text-box>
            </div>
        </section>

    <section class="scroll-ani text-center space-y-4 opacity-0 translate-y-4 transition-all duration-[1000ms] ease-in-out">
            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold uppercase tracking-wide text-[#0ABAB5]">
            OUR CORE VALUES
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-8 lg:gap-x-12 xl:gap-x-16 gap-y-2">
                <x-layouts.text-box variant="ver-4">
                    <x-slot:title>Ethical Behavior</x-slot>
                    We uphold the highest ethical standards, ensuring integrity in all our actions and decisions.
                </x-layouts.text-box>
                <x-layouts.text-box variant="ver-5">
                    <x-slot:title>Timely Response to Emergency Services</x-slot>
                    We prioritize swift and efficient responses to emergency situations, minimizing response times to save lives.
                </x-layouts.text-box>
                <x-layouts.text-box variant="ver-4">
                    <x-slot:title>Professionalism in Emergency Care</x-slot>
                    We approach every emergency with the utmost professionalism, delivering care with empathy and expertise.
                </x-layouts.text-box>
                <x-layouts.text-box variant="ver-5">
                    <x-slot:title>Critical Thinking Based on Evidence-Based Practice</x-slot>
                    We continuously apply evidence-based practices, leveraging critical thinking to make informed medical decisions.
                </x-layouts.text-box>
                <x-layouts.text-box variant="ver-4">
                    <x-slot:title>Teamwork and Effective Communication During Emergency Care</x-slot>
                    We foster a collaborative environment, where effective communication among our teams leads to seamless and coordinated care for patients.
                </x-layouts.text-box>
                <x-layouts.text-box variant="ver-5">
                    <x-slot:title>Competenct and Well-Trained Prehospital Care Provider</x-slot>
                    We invest in the ongoing training and development of our prehospital care providers, ensuring they are highly skilled and competent in their life-saving roles.
                </x-layouts.text-box>
            </div>
        </section>

    </div>

    <section class="scroll-ani text-center space-y-16 pt-32 sm:pt-48 pb-24 sm:pb-32 opacity-0 translate-y-4 transition-all duration-[1000ms] ease-in-out">
        <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold uppercase tracking-wide text-[#0ABAB5]">
                MEET THE TEAM
            </h2>
        </div>
        <div class="mt-16">
            <x-layouts.image-slider/>
        </div>
    </section>

</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {

        const sections = document.querySelectorAll('.scroll-ani');

        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.15
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove('opacity-0', 'translate-y-4');
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        sections.forEach(section => {
            observer.observe(section);
        });
    });
</script>

</x-layout>
