<?php

namespace App\Exceptions;

use App\Base\BaseException;
use App\Constants\HttpStatusCodes;
use App\Types\Response\ErrorResponse;

class InternalServerErrorException extends BaseException
{
    public function getResponse(): ErrorResponse
    {
        return new ErrorResponse($this->getMessage(), HttpStatusCodes::INTERNAL_SERVER_ERROR->value, $this->getTraceAsString());
    }
}
