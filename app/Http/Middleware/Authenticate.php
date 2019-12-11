<?php

namespace App\Http\Middleware;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{

    /**
     * @param \Illuminate\Http\Request $request Request
     * @param array $guards Guards
     * @throws \Exception
     */
    protected function unauthenticated($request, array $guards)
    {
        if ($request->expectsJson()) {
            throw new \Exception('100401',401);
        }
    }
}
