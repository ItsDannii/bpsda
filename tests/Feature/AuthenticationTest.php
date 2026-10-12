<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;

uses(RefreshDatabase::class);

beforeEach(function () {
    Role::create(['name' => 'admin', 'guard_name' => 'web']);
    Role::create(['name' => 'operator', 'guard_name' => 'web']);
});

test('halaman login tampil untuk tamu', function () {
    $response = $this->get('/login');

    $response->assertOk();
    $response->assertSee('Selamat datang kembali');
});

test('admin login dan diarahkan ke dashboard', function () {
    $user = User::factory()->create(['email' => 'admin@mail.com'])->assignRole('admin');

    $response = $this->post('/login', [
        'email' => 'admin@mail.com',
        'password' => 'password',
    ]);

    $this->assertAuthenticatedAs($user);
    $response->assertRedirect(route('dashboard'));
});

test('operator login dan diarahkan ke dashboard', function () {
    $user = User::factory()->create(['email' => 'operator@mail.com'])->assignRole('operator');

    $response = $this->post('/login', [
        'email' => 'operator@mail.com',
        'password' => 'password',
    ]);

    $this->assertAuthenticatedAs($user);
    $response->assertRedirect(route('dashboard'));
});

test('login gagal dengan kredensial salah', function () {
    User::factory()->create(['email' => 'admin@mail.com'])->assignRole('admin');

    $response = $this->from('/login')->post('/login', [
        'email' => 'admin@mail.com',
        'password' => 'salah-sandi',
    ]);

    $this->assertGuest();
    $response->assertRedirect('/login');
    $response->assertSessionHasErrors('email');
});

test('tamu tidak bisa membuka dashboard admin', function () {
    $response = $this->get('/admin');

    $response->assertRedirect('/login');
});

test('tamu tidak bisa membuka dashboard operator', function () {
    $response = $this->get('/operator');

    $response->assertRedirect('/login');
});

test('operator tidak bisa membuka dashboard admin', function () {
    $user = User::factory()->create(['email' => 'operator@mail.com'])->assignRole('operator');

    $response = $this->actingAs($user)->get('/admin');

    $response->assertForbidden();
});

test('admin tidak bisa membuka dashboard operator', function () {
    $user = User::factory()->create(['email' => 'admin@mail.com'])->assignRole('admin');

    $response = $this->actingAs($user)->get('/operator');

    $response->assertForbidden();
});

test('pengguna yang sudah login bisa keluar', function () {
    $user = User::factory()->create(['email' => 'admin@mail.com'])->assignRole('admin');

    $response = $this->actingAs($user)->post('/logout');

    $this->assertGuest();
    $response->assertRedirect('/');
});

test('tamu tidak bisa membuka halaman dashboard', function () {
    $response = $this->get('/dashboard');

    $response->assertRedirect('/login');
});

test('admin membuka halaman dashboard dengan sidebar dan konten admin', function () {
    $user = User::factory()->create(['email' => 'admin@mail.com'])->assignRole('admin');

    $response = $this->actingAs($user)->get('/dashboard');

    $response->assertOk();
    $response->assertSee('Menu Utama');
    $response->assertSee('Administrator');
    $response->assertSee('Panel Admin');
    $response->assertSee('Kelola Pengguna');
});

test('operator membuka halaman dashboard dengan sidebar dan konten operator', function () {
    $user = User::factory()->create(['email' => 'operator@mail.com'])->assignRole('operator');

    $response = $this->actingAs($user)->get('/dashboard');

    $response->assertOk();
    $response->assertSee('Menu Utama');
    $response->assertSee('Operator');
    $response->assertSee('Panel Operator');
    $response->assertSee('Input Monitoring');
});
