<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Banner;
use App\Models\Catagory;
use App\Models\User;
use App\Models\Watch;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // User::factory(2)->create();
        for ($i = 0; $i < 3; $i++) {
            Banner::querY()->create([
                'image' => fake()->imageUrl(),
                'alt' => fake()->text(),
            ]);
        }
        // for ($i = 0; $i < 3; $i++) {
        //     Catagory::querY()->create([
        //         'name' => fake()->name(),
        //         'status' => "1",
        //         'image' => fake()->imageUrl(),
        //         'count' => rand(1, 100),
        //     ]);
        // }
        // for ($i = 0; $i < 20; $i++) {
        //     Watch::querY()->create([
        //         'catagory_id' => rand(1, 3),
        //         'name' => fake()->name(),
        //         'image' => fake()->imageUrl(),
        //         'price' => rand(100, 99999),
        //         'quantity' => rand(10, 100),
        //         'short_description' => fake()->text(50),
        //         'description' => fake()->text(2500),
        //     ]);
        // }
    }

}
