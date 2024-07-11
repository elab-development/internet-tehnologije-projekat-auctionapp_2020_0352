<?php

namespace Database\Seeders;
use Illuminate\Database\Eloquent\Factories\Factory;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Auction;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        User::factory()->create([
            'name' => 'Ivan Jelisavcic',
            'username' => 'ivekccc123',
            'phone_number' => '0612567497',
            'email' => 'ivanjelisavcic6@gmail.com',
            'isAdmin' => true,
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);
        User::factory()->create([
            'name' => 'Marko Markovic',
            'username' => 'markomarkovic123',
            'phone_number' => '0612567497',
            'email' => 'markomarkovic@gmail.com',
            'isAdmin' => false,
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);
        User::factory()->create([
            'name' => 'Petar Petrovic',
            'username' => 'petarpetrovic123',
            'phone_number' => '0612567497',
            'email' => 'petarpetrovic@gmail.com',
            'isAdmin' => false,
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);
        User::factory()->create([
            'name' => 'Janko Jankovic',
            'username' => 'jankojankovic123',
            'phone_number' => '0612567497',
            'email' => 'jankojankovic@gmail.com',
            'isAdmin' => false,
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);
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
        Auction::create([
            'product_name' => "Naziv Proizvoda 8", // Nasumično generirano ime proizvoda
            'category_id' => rand(1, 5),
            'description' => "Opis proizvoda 8", // Nasumično generirani opis
            'start_price' => 200,
            'user_id' => rand(1,10),
            'image_path'=> "/img/BMW_toy.jpg"
        ]);
        Auction::create([
            'product_name' => "Naziv Proizvoda 9", // Nasumično generirano ime proizvoda
            'category_id' => rand(1, 5),
            'description' => "Opis proizvoda 9", // Nasumično generirani opis
            'start_price' => 400,
            'user_id' => rand(1,10),
            'image_path'=> "/img/BMW2_toy"
        ]);
        Auction::create([
            'product_name' => "Naziv Proizvoda 10", // Nasumično generirano ime proizvoda
            'category_id' => rand(1, 5),
            'description' => "Opis proizvoda 10", // Nasumično generirani opis
            'start_price' => 150,
            'user_id' => rand(1,10),
            'image_path'=> "/img/Lambo_toy.jpg"
        ]);
        Auction::create([
            'product_name' => "Naziv Proizvoda 11", // Nasumično generirano ime proizvoda
            'category_id' => rand(1, 5),
            'description' => "Opis proizvoda 11", // Nasumično generirani opis
            'start_price' => 350,
            'user_id' => rand(1,10),
            'image_path'=> "/img/Lambo2_toy"
        ]);
        Auction::create([
            'product_name' => "Naziv Proizvoda 12", // Nasumično generirano ime proizvoda
            'category_id' => rand(1, 5),
            'description' => "Opis proizvoda 12", // Nasumično generirani opis
            'start_price' => 250,
            'user_id' => rand(1,10),
            'image_path'=> "/img/Lambo3_toy"
        ]);
        Auction::create([
            'product_name' => "Naziv Proizvoda 13", // Nasumično generirano ime proizvoda
            'category_id' => rand(1, 5),
            'description' => "Opis proizvoda 13", // Nasumično generirani opis
            'start_price' => 500,
            'user_id' => rand(1,10),
            'image_path'=> "/img/Tesla_toy.jpg"
        ]);
        Auction::create([
            'product_name' => "Naziv Proizvoda 14", // Nasumično generirano ime proizvoda
            'category_id' => rand(1, 5),
            'description' => "Opis proizvoda 14", // Nasumično generirani opis
            'start_price' => 600,
            'user_id' => rand(1,10),
            'image_path'=> "/img/BMW_toy.jpg"
        ]);
        Auction::create([
            'product_name' => "Naziv Proizvoda 15", // Nasumično generirano ime proizvoda
            'category_id' => rand(1, 5),
            'description' => "Opis proizvoda 15", // Nasumično generirani opis
            'start_price' => 700,
            'user_id' => rand(1,10),
            'image_path'=> "/img/BMW2_toy"
        ]);
        Auction::create([
            'product_name' => "Naziv Proizvoda 16", // Nasumično generirano ime proizvoda
            'category_id' => rand(1, 5),
            'description' => "Opis proizvoda 16", // Nasumično generirani opis
            'start_price' => 800,
            'user_id' => rand(1,10),
            'image_path'=> "/img/Lambo_toy.jpg"
        ]);
        Auction::create([
            'product_name' => "Naziv Proizvoda 17", // Nasumično generirano ime proizvoda
            'category_id' => rand(1, 5),
            'description' => "Opis proizvoda 17", // Nasumično generirani opis
            'start_price' => 900,
            'user_id' => rand(1,10),
            'image_path'=> "/img/Lambo2_toy"
        ]);
        Auction::create([
            'product_name' => "Naziv Proizvoda 18", // Nasumično generirano ime proizvoda
            'category_id' => rand(1, 5),
            'description' => "Opis proizvoda 18", // Nasumično generirani opis
            'start_price' => 1000,
            'user_id' => rand(1,10),
            'image_path'=> "/img/Lambo3_toy"
        ]);
        Auction::create([
            'product_name' => "Naziv Proizvoda 19", // Nasumično generirano ime proizvoda
            'category_id' => rand(1, 5),
            'description' => "Opis proizvoda 19", // Nasumično generirani opis
            'start_price' => 1100,
            'user_id' => rand(1,10),
            'image_path'=> "/img/Tesla_toy.jpg"
        ]);
        Auction::create([
            'product_name' => "Naziv Proizvoda 20", // Nasumično generirano ime proizvoda
            'category_id' => rand(1, 5),
            'description' => "Opis proizvoda 20", // Nasumično generirani opis
            'start_price' => 1200,
            'user_id' => rand(1,10),
            'image_path'=> "/img/BMW_toy.jpg"
        ]);
    }
}
