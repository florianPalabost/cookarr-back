<?php

declare(strict_types=1);

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

/**
 * @mixin \App\Models\User
 */
class UserResource extends JsonResource
{
    /**
     * Add token data to the resource.
     *
     * @param array{access_token: string, access_token_expires_at: Carbon, refresh_token: string, refresh_token_expires_at: Carbon} $tokenData
     */
    public function withTokenData(array $tokenData): static
    {
        return $this->additional([
            'data' => [
                'auth' => AuthTokenResource::make($tokenData),
            ],
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
