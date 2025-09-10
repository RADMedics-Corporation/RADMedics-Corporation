@php
    // Defines the alignment for the entire component container.
    $variantClasses = [
        'ver-1' => 'flex justify-center items-center w-full',
        'ver-2' => 'flex items-center justify-center w-full',
        'ver-3' => 'flex items-center justify-center w-full',
        'ver-4' => 'w-full h-full justify-center',
        'ver-5' => 'w-full h-full justify-center',
    ];
@endphp

{{--
    This component creates a stylized text box with a background and foreground element.
    It supports 5 different variants.

    HOW TO USE:
    Pass the content directly into the component's slot.

    <x-layouts.text-box variant="ver-1">
        Your content, like this paragraph, goes here. It will be placed inside the foreground box.
    </x-layouts.text-box>
--}}

@php
    // Sets a default variant if none is provided.
    $variant = $variant ?? 'ver-1';
@endphp

<div class="{{ $variantClasses[$variant] ?? $variantClasses['ver-1'] }} px-4 py-8">
    @if ($variant === 'ver-1')
        <div class="relative w-full max-w-5xl">
            <div class="absolute inset-0 -inset-y-4 rounded-3xl lg:rounded-[60px] border-4 transform translate-y-2" style="border-color: #0ABAB5;"></div>
            <div class="relative flex items-center justify-center rounded-3xl lg:rounded-[60px] border-4 p-6 md:p-10 transform translate-y-2 min-h-[200px]" style="border-color: #056360; background-color: transparent;">
                <div class="font-poppins text-center font-light text-xl md:text-lg leading-8" style="color: #056360;">
                    {{ $slot }}
                </div>
            </div>
        </div>
    @elseif ($variant === 'ver-4' || $variant === 'ver-5')
        @php
            $boxStyle = $variant === 'ver-4'
                ? 'background-color: #0ABAB5;'
                : 'border-color: #0ABAB5; background-color: #FFF;';
            $textStyle = $variant === 'ver-4'
                ? 'color: #FFF;'
                : 'color: #056360;';
        @endphp
        <div class="relative w-full h-full max-w-sm lg:w-[345px] lg:h-[400px]">
            <div class="flex items-center justify-center rounded-3xl lg:rounded-[60px] p-8 md:p-10 w-full h-full @if($variant === 'ver-5') border-4 @endif" style="{{ $boxStyle }}">
                <div class="text-center">
                    @if (isset($title))
                        <h3 class="font-poppins font-semibold text-lg md:text-2xl mb-2" style="{{ $textStyle }}">
                            {{ $title }}
                        </h3>
                    @endif
                    <div class="font-poppins font-light text-base md:text-lg leading-relaxed" style="{{ $textStyle }}">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    @else
        @php
            $fgBoxClasses = [
                'ver-2' => 'transform lg:-translate-x-4 lg:translate-y-2',
                'ver-3' => 'transform lg:translate-x-4 lg:translate-y-2',
            ][$variant];

            $bgBoxClasses = [
                'ver-2' => 'transform lg:-translate-x-2 lg:-translate-y-2',
                'ver-3' => 'transform lg:translate-x-2 lg:-translate-y-2',
            ][$variant];
        @endphp
        <div class="relative w-full max-w-4xl lg:w-[1042px]">
            <div class="absolute inset-0 -inset-y-4 translate-y-2 lg:inset-0 {{ $bgBoxClasses }} rounded-3xl lg:rounded-[60px] border-4" style="border-color: #0ABAB5;"></div>
            <div class="relative flex items-center justify-center translate-y-2 {{ $fgBoxClasses }} rounded-3xl lg:rounded-[60px] border-4 p-6 md:p-8 min-h-[200px]" style="border-color: #056360; background-color: transparent;">
                <div class="font-poppins text-center font-light text-lg md:text-lg leading-8" style="color: #056360;">
                    {{ $slot }}
                </div>
            </div>
        </div>
    @endif
</div>
