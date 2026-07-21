@guest

    @if( !Route::is('auth.login') )
        <x-button variant="outline" href="{{ route('login') }}">Sign in</x-button>
    @endif

    @if( !Route::is('auth.register') )
        <x-button variant="primary" href="{{ route('register') }}">Get started</x-button>
    @endif
@else
    <x-button variant="text" href="{{ route('dining-tables.index') }}">Home</x-button>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-button type="submit" variant="outline">Log out</x-button>
    </form>

@endguest