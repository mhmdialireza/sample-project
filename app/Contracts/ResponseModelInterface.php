<?php

namespace App\Contracts;

use Illuminate\Http\JsonResponse;

interface ResponseModelInterface
{
    public function response(): JsonResponse;
}
