<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::factory(4)
        ->state(new Sequence(
            ['name' => 'admin', 'description' => 'Admin User'],
            ['name' => 'doctor', 'description' => 'Patient Doctor'],
            ['name' => 'guardian', 'description' => 'Patient guardian'],
            ['name' => 'staff', 'description' => 'Clinic Staff'],
        ))
        ->create();
    }
}
