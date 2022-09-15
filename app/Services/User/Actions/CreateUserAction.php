<?php

namespace App\Services\User\Actions;

use App\Models\User;
use App\Services\User\Dto\CreateUserDto;

class CreateUserAction
{
    public function run(CreateUserDto $createUserDto): User
    {
        $user = User::staticCreate($createUserDto);
        $user->save();
        return $user;
    }
}
