@props([
    'id',
    ])

<input type="password" name="{{ $id }}" id="{{ $id }}" {{ $attributes->merge(['class' => '',  'placeholder' => '••••••••']) }}>