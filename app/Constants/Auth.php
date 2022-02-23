<?php

namespace App\Constants;

enum Auth :string
{
    case Register_SUCCESSFUL = 'ثبت نام با موفقیت انجام شد.';
    case LOGIN_SUCCESSFUL = 'ورود با موفقیت انجام شد.';
    case LOGOUT_SUCCESSFUL = 'خروج با موفقیت انجام شد.';
    case WRONG_PASSWORD = 'رمز عبور نامعتبر است.';
}
