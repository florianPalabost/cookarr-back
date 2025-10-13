<?php

declare(strict_types=1);

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Recipe */
class RecipeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // Attributes
            'uuid'         => $this->whenHas('uuid'),

            'user_id'      => $this->whenHas('user_id'),

            'title'        => $this->whenHas('title'),

            'description'  => $this->whenHas('description'),

            'instructions' => $this->whenHas('instructions'),

            'image'        => $this->whenHas('image'),

            'prep_time'    => $this->whenHas('prep_time'),

            'cook_time'    => $this->whenHas('cook_time'),

            'servings'     => $this->whenHas('servings'),

            'created_at'   => $this->whenHas('created_at'),

            'updated_at'   => $this->whenHas('updated_at'),

            // Relationships
        ];
    }
}
