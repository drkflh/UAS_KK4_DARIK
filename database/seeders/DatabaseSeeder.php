<?php

namespace Database\Seeders;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Darik Ganteng',
            'email' => 'darikslebew@gmail.com',
            'password' => bcrypt('hayukhayukhayuk'),
            'alamat' => 'Ajibarang City',
            'nik' => '3103120065',
            'no_hp' => '082136951197',
            'role' => 'admin'
        ]);
    }
}