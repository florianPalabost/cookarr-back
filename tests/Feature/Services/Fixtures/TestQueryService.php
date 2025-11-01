<?php

declare(strict_types=1);

namespace Tests\Feature\Services\Fixtures;

use App\Models\Recipe;
use App\Services\QueryService\BaseQueryService;

class TestQueryService extends BaseQueryService
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
}
