<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreateRole;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\CreateRoleUser;
use App\Models\User;
use App\Models\LoginDetails;
use Auth;
class RoleController extends Controller
{
    
    public function AssignRole(){
        
        //  $roleAssign=CreateRole::latest('id')->get();
        //   $AllRoleUser=CreateRoleUser::latest('id')->get();
        $AllRoleUser=user::latest('id')->get();
        return view('Backend.role',compact('AllRoleUser'));
    }



    public function CreateRoleUser(request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|string|min:10|max:15',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:SuperAdmin,Admin,User'
        ]);


        
        
        
    
        if ($validator->fails()) {
            // return response()->json($validator->errors(), 422);
            return redirect()->back()->with('error', $validator->errors());

        }
       
        $userData = [
            'name' =>  $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->input('password')),
            'role'=>$request->role,
            'mobile'=>$request->mobile,
        ];
        
        $admin = User::create($userData);
        
        // Use firstOrCreate to avoid duplicating the role
        $adminRole = Role::firstOrCreate(['name' => $request->role, 'guard_name' => 'web']);
        
        $admin->assignRole($adminRole);
        
        return redirect()->back()->with('message', 'User created successfully!');
      
    }

    public function UpdateUserRole(request $request){

            // Retrieve the user to be updated
    $user = User::latest('id')->where('id',$request->RoleId)->first();

    // Validate the request data
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'mobile' => 'required|string|min:10|max:15',
        'password' => 'nullable|string|min:8|confirmed',  // Password is nullable for update
        'role' => 'required|string|in:SuperAdmin,Admin,User,0'
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Update user details
    $user->name = $request->name;
    $user->email = $request->email;
    $user->mobile = $request->mobile;
    $user->role = $request->role;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    // Update the user's role if it has changed
    $newRole = Role::firstOrCreate(['name' => $request->role, 'guard_name' => 'web']);
    if (!$user->hasRole($newRole->name)) {
        $user->syncRoles([$newRole]);
    }

    return redirect()->back()->with('message', 'User updated successfully!');

     
    }

    public function DeleteUserRole(request $request){
           
        $getData= User::where('id',$request->id);
            $status=  $getData->delete();
            if($status)
            {
                return redirect()->back()->with('message','Data Delete successfully');

            }
            else{
                return redirect()->back()->with('error','Something went wrong');

            }
    }

   
      


    //Role Creating section
    public function CreateRole() {
        $role=CreateRole::latest('id')->get();
        return view('Backend.CreateRole',compact('role'));
    }
    public function StoreRole(request $request) {

        $validate=$request->validate([
            'role'=>'required|unique:create_roles,roleName',
        ]);
            $role=CreateRole::create([
                'roleName'=>$request->role,
            ]);
            if($role)
            {
                return  redirect()->back();
            }
    }


    public function DeleteRole(request $request){
        $getData= CreateRole::where('id',$request->id);
        $status=  $getData->delete();
        if($status)
        {
            return redirect()->back()->with('message','Data Delete successfully');

        }
        else{
            return redirect()->back()->with('message','Something went wrong');

        }
     }

     public function UpdateRole(request $request){

        $update=CreateRole::where('id',$request->Roleid)->update([
            'roleName'=>$request->role,
          
            // 'Email'=>$request->email
            // 'Password'

           ]);
           if($update)
           {
            return redirect()->back();

           }
        
        // return $request->all();
     }




    public function LoginDetails()
    {
        $loginDetails= LoginDetails::latest('id')->get();
            return view('Backend.LoginDetails',compact('loginDetails'));
    }



    

}
