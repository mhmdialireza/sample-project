<?php

namespace App\Types\Response\Auth;

use App\Base\BaseResponseModel;
use App\Contracts\Responsible;
use Illuminate\Http\JsonResponse;

class LogoutResponse extends BaseResponseModel implements Responsible
{
    public function __construct($status,$statusCode)
    {
        $this->status = $status;
        $this->statusCode = $statusCode;
    }

    public function response(): JsonResponse
    {
        return response()->json([
            'status' => $this->status
        ], $this->statusCode);
    }
}
