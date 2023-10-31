<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Clinic;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            RoleSeeder::class,
            UserSeeder::class
        ]);

        Clinic::factory(5)->create();
        $clinics=Clinic::all();
        
       User::all()->each(function ($user) use ($clinics) { 
            $user->clinics()->attach(
                $clinics->random(rand(1, 3))->pluck('id')->toArray()
            ); 
        });
    }
}
