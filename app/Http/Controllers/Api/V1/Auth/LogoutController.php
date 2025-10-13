<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use Dedoc\Scramble\Attributes\Group;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

#[Group('Auth')]
class LogoutController extends Controller
{
    /**
     * Logout a user.
     */
    public function __invoke(Request $request): Response
    {
        request()->user()->currentAccessToken()->delete();

        return response()->noContent();
    }
}
