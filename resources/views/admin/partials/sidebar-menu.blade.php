@php
    $isActive = fn (string $route): string => request()->routeIs($route) ? 'menu-active' : '';
@endphp

<nav class="flex-1 overflow-y-auto px-4 py-2">
    <p class="text-base-content/50 px-3 pt-2 pb-1 text-[11px] font-bold tracking-widest uppercase">Menu Utama</p>
    <ul class="menu w-full gap-1 p-0">
        @hasrole('admin')
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ $isActive('admin.dashboard') }}">
                    <x-lucide-layout-dashboard class="size-5" />
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.users.index') }}" class="{{ $isActive('admin.users.*') }}">
                    <x-lucide-users class="size-5" />
                    Pengguna
                </a>
            </li>
            <li>
                <a href="{{ route('admin.reports') }}" class="{{ $isActive('admin.reports') }}">
                    <x-lucide-file-text class="size-5" />
                    Laporan
                </a>
            </li>
        @endhasrole
        @hasrole('operator')
            <li>
                <a href="{{ route('operator.dashboard') }}" class="{{ $isActive('operator.dashboard') }}">
                    <x-lucide-layout-dashboard class="size-5" />
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('operator.monitoring') }}" class="{{ $isActive('operator.monitoring') }}">
                    <x-lucide-activity class="size-5" />
                    Monitoring
                </a>
            </li>
            <li>
                <a href="{{ route('operator.reports') }}" class="{{ $isActive('operator.reports') }}">
                    <x-lucide-file-text class="size-5" />
                    Laporan
                </a>
            </li>
        @endhasrole
    </ul>

    <p class="text-base-content/50 px-3 pt-5 pb-1 text-[11px] font-bold tracking-widest uppercase">Lainnya</p>
    <ul class="menu w-full gap-1 p-0">
        @hasrole('admin')
            <li>
                <a href="{{ route('admin.settings') }}" class="{{ $isActive('admin.settings') }}">
                    <x-lucide-settings class="size-5" />
                    Pengaturan
                </a>
            </li>
        @endhasrole
        <li>
            <a href="{{ route('home') }}">
                <x-lucide-globe class="size-5" />
                Kembali ke Situs
            </a>
        </li>
        <li>
            <form method="POST" action="{{ route('logout') }}" class="p-0">
                @csrf
                <button type="submit" class="text-error flex w-full items-center gap-2">
                    <x-lucide-log-out class="size-5" />
                    Keluar
                </button>
            </form>
        </li>
    </ul>
</nav>
