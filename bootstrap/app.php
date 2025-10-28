<?php

declare(strict_types=1);

use App\Bootstrappers\ExceptionsBootstrapper;
use App\Bootstrappers\MiddlewareBootstrapper;
use App\Bootstrappers\RoutingBootstrapper;
use Illuminate\Foundation\Application;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(using: (new RoutingBootstrapper)(...))
    ->withMiddleware(callback: (new MiddlewareBootstrapper)(...))
    ->withExceptions(using: (new ExceptionsBootstrapper)(...))
    ->withCommands([base_path('routes/console.php')])
    ->withBroadcasting(base_path('routes/channels.php'))
    ->create();
