<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'stats' => [
                ['label' => 'Total Pengguna', 'value' => '2.847', 'change' => '+12,5%', 'description' => 'dibanding bulan lalu'],
                ['label' => 'Pendapatan', 'value' => 'Rp 48,2 Jt', 'change' => '+8,2%', 'description' => 'dibanding bulan lalu'],
                ['label' => 'Pesanan Baru', 'value' => '1.234', 'change' => '+23,1%', 'description' => '7 hari terakhir'],
                ['label' => 'Tiket Aktif', 'value' => '56', 'change' => '-4,3%', 'description' => 'perlu tindak lanjut'],
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
