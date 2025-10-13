<?php

declare(strict_types=1);

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\User
 */
class UserResource extends JsonResource
{
    public function withToken(string $token): static
    {
        return $this->additional([
            'token' => $token,
            'type'  => 'Bearer',
        ]);
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // Attributes

            /** @var string $name The name of the user */
            'name'  => $this->whenHas('name'),

            /** @var string $email The email of the user */
            'email' => $this->whenHas('email'),

            // Relationships
        ];
    }
}
