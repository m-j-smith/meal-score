<div x-show="mobileOpen"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 -translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-2"
    class="sm:hidden" 
    x-cloak>
    
    <div class="space-y-2 px-2 pt-2 pb-3">
<<<<<<< HEAD
        @guest
            <x-nav.button variant="outline" href="#">Sign in</x-button>
            <x-nav.button variant="primary" href="#">Get started</x-button>
        @else
            
        @endguest
=======
        <x-nav.menu-items />
>>>>>>> feat(users): added user registration, email verification, authentication
    </div>
</div>