<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

uses(RefreshDatabase::class);

beforeEach(function () {
    Role::create(['name' => 'admin', 'guard_name' => 'web']);
    Role::create(['name' => 'operator', 'guard_name' => 'web']);
});

function adminUser(): User
{
    return User::factory()->create()->assignRole('admin');
}

test('tamu tidak bisa membuka halaman pengguna', function () {
    $this->get(route('admin.users.index'))->assertRedirect('/login');
    $this->get(route('admin.users.create'))->assertRedirect('/login');
});

test('operator tidak bisa membuka halaman pengguna', function () {
    $operator = User::factory()->create()->assignRole('operator');

    $this->actingAs($operator)->get(route('admin.users.index'))->assertForbidden();
    $this->actingAs($operator)->post(route('admin.users.store'), [])->assertForbidden();
});

test('admin melihat daftar pengguna beserta pencarian dan filter role', function () {
    User::factory()->create(['name' => 'Siti Rahma', 'email' => 'siti@example.com'])->assignRole('operator');
    User::factory()->create(['name' => 'Budi Santoso', 'email' => 'budi@example.com'])->assignRole('admin');

    $response = $this->actingAs(adminUser())->get(route('admin.users.index'));

    $response->assertOk();
    $response->assertSee('Siti Rahma');
    $response->assertSee('Budi Santoso');

    $this->actingAs(adminUser())->get(route('admin.users.index', ['search' => 'siti']))
        ->assertOk()
        ->assertSee('Siti Rahma')
        ->assertDontSee('Budi Santoso');

    $this->actingAs(adminUser())->get(route('admin.users.index', ['role' => 'admin']))
        ->assertOk()
        ->assertSee('Budi Santoso')
        ->assertDontSee('Siti Rahma');
});

test('admin menyimpan pengguna baru beserta role', function () {
    $response = $this->actingAs(adminUser())->post(route('admin.users.store'), [
        'name' => 'Andi Pratama',
        'email' => 'andi@example.com',
        'password' => 'rahasia123',
        'password_confirmation' => 'rahasia123',
        'role' => 'operator',
    ]);

    $response->assertRedirect(route('admin.users.index'));

    $user = User::where('email', 'andi@example.com')->firstOrFail();
    expect($user->hasRole('operator'))->toBeTrue();
    $this->assertTrue(Hash::check('rahasia123', $user->password));
});

test('validasi store menolak email duplikat dan role tidak dikenal', function () {
    User::factory()->create(['email' => 'ganda@example.com']);

    $response = $this->actingAs(adminUser())->from(route('admin.users.create'))->post(route('admin.users.store'), [
        'name' => 'Ganda',
        'email' => 'ganda@example.com',
        'password' => 'rahasia123',
        'password_confirmation' => 'rahasia123',
        'role' => 'superadmin',
    ]);

    $response->assertRedirect(route('admin.users.create'));
    $response->assertSessionHasErrors(['email', 'role']);
    expect(User::where('email', 'ganda@example.com')->count())->toBe(1);
});

test('admin memperbarui pengguna tanpa mengubah kata sandi', function () {
    $target = User::factory()->create(['email' => 'target@example.com'])->assignRole('operator');
    $originalHash = $target->password;

    $response = $this->actingAs(adminUser())->put(route('admin.users.update', $target), [
        'name' => 'Nama Baru',
        'email' => 'target@example.com',
        'password' => null,
        'password_confirmation' => null,
        'role' => 'admin',
    ]);

    $response->assertRedirect(route('admin.users.index'));

    $target->refresh();
    expect($target->name)->toBe('Nama Baru')
        ->and($target->password)->toBe($originalHash)
        ->and($target->hasRole('admin'))->toBeTrue();
});

test('admin memperbarui kata sandi pengguna', function () {
    $target = User::factory()->create()->assignRole('operator');

    $this->actingAs(adminUser())->put(route('admin.users.update', $target), [
        'name' => $target->name,
        'email' => $target->email,
        'password' => 'baru12345',
        'password_confirmation' => 'baru12345',
        'role' => 'operator',
    ])->assertRedirect(route('admin.users.index'));

    $this->assertTrue(Hash::check('baru12345', $target->fresh()->password));
});

test('admin menghapus pengguna lain', function () {
    $target = User::factory()->create()->assignRole('operator');

    $response = $this->actingAs(adminUser())->delete(route('admin.users.destroy', $target));

    $response->assertRedirect(route('admin.users.index'));
    expect(User::whereKey($target->id)->exists())->toBeFalse();
});

test('admin tidak bisa menghapus akun sendiri', function () {
    $admin = adminUser();

    $response = $this->actingAs($admin)->delete(route('admin.users.destroy', $admin));

    $response->assertForbidden();
    expect(User::whereKey($admin->id)->exists())->toBeTrue();
});
