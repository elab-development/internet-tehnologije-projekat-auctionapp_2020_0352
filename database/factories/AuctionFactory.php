<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Auction;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Auction>
 */
class AuctionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Auction::class;
    public function definition(): array
    {
        $userIds = User::pluck('id')->toArray();
        $randomUserId = $this->faker->randomElement($userIds);
        return [
            'product_name' => $this->faker->words(3, true), // Nasumično generirano ime proizvoda
            'category_id' => $this->faker->numberBetween(1,5), // Nasumično generirani ID kategorije
            'description' => $this->faker->paragraph(), // Nasumično generirani opis
            'start_price' => 300,
            'user_id' => $randomUserId,
        ];
    }
}
