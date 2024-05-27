<?php
// database/factories/ItemFactory.php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'date_creation' => $this->faker->date(),
            'la_une' => $this->faker->boolean(),
            'image' => 'https://place-hold.it/300x500',
        ];
    }
}
