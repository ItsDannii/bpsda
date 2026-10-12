@extends('layouts.landing')

@section('title', 'Beranda')

@section('content')
{{-- Hero --}}
<section id="beranda" class="relative overflow-hidden bg-blue-950 text-white">
    <img src="https://images.unsplash.com/photo-1439405326854-014607f694d7?auto=format&fit=crop&w=1600&q=70" alt="Gelombang air laut" class="absolute inset-0 h-full w-full object-cover opacity-25">
    <div class="absolute inset-0 bg-gradient-to-br from-blue-950 via-blue-950/85 to-sky-900/70"></div>
    <div class="relative mx-auto grid max-w-7xl items-center gap-10 px-4 pt-14 pb-20 lg:grid-cols-2 lg:px-8 lg:pt-20 lg:pb-28">
        <div>
            <span class="badge gap-2 border-white/30 bg-white/10 text-white">
                <span class="size-2 rounded-full bg-emerald-400"></span>
                Situs Resmi Instansi Pemerintah
            </span>
            <h1 class="mt-4 text-4xl leading-tight font-extrabold tracking-tight sm:text-5xl">
                Melayani Pengelolaan Sumber Daya Air untuk Indonesia
            </h1>
            <p class="mt-4 max-w-xl text-blue-100 sm:text-lg">
                Konservasi, pendayagunaan, dan pengendalian daya rusak air — didukung layanan digital yang transparan dan akuntabel bagi masyarakat.
            </p>
            <div class="mt-6 flex flex-wrap gap-3">
                <a href="#layanan" class="btn bg-white text-blue-950 hover:bg-blue-50">Layanan Publik</a>
                <a href="#kontak" class="btn btn-outline text-white hover:bg-white/10">Lapor / Pengaduan</a>
            </div>
            <div class="mt-8 flex flex-wrap gap-6 border-t border-white/15 pt-6">
                @foreach ([['48', 'Pos Pantau Aktif'], ['2,8 rb', 'Izin Diterbitkan'], ['96%', 'Pengaduan Selesai']] as [$value, $label])
                    <div>
                        <p class="text-2xl font-extrabold">{{ $value }}</p>
                        <p class="text-sm text-blue-200">{{ $label }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="card bg-base-100 text-base-content shadow-2xl">
            <div class="card-body">
                <div class="flex items-center justify-between gap-2">
                    <h2 class="card-title text-base">Tinggi Muka Air Hari Ini</h2>
                    <span class="badge badge-success badge-soft badge-sm">Normal</span>
                </div>
                <p class="text-base-content/60 text-xs">Data telemetri pos pantau • diperbarui berkala</p>
                <div class="mt-4 flex h-48 items-end gap-2 sm:gap-3">
                    @foreach ([35, 55, 42, 68, 50, 76, 60, 84, 66, 48, 58, 72] as $height)
                        <div class="flex-1 rounded-t-lg bg-blue-800/80 transition-colors hover:bg-blue-800" style="height: {{ $height }}%"></div>
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

{{-- Akses cepat --}}
<section class="mx-auto max-w-7xl px-4 lg:px-8">
    <div class="grid -translate-y-10 grid-cols-2 gap-3 lg:grid-cols-4">
        @foreach ([
            ['SIPA Online', 'Izin penggunaan air', 'layanan', 'file-text'],
            ['Data Hidrologi', 'Curah hujan & debit', 'data', 'activity'],
            ['Status Bendungan', 'Tampungan & siaga', 'data', 'dam'],
            ['Pengaduan', 'Lapor cepat daring', 'kontak', 'megaphone'],
        ] as [$title, $desc, $anchor, $icon])
            <a href="#{{ $anchor }}" class="card bg-base-100 border border-base-300 shadow-md transition-shadow hover:shadow-lg">
                <div class="card-body gap-1 p-4 sm:p-5">
                    <span class="grid size-10 place-items-center rounded-xl bg-blue-900/10 text-blue-900">
                        <x-dynamic-component :component="'lucide-'.$icon" class="size-5" />
                    </span>
                    <p class="mt-2 text-sm font-extrabold sm:text-base">{{ $title }}</p>
                    <p class="text-base-content/60 text-xs sm:text-sm">{{ $desc }}</p>
                </div>
            </a>
        @endforeach
    </div>
</section>

{{-- Pengumuman --}}
<section class="mx-auto max-w-7xl px-4 pb-4 lg:px-8">
    <div role="alert" class="alert bg-amber-50 text-amber-900 shadow-sm">
        <x-lucide-triangle-alert class="size-5 shrink-0" />
        <div class="text-sm">
            <span class="font-bold">Pengumuman:</span>
            pemeliharaan rutin bendungan utama dilaksanakan pekan ini. Masyarakat diimbau mengikuti informasi debit melalui halaman Data.
            <a href="#data" class="link inline-flex items-center gap-1 font-semibold">Lihat data <x-lucide-arrow-right class="size-4" /></a>
        </div>
    </div>
</section>

{{-- Profil --}}
<section id="profil" class="mx-auto max-w-7xl scroll-mt-32 px-4 py-14 lg:px-8 lg:py-16">
    <div class="grid gap-10 lg:grid-cols-2">
        <div>
            <p class="text-sm font-bold tracking-widest text-blue-800 uppercase">Profil Instansi</p>
            <h2 class="mt-2 text-3xl font-extrabold tracking-tight text-blue-950">Tugas & Fungsi</h2>
            <figure class="mt-5 overflow-hidden rounded-2xl border border-base-300 shadow-sm">
                <img src="https://images.unsplash.com/photo-1504893524553-b855bce32c67?auto=format&fit=crop&w=900&q=70" alt="Aliran sungai di kawasan konservasi" loading="lazy" class="h-56 w-full object-cover sm:h-64">
                <figcaption class="bg-base-100 px-4 py-2 text-xs text-base-content/60">Pemantauan aliran sungai — dokumentasi kegiatan lapangan. Foto: Unsplash (placeholder).</figcaption>
            </figure>
            <p class="text-base-content/60 mt-5">BPSDA melaksanakan pengelolaan sumber daya air pada wilayah sungai kewenangannya, meliputi:</p>
            <ul class="mt-5 flex flex-col gap-3">
                @foreach ([
                    'Penyusunan rencana pengelolaan sumber daya air wilayah sungai.',
                    'Pelaksanaan konservasi, pendayagunaan, dan pengendalian daya rusak air.',
                    'Operasi dan pemeliharaan prasarana sumber daya air.',
                    'Pemantauan hidrologi serta sistem informasi sumber daya air.',
                    'Pemberian rekomendasi teknis perizinan penggunaan sumber daya air.',
                ] as $item)
                    <li class="flex items-start gap-3">
                        <span class="mt-0.5 grid size-6 shrink-0 place-items-center rounded-full bg-blue-900 text-white"><x-lucide-check class="size-3.5" /></span>
                        <span class="text-sm sm:text-base">{{ $item }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="card bg-base-200 border border-base-300 shadow-sm">
            <div class="card-body">
                <h3 class="card-title text-base text-blue-950">Dasar Hukum</h3>
                <p class="text-base-content/60 text-sm">Regulasi utama penyelenggaraan pengelolaan sumber daya air.</p>
                <ul class="mt-2 flex flex-col gap-2">
                    @foreach ([
                        ['UU No. 17 Tahun 2019', 'Sumber Daya Air'],
                        ['PP No. 121 Tahun 2015', 'Pengusahaan Sumber Daya Air'],
                        ['PP No. 122 Tahun 2015', 'Sistem Penyediaan Air Minum'],
                        ['Permen PUPR No. 04 Tahun 2015', 'Kriteria dan Penetapan Wilayah Sungai'],
                    ] as [$rule, $about])
                        <li class="bg-base-100 flex items-center justify-between gap-3 rounded-xl border border-base-300 px-4 py-3">
                            <span>
                                <span class="block text-sm font-bold">{{ $rule }}</span>
                                <span class="text-base-content/60 block text-xs">{{ $about }}</span>
                            </span>
                            <a href="#regulasi" class="btn btn-ghost btn-xs gap-1">Detail <x-lucide-arrow-right class="size-3.5" /></a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- Layanan --}}
