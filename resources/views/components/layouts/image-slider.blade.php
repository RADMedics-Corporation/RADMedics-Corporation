@php
    // Define the team member data, including a description for the text box.
    $members = [
        [
            'image' => '/images/Doc-Almar.jpg',
            'name' => 'Almar Nuñez',
            'title' => 'President & Medical Director',
            'description' => 'As the President and Medical Director, Almar Nuñez oversees the strategic direction of the organization while ensuring the highest medical standards are upheld. He combines leadership and medical expertise to guide the team in delivering safe, effective, and innovative emergency care.'
        ],
        [
            'image' => '/images/Doc-Rhoderick.jpg',
            'name' => 'Rhoderick Shih-Montevilla',
            'title' => 'EMS Clinical Practice Director/Co-owner',
            'description' => 'As the EMS Clinical Practice Director and Co-owner, Rhoderick Shih-Montevilla provides leadership in clinical standards, training, and overall direction of emergency medical services operations within the organization.'
        ],
    ];
@endphp


@if(!empty($members))
<div
    x-data="{
        members: {{ Illuminate\Support\Js::from($members) }},
        currentIndex: 0
    }"
    class="flex flex-col items-center justify-center w-full px-4 py-10 font-poppins"
>
    <div class="flex flex-col lg:flex-row items-center justify-center gap-8 lg:gap-12 w-full max-w-7xl">
        <div class="flex flex-col items-center order-1 w-full lg:w-[400px]">
            <div class="relative w-full max-w-[400px] h-[605px] lg:max-w-none">
                <div class="absolute top-0 left-0 w-[calc(100%-14px)] h-[calc(100%-15px)] bg-[#0ABAB5] shadow-md"></div>
                <div class="absolute bottom-0 right-0 flex items-center justify-center w-[calc(100%-14px)] h-[calc(100%-15px)] border-[0.938px] border-[#056360] bg-white overflow-hidden shadow-lg">
                    <img
                        :key="currentIndex"
                        :src="members[currentIndex].image"
                        :alt="members[currentIndex].name"
                        class="object-cover w-full h-full"
                        x-transition:opacity.duration.500ms
                        onerror="this.onerror=null;this.src='https://placehold.co/800x1000/fecaca/991b1b?text=Image+Not+Found';"
                    >
                </div>
                <div class="absolute bottom-0 right-0 flex flex-col items-center justify-center w-[calc(100%-14px)] h-[105.938px] bg-[#0ABAB5] px-4">
                    <h3
                        :key="currentIndex"
                        x-text="members[currentIndex].name"
                        class="pt-4 text-2xl md:text-3xl font-bold text-center text-white capitalize leading-tight"
                        x-transition:opacity.duration.500ms
                    ></h3>
                    <p
                        :key="currentIndex"
                        x-text="members[currentIndex].title"
                        class="text-sm md:text-base font-normal text-center text-white opacity-90 pb-4"
                        x-transition:opacity.duration.500ms
                    ></p>
                </div>
            </div>
            {{-- Navigation Buttons --}}
            <div class="flex items-center justify-center gap-4 mt-8">
                {{-- Buttons remain the same --}}
                <button @click="currentIndex = (currentIndex - 1 + members.length) % members.length" class="flex items-center justify-center w-[52.5px] h-[52.5px] border-2 transition hover:text-[#FFF] hover:border-[#FFF] rounded-full bg-[#0ABAB5]" aria-label="Previous Member">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                </button>
                <button @click="currentIndex = (currentIndex + 1) % members.length" class="flex items-center justify-center w-[52.5px] h-[52.5px] border-2 transition hover:text-[#FFF] hover:border-[#FFF] rounded-full bg-[#0ABAB5]" aria-label="Next Member">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </button>
            </div>
        </div>
        {{-- Description Box: Now uses a fixed width and height on large screens --}}
        <div class="flex flex-col items-center order-2 w-full lg:w-auto lg:-mt-24">
            <div class="relative w-full max-w-2xl lg:w-[838px] lg:h-[440px] min-h-[300px]">
            <div class="rounded-[2.5rem] border-4 flex items-center justify-center p-6 md:p-10 w-full h-full" style="border-color: #0ABAB5;">
            <p
            :key="currentIndex"
            x-text="members[currentIndex].description"
            class="text-xl md:text-2xl font-light leading-8 text-center"
            style="color: #056360;"
            x-transition:opacity.duration.1000ms
            ></p>
            </div>
            </div>
        </div>
    </div>
</div>
@else
    <p>No team members to display.</p>
@endif
