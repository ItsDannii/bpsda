<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'stats' => [
                ['label' => 'Total Pengguna', 'value' => number_format(User::count()), 'change' => '+12,5%', 'description' => 'terdaftar di sistem', 'trend' => 'up'],
                ['label' => 'Data Hidrologi Masuk', 'value' => '1.234', 'change' => '+23,1%', 'description' => '7 hari terakhir', 'trend' => 'up'],
                ['label' => 'Perizinan Aktif', 'value' => '2.847', 'change' => '+8,2%', 'description' => 'SIPA & izin air', 'trend' => 'up'],
                ['label' => 'Pengaduan Terbuka', 'value' => '56', 'change' => '-4,3%', 'description' => 'perlu tindak lanjut', 'trend' => 'down'],
            ],
        ]);
    }

    public function reports(): View
    {
        return view('admin.placeholder', [
            'title' => 'Laporan',
            'description' => 'Lihat ringkasan laporan penjualan dan aktivitas di halaman ini.',
        ]);
    }

    public function settings(): View
    {
        return view('admin.placeholder', [
            'title' => 'Pengaturan',
            'description' => 'Atur preferensi aplikasi dan konfigurasi admin di halaman ini.',
        ]);
    }
}
