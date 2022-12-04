<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

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

        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'phone' => '081212121212',
            'level' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('matahariku'),
        ]);

        User::create([
            'name' => 'test',
            'username' => 'test',
            'phone' => '081212121213',
            'level' => 'Customer',
            'email' => 'test@gmail.com',
            'password' => bcrypt('matahariku'),
        ]);

        User::create([
            'name' => 'launderertest',
            'username' => 'launderertest',
            'phone' => '081212121214',
            'level' => 'Launderer',
            'email' => 'launderertest@gmail.com',
            'password' => bcrypt('matahariku'),
        ]);
    }
}
