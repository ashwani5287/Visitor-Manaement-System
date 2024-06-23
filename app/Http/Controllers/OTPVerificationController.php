<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vonage\Client\Credentials\Basic as VonageBasic;
use Vonage\Client as VonageClient;
use Vonage\SMS\Message\SMS;
use App\Models\StudentOTPVerification;
use App\Models\Register;
use App\Models\meetingCategory;
use App\Models\AddStudentDetails;
use App\Models\StudentOTPDetails;
use Carbon\Carbon;
class OTPVerificationController extends Controller
{
// ONly Related TO Student
    public function verifyStudentOTP(Request $request)
    {
        $today= now();

        $today = Carbon::today()->format('Y-m-d'); // Get today's date in 'Y-m-d' format

        $otp= StudentOTPVerification::where('OTP',$request->MobileOTP)->whereDate('Created_at',$today)->first();
        if ($otp) {
            return redirect()->back()->with('message','OTP Already Verified');
        }
           
        else
        {

          
       
        $verification=StudentOTPDetails::where('StudentOTP',$request->MobileOTP)->whereDate('Created_at',$today)->first();
        if($verification){


            return view('Frontend.StudentOTPVerification',compact('verification'));

        }
        else{
            return redirect()->back();
        }
    }
   
    }
        public function verifyStudentStore(request $request)
        {
             
            // return $request->all();
            // register_id	name	Mobile	image	meeting	otp
            $img = $request->image;
            // $folderPath = date('d-m-y')."-Visitor_Image/";
            // $folderPath = 'uploads/Pre_Registraion/' . date('d-m-y') . '-Visitor_Image/';
            $folderPath = 'uploads/Student_verification/' . date('d-m-y') . '-Student_OTP/';

            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = $request->name.'-'.uniqid() . '.png';
    
            $NewRegister=new StudentOTPVerification();
            $NewRegister->studnet_id=$request->id;

             $NewRegister->Name=$request->name;
             $NewRegister->Father=$request->father;
             $NewRegister->class=$request->Class;
             $NewRegister->Section=$request->Section;

             $NewRegister->OTP=$request->otp;




             if($request->message)
             {
                $NewRegister->meeting=$request->message;
             }
             else
             {
                $NewRegister->meeting=$request->Othermessage;
             }
             $NewRegister->mobile=$request->Mobile;
            
            
             $NewRegister->image =  $folderPath.$fileName;

            //  $NewRegister->image=$fileName;
    
            $file = $folderPath . $fileName;
           // Create the directory if it doesn't exist
                if (!file_exists(public_path($folderPath))) {
                    mkdir(public_path($folderPath), 0777, true);
                }
                // Save the image to the specified path
                file_put_contents(public_path($file), $image_base64);
                        // Storage::put($file, $image_base64);
                        $status= $NewRegister->save();
                    //send otp after otp verification
                          $mobileNumber = $request->Mobile;
            $name = $request->name;
            $customMessage = "$name Thank you for visiting";
            $message = "Dear Customer, your OTP for Registration on BachatCoins is $customMessage";
            
            $result = sendSmsAndRedirect($mobileNumber, $message);
            return $result;
                        
                        //    return redirect()->route('front.thanku')->with('message','Thank You For Visiting Our Campus');

        }

    // die;
    // return view('Frontend.otptesting');

    
    // return view('Frontend.otptesting');


    public function SendOTPAllStudent()
    {
        

        $mobileNumbers = AddStudentDetails::latest('id')->get(); // Retrieve all unique mobile numbers
            foreach ($mobileNumbers as $mobile) {
    $otp = mt_rand(1000, 9999); // Generate a unique OTP
    session(['otp' . $mobile => $otp]); // Store OTP in session with a unique key for each mobile number
    $message = "Dear Customer your OTP for Registration on BachatCoins is $otp";
    $to = $mobile->fatherMobile;
   
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
    }
    
    else
    {
        $responseDecoded = json_decode($response, true);
        if (isset($responseDecoded['ErrorCode']) && $responseDecoded['ErrorCode'] === '000') {
    
   
        
    // Save OTP details
    $otpdetails = new StudentOTPDetails();
    $otpdetails->register_id = $mobile->id;
    $otpdetails->StudentName = $mobile->name;
    $otpdetails->FatherName = $mobile->stuFather;
    $otpdetails->FatherMobile = $mobile->fatherMobile;
    $otpdetails->AdmissionNo = $mobile->admissionNo;
    $otpdetails->StudentSection = $mobile->stusection;

    $otpdetails->StudentClass = $mobile->stuclass;

    $otpdetails->StudentOTP = $otp;
    $otpdetails->save();

    }
    
else {
    return "Failed to send OTP. Response: " . $response;
}}}
return redirect()->route('verification.StudentSendOtpDetails')->with('message','OTP SEND Successfully');

    curl_close($ch);


return redirect()->route('verification.StudentSendOtpDetails')->with('error','Failed to send OTP. Response:' . $response);

// return  redirect()->back();
    }


    public function StudentSendOtpDetails(){
            $StudentOTPDetails=StudentOTPDetails::latest('id')->get();
        return view('Backend.StudentSendOtp',compact('StudentOTPDetails'));
    }
  public function StudentSendOtpVerifyed(){
     $StudentOTPVerified=StudentOTPVerification::latest('id')->get();
    return view('Backend.VerifyedStudent',compact('StudentOTPVerified'));
    }


    public function OTPVerifcation(){






die;




        return response()->json("nice work");
            // return $request->MobileOTP();
        $verification=StudentOTPVerification::where('otp',$request->MobileOTP)->first();
        if ($verification) {
            
            // return  response()->json('message'$data, 200);
            return response()->json($verification);

        }
        else
        {
            return response()->json($verification);
        }
        return redirect()->back();
        // 8508
        // $StudentOTPVerification='1000000000';
        // $otp = rand(1000, 9999);
        //   return  $update=StudentOTPVerification::where('Mobile',$StudentOTPVerification)->update([

        //         'otp'=>$otp,
        //     ]);

            die;
         // Validate phone number
        //  $request->validate([
        //     'phone' => 'required|numeric',
        // ]);
            $phone="+9179";
        // Generate a 6-digit OTP code
        $otp = rand(100000, 999999);

        
        session(['otp' => $otp]);

        // Vonage credentials from config
        $basic  = new VonageBasic(config('services.vonage.key'), config('services.vonage.secret'));
        $client = new VonageClient($basic);

        // Create and send the SMS
        $response = $client->sms()->send(
            new SMS($phone, 'Ashwani', 'Your OTP code is: ' . $otp)
        );

        // Get the response message
        $message = $response->current();
        

        if ($message->getStatus() == 0) {
            return response()->json(['success' => true, 'message' => 'The OTP was sent successfully.'. $message->getStatus()]);
        } else {
            return response()->json(['success' => false, 'message' => 'The OTP failed with status: ' . $message->getStatus()]);
        }
    

    }

}
