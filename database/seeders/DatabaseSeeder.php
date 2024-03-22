<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create(
            [
                'name' => 'Marketing',
                'email' => 'marketing@example.com',
                'username' => 'marketing',
                'password'=> 'marketing'
            ]
        );

        User::create(
            [
                'name' => 'Finance',
                'email' => 'finance@example.com',
                'username' => 'finance',
                'password'=> 'finance'
            ]
        );

        User::create(
            [
                'name' => 'Stakeholder',
                'email' => 'stakeholder@example.com',
                'username' => 'stakeholder',
                'password'=> 'stakeholder'
            ]
        );
    }
}
