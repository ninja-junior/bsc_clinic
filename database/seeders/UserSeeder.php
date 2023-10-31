<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::whereName('admin')->first();

        User::factory()->for($adminRole)->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'phone' => '111222333'
        ]);
        
    }
}
