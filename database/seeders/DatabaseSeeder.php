<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Theme;
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

        Theme::create([

            'logo'              => 'logo.png',
            'copyright'         => '2024 Fresh Mart Agency',
            'running_tag'       => 'Free Shipping for all Order of $99',
            'social'            => '[]',
            'title'             => 'Fresh Mart',
            'tagline'           => 'Take Fresh Be Healthy',
            
            ]);
    }
}
