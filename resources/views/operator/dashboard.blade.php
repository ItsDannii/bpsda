@extends('layouts.admin')

@section('title', 'Dashboard Operator')
@section('header', 'Dashboard Operator')
@section('subheader', 'Pantau tugas operasional dan data hidrologi hari ini.')

@section('content')
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
        @foreach ($tasks as $task)
            <div class="card bg-base-100 border border-base-300 shadow-sm">
                <div class="card-body gap-1 p-5">
                    <p class="text-base-content/60 text-sm">{{ $task['label'] }}</p>
                    <p class="text-2xl font-extrabold tracking-tight">{{ $task['value'] }}</p>
                    <p class="text-sm">
                        <span class="badge badge-info badge-soft badge-sm">{{ $task['change'] }}</span>
                        <span class="text-base-content/60 ml-1 text-xs">{{ $task['description'] }}</span>
                    </p>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4 grid grid-cols-1 gap-4 xl:grid-cols-3">
        <div class="card bg-base-100 border border-base-300 shadow-sm xl:col-span-2">
            <div class="card-body">
                <div class="flex items-center justify-between gap-2">
                    <h2 class="card-title text-base">Jadwal Tugas Hari Ini</h2>
                    <a href="{{ route('operator.monitoring') }}" class="btn btn-ghost btn-sm gap-1">Monitoring <x-lucide-arrow-right class="size-4" /></a>
                </div>
                <ul class="mt-2 flex flex-col gap-2">
                    @foreach ([['Pencatatan TMA Pos A — 07.00', 'Selesai', 'badge-success'], ['Pencatatan curah hujan Pos B — 12.00', 'Menunggu', 'badge-warning'], ['Verifikasi 6 pengaduan masuk', 'Berjalan', 'badge-info'], ['Kompilasi laporan harian — 16.00', 'Terjadwal', 'badge-ghost']] as [$task, $status, $badge])
                        <li class="bg-base-200/60 flex items-center justify-between gap-3 rounded-xl px-4 py-3">
                            <span class="text-sm font-medium">{{ $task }}</span>
                            <span class="badge badge-sm {{ $badge }}">{{ $status }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="card bg-base-100 border border-base-300 shadow-sm">
            <div class="card-body">
                <h2 class="card-title text-base">Aksi Cepat</h2>
                <p class="text-base-content/60 text-sm">Pintasan ke tugas yang paling sering dilakukan.</p>
                <div class="mt-2 flex flex-col gap-2">
                    <a href="{{ route('operator.monitoring') }}" class="btn btn-primary btn-sm w-full">Input Data Monitoring</a>
                    <a href="{{ route('operator.reports') }}" class="btn btn-outline btn-sm w-full">Buat Laporan Harian</a>
                    <a href="{{ route('home') }}" class="btn btn-ghost btn-sm w-full">Lihat Situs Publik</a>
                </div>
            </div>
        </div>
    </div>
@endsection
