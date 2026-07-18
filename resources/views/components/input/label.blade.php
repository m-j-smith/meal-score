@props([
    'value', 
    'mandatory' => false,
    ])

<label {{ $attributes->merge(['class' => 'block text-sm font-medium text-parchment-700']) }}>{{ $value ?? $slot }} @if($mandatory)<sup class="text-red-500">*</sup>@endif</label>

