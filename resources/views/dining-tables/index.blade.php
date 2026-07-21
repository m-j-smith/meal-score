@extends('layouts.guest')

@section('content')

<div class="flex flex-col gap-4 md:flex-row md:justify-between md:items-center my-6">
    <h2>My Dining Tables</h2>
    <x-button href="{{ route('dining-tables.create') }}">Add Dining Table</x-button>
</div>

<div class="my-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @foreach ($diningTables as $diningTable)
        
        <a href="{{ route('dining-tables.show', [$diningTable]) }}" class="w-full max-w-md mx-auto">
            <x-card class="h-full aspect-square hover:bg-parchment-50">
                <h3>{{ $diningTable->name }}</h3>
                <p>{{ $diningTable->users->count() }} {{ Str::plural('member', $diningTable->users->count()) }}
                <p class="text-xs text-stone-400 font-mono tracking-widest">Invite Code: {{ $diningTable->invite_code }}</p>
            </x-card>
        </a>
        
    @endforeach
</div>

@endsection

