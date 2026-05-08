<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@roudhotulilmi.sch.id'],
            [
                'name'     => 'Administrator',
                'email'    => 'admin@roudhotulilmi.sch.id',
                'password' => Hash::make('admin123'),
                'role'     => 'admin',
            ]
        );

        // Akun demo tambahan
        User::updateOrCreate(
            ['email' => 'kepala@roudhotulilmi.sch.id'],
            [
                'name'     => 'Ustadzah Nur Fadhilah',
                'email'    => 'kepala@roudhotulilmi.sch.id',
                'password' => Hash::make('kepala123'),
                'role'     => 'admin',
            ]
        );

        $this->command->info('✅ User admin berhasil dibuat.');
        $this->command->info('   Email: admin@roudhotulilmi.sch.id | Password: admin123');
    }
}
