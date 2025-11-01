<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class BulkCreateIngredient
{
    /**
     * @param array{name: string, default_unit: string, category: string}[] $input
     * @return Collection<int, Ingredient>
     */
    public function handle(array $input): Collection
    {
        // TODO: ensure input is valid

        DB::transaction(function () use ($input) {
            return Ingredient::query()->fillAndInsert($input);
        });

        /** @var Collection<int, Ingredient> $ingredients */
        $ingredients = Ingredient::query()->whereIn('name', array_column($input, 'name'))->get();

        throw_unless($ingredients->count() === count($input), 'Failed to create all ingredients');

        return $ingredients;
    }
}
