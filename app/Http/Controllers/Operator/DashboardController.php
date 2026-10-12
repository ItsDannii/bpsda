<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('operator.dashboard', [
            'tasks' => [
                ['label' => 'Pos Pantau Aktif', 'value' => '48', 'change' => '+2 pos', 'description' => 'bulan ini'],
                ['label' => 'Data Masuk Hari Ini', 'value' => '132', 'change' => '+18%', 'description' => 'vs kemarin'],
                ['label' => 'Pengaduan Terbuka', 'value' => '14', 'change' => '-6', 'description' => 'perlu verifikasi'],
                ['label' => 'Jadwal Pemeliharaan', 'value' => '3', 'change' => 'minggu ini', 'description' => 'terjadwal'],
            ],
        ]);
    }

    public function monitoring(): View
    {
        return view('admin.placeholder', [
            'title' => 'Monitoring',
            'description' => 'Catat dan pantau data hidrologi harian dari seluruh pos pantau di halaman ini.',
        ]);
    }

    public function reports(): View
    {
        return view('admin.placeholder', [
            'title' => 'Laporan Operator',
            'description' => 'Susun dan kirim laporan kegiatan operasional harian di halaman ini.',
        ]);
    }
}
