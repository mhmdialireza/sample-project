<?php

namespace App\Services\V1;

use App\Models\User;
use App\Types\Response\User\IndexResponse;

class UserService
{
    public function index()
    {
        $users = User::paginate(10);

        return new IndexResponse($users);
    }
}
