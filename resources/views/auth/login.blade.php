@extends('layouts.guest')

@section('content')

<x-card>
    <h2>Welcome back</h2>
    <p>Sign in to your account</p>

    <x-auth.session-status class="my-4" :status="session('status')" />

    <div class="mt-7">
        <form method="POST" action="{{ route('login.store') }}" class="space-y-4">
            @csrf
            <div class="space-y-1">
                <x-input.label for="email" value="Email" />
                <x-input.field-email id="email" autofocus />
                <x-input.error :messages="$errors->get('email')" />
            </div>
        
            <div class="space-y-1">
                <x-input.label for="password" value="Password" />
                <x-input.field-password id="password" />
                <div class="text-right"><a class="text-herb no-underline text-sm hover:underline" href="{{ route('password.request') }}">Forgot your password?</a></div>
                <x-input.error :messages="$errors->get('password')" />
            </div>

            <x-button type="submit" class="block w-full cursor-pointer mt-2">Sign in</x-button>
        </form>
        
        <p class="text-center mt-5 text-sm">No account yet? <a class="text-herb no-underline font-medium hover:underline" href="{{ route('register') }}">Create one</a></p>
    </div>
</x-card>


@endsection