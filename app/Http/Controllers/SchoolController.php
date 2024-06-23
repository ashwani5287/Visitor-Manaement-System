<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\SchoolLogin;
use App\Models\CreateRole;
use App\Models\CreateRoleUser;
use App\Models\LoginDetails;
use Torann\GeoIP\Facades\GeoIP;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use App\Models\User;
 use Session;

class SchoolController extends Controller
{
    public function index()
    {

   
        // return Request::ip;

        // $admin_role=role::create(['name'=>'admin']);
        // $admin=user::create([
        //     'name'=>'admin',
        //     'email'=>'admin1@gmail.com',
        //     'password'=>bcrypt('1')
        // ]);
        // $admin->assignRole($admin_role);

        

        // $staff_role=role::create(['name'=>'staff']);
        // $staff=user::create([
        //     'name'=>'staff',
        //     'email'=>'staff1@gmail.com',
        //     'password'=>bcrypt('1')
        // ]);
        // $staff->assignRole($staff_role);

        // $user_role=role::create(['name'=>'user']);
        // $user=user::create([
        //     'name'=>'user',
        //     'email'=>'user1@gmail.com',
        //     'password'=>bcrypt('1')
        // ]);
        // $user->assignRole($user_role);





        $location = geoip(request()->ip());
         $userLocation = GeoIP::getLocation();
         $userLocation->lon;

        
        $role=CreateRole::latest('id')->get();
        return view('School.loginForm',compact('role'));
    }
    public function Authenticate(request $request)
    {
        
     return   $User = CreateRoleUser::where('Email', $request->email)->first();
        if ($User) {
             if (Hash::check($request->password, $User->Password) && $request->role == $User->role) {
            //     Session::put('id', $User->id
            //                     'role',$User->
            // );


        // return $User;
         $LoginDetails=LoginDetails::create([
            // name	email	role-type	status
                'name'=>$User->Name,
                'email'=>$User->Email,
                'role-type'=>$User->role,
                'status'=>$User->status
        ]);

        if($LoginDetails)
        {
            return redirect()->route('front.home');
            // return redirect()->route('admin.Dashboard');
        }

        
       
        
    } else {


        // $notification = array(
        //     'message' => 'Incorrect credentials',
        //     'alert-type' => 'success'
        // );

        // $message=session()->flash('success', 'Thanku For supporting');
        return redirect()->back()->with('success', 'Incorrect credentials');
        // return redirect()->back()->with($notification);
        
        // return redirect()->route('school.loginForm')->with('success', 'Incorrect credentials.');
    }
} else {
    
    return redirect()->route('school.loginForm')->with('success', 'User not found.');
}

        // // $validated=$request->validate([
        // //     'email'=>'required|email'
        // // ]);
        // $User=CreateRoleUser::where('Email',$request->email)->first();
        // if ($User) {
        //     if (Hash::check($request->password, $User->Password && $request->role==$User->role)) {
        //         Session::put('id',$User->id);
        //         //write code for store details
        //       return redirect()->route('front.home');
        //     }
        //     else
        //     {
        //         // return ->with('message', 'flashValue')
        //         return redirect()->route('school.loginForm');
                
        //     }
        // }
        // else
        // {
        //     return redirect()->route('school.loginForm');
        // }
      
    
    }
    public function logout()
    {
      session()->forget('id');

        return redirect()->route('school.loginForm');
    }
}
