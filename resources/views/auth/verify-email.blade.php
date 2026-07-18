@extends('layouts.app')

@section('content')
    <x-card>
    <h2>Thank you for signing up!</h2>
    <p>We have sent you an email to verify your email address. Please click on the link in that email to verify your email address and complete your registration.</p>

    <p>If you did not receive the email, please check your spam folder or click the button below to request another verification email.</p>
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <x-button type="submit" class="mt-4">Resend Verification Email</x-button>
    </form>
    </x-card>
@endsection