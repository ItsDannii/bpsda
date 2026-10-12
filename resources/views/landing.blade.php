@extends('layouts.landing')

@section('title', 'Beranda')

@section('content')
{{-- Hero --}}
<section id="beranda" class="bg-gradient-to-b from-primary/10 via-base-100 to-base-100">
    <div class="mx-auto grid max-w-7xl items-center gap-10 px-4 pt-14 pb-16 lg:grid-cols-2 lg:px-8 lg:pt-20 lg:pb-24">
        <div>
            <span class="badge badge-primary badge-soft gap-2">
                <span class="size-2 rounded-full bg-current"></span>
                Portal Resmi Pengelolaan Air
            </span>
            <h1 class="mt-4 text-4xl leading-tight font-extrabold tracking-tight sm:text-5xl">
                Kelola Sumber Daya Air secara <span class="text-primary">Transparan</span> dan Terpadu
            </h1>
            <p class="text-base-content/70 mt-4 max-w-xl text-base sm:text-lg">
                Akses data hidrologi, ajukan perizinan penggunaan air, pantau kondisi bendungan dan sungai, serta sampaikan pengaduan — semua dalam satu portal.
            </p>
            <div class="mt-6 flex flex-wrap gap-3">
                <a href="#layanan" class="btn btn-primary">Jelajahi Layanan</a>
                <a href="{{ route('login') }}" class="btn btn-outline">Masuk Dashboard</a>
            </div>
            <div class="mt-8 flex flex-wrap gap-6">
                @foreach ([['12+', 'Tahun Melayani'], ['48', 'Pos Pantau Aktif'], ['2,8 rb', 'Izin Diterbitkan']] as [$value, $label])
                    <div>
                        <p class="text-2xl font-extrabold">{{ $value }}</p>
                        <p class="text-base-content/60 text-sm">{{ $label }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="card bg-base-100 border border-base-300 shadow-xl">
            <div class="card-body">
                <div class="flex items-center justify-between gap-2">
                    <h2 class="card-title text-base">Tinggi Muka Air Hari Ini</h2>
                    <span class="badge badge-success badge-soft badge-sm">Normal</span>
                </div>
                <div class="mt-4 flex h-48 items-end gap-2 sm:gap-3">
                    @foreach ([35, 55, 42, 68, 50, 76, 60, 84, 66, 48, 58, 72] as $height)
                        <div class="bg-primary/80 hover:bg-primary flex-1 rounded-t-lg transition-colors" style="height: {{ $height }}%"></div>
                    @endforeach
                </div>
                <div class="text-base-content/50 mt-2 flex justify-between text-xs">
                    <span>00.00</span><span>04.00</span><span>08.00</span><span>12.00</span><span>16.00</span><span>20.00</span>
                </div>
                <div class="divider my-2"></div>
                <div class="flex flex-wrap gap-2">
                    <span class="badge badge-outline badge-sm">Pos A: 1,24 m</span>
                    <span class="badge badge-outline badge-sm">Pos B: 0,86 m</span>
                    <span class="badge badge-outline badge-sm">Pos C: 2,10 m</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Layanan --}}
