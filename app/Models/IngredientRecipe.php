<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class IngredientRecipe extends Pivot
{
    protected $table = 'ingredient_recipes';

    protected $fillable = [
        'quantity',
        'unit',
        'note',
        'position',
    ];
}
