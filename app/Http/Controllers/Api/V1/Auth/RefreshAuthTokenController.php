<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Auth;

use App\Actions\CreateAuthToken;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\AuthTokenResource;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class RefreshAuthTokenController extends Controller
{
    /**
     * Refresh auth tokens (access and refresh).
     */
    public function __invoke(Request $request, CreateAuthToken $createAuthTokenAction): AuthTokenResource
    {
        $currentRefreshToken = $request->bearerToken();
        $refreshToken = PersonalAccessToken::findToken($currentRefreshToken);

        abort_if(! $refreshToken || $refreshToken->expires_at->isPast(), 401, 'Invalid or expired refresh token.');

        /** @var \App\Models\User|null $user */
        $user = request()->user();

        abort_unless($user !== null, 401, 'User not found.');

        $refreshToken->delete();

        $tokenData = $createAuthTokenAction->handle($user);

        return AuthTokenResource::make($tokenData);
    }
}
