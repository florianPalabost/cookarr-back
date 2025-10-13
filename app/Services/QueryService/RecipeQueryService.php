<?php

declare(strict_types=1);

namespace App\Services\QueryService;

use App\Models\Recipe;
use Illuminate\Support\Collection;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedInclude;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\Enums\FilterOperator;

/** @template-extends BaseQueryService<Recipe> */
class RecipeQueryService extends BaseQueryService
{
    protected string $model = Recipe::class;

    /** @return string[] */
    public function getAllowedFields(): array
    {
        return [
            'id',
            'uuid',
            'user_id',
            'title',
            'description',
            'instructions',
            'image',
            'prep_time',
            'cook_time',
            'servings',
            'is_public',
            'created_at',
            'updated_at',
        ];
    }

    /** @return AllowedFilter[] */
    public function getAllowedFilters(): array
    {
        return [
            AllowedFilter::exact('uuid'),
            AllowedFilter::exact('user_id'),
            AllowedFilter::partial('title'),
            AllowedFilter::partial('description'),

            AllowedFilter::exact('is_public'),

            AllowedFilter::operator('prep_time', FilterOperator::DYNAMIC),
            AllowedFilter::operator('cook_time', FilterOperator::DYNAMIC),
            AllowedFilter::operator('servings', FilterOperator::DYNAMIC),

            AllowedFilter::operator('created_at', FilterOperator::DYNAMIC),
            AllowedFilter::operator('updated_at', FilterOperator::DYNAMIC),
        ];
    }

    /** @return array<int,Collection<int,AllowedInclude>> */
    public function getAllowedIncludes(): array
    {
        return [
            AllowedInclude::relationship(name: 'ingredients', internalName: 'ingredients'),
        ];
    }

    /** @return AllowedSort[] */
    public function getAllowedSorts(): array
    {
        return [
            AllowedSort::field('uuid'),
            AllowedSort::field('title'),
            AllowedSort::field('is_public'),
            AllowedSort::field('prep_time'),
            AllowedSort::field('cook_time'),
            AllowedSort::field('servings'),
            AllowedSort::field('created_at'),
            AllowedSort::field('updated_at'),
        ];
    }
}
