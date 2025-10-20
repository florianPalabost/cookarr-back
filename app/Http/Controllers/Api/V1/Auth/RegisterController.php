<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Auth;

use App\Actions\CreateAuthToken;
use App\Actions\CreateUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Auth\RegisterRequest;
use App\Http\Resources\V1\UserResource;
use Dedoc\Scramble\Attributes\Group;

#[Group('Auth')]
class RegisterController extends Controller
{
    /**
     * Register a new user.
     *
     * @unauthenticated
     */
    public function __invoke(RegisterRequest $request, CreateUser $createNewUserAction, CreateAuthToken $createAuthTokenAction): UserResource
    {
        /** @var array{name: string, email: string, password: string} $input */
        $input = $request->validated();

        $newUser = $createNewUserAction->handle($input);

        $tokenData = $createAuthTokenAction->handle($newUser);

        return UserResource::make($newUser)->withTokenData($tokenData);
    }
}
