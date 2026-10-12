<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the post-login dashboard with sidebar navigation.
     */
    public function index(Request $request): View
    {
        $user = $request->user();

        $isAdmin = $user !== null && $user->hasRole('admin');

        return view('dashboard', [
            'roleLabel' => $isAdmin ? 'Administrator' : 'Operator',
            'panelRoute' => $isAdmin ? route('admin.dashboard') : route('operator.dashboard'),
            'panelLabel' => $isAdmin ? 'Panel Admin' : 'Panel Operator',
            'stats' => $isAdmin ? $this->adminStats() : $this->operatorStats(),
            'quickLinks' => $isAdmin ? $this->adminLinks() : $this->operatorLinks(),
        ]);
    }

    /**
     * @return list<array{label: string, value: string, change: string, description: string}>
     */
    protected function adminStats(): array
    {
        return [
            ['label' => 'Total Pengguna', 'value' => '2.847', 'change' => '+12,5%', 'description' => 'dibanding bulan lalu'],
            ['label' => 'Pendapatan', 'value' => 'Rp 48,2 Jt', 'change' => '+8,2%', 'description' => 'dibanding bulan lalu'],
            ['label' => 'Pesanan Baru', 'value' => '1.234', 'change' => '+23,1%', 'description' => '7 hari terakhir'],
            ['label' => 'Tiket Aktif', 'value' => '56', 'change' => '-4,3%', 'description' => 'perlu tindak lanjut'],
        ];
    }

    /**
     * @return list<array{label: string, value: string, change: string, description: string}>
     */
    protected function operatorStats(): array
    {
        return [
            ['label' => 'Pos Pantau Aktif', 'value' => '48', 'change' => '+2 pos', 'description' => 'bulan ini'],
            ['label' => 'Data Masuk Hari Ini', 'value' => '132', 'change' => '+18%', 'description' => 'vs kemarin'],
            ['label' => 'Pengaduan Terbuka', 'value' => '14', 'change' => '-6', 'description' => 'perlu verifikasi'],
            ['label' => 'Jadwal Pemeliharaan', 'value' => '3', 'change' => 'minggu ini', 'description' => 'terjadwal'],
        ];
    }

    /**
     * @return list<array{label: string, description: string, url: string, primary: bool}>
     */
    protected function adminLinks(): array
    {
        return [
            ['label' => 'Buka Panel Admin', 'description' => 'Ringkasan, pengguna, dan laporan.', 'url' => route('admin.dashboard'), 'primary' => true],
            ['label' => 'Kelola Pengguna', 'description' => 'Peran dan hak akses.', 'url' => route('admin.users.index'), 'primary' => false],
            ['label' => 'Lihat Laporan', 'description' => 'Penjualan dan aktivitas.', 'url' => route('admin.reports'), 'primary' => false],
        ];
    }

    /**
     * @return list<array{label: string, description: string, url: string, primary: bool}>
     */
    protected function operatorLinks(): array
    {
        return [
            ['label' => 'Buka Panel Operator', 'description' => 'Tugas dan monitoring harian.', 'url' => route('operator.dashboard'), 'primary' => true],
            ['label' => 'Input Monitoring', 'description' => 'Catat data hidrologi.', 'url' => route('operator.monitoring'), 'primary' => false],
            ['label' => 'Laporan Harian', 'description' => 'Susun laporan operasional.', 'url' => route('operator.reports'), 'primary' => false],
        ];
    }
}
