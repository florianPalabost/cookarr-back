<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    /** @use HasFactory<\Database\Factories\RecipeFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
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
    ];

    /**
     * @return BelongsToMany<Ingredient,$this,IngredientRecipe>
     */
    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, 'ingredient_recipes')
            ->using(IngredientRecipe::class)
            ->withPivot(['quantity', 'unit', 'note', 'position'])
            ->withTimestamps();
    }

    /**
     * @return BelongsTo<User,$this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
