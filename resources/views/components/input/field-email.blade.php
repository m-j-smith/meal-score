@props([
    'id',
    ])

<input type="email" name="{{ $id }}" id="{{ $id }}" {{ $attributes->merge(['class' => '', 'placeholder' => 'you@example.com']) }}>

