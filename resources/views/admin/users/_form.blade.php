{{-- Shared user form. Expects: ?User $user, bool $isEdit --}}
@php
    $role = old('role', $user?->getRoleNames()->first() ?? '');
@endphp

<label class="form-control w-full">
    <span class="label"><span class="label-text font-medium">Nama</span></span>
    <input
        type="text"
        name="name"
        value="{{ old('name', $user?->name) }}"
        placeholder="Nama lengkap"
        required
        class="input input-bordered w-full @error('name') input-error @enderror"
    >
    @error('name')
        <span class="label"><span class="label-text-alt text-error">{{ $message }}</span></span>
    @enderror
</label>

<label class="form-control w-full">
    <span class="label"><span class="label-text font-medium">Email</span></span>
    <input
        type="email"
        name="email"
        value="{{ old('email', $user?->email) }}"
        placeholder="nama@email.com"
        required
        class="input input-bordered w-full @error('email') input-error @enderror"
    >
    @error('email')
        <span class="label"><span class="label-text-alt text-error">{{ $message }}</span></span>
    @enderror
</label>

<div class="grid gap-4 sm:grid-cols-2">
    <label class="form-control w-full">
        <span class="label"><span class="label-text font-medium">Kata Sandi</span></span>
        <input
            type="password"
            name="password"
            placeholder="••••••••"
            @if (! $isEdit) required @endif
            autocomplete="new-password"
            class="input input-bordered w-full @error('password') input-error @enderror"
        >
        @error('password')
            <span class="label"><span class="label-text-alt text-error">{{ $message }}</span></span>
        @enderror
        @if ($isEdit)
            <span class="label"><span class="label-text-alt">Kosongkan jika tidak diubah.</span></span>
        @endif
    </label>

    <label class="form-control w-full">
        <span class="label"><span class="label-text font-medium">Konfirmasi Kata Sandi</span></span>
        <input
            type="password"
            name="password_confirmation"
            placeholder="••••••••"
            @if (! $isEdit) required @endif
            autocomplete="new-password"
            class="input input-bordered w-full"
        >
    </label>
</div>

<label class="form-control w-full">
    <span class="label"><span class="label-text font-medium">Role</span></span>
    <select name="role" required class="select select-bordered w-full @error('role') select-error @enderror">
        <option value="" disabled {{ $role === '' ? 'selected' : '' }}>Pilih role…</option>
        <option value="admin" {{ $role === 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="operator" {{ $role === 'operator' ? 'selected' : '' }}>Operator</option>
    </select>
    @error('role')
        <span class="label"><span class="label-text-alt text-error">{{ $message }}</span></span>
    @enderror
</label>
