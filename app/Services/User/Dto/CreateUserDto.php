<?php

namespace App\Services\User\Dto;

class CreateUserDto
{
    public string $name;
    public string $email;
    public ?string $password;

    public function __construct(string $name, string $email, ?string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
}
