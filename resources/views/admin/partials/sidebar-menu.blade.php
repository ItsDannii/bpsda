@php
    $isActive = fn (string $route): string => request()->routeIs($route) ? 'menu-active' : '';
@endphp

<nav class="flex-1 overflow-y-auto px-4 py-2">
    <p class="text-base-content/50 px-3 pt-2 pb-1 text-[11px] font-bold tracking-widest uppercase">Menu Utama</p>
    <ul class="menu w-full gap-1 p-0">
        @hasrole('admin')
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ $isActive('admin.dashboard') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="size-5"><rect x="3" y="3" width="7" height="9" rx="1.5" /><rect x="14" y="3" width="7" height="5" rx="1.5" /><rect x="14" y="12" width="7" height="9" rx="1.5" /><rect x="3" y="16" width="7" height="5" rx="1.5" /></svg>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.users.index') }}" class="{{ $isActive('admin.users.*') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="size-5"><path stroke-linecap="round" stroke-linejoin="round" d="M16 19v-1a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v1m16 0v-1a4 4 0 0 0-3-3.87M13 10a4 4 0 1 0-8 0 4 4 0 0 0 8 0Zm8-1a3.5 3.5 0 0 0-3.36-2.5M20 19v-1a3.5 3.5 0 0 0-2-3.16" /></svg>
                    Pengguna
                    <span class="badge badge-sm badge-primary ml-auto">12</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.reports') }}" class="{{ $isActive('admin.reports') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="size-5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 20V10m6 10V4m6 16v-7m4 7H2" /></svg>
                    Laporan
                </a>
            </li>
        @endhasrole
        @hasrole('operator')
            <li>
                <a href="{{ route('operator.dashboard') }}" class="{{ $isActive('operator.dashboard') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="size-5"><rect x="3" y="3" width="7" height="9" rx="1.5" /><rect x="14" y="3" width="7" height="5" rx="1.5" /><rect x="14" y="12" width="7" height="9" rx="1.5" /><rect x="3" y="16" width="7" height="5" rx="1.5" /></svg>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('operator.monitoring') }}" class="{{ $isActive('operator.monitoring') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="size-5"><path stroke-linecap="round" stroke-linejoin="round" d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z" /><circle cx="12" cy="12" r="3" /></svg>
                    Monitoring
                </a>
            </li>
            <li>
                <a href="{{ route('operator.reports') }}" class="{{ $isActive('operator.reports') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="size-5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 20V10m6 10V4m6 16v-7m4 7H2" /></svg>
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
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="size-5"><circle cx="12" cy="12" r="3" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.4 15a1.7 1.7 0 0 0 .34 1.87l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.7 1.7 0 0 0-1.87-.34 1.7 1.7 0 0 0-1 1.55V21a2 2 0 1 1-4 0v-.09a1.7 1.7 0 0 0-1-1.55 1.7 1.7 0 0 0-1.87.34l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.7 1.7 0 0 0 .34-1.87 1.7 1.7 0 0 0-1.55-1H3a2 2 0 1 1 0-4h.09a1.7 1.7 0 0 0 1.55-1 1.7 1.7 0 0 0-.34-1.87l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.7 1.7 0 0 0 1.87.34h.01a1.7 1.7 0 0 0 1-1.55V3a2 2 0 1 1 4 0v.09a1.7 1.7 0 0 0 1 1.55h.01a1.7 1.7 0 0 0 1.87-.34l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.7 1.7 0 0 0-.34 1.87v.01a1.7 1.7 0 0 0 1.55 1H21a2 2 0 1 1 0 4h-.09a1.7 1.7 0 0 0-1.55 1Z" /></svg>
                    Pengaturan
                </a>
            </li>
        @endhasrole
        <li>
            <a href="/">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="size-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4M10 17l5-5-5-5M15 12H3" /></svg>
                Kembali ke Situs
            </a>
        </li>
        <li>
            <form method="POST" action="{{ route('logout') }}" class="p-0">
                @csrf
                <button type="submit" class="flex w-full items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="size-5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4m7 14 5-5-5-5m5 5H9" /></svg>
                    Keluar
                </button>
            </form>
        </li>
    </ul>
</nav>
