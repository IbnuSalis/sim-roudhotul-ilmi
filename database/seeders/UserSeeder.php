<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminEmail = env('SEED_ADMIN_EMAIL', 'admin@roudhotulilmi.sch.id');
        $adminPassword = env('SEED_ADMIN_PASSWORD');
        $kepalaEmail = env('SEED_KEPALA_EMAIL', 'kepala@roudhotulilmi.sch.id');
        $kepalaPassword = env('SEED_KEPALA_PASSWORD');

        if (! $adminPassword || ! $kepalaPassword) {
            throw new \RuntimeException('Set SEED_ADMIN_PASSWORD dan SEED_KEPALA_PASSWORD di .env sebelum menjalankan UserSeeder.');
        }

        User::updateOrCreate(
            ['email' => $adminEmail],
            [
                'name' => 'Administrator',
                'email' => $adminEmail,
                'password' => Hash::make($adminPassword),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => $kepalaEmail],
            [
                'name' => 'Ustadzah Nur Fadhilah',
                'email' => $kepalaEmail,
                'password' => Hash::make($kepalaPassword),
                'role' => 'admin',
            ]
        );

        $this->command?->info('User admin berhasil dibuat.');
    }
}
