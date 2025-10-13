<?php

declare(strict_types=1);

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

Route::get('/up', function () {
    return new JsonResponse([
        'status' => 'ok',
    ]);
});
