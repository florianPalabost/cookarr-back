<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateNewUser
{
    /**
     * @param array{name: string, email: string, password: string} $input
     */
    public function handle(array $input): User
    {
        // TODO: ensure input is valid

        $newUser = User::create([
            'name'     => $input['name'],
            'email'    => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        return $newUser;
    }
}
