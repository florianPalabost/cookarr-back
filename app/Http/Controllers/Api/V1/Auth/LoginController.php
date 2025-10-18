<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Auth;

use App\Actions\CreateAuthToken;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Auth\LoginRequest;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use Dedoc\Scramble\Attributes\Group;

#[Group('Auth')]
class LoginController extends Controller
{
    /**
     * Login a user.
     *
     * @unauthenticated
     */
    public function __invoke(LoginRequest $request, CreateAuthToken $createAuthTokenAction): UserResource
    {
        /** @var array{email: string, password: string} $input */
        $input = $request->validated();

        $user = User::query()->where('email', $input['email'])->firstOrFail();

        // validate password
        // $this->validatePassword($user, $input['password']);

        $accessTokenData = $createAuthTokenAction->handle($user);


        return UserResource::make($user)->withTokenData($accessTokenData);
    }
}
