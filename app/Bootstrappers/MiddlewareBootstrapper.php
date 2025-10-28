<?php

declare(strict_types=1);

namespace App\Bootstrappers;

use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Middleware\HandleCors;

class MiddlewareBootstrapper
{
    public function __invoke(Middleware $middleware): void
    {
        $middleware->api(prepend: [
            HandleCors::class,
            // EncryptCookies::class,
            AddQueuedCookiesToResponse::class,
        ]);
        $middleware->statefulApi();

        // $middleware->encryptCookies(except: ['appearance', 'sidebar_state']);
    }
}
