<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Recipe;

class CreateRecipe
{
    /**
     * @param array{title: string, description: string, instructions: string, image: string, prep_time: int, cook_time: int, servings: int, is_public: bool} $input
     */
    public function handle(array $input): Recipe
    {
        // TODO: ensure input is valid

        $recipe = Recipe::create([
            'title'        => $input['title'],
            'user_id'      => auth()->user()->id,
            'description'  => $input['description'],
            'instructions' => $input['instructions'],
            'image'        => $input['image'],
            'prep_time'    => $input['prep_time'],
            'cook_time'    => $input['cook_time'],
            'servings'     => $input['servings'],
            'is_public'    => $input['is_public'],
        ]);

        return $recipe;
    }
}
