<?php

namespace App\Exceptions;

use App\Base\BaseException;
use App\Constants\HttpStatusCodes;
use App\Types\Response\ErrorResponse;

class UnauthorizedException extends BaseException
{
    public function getResponse(): ErrorResponse
    {
        return new ErrorResponse($this->getMessage(), HttpStatusCodes::UNAUTHORIZED->value, $this->getTraceAsString());
    }
}
