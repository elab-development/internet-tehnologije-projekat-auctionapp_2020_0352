<?php

namespace Database\Seeders;
use Illuminate\Database\Eloquent\Factories\Factory;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Auction;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Category::truncate();
        Auction::truncate();
        User::factory(10)->create();
        Category::factory(5)->create();
        Auction::create([
            'product_name' => "Naziv Proizvoda 1", // Nasumično generirano ime proizvoda
            'category_id' => rand(1, 5),
            // Nasumično generirani ID kategorije
            'description' => "Opis proizvoda 1", // Nasumično generirani opis
            'start_price' => 300,
            'user_id' => rand(1,10),
            'image_path'=> "/img/BMW_toy.webp"
        ]);
        Auction::create([
            'product_name' => "Naziv Proizvoda 2", // Nasumično generirano ime proizvoda
            'category_id' => rand(1, 5),
 // Nasumično generirani ID kategorije
            'description' => "Opis proizvoda 2", // Nasumično generirani opis
            'start_price' => 500,
            'user_id' =>  rand(1,10),
            'image_path'=> "/img/BMW2_toy"
        ]);
        Auction::create([
            'product_name' => "Naziv Proizvoda 3", // Nasumično generirano ime proizvoda
            'category_id' => rand(1, 5),
 // Nasumično generirani ID kategorije
            'description' => "Opis proizvoda 3", // Nasumično generirani opis
            'start_price' => 300,
            'user_id' =>  rand(1,10),
            'image_path'=> "/img/Lambo_toy.jpg"
        ]);
        Auction::create([
            'product_name' => "Naziv Proizvoda 4", // Nasumično generirano ime proizvoda
            'category_id' => rand(1, 5),
            // Nasumično generirani ID kategorije
            'description' => "Opis proizvoda 4", // Nasumično generirani opis
            'start_price' => 1000,
            'user_id' =>  rand(1,10),
            'image_path'=> "/img/Lambo2_toy"
        ]);
        Auction::create([
            'product_name' => "Naziv Proizvoda 5", // Nasumično generirano ime proizvoda
            'category_id' => rand(1, 5),
 // Nasumično generirani ID kategorije
            'description' => "Opis proizvoda 5", // Nasumično generirani opis
            'start_price' => 300,
            'user_id' =>  rand(1,10),
            'image_path'=> "/img/Lambo3_toy"
        ]);
        Auction::create([
            'product_name' => "Naziv Proizvoda 6", // Nasumično generirano ime proizvoda
            'category_id' => rand(1, 5),
 // Nasumično generirani ID kategorije
            'description' => "Opis proizvoda 6", // Nasumično generirani opis
            'start_price' => 100,
            'user_id' => rand(1,10),
            'image_path'=> "/img/Tesla_toy.jpg"
        ]);
        Auction::create([
            'product_name' => "Naziv Proizvoda 7", // Nasumično generirano ime proizvoda
            'category_id' => rand(1, 5),
 // Nasumično generirani ID kategorije
            'description' => "Opis proizvoda 7", // Nasumično generirani opis
            'start_price' => 300,
            'user_id' =>  rand(1,10),
            'image_path'=> "/img/Lambo_toy.jpg"
        ]);
    }
}
