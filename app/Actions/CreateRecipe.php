<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Recipe;
use Illuminate\Support\Arr;

class CreateRecipe
{
    public function __construct(protected BulkCreateIngredient $createIngredientAction) {}

    /**
     * @param array{title: string, description: string, instructions: string, image: string, prep_time: int, cook_time: int, servings: int, is_public: bool, ingredients: array<array{name: string, default_unit: string, category: string}>} $input
     */
    public function handle(array $input): Recipe
    {
        // TODO: ensure input is valid

        $ingredients = collect();

        if (Arr::has($input, 'ingredients')) {
            $ingredients = $this->createIngredientAction->handle($input['ingredients']);
        }

        $recipe = Recipe::create([
            'title'        => $input['title'],
            'user_id'      => auth()->user()->id,
            'description'  => $input['description'],
            'instructions' => $input['instructions'],
            'image'        => $input['image'],
            'prep_time'    => $input['prep_time'],
            'cook_time'    => $input['cook_time'],
            'servings'     => $input['servings'],
            // 'difficulty'   => $input['difficulty'],
            'is_public'    => $input['is_public'],
        ]);

        $recipe->ingredients()->attach($ingredients);

        return $recipe;
    }
}
