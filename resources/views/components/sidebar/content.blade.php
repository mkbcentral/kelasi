<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-4 px-3">
    <x-sidebar.link title="Dashboard" href="{{ route('dashboard') }}" :isActive="request()->routeIs('dashboard')">
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <div x-transition x-show="isSidebarOpen || isSidebarHovered" class="text-sm text-gray-500">
       Secrétariat
    </div>
    <x-sidebar.dropdown title="Inscriptions" :active="Str::startsWith(
        request()
            ->route()
            ->uri(),
        'buttons',
        )">
        <x-slot name="icon">
            <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
        <x-sidebar.sublink title="Nouvelle inscription"
                href="{{ route('inscription.new') }}" :active="request()->routeIs('inscription.new')" />

    </x-sidebar.dropdown>
</x-perfect-scrollbar>
