<?php

namespace App\Types\Response\User;

use App\Base\BaseResponseModel;
use App\Constants\HttpStatusCodes;
use App\Contracts\Responsible;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class IndexResponse extends BaseResponseModel implements Responsible
{
    private $users;

    public function __construct($users, string $status = '', int $statusCode = 0)
    {
        $this->status = $status;
        $this->statusCode = $statusCode != 0 ?: HttpStatusCodes::OK->value;
        $this->users = $users;
    }

    /**
     * @return JsonResponse
     */
    public function response(): JsonResponse
    {
        return response()->json([
            'status' => $this->status,
            'user' => UserResource::collection($this->users),
        ],$this->statusCode);
    }
}
