<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') — {{ config('app.name', 'Laravel') }} Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-base-200 min-h-screen font-sans text-base-content antialiased">
<div class="drawer lg:drawer-open">
    <input id="admin-drawer" type="checkbox" class="drawer-toggle">

    <div class="drawer-content flex min-h-screen flex-col">
        {{-- Topbar --}}
        <header class="navbar bg-base-100 sticky top-0 z-30 gap-2 border-b border-base-300 px-4 lg:px-8">
            <label for="admin-drawer" class="btn btn-ghost btn-square drawer-button lg:hidden" aria-label="Buka menu">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="size-5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" /></svg>
            </label>

            <div class="flex-1">
                <h1 class="text-lg font-bold tracking-tight">@yield('header', 'Dashboard')</h1>
                <p class="text-base-content/60 hidden text-sm sm:block">@yield('subheader', 'Selamat datang kembali, pantau aktivitas hari ini.')</p>
            </div>

            <div class="hidden md:block">
                <label class="input input-bordered input-sm flex w-64 items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="size-4 opacity-60"><circle cx="11" cy="11" r="7" /><path stroke-linecap="round" d="m20 20-3.5-3.5" /></svg>
                    <input type="search" placeholder="Cari…" class="grow">
                </label>
            </div>

            <button type="button" class="btn btn-ghost btn-sm btn-circle" aria-label="Notifikasi">
                <span class="indicator">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="size-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.4-1.4A2 2 0 0 1 18 14.6V11a6 6 0 0 0-4-5.7V5a2 2 0 1 0-4 0v.3A6 6 0 0 0 6 11v3.6c0 .5-.2 1-.6 1.4L4 17h5m6 0v1a3 3 0 1 1-6 0v-1m6 0H9" /></svg>
                    <span class="badge badge-primary badge-xs indicator-item">3</span>
                </span>
            </button>

            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="avatar placeholder cursor-pointer">
                    <div class="bg-primary text-primary-content w-9 rounded-full">
                        <span class="text-sm font-bold">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</span>
                    </div>
                </div>
                <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-40 mt-2 w-52 gap-1 p-2 shadow">
                    <li class="menu-title px-3 py-1">
                        <span class="block truncate">{{ auth()->user()->name }}</span>
                        <span class="block truncate font-normal normal-case">{{ auth()->user()->email }}</span>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left">Keluar</button>
                        </form>
                    </li>
                </ul>
            </div>
        </header>

        {{-- Content --}}
        <main class="flex-1 p-4 lg:p-8">
            @yield('content')
        </main>

        <footer class="text-base-content/50 px-8 pb-6 text-xs">
            © {{ date('Y') }} {{ config('app.name', 'Laravel') }} — Panel Admin.
        </footer>
    </div>

    {{-- Sidebar --}}
    <div class="drawer-side z-40">
        <label for="admin-drawer" aria-label="Tutup menu" class="drawer-overlay"></label>
        <aside class="bg-base-100 flex min-h-full w-72 flex-col border-r border-base-300">
            <a href="{{ auth()->user()?->hasRole('operator') ? route('operator.dashboard') : route('admin.dashboard') }}" class="flex items-center gap-3 px-6 pt-6 pb-4">
                <span class="bg-primary text-primary-content grid size-10 place-items-center rounded-xl text-lg font-black">B</span>
                <span>
                    <span class="block text-base leading-tight font-extrabold">BPSDA {{ auth()->user()?->hasRole('operator') ? 'Operator' : 'Admin' }}</span>
                    <span class="text-base-content/60 block text-xs">Panel kontrol</span>
                </span>
            </a>

            @include('admin.partials.sidebar-menu')

            <div class="mt-auto p-4">
                <div class="flex items-center gap-3 px-2">
                    <div class="avatar placeholder">
                        <div class="bg-neutral text-neutral-content w-9 rounded-full">
                            <span class="text-xs">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 2)) }}</span>
                        </div>
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="truncate text-sm font-semibold">{{ auth()->user()->name }}</p>
                        <p class="text-base-content/60 truncate text-xs">{{ auth()->user()->email }} • {{ auth()->user()->getRoleNames()->first() }}</p>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>
</body>
</html>
