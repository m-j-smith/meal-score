<div class="hidden sm:flex sm:items-center sm:space-x-3">
    @guest
    <x-nav.button variant="outline" href="#">Sign in</x-button>
    <x-nav.button variant="primary" href="#">Get started</x-button>
    @else
        
    @endguest
</div>