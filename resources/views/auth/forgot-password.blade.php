@extends('layouts.guest')

@section('content')

<x-card>
    <h2>Forgot your password?</h2>
    <p>Enter your email address below and we'll send you a link to reset your password.</p>

    <x-auth.session-status class="my-4" :status="session('status')" />

    <div class="mt-7">
        <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
            @csrf
            <div class="space-y-1">
                <x-input.label for="email" value="Email" :mandatory="true" />
                <x-input.field-email id="email" required autofocus />
                <x-input.error :messages="$errors->get('email')" />
            </div>

            <x-button type="submit" class="block w-full cursor-pointer mt-2">Send Password Reset Link</x-button>
        </form>
    </div>
</x-card>


@endsection