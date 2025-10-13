<?php

declare(strict_types=1);

namespace App\Http\Resources\V1;

use App\Enums\IngredientCategoryEnum;
use App\Enums\IngredientUnitEnum;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Ingredient
 */
class IngredientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            /** @var int $id The identifier of the ingredient */
            'id'           => $this->whenHas('id', $this->id),

            /** @var IngredientUnitEnum $default_unit The default unit of the ingredient */
            'default_unit' => $this->whenHas('default_unit', $this->default_unit),

            /** @var string $name The name of the ingredient */
            'name'         => $this->whenHas('name', $this->name),

            /** @var IngredientCategoryEnum $category The category of the ingredient */
            'category'     => $this->whenHas('category', $this->category),
        ];
    }
}
