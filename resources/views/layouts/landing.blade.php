<!DOCTYPE html>
<html lang="id" data-theme="light" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="BPSDA — Portal informasi dan layanan pengelolaan sumber daya air.">
    <title>@yield('title', 'Beranda') — BPSDA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-base-100 min-h-screen font-sans text-base-content antialiased">
{{-- Navbar --}}
<header class="bg-base-100/90 sticky top-0 z-40 border-b border-base-300 backdrop-blur">
    <div class="navbar mx-auto max-w-7xl px-4 lg:px-8">
        <div class="navbar-start">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost btn-square lg:hidden" aria-label="Buka menu navigasi">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="size-5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" /></svg>
                </div>
                <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-50 mt-2 w-52 gap-1 p-2 shadow">
                    <li><a href="#beranda">Beranda</a></li>
                    <li><a href="#layanan">Layanan</a></li>
                    <li><a href="#data">Data</a></li>
                    <li><a href="#berita">Berita</a></li>
                    <li><a href="#kontak">Kontak</a></li>
                </ul>
            </div>
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <span class="bg-primary text-primary-content grid size-10 place-items-center rounded-xl text-lg font-black">B</span>
                <span>
                    <span class="block text-base leading-tight font-extrabold">BPSDA</span>
                    <span class="text-base-content/60 hidden text-xs sm:block">Sumber Daya Air</span>
                </span>
            </a>
        </div>
        <nav class="navbar-center hidden lg:flex" aria-label="Navigasi utama">
            <ul class="menu menu-horizontal gap-1 px-1">
                <li><a href="#beranda">Beranda</a></li>
                <li><a href="#layanan">Layanan</a></li>
                <li><a href="#data">Data</a></li>
                <li><a href="#berita">Berita</a></li>
                <li><a href="#kontak">Kontak</a></li>
            </ul>
        </nav>
        <div class="navbar-end gap-2">
            <a href="{{ route('login') }}" class="btn btn-primary btn-sm sm:btn-md">Masuk</a>
        </div>
    </div>
</header>

<main>
    @yield('content')
</main>

{{-- Footer --}}
<footer class="bg-neutral text-neutral-content mt-0">
    <div class="footer mx-auto max-w-7xl gap-8 p-10 sm:footer-horizontal lg:px-8">
        <aside class="max-w-xs">
            <span class="bg-primary text-primary-content grid size-10 place-items-center rounded-xl text-lg font-black">B</span>
            <p class="mt-3 font-bold">BPSDA</p>
            <p class="text-sm opacity-70">Portal informasi dan layanan pengelolaan sumber daya air: data hidrologi, perizinan, dan pemantauan infrastruktur.</p>
        </aside>
        <nav>
            <h6 class="footer-title">Navigasi</h6>
            <a href="#beranda" class="link link-hover">Beranda</a>
            <a href="#layanan" class="link link-hover">Layanan</a>
            <a href="#data" class="link link-hover">Data</a>
            <a href="#berita" class="link link-hover">Berita</a>
        </nav>
        <nav>
            <h6 class="footer-title">Layanan</h6>
            <a href="#layanan" class="link link-hover">Data Hidrologi</a>
            <a href="#layanan" class="link link-hover">Perizinan SIPA</a>
            <a href="#layanan" class="link link-hover">Pemantauan Bendungan</a>
            <a href="#layanan" class="link link-hover">Pengaduan</a>
        </nav>
        <nav>
            <h6 class="footer-title">Kontak</h6>
            <span class="text-sm opacity-70">Jl. Contoh No. 123, Indonesia</span>
            <span class="text-sm opacity-70">(021) 123-4567</span>
            <span class="text-sm opacity-70">info@example.com</span>
        </nav>
    </div>
    <div class="border-t border-white/10">
        <p class="mx-auto max-w-7xl px-4 py-4 text-xs opacity-60 lg:px-8">© {{ date('Y') }} BPSDA — Seluruh hak cipta dilindungi.</p>
    </div>
</footer>
</body>
</html>
