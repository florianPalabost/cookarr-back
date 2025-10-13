<?php

declare(strict_types=1);

namespace App\Services\QueryService;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedInclude;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * @template TModel of Model
 *
 * @mixin \Illuminate\Database\Query\Builder
 */
abstract class BaseQueryService
{
    /** @var class-string<TModel> */
    protected string $model;

    /** @return string[] */
    abstract public function getAllowedFields(): array;

    /** @return AllowedFilter[] */
    abstract public function getAllowedFilters(): array;

    /** @return array<int,Collection<int,AllowedInclude>> */
    abstract public function getAllowedIncludes(): array;

    /** @return AllowedSort[] */
    abstract public function getAllowedSorts(): array;

    /** @return QueryBuilder<TModel> */
    public function builder(): QueryBuilder
    {
        return QueryBuilder::for($this->model)
            ->allowedFields($this->getAllowedFields())
            ->allowedFilters($this->getAllowedFilters())
            ->allowedIncludes($this->getAllowedIncludes())
            ->allowedSorts($this->getAllowedSorts());
    }
}
