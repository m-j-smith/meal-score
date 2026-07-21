@extends('layouts.guest')

@section('content')

<div class="flex flex-col gap-4 md:flex-row md:justify-between md:items-center my-2">
    <h2>{{ $diningTable->name }}</h2>
    <div class="flex flex-col sm:flex-row gap-2">
        @can('update', $diningTable)<x-button href="{{ route('dining-tables.edit', [$diningTable]) }}" variant="secondary">Edit Dining Table</x-button>@endcan
        @can('leave', $diningTable)<x-button href="#" variant="danger">Leave Dining Table</x-button>@endcan

        @can('delete', $diningTable)
            <form method="POST" action="{{ route('dining-tables.destroy', [$diningTable]) }}" onsubmit="return confirm('Are you sure you want to delete {{ $diningTable->name }}?')">
                @csrf
                @method('DELETE')
                <x-button type="submit" variant="danger">Delete Dining Table</x-button>
            </form>
        @endcan
    </div>
</div>

<p class="text-stone-400 font-mono tracking-widest">Invite Code: {{ $diningTable->invite_code }}</p>


@endsection

