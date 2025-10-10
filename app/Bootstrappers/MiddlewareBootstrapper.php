<?php

declare(strict_types=1);

namespace App\Bootstrappers;

use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Middleware\AddLinkHeadersForPreloadedAssets;

class MiddlewareBootstrapper
{
    public function __invoke(Middleware $middleware): void
    {
        // $middleware->encryptCookies(except: ['appearance', 'sidebar_state']);

        // $middleware->web(append: [
        //     AddLinkHeadersForPreloadedAssets::class,
        // ]);
    }
}
