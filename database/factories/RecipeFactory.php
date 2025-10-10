<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid'         => fake()->uuid(),
            'user_id'      => User::factory(),
            'title'        => fake()->sentence(),
            'description'  => fake()->paragraph(),
            'instructions' => fake()->paragraph(),
            // 'image' => fake()->imageUrl(),
            'prep_time'    => fake()->randomNumber(3),
            'cook_time'    => fake()->randomNumber(3),
            'servings'     => fake()->randomNumber(2),
            'is_public'    => fake()->boolean(),
        ];
    }
}
