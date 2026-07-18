@props([
    'variant' => 'primary', 
    'href' => null,
])

@php
    // 1. Shared styles for all variants
    $baseClasses = 'block sm:inline-block rounded-md px-5 py-2 text-base sm:text-sm text-center no-underline transition-colors';

    // 2. Specific styles for each variant
    $variants = [
        'primary' => 'font-semibold bg-herb text-parchment-100 hover:bg-herb-600',
        'outline' => 'font-medium border border-parchment-300 text-parchment-700 hover:text-parchment-950 hover:border-parchment-500',
        'text'    => 'font-medium text-parchment-700 hover:text-parchment-950'
    ];

    // 3. Merge the base classes with the variant-specific classes
    $classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $classes.' hover:cursor-pointer', 'type' => 'button']) }}>
        {{ $slot }}
    </button>
@endif