<?php

declare(strict_types=1);

namespace App\Bootstrappers;

use Illuminate\Routing\Router;

class RoutingBootstrapper
{
    private Router $router;

    /**
     * Invoke the class instance.
     */
    public function __invoke(Router $router): void
    {
        $this->router = $router;

        $this->registerApiRoutes();

        $this->registerWebRoutes();

    }

    private function registerApiRoutes(): void
    {
        $this->router->middleware('api')->group(base_path('routes/api.php'));
    }

    private function registerWebRoutes(): void
    {
        $this->router->middleware('web')->group(base_path('routes/web.php'));
    }
}
