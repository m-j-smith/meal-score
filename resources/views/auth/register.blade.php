@extends('layouts.guest')

@section('content')
<x-card>
    <h2>Create your account</h2>
    <p>Set up your household table in a minute</p>

    <div class="mt-7">
        <form method="POST" action="{{ route('register.store') }}" class="space-y-4">
            @csrf
            <div class="space-y-1">
                <x-input.label for="name" value="Name" :mandatory="true" />
                <x-input.field-text id="name" placeholder="John Doe" value="{{ old('name') }}" required autofocus />
                <x-input.error :messages="$errors->get('name')" />
            </div>

            <div class="space-y-1">
                <x-input.label for="email" value="Email" :mandatory="true" />
                <x-input.field-email id="email" value="{{ old('email') }}" required />
                <x-input.error :messages="$errors->get('email')" />
            </div>
        
            <div class="space-y-1">
                <x-input.label for="password" value="Password" :mandatory="true" />
                <x-input.field-password id="password" placeholder="At least 8 characters" required />
                <x-input.error :messages="$errors->get('password')" />
            </div>

            <div class="space-y-1">
                <x-input.label for="password_confirmation" value="Confirm Password" :mandatory="true" />
                <x-input.field-password id="password_confirmation" placeholder="At least 8 characters" required />
                <x-input.error :messages="$errors->get('password_confirmation')" />
            </div>

            <x-button type="submit" class="block w-full cursor-pointer mt-2">Create account</x-button>

        </form>

        <p class="text-center mt-1 text-xs">By creating an account you agree to our <a class="text-herb no-underline font-medium hover:underline" href="#">Terms</a> and <a class="text-herb no-underline font-medium hover:underline" href="#">Privacy policy</a>.</p>
        
        <p class="text-center mt-8 text-sm">Already have an account? <a class="text-herb no-underline font-medium hover:underline" href="{{ route('login') }}">Sign in</a></p>
    </div>
</x-card>
@endsection