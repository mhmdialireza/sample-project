<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Auth\LoginRequest;
use App\Http\Requests\Api\V1\Auth\RegisterRequest;
use App\Services\V1\AuthService;
use Illuminate\Http\JsonResponse;


class AuthController extends Controller
{
    /**
     * @param \App\Services\V1\AuthService $authService
     */
    public function __construct(
        private AuthService $authService
    ) { }

    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request) :JsonResponse
    {
        $name = $request->validated()['name'];
        $email = $request->validated()['email'];
        $password = $request->validated()['password'];

        return $this->authService->register($name,$email,$password)->response();
    }

    /**
     * @param \App\Http\Requests\Api\V1\Auth\LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\NotFoundException
     * @throws \App\Exceptions\UnauthorizedException
     */
    public function login(LoginRequest $request):JsonResponse
    {
        $email = $request->validated()['email'];
        $password = $request->validated()['password'];

        return $this->authService->login($email,$password)->response();
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout():JsonResponse
    {
        return $this->authService->logout()->response();
    }
}
