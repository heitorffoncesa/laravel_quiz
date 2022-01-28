<?php


namespace App\Services;


use App\Models\User;

class UserService
{
    public function getUsersByType(bool $ofSystem = false)
    {
        return User::all();
    }

    public function getUserByUuid(string $uuid): User
    {
        return User::findByUuid($uuid);
    }
}
