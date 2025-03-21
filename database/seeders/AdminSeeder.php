<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'Super Admin',
            'is_admin' => 1,
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);
    }
}
