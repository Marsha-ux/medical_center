<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

    //  \App\Models\specialization::factory(5)->create();
   //  \App\Models\doctor::factory(50)->create();
     //  \App\Models\patient::factory(50)->create();
   \App\Models\rate::factory(50)->create();
    }
}
