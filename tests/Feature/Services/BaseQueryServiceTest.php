<?php

declare(strict_types=1);

use App\Models\Recipe;
use App\Services\QueryService\BaseQueryService;
use Spatie\QueryBuilder\QueryBuilder;

describe('Services > BaseQueryService', function () {
    beforeEach(function () {
        $this->service = new class extends BaseQueryService
        {
            protected string $model = Recipe::class;

            public function getAllowedFields(): array
            {
                return ['id', 'created_at', 'updated_at'];
            }

            public function getAllowedFilters(): array
            {
                return ['id', 'created_at', 'updated_at'];
            }

            public function getAllowedIncludes(): array
            {
                return ['user'];
            }

            public function getAllowedSorts(): array
            {
                return ['id', 'created_at', 'updated_at'];
            }
        };
    });

    it('creates a valid QueryBuilder instance', function () {
        // Arrange

        // Act
        $builder = $this->service->builder();

        // Assert
        expect($builder)->toBeInstanceOf(QueryBuilder::class);
    });

    it('can return model data using the builder', function () {
        // Arrange
        Recipe::factory()->create(['title' => 'Spaghetti']);

        // Act
        $recipes = $this->service->builder()->get();

        // Assert
        $assertRecipe = $recipes->first();

        expect($recipes)->toHaveCount(1)
            ->and($assertRecipe)->toBeInstanceOf(Recipe::class)
            ->and($assertRecipe->title)->toBe('Spaghetti');
    });
})->group('services');
