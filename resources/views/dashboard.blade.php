@extends('layouts.admin')

@section('title', 'Dashboard')
@section('header', 'Dashboard')
@section('subheader')Halo, {{ auth()->user()->name }} — ringkasan Anda hari ini.@endsection

@section('content')
    <div class="card bg-base-100 border border-base-300 shadow-sm">
        <div class="card-body flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-base-content/60 text-sm">Masuk sebagai</p>
                <h2 class="text-xl font-extrabold tracking-tight">
                    {{ auth()->user()->name }}
                    <span class="badge badge-primary badge-soft ml-2">{{ $roleLabel }}</span>
                </h2>
                <p class="text-base-content/60 mt-1 text-sm">{{ auth()->user()->email }}</p>
            </div>
            <a href="{{ $panelRoute }}" class="btn btn-primary">{{ $panelLabel }} →</a>
        </div>
    </div>

    <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
        @foreach ($stats as $stat)
            <div class="card bg-base-100 border border-base-300 shadow-sm">
                <div class="card-body gap-1 p-5">
                    <p class="text-base-content/60 text-sm">{{ $stat['label'] }}</p>
                    <p class="text-2xl font-extrabold tracking-tight">{{ $stat['value'] }}</p>
                    <p class="text-sm">
                        <span class="badge badge-info badge-soft badge-sm">{{ $stat['change'] }}</span>
                        <span class="text-base-content/60 ml-1 text-xs">{{ $stat['description'] }}</span>
                    </p>
                </div>
            </div>
        @endforeach
    </div>

    <div class="card bg-base-100 mt-4 border border-base-300 shadow-sm">
        <div class="card-body">
            <h2 class="card-title text-base">Akses Cepat</h2>
            <p class="text-base-content/60 text-sm">Pintasan ke halaman yang paling sering Anda gunakan.</p>
            <div class="mt-2 grid grid-cols-1 gap-3 sm:grid-cols-3">
                @foreach ($quickLinks as $link)
                    <a href="{{ $link['url'] }}" class="btn {{ $link['primary'] ? 'btn-primary' : 'btn-outline' }} h-auto flex-col items-start gap-1 p-4 normal-case">
                        <span class="font-bold">{{ $link['label'] }}</span>
                        <span class="text-xs font-normal opacity-70">{{ $link['description'] }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
