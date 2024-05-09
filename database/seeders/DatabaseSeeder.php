<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create(
            [
                'id' => 1,
                'name' => 'Nur Muhammad Arofiq',
                'posisi' => 'Website Programmer',
                'email' => 'admin@admin.com',
                'userimg' => 'fiqsss.png',
                'password' => '$2y$10$yyX7l92pqOdPp4Z9/ILMyOgnkHsspIpoouH3C/zSErM1XtecNDYpS',
            ]
        );

        $this->call(
            [
                KategoriSeeder::class,
                ProdukSeeder::class,
            ]
        );

    }
}
