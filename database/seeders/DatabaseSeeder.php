<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat Akun Admin Resmi Utama LSP GSP
        User::create([
            'name' => 'Admin Sekretariat GSP',
            'email' => 'admin@lspgsp.com', // Ini email untuk login kamu nanti
            'password' => Hash::make('admin123'), // Ini password login kamu
        ]);
    }
}