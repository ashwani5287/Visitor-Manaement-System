<?php

namespace App\Http\Controllers;
use App\Models\Register;
use App\Models\PreRegister;
use App\Models\meetingCategory;
use App\Models\TimeSystem;
use App\Models\visitorRegister;
use App\Models\PrevisitorRegister;
use App\Models\IPModel;
use App\Models\StudentOTPDetails;
use App\Models\StudentOTPVerification;

// use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\User;
use Auth;
use Zxing\QrReader;
use Carbon\Carbon; 
use Hash;



class BackendController extends Controller
{
    public function dashboard()
    {

        $today = Carbon::today()->format('Y-m-d'); // Get today's date in 'Y-m-d' format

        $StudentNotVerify= StudentOTPDetails::whereDate('Created_at',$today)->count();
         $StudentVerify=StudentOTPVerification::whereDate('Created_at',$today)->count();
        // $StudentVerify=
        // $StudentNotVerify

       
        //   return QrCode::size(200)->generate('9889414137');
         $todayPreRegi = PreRegister::whereDate('created_at', Carbon::today())->count();
         $todayRegi = Register::whereDate('created_at', Carbon::today())->count();

        $NewRecord=visitorRegister::count();
        $PreRegister =PrevisitorRegister::count();
        // $PreRegister =PreRegister::count();
        return view('Backend.dashboard',compact('NewRecord','PreRegister','todayRegi','todayPreRegi','StudentVerify','StudentNotVerify'));
    }
    public function NewRegister()
    {
        
        // $NewRecord=Register::latest('id')->get();
         $NewRecord=visitorRegister::latest('id')->get();

        return view('Backend.NewRegister',compact('NewRecord'));
    }
    public function PreRegister()
    {
        // $PreRegister =PreRegister::latest('id')->get();
        $PreRegister =PrevisitorRegister::latest('id')->get();

        
        return view('Backend.preRegister',compact('PreRegister'));
        
    }
    public function meetingCategory()
    {
        $category=meetingCategory::latest('id')->get();
        return view('Backend.meeting_category',compact('category'));
    }
    public function meetingCategoryStore(request $request )
    {
           $category=meetingCategory::create([
            'message'=>$request->category
           ]);
           if ($category) {
                return  redirect()->back()->with('message','Meeting Category Successfully saved!');
           }
           else
           {
            return  redirect()->back()->with('message','Something went wrong');
           }  
    }

    public function meetingCategoryDelete($id){

        $category=meetingCategory::findorfail($id);
       $category->delete();
       
       return  redirect()->route('admin.Meeting')->with('success','Deleted');
       
    }

    public function meetingCategoryUpdate(request $request){
    //     "Categoryid": "8",
    // "category": "Meeting with Student"
           $update=meetingCategory::where('id',$request->Categoryid)->update([
            'message'=>$request->category
           ]);
           return redirect()->back()->with('success','Updated');
    }

    // public function generateQr()
    // {
    //     Route::get('/qrcode', function () {
    //         return QrCode::size(200)->generate('https://example.com');
    //     });
    // }


public function Profile(){
    return view('Backend.Profile');
}

public function ProfileImageUpdate(request $request){

    $user = User::where('id', Auth::user()->id)->first();
    $data = $user;
    
    if ($user->profile_photo_path) {
        if ($request->file('image')) {
            $file = $request->file('image');
            unlink(public_path('Profile_image'). '/' . $user->profile_photo_path);
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('Profile_image'), $filename); 
            $data->profile_photo_path = $filename; 
            // unlink(public_path('Profile_image'), $user->profile_photo_path);
           

            // unlink(public_path("user_images/{$users[0]->image}"));
        }
    }
     else {
        $file = $request->file('image');
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('Profile_image'), $filename);
        $user->profile_photo_path = $filename; 
    }
    
    $user->save();
    
    return redirect()->back();
    
    // profile_photo_path
    // "profile_id": "1",
    // "image": "logo-removebg-preview (2).jpg"

}

public function ProfilePasswordUpdate(request $request)
{
   
    $user = User::findOrFail($request->userId);

    if ($request->oldpassword) {
        if (Hash::check($request->oldpassword, $user->password)) {
            if (strlen($request->newpassword) >= 8) {
                $user->password = Hash::make($request->newpassword);
                $status = $user->update();
                if ($status) {
                    return redirect()->back()->with('message', 'Password Successfully Updated');
                } else {
                    return redirect()->back()->with('error', 'Failed to update password');
                }
            } else {
                return redirect()->back()->with('error', 'New password must be at least 8 characters long');
            }
        } else {
            return redirect()->back()->with('error', 'Old password does not match');
        }
    } else {
        return redirect()->back()->with('error', 'Old password is required');
    }
    
    }
    


    public function logout()
    {
            Auth::logout();


       
        return redirect()->route('front.home');
        

    }

    public function timeSystem(){
        $timesystem=TimeSystem::first();
        return view('Backend.TimeSystem',compact('timesystem'));
    }
    public function UpdateTimeSystem(request $request){
            $time= TimeSystem::where('id',$request->TimeSystemId)->update([

                'OpenSchool' => $request->TimeSystemOpen,
                'CloseSchool'=>$request->TimeSystemClose,

            ]);

            return redirect()->back();
    }
//ip section
    public function ipManage(){
           $IPModel=IPModel::latest()->get();
        return view('Backend.IPManage',compact('IPModel'));
        // YourIP
    }
    public function IPUpdate(request $request){
            $updateIp=IPModel::where('id',$request->IP_id)->update([
          
                'YourIP' => $request->IPNumber,

            ]);
            return redirect()->back()->with('message','IP Address Updated');

            // return  redirect()->back();
    }
    public function IPAdd(request $request){
        $AddIp= new IPModel();
        $AddIp->YourIP=$request->IPNumber;
       $status= $AddIp->save();
       if($status){
        return redirect()->back()->with('message','IP Address Added');
       }
       return redirect()->back()->with('error','Not  Added');
    }

    public function DeleteIP(request $request){
        $IPModel=IPModel::where('id',$request->id)->first();
        if ( $IPModel->delete()) {
            return redirect()->back()->with('message','IP Address Deleted');

        }
        return redirect()->back()->with('error','Not  Deleted');


       
    }
}
