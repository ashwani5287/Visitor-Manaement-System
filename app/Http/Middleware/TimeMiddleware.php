<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\TimeSystem;
use Illuminate\Support\Facades\Auth;

use Symfony\Component\HttpFoundation\Response;

class TimeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $getTime = TimeSystem::first();
     $current_time = time(); // Current Unix timestamp
 $open_time = strtotime($getTime->OpenSchool);
$close_time = strtotime($getTime->CloseSchool);

if ($current_time <= $close_time) {
            // It's working time
            // Auth::logout();
            // return "Working time";
        } else {
            // It's not working time
            // Auth::logout();
            return response('school time over please reset.', 401);
        //  return redirect()->route('logout');
            // session()->forget('id');
            // return 'Not working';
        }
        return $next($request);
    }
}
