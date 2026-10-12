<!DOCTYPE html>
<html lang="id" data-theme="light" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="BPSDA — Portal resmi layanan dan informasi pengelolaan sumber daya air.">
    <title>@yield('title', 'Beranda') — BPSDA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-base-100 min-h-screen font-sans text-base-content antialiased">
{{-- Bilah resmi pemerintah --}}
<div class="bg-blue-950 text-white">
    <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-1.5 text-xs lg:px-8">
        <p class="flex items-center gap-2">
            <span class="grid size-4 place-items-center rounded-sm bg-red-600 text-[10px] font-black">ID</span>
            <span class="opacity-90">Portal Resmi Pemerintah — Balai Pengelolaan Sumber Daya Air</span>
        </p>
        <div class="hidden items-center gap-4 sm:flex">
            <a href="tel:+62211234567" class="flex items-center gap-1.5 opacity-90 hover:opacity-100 hover:underline">
                <i data-lucide="phone" class="size-3.5"></i>
                (021) 123-4567
            </a>
            <a href="mailto:info@example.com" class="opacity-90 hover:opacity-100 hover:underline">info@example.com</a>
            <span class="h-3 w-px bg-white/30"></span>
            <a href="#faq" class="opacity-90 hover:opacity-100 hover:underline">FAQ</a>
            <a href="#kontak" class="opacity-90 hover:opacity-100 hover:underline">Kontak</a>
        </div>
    </div>
</div>

{{-- Kepala instansi --}}
<header class="bg-base-100 sticky top-0 z-40 border-b border-base-300 shadow-sm">
    <div class="navbar mx-auto max-w-7xl px-4 lg:px-8">
        <div class="navbar-start">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost btn-square lg:hidden" aria-label="Buka menu navigasi">
                    <i data-lucide="menu" class="size-5"></i>
                </div>
                <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-50 mt-2 w-56 gap-1 p-2 shadow">
                    <li><a href="#beranda">Beranda</a></li>
                    <li><a href="#profil">Profil</a></li>
                    <li><a href="#layanan">Layanan</a></li>
                    <li><a href="#data">Data & Informasi</a></li>
                    <li><a href="#regulasi">Regulasi</a></li>
                    <li><a href="#berita">Berita</a></li>
                    <li><a href="#kontak">Kontak</a></li>
                </ul>
            </div>
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <span class="grid size-11 place-items-center rounded-xl bg-blue-900 font-black text-white">
                    <i data-lucide="droplets" class="size-6"></i>
                </span>
                <span>
                    <span class="block text-lg leading-tight font-extrabold tracking-tight text-blue-950">BPSDA</span>
                    <span class="text-base-content/60 block text-[11px] leading-tight">Balai Pengelolaan Sumber Daya Air</span>
                </span>
            </a>
        </div>
        <nav class="navbar-center hidden lg:flex" aria-label="Navigasi utama">
            <ul class="menu menu-horizontal gap-0.5 px-1 text-sm font-medium">
                <li><a href="#beranda">Beranda</a></li>
                <li><a href="#profil">Profil</a></li>
                <li><a href="#layanan">Layanan</a></li>
                <li><a href="#data">Data</a></li>
                <li><a href="#regulasi">Regulasi</a></li>
                <li><a href="#berita">Berita</a></li>
            </ul>
        </nav>
        <div class="navbar-end gap-2">
            <a href="#kontak" class="btn btn-ghost btn-sm hidden sm:inline-flex">Hubungi Kami</a>
            <a href="{{ route('login') }}" class="btn btn-primary btn-sm sm:btn-md">Masuk / Daftar</a>
        </div>
    </div>
</header>

<main>
    @yield('content')
</main>

{{-- Kaki instansi --}}
<footer class="bg-blue-950 text-white">
    <div class="mx-auto max-w-7xl px-4 py-12 lg:px-8">
        <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-4">
            <div>
                <div class="flex items-center gap-3">
                    <span class="grid size-10 place-items-center rounded-xl bg-white/15 text-white"><i data-lucide="droplets" class="size-5"></i></span>
                    <div>
                        <p class="font-extrabold">BPSDA</p>
                        <p class="text-xs opacity-70">Balai Pengelolaan Sumber Daya Air</p>
                    </div>
                </div>
                <p class="mt-4 text-sm opacity-70">Unit pelaksana teknis pengelolaan sumber daya air: konservasi, pendayagunaan, dan pengendalian daya rusak air.</p>
            </div>
            <nav class="flex flex-col gap-2">
                <h6 class="mb-1 text-sm font-bold tracking-widest uppercase opacity-60">Profil</h6>
                <a href="#profil" class="w-fit text-sm opacity-80 hover:opacity-100 hover:underline">Tugas & Fungsi</a>
                <a href="#profil" class="w-fit text-sm opacity-80 hover:opacity-100 hover:underline">Dasar Hukum</a>
                <a href="#berita" class="w-fit text-sm opacity-80 hover:opacity-100 hover:underline">Berita & Agenda</a>
                <a href="#faq" class="w-fit text-sm opacity-80 hover:opacity-100 hover:underline">FAQ</a>
            </nav>
            <nav class="flex flex-col gap-2">
                <h6 class="mb-1 text-sm font-bold tracking-widest uppercase opacity-60">Layanan</h6>
                <a href="#layanan" class="w-fit text-sm opacity-80 hover:opacity-100 hover:underline">SIPA Online</a>
                <a href="#layanan" class="w-fit text-sm opacity-80 hover:opacity-100 hover:underline">Data Hidrologi</a>
                <a href="#layanan" class="w-fit text-sm opacity-80 hover:opacity-100 hover:underline">PPID & Informasi Publik</a>
                <a href="#kontak" class="w-fit text-sm opacity-80 hover:opacity-100 hover:underline">Pengaduan Masyarakat</a>
            </nav>
            <div>
                <h6 class="mb-1 text-sm font-bold tracking-widest uppercase opacity-60">Kontak</h6>
                <ul class="mt-2 flex flex-col gap-2 text-sm opacity-80">
                    <li>Jl. Contoh No. 123, Indonesia</li>
                    <li>(021) 123-4567</li>
                    <li>info@example.com</li>
                    <li>Senin–Jumat, 08.00–16.00 WIB</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="border-t border-white/15">
        <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-2 px-4 py-4 text-xs opacity-70 lg:px-8">
            <p>© {{ date('Y') }} BPSDA — Hak cipta dilindungi undang-undang.</p>
            <p>Situs resmi instansi pemerintah</p>
        </div>
    </div>
</footer>
</body>
</html>
