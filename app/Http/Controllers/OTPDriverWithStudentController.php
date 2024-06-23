<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentWithDriver;
use App\Models\Driver;
use App\Models\OTPDetailsDriverWithStudent;
use App\Models\OTPVerifiedDriverWithStudent;
use Carbon\Carbon;

class OTPDriverWithStudentController extends Controller
{
    public function sendOTP() //this section send otp
    {
        // StudentWithDriver
        // return "otp send";
        $mobileNumbers = Driver::latest('id')->get(); // Retrieve all unique mobile numbers
        foreach ($mobileNumbers as $mobile) {
$otp = mt_rand(1000, 9999); // Generate a unique OTP
session(['otp' . $mobile => $otp]); // Store OTP in session with a unique key for each mobile number
$message = "Dear Customer your OTP for Registration on BachatCoins is $otp";
$to = $mobile->mobile;

$content = http_build_query([
    'apikey' => '8PJkEksujUifEWVi4azGXA',
    'senderid' => 'SSEPLB',
    'channel' => 'trans',
    'DCS' => 0,
    'flashsms' => 0,
    //  'username' => 'bachatcoins',
    //  'password' => '123456',
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
    return 'cURL error: ' . curl_error($ch);
}
else {
    // {"ErrorCode":"000","ErrorMessage":"Done","JobId":"25287421","MessageData":[{"Number":"919889414137","MessageId":"sMbB8ElA9UmgvsO9n6re5g"}]}

    $responseDecoded = json_decode($response, true);
    if (isset($responseDecoded['ErrorCode']) && $responseDecoded['ErrorCode'] === '000') {

        

// Save OTP details
$otpdetails = new OTPDetailsDriverWithStudent();
$otpdetails->driver_ID = $mobile->driver_ID;
$otpdetails->name = $mobile->name;
$otpdetails->gender = $mobile->gender;
$otpdetails->dob = $mobile->dob;
$otpdetails->mobile = $mobile->mobile;
$otpdetails->alternate_mobile = $mobile->alternate_mobile;

$otpdetails->document_type = $mobile->document_type;
$otpdetails->document = $mobile->document;
$otpdetails->pin_code = $mobile->pin_code;
$otpdetails->driver_image = $mobile->driver_image;
$otpdetails->driver_vehicle_Number = $mobile->driver_vehicle_Number;
$otpdetails->vehicle_Color = $mobile->vehicle_Color;
$otpdetails->vehicle_Type = $mobile->vehicle_Type;
$otpdetails->OTP = $otp;
$otpdetails->save();
}


else {
    return "Failed to send OTP. Response: " . $response;
}
}
}

curl_close($ch);


return  redirect()->back();
    

}
public function SendOTPDetails()
{
    $DriverOTPDetails=OTPDetailsDriverWithStudent::latest('id')->get();
    return view('Backend.OtpDriverDetails',compact('DriverOTPDetails'));
}

public function DriverOtpVerification(request $request)
{
    $today = Carbon::today()->format('Y-m-d'); // Get today's date in 'Y-m-d' format

    // $otp= StudentOTPVerification::where('OTP',$request->MobileOTP)->whereDate('Created_at',$today)->first();
        $checkExistRecord=OTPVerifiedDriverWithStudent::where('OTP',$request->MobileOTP)->whereDate('Created_at',$today)->exists();
        $verification=OTPDetailsDriverWithStudent::where('OTP',$request->MobileOTP)->whereDate('Created_at',$today)->first();

       if ($checkExistRecord) {
        // return redirect()->back()->with('success','details Not found');
        // return back()->with('Fai', 'Success! User created');
        $notification = array(
            
            'alert-type' => 'success',
            'message' => 'Already Verified',
        );
        
        return redirect()->back()->with($notification);

        
       }
       elseif($verification){
        return view('Frontend.DriverOTPVerification',compact('verification'));

       }
       else{
        $notification = array(
          
            'alert-type' => 'error',
            'message' => 'Wrong OTP'
        );
        return redirect()->back()->with($notification);
        // return back()->with('error', 'Failed! User not created');

       }
      

       
   
//    return $request->all(); //MobileOTP
}
public function DriverOtpVerificationStore(request $request){
            //get all student realated to driver id
         $getAllStudent= StudentWithDriver::where('Driver_id',$request->Driver_id)->get();

       
    // return $request->Driver_id;
//  return $request->all();
            // register_id	name	Mobile	image	meeting	otp
            $img = $request->image;
            // $folderPath = date('d-m-y')."-Visitor_Image/";
            // $folderPath = 'uploads/Pre_Registraion/' . date('d-m-y') . '-Visitor_Image/';
            $folderPath = 'uploads/Driver_verification/' . date('d-m-y') . '-Driver_OTP/';

            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = $request->Driver_name.'-'.uniqid() . '.png';
    


            $DriverVerification=new OTPVerifiedDriverWithStudent();
            // $DriverVerification->studnet_id=$request->id;
            $DriverVerification->driver_ID=$request->Driver_id;
             $DriverVerification->name=$request->Driver_name;
             $DriverVerification->mobile=$request->Mobile;
             $DriverVerification->driver_vehicle_Number=$request->vehicle_number;
             $DriverVerification->Status=$request->message;
             $DriverVerification->otp=$request->otp;
             $DriverVerification->driver_image =  $folderPath.$fileName;

            //  $NewRegister->image=$fileName;
    
            $file = $folderPath . $fileName;
           // Create the directory if it doesn't exist
                if (!file_exists(public_path($folderPath))) {
                    mkdir(public_path($folderPath), 0777, true);
                }
                // Save the image to the specified path
                file_put_contents(public_path($file), $image_base64);
                        // Storage::put($file, $image_base64);
                        $status= $DriverVerification->save();

                        if($status)
                        {
                           


                            foreach ($getAllStudent as $value) {
                                $mobileNumber = $value->fatherMobile;
                                

                                $name = $request->Driver_name; // Assuming you have a valid way to get the driver's name
                                $customMessage = "$name Thank you for visiting"; // Corrected typo
                                $message = "Dear Customer, your OTP for Registration on BachatCoins is $customMessage";
                            
                                $result = sendSmsAndRedirect($mobileNumber, $message);
                               
                            }
                          
                            // return  $result = sendSmsAndRedirect($mobileNumber, $message);

                          
                            
                        }
                        
                           return redirect()->route('front.thanku')->with('message','Thank You For Visiting Our Campus');

        }
        public function DriverOtpVerificationDetails()
        {
            $DriverOTPDetails=OTPVerifiedDriverWithStudent::latest('id')->get();
            return view('Backend.DriverOTPVerifiyDetails',compact('DriverOTPDetails'));
        }
}
   

    

