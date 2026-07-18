@props([
    'id',
    ])

<input type="hidden" name="{{ $id }}" id="{{ $id }}" {{ $attributes->merge(['class' => '']) }}>