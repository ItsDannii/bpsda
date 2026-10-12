<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk — BPSDA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-base-200 min-h-screen font-sans text-base-content antialiased">
<div class="grid min-h-screen lg:grid-cols-2">
    {{-- Panel branding --}}
    <div class="bg-primary text-primary-content relative hidden flex-col justify-between overflow-hidden p-10 lg:flex">
        <div class="bg-white/10 absolute -top-24 -right-24 size-72 rounded-full"></div>
        <div class="bg-white/10 absolute -bottom-32 -left-16 size-80 rounded-full"></div>
        <a href="{{ route('home') }}" class="relative flex items-center gap-3">
            <span class="grid size-10 place-items-center rounded-xl bg-white/20 text-lg font-black">B</span>
            <span>
                <span class="block text-base leading-tight font-extrabold">BPSDA</span>
                <span class="block text-xs opacity-70">Sumber Daya Air</span>
            </span>
        </a>
        <div class="relative">
            <h1 class="text-3xl leading-tight font-extrabold">Portal Layanan & Monitoring Air Terpadu</h1>
            <p class="mt-3 max-w-md opacity-80">Masuk untuk mengelola data hidrologi, perizinan, pemantauan infrastruktur, dan pengaduan dalam satu dashboard.</p>
            <div class="mt-6 flex gap-6">
                <div>
                    <p class="text-2xl font-extrabold">48</p>
                    <p class="text-sm opacity-70">Pos pantau aktif</p>
                </div>
                <div>
                    <p class="text-2xl font-extrabold">2,8 rb</p>
                    <p class="text-sm opacity-70">Izin diterbitkan</p>
                </div>
            </div>
        </div>
        <p class="relative text-xs opacity-60">© {{ date('Y') }} BPSDA — Seluruh hak cipta dilindungi.</p>
    </div>

    {{-- Form login --}}
    <div class="flex items-center justify-center p-6 sm:p-10">
        <div class="w-full max-w-md">
            <a href="{{ route('home') }}" class="btn btn-ghost btn-sm mb-6 gap-2 lg:hidden">← Kembali</a>
            <h2 class="text-2xl font-extrabold tracking-tight">Selamat datang kembali</h2>
            <p class="text-base-content/60 mt-1 text-sm">Masuk untuk mengakses dashboard Anda.</p>

            @if ($errors->any())
                <div role="alert" class="alert alert-error mt-5">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="size-5 shrink-0"><circle cx="12" cy="12" r="10" /><path stroke-linecap="round" d="M12 8v4m0 4h.01" /></svg>
                    <span class="text-sm">{{ $errors->first() }}</span>
                </div>
            @endif

            @if (session('status'))
                <div role="alert" class="alert alert-success mt-5">
                    <span class="text-sm">{{ session('status') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="card bg-base-100 mt-5 border border-base-300 shadow-sm">
                <div class="card-body gap-4">
                    @csrf

                    <label class="form-control w-full">
                        <span class="label"><span class="label-text font-medium">Email</span></span>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="nama@email.com"
                            required
                            autofocus
                            autocomplete="username"
                            class="input input-bordered w-full @error('email') input-error @enderror"
                        >
                        @error('email')
                            <span class="label"><span class="label-text-alt text-error">{{ $message }}</span></span>
                        @enderror
                    </label>

                    <label class="form-control w-full">
                        <span class="label"><span class="label-text font-medium">Kata Sandi</span></span>
                        <input
                            type="password"
                            name="password"
                            placeholder="••••••••"
                            required
                            autocomplete="current-password"
                            class="input input-bordered w-full @error('password') input-error @enderror"
                        >
                        @error('password')
                            <span class="label"><span class="label-text-alt text-error">{{ $message }}</span></span>
                        @enderror
                    </label>

                    <label class="label cursor-pointer justify-start gap-3">
                        <input type="checkbox" name="remember" class="checkbox checkbox-primary checkbox-sm">
                        <span class="label-text">Ingat saya</span>
                    </label>

                    <button type="submit" class="btn btn-primary w-full">Masuk</button>
                </div>
            </form>

            <div class="bg-base-100 mt-4 rounded-2xl border border-dashed border-base-300 p-4 text-sm">
                <p class="font-semibold">Akun demo</p>
                <div class="text-base-content/70 mt-1 grid gap-1 sm:grid-cols-2">
                    <p>Admin: <span class="font-mono">admin@mail.com</span> / <span class="font-mono">admin123</span></p>
                    <p>Operator: <span class="font-mono">operator@mail.com</span> / <span class="font-mono">operator123</span></p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
