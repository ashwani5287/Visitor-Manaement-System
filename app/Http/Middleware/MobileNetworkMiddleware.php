<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\IPModel;
use Torann\GeoIP\Facades\GeoIP;
class MobileNetworkMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       // Fetch all stored IPs from the database
       $storedIPs = IPModel::pluck('YourIP')->toArray();

       // Check if there are any stored IPs
       if (empty($storedIPs)) {
           // Handle the case when IPModel has no records
           return response('Unauthorized, No IPs configured.', 401);
       }

       // Get the client's IP address
       $clientIP = $request->ip();
    //    return response($clientIP);

       // Check if the client's IP matches any of the stored IPs
       if (!in_array($clientIP, $storedIPs)) {
           // Return unauthorized response if IPs do not match
           return response('Unauthorized, Wrong wifi network.', 401);
       }

       // If the IP matches, proceed with the request
       return $next($request);
   }}