<section id="layanan" class="border-y border-base-300 bg-blue-950/5">
    <div class="mx-auto max-w-7xl scroll-mt-24 px-4 py-14 lg:px-8 lg:py-16">
        <div class="mx-auto max-w-2xl text-center">
            <p class="text-sm font-bold tracking-widest text-blue-800 uppercase">Layanan Publik</p>
            <h2 class="mt-2 text-3xl font-extrabold tracking-tight text-blue-950">Satu Portal untuk Semua Kebutuhan</h2>
            <p class="text-base-content/60 mt-3">Layanan digital resmi bagi masyarakat, pelaku usaha, dan instansi pemerintah.</p>
        </div>
        <div class="mt-10 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ([
                ['SIPA Online', 'Pengajuan dan pemantauan Surat Izin Pengusahaan Air secara daring.', 'file-text'],
                ['Data Hidrologi', 'Unduh data curah hujan, debit, dan tinggi muka air.', 'activity'],
                ['Status Bendungan', 'Kondisi tampungan, siaga, dan jadwal pemeliharaan.', 'dam'],
                ['Peta DAS & Banjir', 'Peta daerah aliran sungai dan zona rawan banjir.', 'map'],
                ['Pengaduan', 'Laporkan pencemaran, kerusakan, atau pelanggaran.', 'megaphone'],
                ['PPID', 'Permohonan informasi publik sesuai UU KIP.', 'book-open'],
                ['Konsultasi Teknis', 'Rekomendasi teknis pemanfaatan sumber daya air.', 'messages-square'],
                ['Edukasi Publik', 'Materi konservasi air dan buletin hidrologi.', 'graduation-cap'],
            ] as [$title, $desc, $icon])
                <div class="card bg-base-100 border border-base-300 shadow-sm transition-shadow hover:shadow-md">
                    <div class="card-body">
                        <span class="grid size-11 place-items-center rounded-xl bg-blue-900/10 text-blue-900">
                            <x-dynamic-component :component="'lucide-'.$icon" class="size-6" />
                        </span>
                        <h3 class="card-title mt-3 text-base">{{ $title }}</h3>
                        <p class="text-base-content/60 text-sm">{{ $desc }}</p>
                        <a href="#kontak" class="link mt-2 inline-flex items-center gap-1 text-sm font-semibold text-blue-800">Ajukan <x-lucide-arrow-right class="size-4" /></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Statistik --}}
