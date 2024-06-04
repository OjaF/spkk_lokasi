<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat 3 user awal
        User::create(
            [
                'name' => 'Marketing',
                'username' => 'marketing',
                'password'=> 'marketing',
                'role'=> 'marketing',
            ]
        );

        User::create(
            [
                'name' => 'Finance',
                'username' => 'finance',
                'password'=> 'finance',
                'role' => 'finance'
            ]
        );

        User::create(
            [
                'name' => 'Stakeholder',
                'username' => 'stakeholder',
                'password'=> 'stakeholder',
                'role' => 'stakeholder'
            ]
        );

        User::create(
            [
                'name' => 'Admin',
                'username' => 'admin',
                'password'=> 'admin',
                'role' => 'admin'
            ]
        );
    }
}
