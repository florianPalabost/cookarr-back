<?php

declare(strict_types=1);

namespace App\Services\QueryService;

use App\Models\Ingredient;
use Illuminate\Support\Collection;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedInclude;
use Spatie\QueryBuilder\AllowedSort;

/** @template-extends BaseQueryService<Ingredient> */
class IngredientQueryService extends BaseQueryService
{
    protected string $model = Ingredient::class;

    /** @return string[] */
    public function getAllowedFields(): array
    {
        return [
            'id',
            'uuid',
            'name',
            'category',
            'default_unit',
            'created_at',
            'updated_at',
        ];
    }

    /** @return AllowedFilter[] */
    public function getAllowedFilters(): array
    {
        return [
            AllowedFilter::exact('uuid'),
            AllowedFilter::exact('name'),
            AllowedFilter::exact('category'),
            AllowedFilter::exact('default_unit'),
        ];
    }

    /** @return array<int,Collection<int,AllowedInclude>> */
    public function getAllowedIncludes(): array
    {
        return [
            AllowedInclude::relationship(name: 'recipes', internalName: 'recipes'),
        ];
    }

    /** @return AllowedSort[] */
    public function getAllowedSorts(): array
    {
        return [
            AllowedSort::field('uuid'),
            AllowedSort::field('name'),
            AllowedSort::field('category'),
            AllowedSort::field('default_unit'),
            AllowedSort::field('created_at'),
            AllowedSort::field('updated_at'),
        ];
    }
}
