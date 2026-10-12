@extends('layouts.admin')

@section('title', $title)
@section('header', $title)
@section('subheader', $description)

@section('content')
    <div class="card bg-base-100 mx-auto max-w-2xl border border-base-300 shadow-sm">
        <div class="card-body items-center py-12 text-center">
            <div class="bg-base-200 grid size-14 place-items-center rounded-2xl text-2xl">📄</div>
            <h2 class="card-title mt-2">Halaman {{ $title }}</h2>
            <p class="text-base-content/60 max-w-md text-sm">{{ $description }}</p>
            <div class="card-actions mt-4">
                <a href="{{ auth()->user()?->hasRole('operator') ? route('operator.dashboard') : route('admin.dashboard') }}" class="btn btn-primary btn-sm">Kembali ke Dashboard</a>
            </div>
        </div>
    </div>
@endsection