<section class="bg-blue-950 text-white">
    <div class="mx-auto max-w-7xl px-4 py-12 lg:px-8">
        <div class="stats stats-vertical w-full bg-transparent text-white sm:stats-horizontal">
            <div class="stat border-white/15">
                <div class="stat-title text-blue-200">Debit Rata-rata</div>
                <div class="stat-value text-2xl text-white">142 m³/s</div>
                <div class="stat-desc text-blue-300">↗︎ 6% dari minggu lalu</div>
            </div>
            <div class="stat border-white/15">
                <div class="stat-title text-blue-200">Pos Pantau Aktif</div>
                <div class="stat-value text-2xl text-white">48 Titik</div>
                <div class="stat-desc text-blue-300">Pemantauan 24 jam</div>
            </div>
            <div class="stat border-white/15">
                <div class="stat-title text-blue-200">Peringatan Dini</div>
                <div class="stat-value text-2xl text-white">2 Lokasi</div>
                <div class="stat-desc text-blue-300">Status siaga, dipantau intensif</div>
            </div>
            <div class="stat">
                <div class="stat-title text-blue-200">Izin Aktif</div>
                <div class="stat-value text-2xl text-white">2.847</div>
                <div class="stat-desc text-blue-300">Terbit melalui SIPA Online</div>
            </div>
        </div>
    </div>
