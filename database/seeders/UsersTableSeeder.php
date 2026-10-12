<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'password' => 'admin123',
                'role' => 'admin',
            ],
            [
                'name' => 'operator',
                'email' => 'operator@mail.com',
                'password' => 'operator123',
                'role' => 'operator',
            ],
        ];

        foreach ($data as $value) {
            $user = User::firstOrCreate(
                ['email' => $value['email']],
                [
                    'name' => $value['name'],
                    'password' => $value['password'],
                ]
            );

            $user->syncRoles([$value['role']]);
        }
    }
}
