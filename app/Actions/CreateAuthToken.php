<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Carbon;

class CreateAuthToken
{
    /**
     * @return array{access_token: string, access_token_expires_at: Carbon, refresh_token: string, refresh_token_expires_at: Carbon}
     */
    public function handle(User $user): array
    {
        $accessTokenExpiresAt = now()->addMinutes((int) config('sanctum.expiration', 60 * 24));
        $newAccessToken = $user->createToken('access_token', ['*'], $accessTokenExpiresAt)->plainTextToken;

        $refreshTokenExpiresAt = now()->addMinutes((int) config('sanctum.rt_expiration', 60 * 24 * 7));
        // refresh token can only be used to refresh the access token
        $newRefreshToken = $user->createToken('refresh_token', ['refresh'], $refreshTokenExpiresAt)->plainTextToken;

        return [
            'access_token'             => $newAccessToken,
            'access_token_expires_at'  => $accessTokenExpiresAt,
            'refresh_token'            => $newRefreshToken,
            'refresh_token_expires_at' => $refreshTokenExpiresAt,
        ];
    }
}
