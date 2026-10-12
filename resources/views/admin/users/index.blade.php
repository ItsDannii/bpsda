@extends('layouts.admin')

@section('title', 'Pengguna')
@section('header', 'Pengguna')
@section('subheader', 'Kelola akun, role, dan hak akses pengguna.')

@section('content')
    @if (session('status'))
        <div role="alert" class="alert alert-success mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="size-5 shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
            <span class="text-sm">{{ session('status') }}</span>
        </div>
    @endif

    <div class="card bg-base-100 border border-base-300 shadow-sm">
        <div class="card-body p-0">
            <div class="flex flex-wrap items-center justify-between gap-3 p-5 pb-0">
                <h2 class="card-title text-base">Daftar Pengguna</h2>
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">+ Tambah Pengguna</a>
            </div>

            <form method="GET" action="{{ route('admin.users.index') }}" class="flex flex-wrap gap-2 p-5 pb-0">
                <label class="input input-bordered input-sm flex flex-1 items-center gap-2 sm:max-w-xs">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="size-4 opacity-60"><circle cx="11" cy="11" r="7" /><path stroke-linecap="round" d="m20 20-3.5-3.5" /></svg>
                    <input type="search" name="search" value="{{ $search }}" placeholder="Cari nama atau email…" class="grow">
                </label>
                <select name="role" onchange="this.form.submit()" class="select select-bordered select-sm w-full sm:w-auto">
                    <option value="">Semua role</option>
                    <option value="admin" {{ $roleFilter === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="operator" {{ $roleFilter === 'operator' ? 'selected' : '' }}>Operator</option>
                </select>
                <button type="submit" class="btn btn-sm btn-ghost">Cari</button>
                @if ($search !== '' || $roleFilter !== '')
                    <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-ghost">Reset</a>
                @endif
            </form>

            <div class="overflow-x-auto p-2">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Dibuat</th>
                            <th class="text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr class="hover">
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div class="avatar placeholder">
                                            <div class="bg-neutral text-neutral-content w-9 rounded-full">
                                                <span class="text-xs">{{ strtoupper(substr($user->name, 0, 2)) }}</span>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="font-semibold">{{ $user->name }}</p>
                                            <p class="text-base-content/60 text-xs">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        <span class="badge badge-sm {{ $role->name === 'admin' ? 'badge-primary badge-soft' : 'badge-info badge-soft' }}">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td class="text-sm whitespace-nowrap">{{ $user->created_at->format('d M Y') }}</td>
                                <td>
                                    <div class="flex justify-end gap-1">
                                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-ghost btn-xs">Ubah</a>
                                        @if (! $user->is(auth()->user()))
                                            <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Hapus pengguna {{ $user->name }}?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-ghost btn-xs text-error">Hapus</button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-base-content/60 py-10 text-center text-sm">Tidak ada pengguna yang cocok.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($users->hasPages())
                <div class="flex justify-center p-4 pt-0">
                    {{ $users->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