</section>

{{-- Data --}}
<section id="data" class="mx-auto max-w-7xl scroll-mt-24 px-4 py-14 lg:px-8 lg:py-16">
    <div class="grid items-center gap-10 lg:grid-cols-2">
        <div>
            <p class="text-sm font-bold tracking-widest text-blue-800 uppercase">Keterbukaan Informasi</p>
            <h2 class="mt-2 text-3xl font-extrabold tracking-tight text-blue-950">Data Terkini Wilayah Sungai</h2>
            <p class="text-base-content/60 mt-3">Ringkasan capaian pemantauan bulan berjalan dari seluruh pos hidrologi.</p>
            <div class="mt-6 flex flex-col gap-4">
                @foreach ([['Curah hujan rata-rata', '78%', 'w-3/4'], ['Pos pantau aktif', '92%', 'w-11/12'], ['Tampungan bendungan', '64%', 'w-2/3']] as [$label, $percent, $width])
                    <div>
                        <div class="flex justify-between text-sm font-medium">
                            <span>{{ $label }}</span>
                            <span>{{ $percent }}</span>
                        </div>
                        <div class="bg-base-200 mt-1 h-2.5 overflow-hidden rounded-full">
                            <div class="h-full rounded-full bg-blue-800 {{ $width }}"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="card bg-base-100 border border-base-300 shadow-sm">
            <div class="card-body">
                <h3 class="card-title text-base text-blue-950">Alur Layanan Perizinan</h3>
                <ul class="steps steps-vertical mt-2 w-full lg:steps-horizontal">
                    @foreach ([['Pilih Layanan', 'SIPA / data / konsultasi'], ['Isi Formulir', 'Data dan dokumen'], ['Verifikasi', 'Pemeriksaan petugas'], ['Terbit', 'Hasil daring']] as [$step, $desc])
                        <li class="step step-primary">
                            <span class="mt-2 block text-sm font-semibold">{{ $step }}</span>
                            <span class="text-base-content/60 block text-xs">{{ $desc }}</span>
                        </li>
                    @endforeach
                </ul>
                <a href="{{ route('login') }}" class="btn mt-4 bg-blue-900 text-white hover:bg-blue-950">Mulai Pengajuan</a>
            </div>
        </div>
    </div>
</section>

