@extends('layouts.admin')

@section('title', 'Dashboard')
@section('header', 'Dashboard')
@section('subheader', 'Ringkasan kinerja dan aktivitas terbaru.')

@section('content')
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
        @foreach ($stats as $stat)
            <div class="card bg-base-100 border border-base-300 shadow-sm">
                <div class="card-body gap-1 p-5">
                    <p class="text-base-content/60 text-sm">{{ $stat['label'] }}</p>
                    <p class="text-2xl font-extrabold tracking-tight">{{ $stat['value'] }}</p>
                    <p class="text-sm">
                        <span class="badge badge-sm {{ str_starts_with($stat['change'], '-') ? 'badge-error badge-soft' : 'badge-success badge-soft' }}">{{ $stat['change'] }}</span>
                        <span class="text-base-content/60 ml-1 text-xs">{{ $stat['description'] }}</span>
                    </p>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4 grid grid-cols-1 gap-4 xl:grid-cols-3">
        <div class="card bg-base-100 border border-base-300 shadow-sm xl:col-span-2">
            <div class="card-body">
                <div class="flex items-center justify-between gap-2">
                    <h2 class="card-title text-base">Grafik Pendapatan</h2>
                    <span class="badge badge-ghost badge-sm">7 hari terakhir</span>
                </div>
                <div class="mt-4 flex h-44 items-end gap-2 sm:gap-3">
                    @foreach ([40, 65, 50, 80, 58, 90, 72] as $height)
                        <div class="bg-primary/80 hover:bg-primary flex-1 rounded-t-lg transition-colors" style="height: {{ $height }}%"></div>
                    @endforeach
                </div>
                <div class="text-base-content/50 mt-2 flex justify-between text-xs">
                    <span>Sen</span><span>Sel</span><span>Rab</span><span>Kam</span><span>Jum</span><span>Sab</span><span>Min</span>
                </div>
            </div>
        </div>

        <div class="card bg-base-100 border border-base-300 shadow-sm">
            <div class="card-body">
                <h2 class="card-title text-base">Aktivitas Terbaru</h2>
                <ul class="mt-2 flex flex-col gap-4">
                    @foreach ([['Pesanan #INV-2041 dibayar', '2 menit lalu', 'success'], ['Pengguna baru mendaftar', '18 menit lalu', 'info'], ['Stok produk menipis', '1 jam lalu', 'warning'], ['Laporan bulanan siap', '3 jam lalu', 'neutral']] as [$text, $time, $color])
                        <li class="flex items-start gap-3">
                            <span class="badge badge-soft badge-{{ $color }} mt-0.5 size-2.5 rounded-full p-0"></span>
                            <span>
                                <span class="block text-sm font-medium">{{ $text }}</span>
                                <span class="text-base-content/60 text-xs">{{ $time }}</span>
                            </span>
                        </li>
                    @endforeach
                </ul>
                <a href="{{ route('admin.reports') }}" class="btn btn-ghost btn-sm mt-4 w-full">Lihat semua aktivitas</a>
            </div>
        </div>
    </div>

    <div class="card bg-base-100 mt-4 border border-base-300 shadow-sm">
        <div class="card-body p-0">
            <div class="flex flex-wrap items-center justify-between gap-2 p-5 pb-0">
                <h2 class="card-title text-base">Pesanan Terbaru</h2>
                <a href="{{ route('admin.reports') }}" class="btn btn-sm btn-ghost">Lihat semua</a>
            </div>
            <div class="overflow-x-auto p-2">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Invoice</th>
                            <th>Pelanggan</th>
                            <th>Status</th>
                            <th class="text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ([['INV-2041', 'Siti Rahma', 'Lunas', 'badge-success', 'Rp 1.250.000'], ['INV-2040', 'Budi Santoso', 'Menunggu', 'badge-warning', 'Rp 850.000'], ['INV-2039', 'Andi Pratama', 'Diproses', 'badge-info', 'Rp 2.100.000'], ['INV-2038', 'Dewi Lestari', 'Batal', 'badge-error', 'Rp 640.000']] as [$invoice, $customer, $status, $badge, $total])
                            <tr class="hover">
                                <td class="font-mono text-sm font-semibold">{{ $invoice }}</td>
                                <td>{{ $customer }}</td>
                                <td><span class="badge badge-soft badge-sm {{ $badge }}">{{ $status }}</span></td>
                                <td class="text-right font-semibold">{{ $total }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
