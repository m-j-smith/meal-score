@props(['diningTable'])

<form method="POST" action="#" class="flex gap-2">
    @csrf

        <x-input.field-email id="invite_email" placeholder="friend@example.com" required />
        @error('email')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <x-button type="submit">Send invite</x-button>
</form>

@if (session('status'))
    <p class="mt-2 text-sm text-green-600">{{ session('status') }}</p>
@endif