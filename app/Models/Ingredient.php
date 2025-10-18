<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\IngredientCategoryEnum;
use App\Enums\IngredientUnitEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model
{
    /** @use HasFactory<\Database\Factories\IngredientFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'default_unit',
        'category',
    ];

    /**
     * @return BelongsToMany<Recipe,$this,IngredientRecipe>
     */
    public function recipes(): BelongsToMany
    {
        return $this->belongsToMany(Recipe::class, 'ingredient_recipes')
            ->using(IngredientRecipe::class)
            ->withPivot(['quantity', 'unit', 'note', 'position'])
            ->withTimestamps();
    }

    protected function casts(): array
    {
        return [
            'category'     => IngredientCategoryEnum::class,
            'default_unit' => IngredientUnitEnum::class,
        ];
    }
}
