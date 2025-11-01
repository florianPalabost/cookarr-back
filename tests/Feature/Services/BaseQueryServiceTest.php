<?php

declare(strict_types=1);

use App\Models\Recipe;
use Spatie\QueryBuilder\QueryBuilder;
use Tests\Feature\Services\Fixtures\TestQueryService;

describe('Services > BaseQueryService', function () {
    it('creates a valid QueryBuilder instance', function () {
        // Arrange
        $service = app(TestQueryService::class);

        // Act
        $builder = $service->builder();

        // Assert
        expect($builder)->toBeInstanceOf(QueryBuilder::class);
    });

    it('can return model data using the builder', function () {
        // Arrange
        $service = app(TestQueryService::class);
        Recipe::factory()->create(['title' => 'Spaghetti']);

        // Act
        $recipes = $service->builder()->get();

        // Assert
        $assertRecipe = $recipes->first();

        expect($recipes)->toHaveCount(1)
            ->and($assertRecipe)->toBeInstanceOf(Recipe::class)
            ->and($assertRecipe->title)->toBe('Spaghetti');
    });
})->group('services');
