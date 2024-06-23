<?php

namespace App\Http\Controllers\role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function redirectUser(){
        if (auth()->user()->hasRole('SuperAdmin')) {
            // dd('admin');
            return redirect()->route('admin.dashboard');
            // return redirect()->intended('/admin/dashboard');

        }
    
        if (auth()->user()->hasRole('Reporter')) {
            
            return redirect()->route('reporter.dashboard');

        }
    
        if (auth()->user()->hasRole('Editer')) {
           
     
            return redirect()->route('editer.dashboard');

        }
    
        if (auth()->user()->hasRole('User')) {
            
            return redirect()->route('User.dashboard');

        }
    
        // Default redirect if no role matches
        return redirect('/');
    }
}
