<?php

namespace App\Exceptions;

use App\Base\BaseException;
use App\Constants\HttpStatusCodes;
use App\Types\Response\ErrorResponse;

class ForbiddenException extends BaseException
{
    public function getResponse(): ErrorResponse
    {
        return new ErrorResponse($this->getMessage(), HttpStatusCodes::FORBIDDEN->value, $this->getTraceAsString());
    }
}
