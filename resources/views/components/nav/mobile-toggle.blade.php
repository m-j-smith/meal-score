<div class="absolute right-0 flex items-center sm:hidden">

    <div class="flex items-center">
        <button type="button"
            @click="mobileOpen = !mobileOpen"
            class="relative inline-flex items-center justify-center rounded-md p-2 border border-parchment-300 text-parchment-950 focus:outline-none" :aria-expanded="mobileOpen">
            <span class="sr-only">Open main menu</span>

            <svg x-show="!mobileOpen" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="h-6 w-6">
                <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>

            <svg x-show="mobileOpen" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="h-6 w-6">
                <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </div>
</div>