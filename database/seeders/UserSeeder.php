<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'User',
            'last_name' => 'Bhai',
            'email' => 'user@gmail.com',            
            'address' => 'Butwal',
            'phone' => '9826365147',
            'password' => bcrypt('123456'),
        ]);
    }
}