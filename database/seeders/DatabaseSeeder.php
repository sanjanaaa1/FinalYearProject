<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use DB;

// use Illuminate\Database\seeders\AdminSeeder;


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
        // $this->call([
        //     AdminSeeder::class
        // ]);
        \App\Models\User::create([
            'name' => 'Super Admin',
            'is_admin' => 1,
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);

        \App\Models\Role::create([
            'role' => 'admin',
            'status' => 'Y'
        ]);

        \App\Models\Role::create([
            'role' => 'customer',
            'status' => 'Y'
        ]);
    }
}
