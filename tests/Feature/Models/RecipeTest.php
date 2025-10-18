<?php

declare(strict_types=1);

use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

describe('Models > Recipe', function () {
    it('has a user', function () {
        // Arrange
        $recipe = Recipe::factory()->create();

        // Act
        $user = $recipe->user;

        // Assert
        expect($user)->toBeInstanceOf(User::class);
    });

    it('has ingredients', function () {
        // Arrange
        $ingredientsCountCreated = 3;
        $recipe = Recipe::factory()->create();
        $recipe->ingredients()->saveMany(Ingredient::factory($ingredientsCountCreated)->make());

        // Act
        $ingredients = $recipe->ingredients;

        // Assert
        expect($ingredients)->toBeInstanceOf(Collection::class)
            ->and($ingredients)->toHaveCount($ingredientsCountCreated);
    });
})->group('models');
