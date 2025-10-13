<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Actions\CreateRecipe;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Recipe\StoreRecipeRequest;
use App\Http\Requests\V1\Recipe\UpdateRecipeRequest;
use App\Http\Resources\V1\RecipeResource;
use App\Models\Recipe;
use App\Services\QueryService\RecipeQueryService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RecipeQueryService $recipeService): AnonymousResourceCollection
    {
        $queryBuilder = $recipeService->builder();

        $recipes = $queryBuilder->where('user_id', auth()->user()->id)->jsonPaginate();

        return RecipeResource::collection($recipes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRecipeRequest $request, CreateRecipe $createRecipeAction): RecipeResource
    {
        $input = $request->validated();

        $recipe = $createRecipeAction->handle($input);

        return RecipeResource::make($recipe);
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe): RecipeResource
    {
        return RecipeResource::make($recipe);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRecipeRequest $request, Recipe $recipe): RecipeResource
    {
        $input = $request->validated();

        $recipe->update($input);

        return RecipeResource::make($recipe);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe): Response
    {
        $recipe->delete();

        return response()->noContent();
    }
}
