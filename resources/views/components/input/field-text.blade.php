@props([
    'id',
    ])

<input type="text" name="{{ $id }}" id="{{ $id }}" {{ $attributes->merge(['class' => '']) }}>