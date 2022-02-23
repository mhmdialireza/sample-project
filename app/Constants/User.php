<?php

namespace App\Constants;

enum User: string
{
    case NOT_FOUND = 'کاربری با مشخصات وجود ندارد.';
    const UNAUTHENTICATED = 'اجازه دسترسی وجود ندارد.';
}