{{-- Regulasi + Berita --}}
<section id="regulasi" class="border-y border-base-300 bg-blue-950/5">
    <div class="mx-auto max-w-7xl scroll-mt-24 px-4 py-14 lg:px-8 lg:py-16">
        <div class="grid gap-10 lg:grid-cols-5">
            <div class="lg:col-span-2">
                <p class="text-sm font-bold tracking-widest text-blue-800 uppercase">Produk Hukum</p>
                <h2 class="mt-2 text-3xl font-extrabold tracking-tight text-blue-950">Regulasi</h2>
                <p class="text-base-content/60 mt-3 text-sm">Unduh peraturan perundang-undangan bidang sumber daya air.</p>
                <ul class="mt-5 flex flex-col gap-2">
                    @foreach ([
                        ['UU No. 17 Tahun 2019', 'Sumber Daya Air', '2,1 MB'],
                        ['PP No. 121 Tahun 2015', 'Pengusahaan SDA', '1,4 MB'],
                        ['PP No. 122 Tahun 2015', 'Sistem Penyediaan Air Minum', '1,8 MB'],
                        ['Permen PUPR No. 04 Tahun 2015', 'Kriteria Wilayah Sungai', '0,9 MB'],
                    ] as [$rule, $about, $size])
                        <li class="bg-base-100 flex items-center justify-between gap-3 rounded-xl border border-base-300 px-4 py-3">
                            <span>
                                <span class="block text-sm font-bold">{{ $rule }}</span>
                                <span class="text-base-content/60 block text-xs">{{ $about }} • PDF {{ $size }}</span>
                            </span>
                            <button type="button" class="btn btn-ghost btn-xs gap-1"><x-lucide-download class="size-3.5" /> Unduh</button>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div id="berita" class="scroll-mt-24 lg:col-span-3">
                <p class="text-sm font-bold tracking-widest text-blue-800 uppercase">Kabar Terkini</p>
                <div class="flex flex-wrap items-end justify-between gap-4">
                    <h2 class="mt-2 text-3xl font-extrabold tracking-tight text-blue-950">Berita & Agenda</h2>
                    <a href="#berita" class="btn btn-ghost btn-sm gap-1">Indeks berita <x-lucide-arrow-right class="size-4" /></a>
                </div>
                <div class="mt-5 grid grid-cols-1 gap-4 md:grid-cols-3">
                    @foreach ([
                        ['Pemeliharaan', 'Pemeliharaan Rutin Bendungan Utama Dimulai Pekan Ini', 'Jadwal pemeliharaan berkala untuk memastikan keamanan tampungan selama musim hujan.', 'https://images.unsplash.com/photo-1466611653911-95081537e5b7?auto=format&fit=crop&w=600&q=70', 'Infrastruktur energi terbarukan'],
                        ['Layanan', 'Pengajuan SIPA Kini Sepenuhnya Daring', 'Pelaku usaha dapat mengajukan dan memantau izin penggunaan air tanpa datang ke kantor.', 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=600&q=70', 'Sosialisasi layanan publik'],
                        ['Edukasi', 'Gerakan Hemat Air di 20 Sekolah', 'Program edukasi konservasi air menyasar pelajar melalui lomba dan kunjungan pos pantau.', 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=600&q=70', 'Kegiatan edukasi di sekolah'],
                    ] as [$tag, $title, $excerpt, $photo, $alt])
                        <article class="card bg-base-100 border border-base-300 shadow-sm transition-shadow hover:shadow-md">
                            <figure class="h-40 overflow-hidden">
                                <img src="{{ $photo }}" alt="{{ $alt }}" loading="lazy" class="h-full w-full object-cover">
                            </figure>
                            <div class="card-body">
                                <span class="badge badge-sm bg-blue-900 text-white">{{ $tag }}</span>
                                <h3 class="card-title mt-1 text-base leading-snug">{{ $title }}</h3>
                                <p class="text-base-content/60 text-sm">{{ $excerpt }}</p>
                                <span class="text-base-content/40 mt-2 text-xs">12 Oktober 2026 • 3 mnt baca • Foto: Unsplash</span>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- FAQ --}}
<section id="faq" class="mx-auto max-w-4xl scroll-mt-24 px-4 py-14 lg:px-8 lg:py-16">
    <div class="text-center">
        <p class="text-sm font-bold tracking-widest text-blue-800 uppercase">Bantuan</p>
        <h2 class="mt-2 text-3xl font-extrabold tracking-tight text-blue-950">Pertanyaan Umum</h2>
    </div>
    <div class="mt-8 flex flex-col gap-2">
        @foreach ([
            ['Bagaimana cara mengajukan SIPA?', 'Buat akun melalui tombol Masuk / Daftar, pilih layanan SIPA Online, lengkapi formulir dan unggah dokumen persyaratan, lalu pantau status verifikasi di dashboard Anda.'],
            ['Apakah data hidrologi bisa diunduh gratis?', 'Ya. Data publik curah hujan, debit, dan tinggi muka air dapat diunduh gratis melalui halaman Data. Untuk kebutuhan riset skala besar, ajukan permohonan data melalui PPID.'],
            ['Ke mana menyampaikan pengaduan?', 'Melalui formulir pengaduan pada halaman Kontak atau datang langsung ke unit layanan pengaduan pada jam kerja. Setiap laporan mendapat nomor tiket untuk dipantau.'],
            ['Berapa lama proses verifikasi izin?', 'Verifikasi berkas maksimal 7 hari kerja sejak dokumen dinyatakan lengkap. Pemohon akan menerima pemberitahuan melalui email dan dashboard.'],
            ['Apakah tersedia layanan tatap muka?', 'Ya. Unit Pelayanan Terpadu buka Senin–Jumat pukul 08.00–16.00 WIB, kecuali hari libur nasional.'],
        ] as [$q, $a])
            <div class="collapse-arrow bg-base-100 collapse border border-base-300">
                <input type="radio" name="faq-accordion">
                <div class="collapse-title font-semibold">{{ $q }}</div>
                <div class="collapse-content text-base-content/70 text-sm">{{ $a }}</div>
            </div>
        @endforeach
    </div>
