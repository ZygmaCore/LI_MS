<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Super Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'nama' => 'Guru Demo',
            'email' => 'guru@example.com',
            'password' => Hash::make('password'),
            'role' => 'guru',
        ]);

        User::create([
            'nama' => 'Siswa Demo',
            'email' => 'siswa@example.com',
            'password' => Hash::make('password'),
            'role' => 'siswa',
        ]);
    }
}
