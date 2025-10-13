<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Auth;

use App\Actions\CreateNewUser;
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
    public function __invoke(RegisterRequest $request, CreateNewUser $createNewUserAction): UserResource
    {
        /** @var array{name: string, email: string, password: string} $input */
        $input = $request->validated();

        $newUser = $createNewUserAction->handle($input);

        $token = $newUser->createToken('api-token');

        return UserResource::make($newUser)->withToken($token->plainTextToken);
    }
}