<section id="layanan" class="mx-auto max-w-7xl scroll-mt-24 px-4 py-16 lg:px-8 lg:py-20">
    <div class="mx-auto max-w-2xl text-center">
        <p class="text-primary text-sm font-bold tracking-widest uppercase">Layanan Kami</p>
        <h2 class="mt-2 text-3xl font-extrabold tracking-tight">Satu Portal untuk Semua Kebutuhan Air</h2>
        <p class="text-base-content/60 mt-3">Layanan digital untuk masyarakat, pelaku usaha, dan instansi.</p>
    </div>
    <div class="mt-10 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ([
            ['Data Hidrologi', 'Unduh data curah hujan, debit sungai, dan tinggi muka air dari seluruh pos pantau.', 'M4 20V10m6 10V4m6 16v-7m4 7H2'],
            ['Perizinan SIPA', 'Ajukan dan pantau Surat Izin Pengusahaan Air Minum dan penggunaan air tanah secara daring.', 'M9 12h6m-6 4h6M9 8h6M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2Z'],
            ['Pantau Bendungan', 'Informasi real-time kondisi bendungan, volume tampungan, dan jadwal pemeliharaan.', 'M12 3v3m0 12v3M3 12h3m12 0h3M5.6 5.6l2.1 2.1m8.6 8.6 2.1 2.1m0-12.8-2.1 2.1M7.7 16.3l-2.1 2.1M16 12a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z'],
            ['Peta Daerah Aliran', 'Jelajahi peta DAS, wilayah sungai, dan zona rawan banjir interaktif.', 'M9 20 3 17V4l6 3m0 13 6-3m-6 3V7m6 10 6 3V7l-6-3m0 13V4M9 7 15 4'],
            ['Pengaduan', 'Laporkan pencemaran, kerusakan infrastruktur, atau pelanggaran pemanfaatan air.', 'M21 12a8 8 0 0 1-8 8H4l2-3a8 8 0 1 1 15-5Z'],
            ['Edukasi & Publikasi', 'Materi konservasi air, buletin hidrologi, dan laporan tahunan yang dapat diunduh.', 'M4 19.5A2.5 2.5 0 0 1 6.5 17H20V3H6.5A2.5 2.5 0 0 0 4 5.5v14ZM4 19.5A2.5 2.5 0 0 0 6.5 22H20v-5'],
        ] as [$title, $desc, $path])
            <div class="card bg-base-100 border border-base-300 shadow-sm transition-shadow hover:shadow-md">
                <div class="card-body">
                    <span class="bg-primary/10 text-primary grid size-11 place-items-center rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $path }}" /></svg>
                    </span>
                    <h3 class="card-title mt-3 text-base">{{ $title }}</h3>
                    <p class="text-base-content/60 text-sm">{{ $desc }}</p>
                    <a href="#kontak" class="link link-primary mt-2 text-sm font-semibold">Selengkapnya →</a>
                </div>
            </div>
        @endforeach
    </div>
</section>

{{-- Alur --}}
<section class="bg-base-200 border-y border-base-300">
    <div class="mx-auto max-w-7xl px-4 py-16 lg:px-8 lg:py-20">
        <div class="mx-auto max-w-2xl text-center">
            <p class="text-primary text-sm font-bold tracking-widest uppercase">Cara Menggunakan</p>
            <h2 class="mt-2 text-3xl font-extrabold tracking-tight">Empat Langkah Mudah</h2>
        </div>
        <ul class="steps steps-vertical mt-10 w-full lg:steps-horizontal">
            @foreach ([['Pilih Layanan', 'Tentukan layanan yang dibutuhkan'], ['Isi Formulir', 'Lengkapi data dan dokumen'], ['Verifikasi', 'Tim kami memeriksa pengajuan'], ['Selesai', 'Terima hasil secara daring']] as [$step, $desc])
                <li class="step step-primary">
                    <span class="mt-2 block font-semibold">{{ $step }}</span>
                    <span class="text-base-content/60 block text-sm">{{ $desc }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</section>

{{-- Data --}}
<section id="data" class="mx-auto max-w-7xl scroll-mt-24 px-4 py-16 lg:px-8 lg:py-20">
    <div class="grid items-center gap-10 lg:grid-cols-2">
        <div>
            <p class="text-primary text-sm font-bold tracking-widest uppercase">Keterbukaan Data</p>
            <h2 class="mt-2 text-3xl font-extrabold tracking-tight">Data Terkini Wilayah Sungai</h2>
            <p class="text-base-content/60 mt-3">Ringkasancapaian pemantauan bulan berjalan dari seluruh pos hidrologi.</p>
            <div class="mt-6 flex flex-col gap-4">
                @foreach ([['Curah hujan rata-rata', '78%', 'w-3/4'], ['Pos pantau aktif', '92%', 'w-11/12'], ['Tampungan bendungan', '64%', 'w-2/3']] as [$label, $percent, $width])
                    <div>
                        <div class="flex justify-between text-sm font-medium">
                            <span>{{ $label }}</span>
                            <span>{{ $percent }}</span>
                        </div>
                        <div class="bg-base-200 mt-1 h-2.5 overflow-hidden rounded-full">
                            <div class="bg-primary {{ $width }} h-full rounded-full"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="stats stats-vertical bg-base-100 w-full border border-base-300 shadow-sm sm:stats-horizontal lg:stats-vertical xl:stats-horizontal">
            <div class="stat">
                <div class="stat-title">Debit Rata-rata</div>
                <div class="stat-value text-primary text-2xl">142 m³/s</div>
                <div class="stat-desc">↗︎ 6% dari minggu lalu</div>
            </div>
            <div class="stat">
                <div class="stat-title">Peringatan Dini</div>
                <div class="stat-value text-2xl">2 Lokasi</div>
                <div class="stat-desc">Status siaga, dipantau intensif</div>
            </div>
            <div class="stat">
                <div class="stat-title">Pengaduan Selesai</div>
                <div class="stat-value text-2xl">96%</div>
                <div class="stat-desc">312 laporan bulan ini</div>
            </div>
        </div>
    </div>
</section>

{{-- Berita --}}
<section id="berita" class="bg-base-200 border-y border-base-300">
    <div class="mx-auto max-w-7xl scroll-mt-24 px-4 py-16 lg:px-8 lg:py-20">
        <div class="flex flex-wrap items-end justify-between gap-4">
            <div>
                <p class="text-primary text-sm font-bold tracking-widest uppercase">Kabar Terkini</p>
                <h2 class="mt-2 text-3xl font-extrabold tracking-tight">Berita & Kegiatan</h2>
            </div>
            <a href="#berita" class="btn btn-ghost btn-sm">Lihat semua →</a>
        </div>
        <div class="mt-8 grid grid-cols-1 gap-4 md:grid-cols-3">
            @foreach ([
                ['Pemeliharaan', 'Pemeliharaan Rutin Bendungan Utama Dimulai Pekan Ini', 'Jadwal pemeliharaan berkala untuk memastikan keamanan tampungan selama musim hujan.'],
                ['Layanan', 'Pengajuan SIPA Kini Sepenuhnya Daring', 'Pelaku usaha dapat mengajukan dan memantau izin penggunaan air tanpa datang ke kantor.'],
                ['Edukasi', 'Gerakan Hemat Air di 20 Sekolah', 'Program edukasi konservasi air menyasar pelajar melalui lomba dan kunjungan pos pantau.'],
            ] as [$tag, $title, $excerpt])
                <article class="card bg-base-100 border border-base-300 shadow-sm transition-shadow hover:shadow-md">
                    <div class="card-body">
                        <span class="badge badge-primary badge-soft badge-sm">{{ $tag }}</span>
                        <h3 class="card-title mt-1 text-base leading-snug">{{ $title }}</h3>
                        <p class="text-base-content/60 text-sm">{{ $excerpt }}</p>
                        <span class="text-base-content/40 mt-2 text-xs">12 Oktober 2026 • 3 mnt baca</span>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA + Kontak --}}
