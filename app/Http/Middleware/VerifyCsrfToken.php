<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    protected $except = [
        '/dang-ky',  // Exclude the registration route from CSRF verification
        '/dang-nhap', // Exclude login route from CSRF verification (if needed)
    ];
}
