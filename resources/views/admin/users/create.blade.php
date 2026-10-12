@extends('layouts.admin')

@section('title', 'Tambah Pengguna')
@section('header', 'Tambah Pengguna')
@section('subheader', 'Buat akun baru beserta role-nya.')

@section('content')
    <div class="card bg-base-100 mx-auto max-w-2xl border border-base-300 shadow-sm">
        <form method="POST" action="{{ route('admin.users.store') }}" class="card-body gap-4">
            @csrf

            @include('admin.users._form', ['user' => null, 'isEdit' => false])

            <div class="card-actions mt-2 justify-end">
                <a href="{{ route('admin.users.index') }}" class="btn btn-ghost">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
