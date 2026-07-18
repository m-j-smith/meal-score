@extends('layouts.guest')

@section('content')
<x-card>
    <h2>Create your account</h2>
    <p>Set up your household table in a minute</p>

    <div class="mt-7">
        <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
            @csrf

            <x-input.field-hidden id="token" value="{{ $request->route('token') }}" />

            <div class="space-y-1">
                <x-input.label for="email" value="Email" :mandatory="true" />
                <x-input.field-email id="email" value="{{ old('email', $request->email) }}" required />
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

            <x-button type="submit" class="block w-full cursor-pointer mt-2">Reset Password</x-button>

        </form>
    </div>
</x-card>
@endsection