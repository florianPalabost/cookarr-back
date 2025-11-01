<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Ingredient;

class CreateIngredient
{
    /**
     * @param array{name: string, default_unit: string, category: string} $input
     */
    public function handle(array $input): Ingredient
    {
        // TODO: ensure input is valid

        return Ingredient::create($input);
    }
}
