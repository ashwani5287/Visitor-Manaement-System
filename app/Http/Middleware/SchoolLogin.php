<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Session;

class SchoolLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {


        if (!Session::has('id')) {
            return response('school time over please reset.', 401);

            // return response()->json('school time over please reset');
            // return redirect()->route('school.loginForm');
        }
        
        return $next($request);
    }
}
