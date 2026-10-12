@extends('layouts.admin')

@section('title', 'Ubah Pengguna')
@section('header', 'Ubah Pengguna')
@section('subheader')Perbarui data {{ $user->name }}.@endsection

@section('content')
    <div class="card bg-base-100 mx-auto max-w-2xl border border-base-300 shadow-sm">
        <form method="POST" action="{{ route('admin.users.update', $user) }}" class="card-body gap-4">
            @csrf
            @method('PUT')

            @include('admin.users._form', ['user' => $user, 'isEdit' => true])

            <div class="card-actions mt-2 justify-end">
                <a href="{{ route('admin.users.index') }}" class="btn btn-ghost">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection
