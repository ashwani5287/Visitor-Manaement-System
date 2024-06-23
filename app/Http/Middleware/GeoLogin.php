<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Torann\GeoIP\Facades\GeoIP;

class GeoLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $officeLatitude = 41.31;
        // $officeLongitude = -72.92;

        // $userLocation = GeoIP::getLocation();

        // // Compare the user's location with your office location
        // if ($userLocation->lat != $officeLatitude || $userLocation->lon != $officeLongitude) {
        //     return redirect()->route('school.loginForm')->with('error', 'Access restricted. Please login from the office location.');
        // }
        return $next($request);
    }
}
