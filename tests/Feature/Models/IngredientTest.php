<?php

declare(strict_types=1);

use App\Models\Ingredient;
use App\Models\Recipe;

describe('Models > Ingredient', function () {
    it('has recipes', function () {
        // Arrange
        $recipesCountCreated = 3;
        $ingredient = Ingredient::factory()->create();
        $ingredient->recipes()->saveMany(Recipe::factory($recipesCountCreated)->make());

        // Act
        $recipes = $ingredient->recipes;

        // Assert
        expect($recipes)->toHaveCount($recipesCountCreated)
            ->and($recipes->first())->toBeInstanceOf(Recipe::class);
    });
})->group('models');
