<?php

namespace App\Base;

use App\Contracts\Responsible;

class BaseResponseModel
{
    protected string $status;
    protected int $statusCode;
}
