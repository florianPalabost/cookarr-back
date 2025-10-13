<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Ingredient\StoreIngredientRequest;
use App\Http\Requests\V1\Ingredient\UpdateIngredientRequest;
use App\Http\Resources\V1\IngredientResource;
use App\Models\Ingredient;
use App\Services\QueryService\IngredientQueryService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IngredientQueryService $ingredientService): AnonymousResourceCollection
    {
        $queryBuilder = $ingredientService->builder();

        $ingredients = $queryBuilder->jsonPaginate();

        return IngredientResource::collection($ingredients);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIngredientRequest $request): IngredientResource
    {
        $input = $request->validated();

        // TODO: Action
        $ingredient = Ingredient::create($input);

        return IngredientResource::make($ingredient);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ingredient $ingredient): IngredientResource
    {
        return IngredientResource::make($ingredient);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIngredientRequest $request, Ingredient $ingredient): IngredientResource
    {
        $input = $request->validated();

        // TODO: Action
        $ingredient->update($input);

        return IngredientResource::make($ingredient);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingredient $ingredient): Response
    {
        $ingredient->delete();

        return response()->noContent();
    }
}
