<?php

namespace App\Contracts;

use Illuminate\Http\JsonResponse;

interface Responsible
{
    public function response(): JsonResponse;
}
