<div>
    <div class="flex flex-wrap justify-center gap-6">
        @forelse($courses as $course)
            <x-layouts.course-card
                class="js-course-card opacity-0 translate-y-4 animate-[none] motion-safe:transition-all motion-safe:duration-700 motion-safe:ease-out will-change-transform will-change-opacity"
                :title="$course->name"
                :mode="$course->mode_of_learning"
                :image="$course->thumbnail ? asset($course->thumbnail) : 'images/default-course.jpg'"
                :imageAlt="$course->name"
                :description="$course->description"
                :courseSlug="$course->slug"
                :role="$role"
            />
        @empty
            <p class="text-gray-500 text-center py-12 col-span-full">
                No published courses available at the moment.
            </p>
        @endforelse
    </div>

    {{-- Staggered Animation Script --}}
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const cards = document.querySelectorAll('.js-course-card');
            cards.forEach((el, idx) => {
                setTimeout(() => {
                    el.classList.remove('opacity-0', 'translate-y-4');
                    el.classList.add('opacity-100', 'translate-y-0');
                }, 100 + idx * 120);
            });
        });
    </script>
</div>