</section>

{{-- Kontak --}}
<section id="kontak" class="border-t border-base-300 bg-blue-950/5">
    <div class="mx-auto max-w-7xl scroll-mt-24 px-4 py-14 lg:px-8 lg:py-16">
        <div class="grid gap-6 lg:grid-cols-2">
            <div class="card bg-blue-950 text-white shadow-xl">
                <div class="card-body p-8">
                    <p class="text-xs font-bold tracking-widest text-blue-300 uppercase">Unit Pelayanan</p>
                    <h2 class="card-title mt-1 text-2xl">Hubungi Kami</h2>
                    <p class="text-blue-200">Pelayanan informasi, konsultasi, dan pengaduan masyarakat.</p>
                    <ul class="mt-4 flex flex-col gap-3 text-sm font-medium">
                        <li class="flex items-center gap-3">
                            <span class="grid size-9 shrink-0 place-items-center rounded-lg bg-white/15"><x-lucide-phone class="size-4" /></span> (021) 123-4567 — Senin–Jumat, 08.00–16.00 WIB
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="grid size-9 shrink-0 place-items-center rounded-lg bg-white/15"><x-lucide-mail class="size-4" /></span> info@example.com
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="grid size-9 shrink-0 place-items-center rounded-lg bg-white/15"><x-lucide-map-pin class="size-4" /></span> Jl. Contoh No. 123, Indonesia
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card bg-base-100 border border-base-300 shadow-sm">
                <div class="card-body">
                    <h3 class="card-title text-base text-blue-950">Formulir Pengaduan & Informasi</h3>
                    <form action="#kontak" method="get" class="mt-2 flex flex-col gap-3">
                        <div class="grid gap-3 sm:grid-cols-2">
                            <label class="form-control w-full">
                                <span class="label"><span class="label-text">Nama</span></span>
                                <input type="text" placeholder="Nama lengkap" class="input input-bordered w-full" required>
                            </label>
                            <label class="form-control w-full">
                                <span class="label"><span class="label-text">Email / No. HP</span></span>
                                <input type="text" placeholder="Kontak aktif" class="input input-bordered w-full" required>
                            </label>
                        </div>
                        <label class="form-control w-full">
                            <span class="label"><span class="label-text">Keperluan</span></span>
                            <select class="select select-bordered w-full">
                                <option>Pengaduan</option>
                                <option>Permohonan informasi (PPID)</option>
                                <option>Konsultasi layanan</option>
                                <option>Lainnya</option>
                            </select>
                        </label>
                        <label class="form-control w-full">
                            <span class="label"><span class="label-text">Uraian</span></span>
                            <textarea class="textarea textarea-bordered h-24" placeholder="Tulis uraian laporan atau pertanyaan…" required></textarea>
                        </label>
                        <button type="submit" class="btn mt-1 bg-blue-900 text-white hover:bg-blue-950">Kirim Laporan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
