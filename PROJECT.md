# BPSDA — Project Info

Portal instansi Balai Pengelolaan Sumber Daya Air (gaya portal pemerintah):
landing publik + login + dashboard berbasis role (admin / operator) + CRUD pengguna.

## Tech Stack

| Komponen | Versi / Keterangan |
|---|---|
| PHP | 8.4 via Laravel Herd (`~/.config/herd/bin/php84/php.exe`) |
| Laravel | 12.69.3 |
| Auth | Manual (`Auth::attempt`, session regenerate) — `AuthenticatedSessionController` + `Auth/LoginRequest` |
| Roles | `spatie/laravel-permission` ^8.3, roles `admin` & `operator` (guard `web`) |
| Frontend | Tailwind CSS v4 (+ `@tailwindcss/vite`), DaisyUI v5.7.47, Lucide via `mallardduck/blade-lucide-icons` ^2.0 (server-side `<x-lucide-{nama}>`, prefix `lucide`; dinamis `<x-dynamic-component :component="'lucide-'.$icon">`) — tanpa paket JS `lucide`, `resources/js/app.js` hanya `import './bootstrap'` |
| Foto placeholder | Unsplash CDN (`images.unsplash.com`, sudah verifikasi HTTP 200) |
| Database lokal | MySQL (`bpsda`), session driver `database` |
| Testing | Pest 3 (sqlite `:memory:`), 23 tests |

> `php` bawaan PATH adalah XAMPP 8.2 dan **tidak kompatibel** (composer butuh `>= 8.3`).
> Selalu jalankan PHP via Herd: `& "C:/Users/Administrator/.config/herd/bin/php84/php.exe" artisan …`

## Struktur Penting

```
app/Http/Controllers/
  Auth/AuthenticatedSessionController.php  login/logout, redirect ke /dashboard
  DashboardController.php                  /dashboard (statistik + akses cepat per role)
  Admin/DashboardController.php            /admin (ringkasan, laporan, pengaturan)
  Admin/UserController.php                 CRUD pengguna (resource, kecuali show)
  Operator/DashboardController.php         /operator (tugas, monitoring, laporan)
app/Http/Requests/Auth/LoginRequest.php    validasi + throttle login 5x/menit
bootstrap/app.php                          alias middleware role/permission, redirectUsersTo('/dashboard')
routes/web.php                             home, login/logout, dashboard, admin/*, operator/*
resources/views/
  layouts/landing.blade.php                top-bar resmi + header instansi + footer navy
  layouts/admin.blade.php                  drawer sidebar DaisyUI (role-aware via @hasrole)
  landing.blade.php                        hero, profil, layanan, regulasi, FAQ, kontak
  auth/login.blade.php                     split-screen login + info akun demo
  admin/users/{index,create,edit,_form}.blade.php
database/seeders/                          RolesTableSeeder + UsersTableSeeder (tanpa try/catch diam)
tests/Feature/                             AuthenticationTest, ManageUsersTest, ExampleTest
```

## Routes

| Method | URI | Nama | Guard |
|---|---|---|---|
| GET | `/` | `home` | publik |
| GET/POST | `/login` | `login` | `guest` |
| POST | `/logout` | `logout` | `auth` |
| GET | `/dashboard` | `dashboard` | `auth` |
| GET | `/admin`, `/admin/users/*`, `/admin/reports`, `/admin/settings` | `admin.*` | `auth` + `role:admin` |
| GET | `/operator`, `/operator/monitoring`, `/operator/reports` | `operator.*` | `auth` + `role:operator` |

## MCP & Skills (Boost terbaru, 12 Okt 2026)

| Sumber | Isi |
|---|---|
| MCP aktif (`opencode.json`) | Hanya `laravel-boost` (local, `php artisan boost:mcp`) — `daisyui-blueprint` sudah dihapus `boost:update` (butuh license key) |
| Skills (`.agents/skills/`, 6) | `daisyui` (BARU via `skills-lock.json` dari `saadeghi/daisyui` v5.7.x — wajib dibaca tiap tulis HTML/JSX) + `infer-conventions`, `laravel-best-practices`, `laravel-permission-development`, `tailwindcss-development`, `testing-best-practices` |
| Boost (`boost.json`) | `guidelines: true`, `mcp: true`, packages `[spatie/laravel-permission]`, skills 5 (tanpa `daisyui` — dikelola via `skills-lock.json`) |

Aturan main (dari `AGENTS.md`): aktifkan skill yang relevan tiap domain sebelum coding;
`search-docs` sebelum perubahan API ekosistem Laravel; PHP ikut aturan Pint
(`vendor/bin/pint --dirty` tiap ubah PHP) + Pest (`make:test --pest`); jaga struktur
direktori yang ada, cek komponen Blade yang sudah ada sebelum bikin baru.

## Akun Demo (seeder)

| Role | Email | Password |
|---|---|---|
| Admin | `admin@mail.com` | `admin123` |
| Operator | `operator@mail.com` | `operator123` |

## Menjalankan

```powershell
# PHP Herd (wajib)
& "C:/Users/Administrator/.config/herd/bin/php84/php.exe" artisan migrate
& "C:/Users/Administrator/.config/herd/bin/php84/php.exe" artisan db:seed
npm install; npm run dev     # atau: npm run build
```

Situs: `https://bpsda.test/` (Herd) · Login: `https://bpsda.test/login`

Cek cepat: `artisan test --compact` · `artisan route:list` · `artisan view:cache`

## Catatan Teknis

- Password memakai cast `'hashed'` di `User` — seeder/factory boleh memberi plain text
  (`Hash::make` ganda aman karena cast melewati nilai yang sudah hash, tapi plain lebih bersih).
- Seeder lama memakai key `'guard'` (kolom benar: `guard_name`) + `try/catch` yang
  menelan error sehingga role kosong — sudah diperbaiki, jangan kembalikan polanya.
- CRUD pengguna: cegah hapus akun sendiri (403 server + tombol disembunyikan),
  filter role di-index di-allow-list (`admin`/`operator`), password update opsional.
- Foto Unsplash hanya placeholder — ganti dengan aset resmi sebelum produksi.
