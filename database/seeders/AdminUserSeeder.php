<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdminUser::create([
            'first_name' => 'Admin',
            'last_name' => 'Ji',
            'email' => 'admin@gmail.com',            
            'address' => 'Butwal',
            'phone' => '9826365147',
            'password' => bcrypt('ajakcha123'),
        ]);
    }
}
