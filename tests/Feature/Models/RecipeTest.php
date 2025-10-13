<?php

declare(strict_types=1);

use App\Models\Recipe;
use App\Models\User;

describe('Models > Recipe', function () {
    it('has a user', function () {
        // Arrange
        $recipe = Recipe::factory()->create();

        // Act
        $user = $recipe->user;

        // Assert
        expect($user)->toBeInstanceOf(User::class);
    });
})->group('models');
