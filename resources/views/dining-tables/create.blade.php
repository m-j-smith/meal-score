@extends('layouts.guest')

@section('content')
<x-card class="!max-w-2xl">
    <h2>Create a Dining Table</h2>

    <div class="mt-7">
        <form method="POST" action="{{ route('dining-tables.store') }}" class="space-y-4">
            @csrf
            
            @include('dining-tables.partials.create-edit-fields')

            <div class="text-right space-x-2">
                <x-button href="{{ route('dining-tables.index') }}" variant="outline">Cancel</x-button> 
                <x-button type="submit" class="cursor-pointer mt-2">Create Dining Table</x-button>
            </div>
        </form>
    </div>
</x-card>
@endsection