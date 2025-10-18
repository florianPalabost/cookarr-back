<?php

declare(strict_types=1);

describe('Services > RecipeQueryService', function () {
    it('filters recipes by :dataset', function (mixed $value) {
        // Arrange

        // Act

        // Assert
    })->with([
        'title'     => ['Spaghetti'],
        'user_id'   => [1],
        'is_public' => [true],
        'prep_time' => [30],
        'cook_time' => [45],
        'servings'  => [4],
    ]);

    it('includes relationships :dataset', function (string $attribute) {
        // Arrange

        // Act

        // Assert
    })->with([
        'ingredients',
        'user',
    ]);

    it('sorts recipes by :dataset :dataset', function (string $attribute, string $direction) {
        // Arrange

        // Act

        // Assert
    })->with([
        'title',
        'is_public',
        'prep_time',
        'cook_time',
        'servings',
        'created_at',
        'updated_at',
    ])->with('orders');
})->group('services', 'recipes');
