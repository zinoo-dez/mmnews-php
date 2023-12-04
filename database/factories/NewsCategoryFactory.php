<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NewsCategory>
 */
class NewsCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     private $categories =['news','game','education','sport','wars','art','fashion'];
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement($this->categories),
        ];
    }
}
