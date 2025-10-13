<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\IngredientCategoryEnum;
use App\Enums\IngredientUnitEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ingredient>
 */
class IngredientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'         => fake()->word(),
            'default_unit' => fake()->randomElement(IngredientUnitEnum::values()),
            'category'     => fake()->randomElement(IngredientCategoryEnum::values()),
        ];
    }
}
