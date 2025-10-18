<?php

declare(strict_types=1);

use Symfony\Component\HttpFoundation\Response;

it('returns a successful response', function () {
    // Arrange
    $expectedResult = ['status' => 'ok'];

    // Act
    /** @var Tests\TestCase $this */
    $response = $this->getJson('/api/up');

    // Assert
    expect($response->getStatusCode())->toBe(Response::HTTP_OK)
        ->and($response->json())->toBe($expectedResult);
});
