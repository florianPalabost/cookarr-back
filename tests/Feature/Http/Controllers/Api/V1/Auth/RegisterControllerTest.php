<?php

declare(strict_types=1);

use Symfony\Component\HttpFoundation\Response;

describe('Http > Controllers > V1 > Auth > RegisterController', function () {
    it('should register a new user', function () {
        // Arrange
        $payload = [
            'name'                  => 'John Doe',
            'email'                 => 'jdoe@me.com',
            'password'              => 'password',
            'password_confirmation' => 'password',
        ];

        // Act
        /** @var Tests\TestCase $this */
        $response = $this->postJson(uri: '/api/v1/auth/register', data: $payload);

        // Assert
        expect($response->getStatusCode())->toBe(Response::HTTP_CREATED);
        // TODO: custom expect for success api response
    });

    it('should not pass validation if password mismatch', function () {});

    it('should not pass validation if email already exists', function () {});

})->group('controllers', 'v1', 'auth');