<section id="kontak" class="mx-auto max-w-7xl scroll-mt-24 px-4 py-16 lg:px-8 lg:py-20">
    <div class="grid gap-6 lg:grid-cols-2">
        <div class="card bg-primary text-primary-content shadow-xl">
            <div class="card-body p-8">
                <h2 class="card-title text-2xl">Ada pertanyaan atau laporan?</h2>
                <p class="opacity-80">Hubungi pusat layanan kami pada jam kerja, atau kirim pesan melalui formulir di samping.</p>
                <ul class="mt-4 flex flex-col gap-3 text-sm font-medium">
                    <li class="flex items-center gap-3">
                        <span class="grid size-9 place-items-center rounded-lg bg-white/15">☎</span> (021) 123-4567 — Senin–Jumat, 08.00–16.00
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="grid size-9 place-items-center rounded-lg bg-white/15">✉</span> info@example.com
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="grid size-9 place-items-center rounded-lg bg-white/15">📍</span> Jl. Contoh No. 123, Indonesia
                    </li>
                </ul>
            </div>
        </div>
        <div class="card bg-base-100 border border-base-300 shadow-sm">
            <div class="card-body">
                <h3 class="card-title text-base">Kirim Pesan</h3>
                <form action="#kontak" method="get" class="mt-2 flex flex-col gap-3">
                    <div class="grid gap-3 sm:grid-cols-2">
                        <label class="form-control w-full">
                            <span class="label"><span class="label-text">Nama</span></span>
                            <input type="text" placeholder="Nama lengkap" class="input input-bordered w-full" required>
                        </label>
                        <label class="form-control w-full">
                            <span class="label"><span class="label-text">Email</span></span>
                            <input type="email" placeholder="nama@email.com" class="input input-bordered w-full" required>
                        </label>
                    </div>
                    <label class="form-control w-full">
                        <span class="label"><span class="label-text">Keperluan</span></span>
                        <select class="select select-bordered w-full">
                            <option>Informasi layanan</option>
                            <option>Pengaduan</option>
                            <option>Permohonan data</option>
                            <option>Lainnya</option>
                        </select>
                    </label>
                    <label class="form-control w-full">
                        <span class="label"><span class="label-text">Pesan</span></span>
                        <textarea class="textarea textarea-bordered h-24" placeholder="Tulis pesan Anda…" required></textarea>
                    </label>
                    <button type="submit" class="btn btn-primary mt-1">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
