<?php

declare(strict_types=1);

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read string $access_token
 * @property-read string $access_token_expires_at
 * @property-read string $refresh_token
 * @property-read string $refresh_token_expires_at
 */
class AuthTokenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'access_token'             => $this['access_token'],
            'access_token_expires_at'  => $this['access_token_expires_at'],
            'refresh_token'            => $this['refresh_token'],
            'refresh_token_expires_at' => $this['refresh_token_expires_at'],
            'token_type'               => 'Bearer',
        ];
    }
}
