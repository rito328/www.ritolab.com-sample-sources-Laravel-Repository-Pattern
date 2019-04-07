<?php

namespace App\Repositories\User;

use App\User;

class UserDataAccessEQRepository implements UserDataAccessRepositoryInterface
{
    public function getAll()
    {
        return User::all();
    }
}
