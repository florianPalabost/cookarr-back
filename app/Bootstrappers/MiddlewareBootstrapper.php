<?php

declare(strict_types=1);

namespace App\Bootstrappers;

use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Middleware\HandleCors;

class MiddlewareBootstrapper
{
    public function __invoke(Middleware $middleware): void
    {
        $middleware->api(prepend: HandleCors::class);
        $middleware->statefulApi();
        // $middleware->encryptCookies(except: ['appearance', 'sidebar_state']);
    }
}
