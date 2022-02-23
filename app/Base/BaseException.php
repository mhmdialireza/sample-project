<?php

namespace App\Base;

use App\Types\Response\ErrorResponse;
use Exception;

abstract class BaseException extends Exception
{
    /**
     * Get response for exception.
     *
     * @return ErrorResponse
     */
    public abstract function getResponse(): ErrorResponse;
}
