<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\LoginDetails;
use Illuminate\Support\Facades\Log;

use App\Models\User;
class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next, string ...$guards): Response
    // {
       

        public function handle($request, Closure $next, ...$guards)
        {
// Retrieve the user by their email
// $User = User::where('email', $request->email)->first();

// Define guards if necessary
$guards = empty($guards) ? [null] : $guards;

foreach ($guards as $guard) {
    // Check if the user is authenticated under the current guard
    if (Auth::guard($guard)->check()) {

        // Insert login details into the LoginDetails table
        // LoginDetails::create([
        //     'name' => $User->name,      // Assuming 'name' is the correct attribute
        //     'email' => $User->email,    // Assuming 'email' is the correct attribute
        //     'role_type' => $User->role, // Adjusted to use snake_case
        //     'status' => $User->status
        // ]);

        // Redirect to the home page after inserting the login details
        return redirect(RouteServiceProvider::HOME);
    }
}

// If the user is not authenticated, proceed with the next middleware
return $next($request);
        }


        // $User = user::where('email', $request->email)->first();
    //     $guards = empty($guards) ? [null] : $guards;
    //     // return  response($request->all());
    //     foreach ($guards as $guard) {
            

    //         if (Auth::guard($guard)->check()) {
    //             return redirect(RouteServiceProvider::HOME);

    //         }
           
    //     }
    //     return $next($request);
       
    // }
}


// $LoginDetails=LoginDetails::create([
//     // name	email	role-type	status
//         'name'=>$User->Name,
//         'email'=>$User->Email,
//         'role-type'=>$User->role,
//         'status'=>$User->status
// ]);