<?php

namespace App\Types\Response;

use App\Contracts\ResponseModelInterface;
use Illuminate\Http\JsonResponse;

class ErrorResponse implements ResponseModelInterface
{
    private const STACK_TRACE_BREAK_POINT_PATTERN = '/#[\d]+\s/m';
    private const STACK_TRACE_FILTER = ["", "{main}"];
    private string $message;
    private int $code;
    private string $stackTrace;

    public function __construct(string $message, int $code, string $stackTrace)
    {
        $this->message = $message;
        $this->code = $code;
        $this->stackTrace = $stackTrace;
    }

    public function response(): JsonResponse
    {
        return response()->json([
            'message' => $this->message,
            'stack_trace' => $this->getBrokenStackTrace()
        ], $this->code);
    }

    private function getBrokenStackTrace(): array
    {
        $brokenStackTrace = preg_split(self::STACK_TRACE_BREAK_POINT_PATTERN, $this->stackTrace);
        return array_values(array_diff($brokenStackTrace, self::STACK_TRACE_FILTER));
    }
}
