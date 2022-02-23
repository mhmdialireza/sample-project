<?php

namespace App\Types\Response\Auth;

use App\Base\BaseResponseModel;
use App\Contracts\Responsible;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class LoginAndRegisterResponse extends BaseResponseModel implements Responsible
{
    private User $user;
    private string $token;

    public function __construct(string $status, int $statusCode, User $user, string $token)
    {
        $this->status = $status;
        $this->statusCode = $statusCode;
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * @return JsonResponse
     */
    public function response(): JsonResponse
    {
        return response()->json([
            'status' => $this->status,
            'user' => new UserResource($this->user),
            'token' => $this->token
        ],$this->statusCode);
    }
}
