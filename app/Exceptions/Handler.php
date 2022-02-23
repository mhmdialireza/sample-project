<?php

namespace App\Exceptions;

use App\Base\BaseException;
use App\Constants\Auth;
use App\Constants\HttpStatusCodes;
use App\Constants\User;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];
    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
        $this->renderable(function (Throwable $throwable) {
            dd($throwable);
            if ($throwable instanceof BaseException) {
                return $this->handleBaseExceptions($throwable);
            }
            if($throwable->getMessage() == 'Unauthenticated.'){
                throw new UnauthorizedException(User::UNAUTHENTICATED);
            }
            return $this->handleBaseExceptions($this->ConvertToBaseExceptions($throwable));
        });
    }

    private function handleBaseExceptions(BaseException $exception)
    {
        return $exception->getResponse()->response();
    }

    private function ConvertToBaseExceptions(Throwable $throwable): InternalServerErrorException
    {
//        return $throwable;
        return new InternalServerErrorException('', 0, $throwable);
    }
}
