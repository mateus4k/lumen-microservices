<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthenticateAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $valid_secrets = explode(',', env('ACCEPTED_SECRETS'));

        if (in_array($request->header('Authorization'), $valid_secrets)) {
            return $next($request);
        }

        return abort(Response::HTTP_UNAUTHORIZED);
    }
}
