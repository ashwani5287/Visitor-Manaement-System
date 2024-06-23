<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Register;
use App\Models\meetingCategory;
use App\Models\PrevisitorRegister;
use App\Models\visitorRegister;

class UserMobileOtpVerifyController extends Controller
{
    // if()
    public function SendOTP(request $request){
        $mobileNumberLength = strlen($request->mobile);
        $exists = visitorRegister::where('Mobile', $request->mobile)->exists();

        if ($mobileNumberLength != 10) {
            // Mobile number length is correct
            return response()->json(['status'=>'0']);//You Are Already Register Please Click on pre-register

            // echo "Mobile number length is valid";
        } 
        
       if($exists)
       {
        $previstorData = visitorRegister::where('Mobile', $request->mobile)->first();
        Session::put('previstorData', $previstorData);

        return response()->json([
            'status' => 1,
            'redirect_url' => route('front.preVisitor'),
            
        ]);
        
        
        
       
        // return response()->json([
        //     'status' => 1,
        //        'redirect_url' => route('front.preVisitor'),
        // ]);
        // return response()->json(['status'=>'1']);//You Are Already Register Please Click on pre-register


       }
       else{

       

        $to = $request->mobile;
        // return  response()->json($to);
        $otp = rand(1000, 9999);
    //  $otp='1234';
        $getMeetingCategory=meetingCategory::latest('id')->get();

        // Store the OTP value in the session
        Session::put('Userotp', $otp);
        Session::put('mobileNo', $to);
        Session::put('category', $getMeetingCategory);



        
             Session::get('Userotp');
        // Return the OTP as a JSON response
       
        

        // session_unset('otp');
        // Store OTP in session with a unique key for each mobile number
        $message = "Dear Customer your OTP for Registration on BachatCoins is $otp";
        
       
        $content = http_build_query([
            'apikey' => '8PJkEksujUifEWVi4azGXA',
            'senderid' => 'SSEPLB',
            'channel' => 'trans',
            'DCS' => 0,
            'flashsms' => 0,
             'username' => 'bachatcoins',
             'password' => '123456',
            'number' => $to,
            'text' => $message,
            'route' => '08',
    
        ]);
        $apiUrl = 'http://182.18.162.128/api/mt/SendSMS?'.$content;
            
        $ch = curl_init($apiUrl);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); // Optional: set a timeout
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        
        $response = curl_exec($ch);
        
        if (curl_errno($ch)) {
            echo 'cURL error: ' . curl_error($ch);
            // return response()->json(['status'=>'2']);//Someting went wrong
            return response()->json(['status'=>'2']);//Someting went wrong

        }
        else{
            // return response()->json(['status'=>'3']);//OTP send Successfully
            return response()->json(['status'=>'3']);//Someting went wrong

        }
        curl_close($ch);
        // return  response()->json( $response);

                // if($response.ErrorCode==='0')
                // {
                   
                //}
                response()->json($response);
                }
            
        
            
}
    public function verifyOtp(request $request)
    {
        if($request->ajax())
        {
            
       
        $GeneratedOtp = Session::get('Userotp');
        // $DirectMobile = '9999999';
        // $getExistingRecord = '';   
        // $getMeetingCategory = meetingCategory::latest('id')->get();
        
        if ($GeneratedOtp == $request->otp) {
            // return view('frontend.register');
            // return response()->json(['success' => true, 'redirect_url' => route('front.VisitorRegister')->with()]);


            return response()->json([
                'status' => true,
                'redirect_url' => route('front.VisitorRegister'),
               
            ]);
            




            // return response()->json("verify otp");

        } else {
            return response()->json("wrong otp");

           // return redirect()->route('frontend.register')->with('error', 'Wrong OTP');
        }
    }
    }
       
   
}
