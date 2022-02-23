<?php

namespace App\Services\V1;

use App\Constants\Auth;
use App\Constants\HttpStatusCodes;
use App\Constants\User as UserEnum;
use App\Exceptions\NotFoundException;
use App\Exceptions\UnauthorizedException;
use App\Models\User;
use App\Types\Response\Auth\LoginAndRegisterResponse;
use App\Types\Response\Auth\LogoutResponse;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    /**
     * @param $name
     * @param $email
     * @param $password
     * @return LoginAndRegisterResponse
     */
    public function register($name, $email, $password): LoginAndRegisterResponse
    {
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);
        $token = $user->createToken('myApp')->plainTextToken;

        return new LoginAndRegisterResponse(Auth::Register_SUCCESSFUL->value,HttpStatusCodes::OK->value, $user, $token);
    }

    /**
     * @param $email
     * @param $password
     * @return LoginAndRegisterResponse
     * @throws NotFoundException
     * @throws UnauthorizedException
     */
    public function login($email, $password): LoginAndRegisterResponse
    {
        $user = User::whereEmail($email)->first();
        if (!$user) {
            throw new NotFoundException(UserEnum::NOT_FOUND->value);
        }
        if (!Hash::check($password, $user->password)) {
            throw new UnauthorizedException(Auth::WRONG_PASSWORD->value);
        }
        $token = $user->createToken('myApp')->plainTextToken;

        return new LoginAndRegisterResponse(Auth::LOGIN_SUCCESSFUL->value, HttpStatusCodes::CREATED->value, $user, $token);
    }

    /**
     * @return LogoutResponse
     */
    public function logout(): LogoutResponse
    {
        auth()->user()->tokens()->delete();

        return new LogoutResponse(Auth::LOGOUT_SUCCESSFUL->value, HttpStatusCodes::NO_CONTENT->value);
    }
}
