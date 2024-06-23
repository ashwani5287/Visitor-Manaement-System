<?php

namespace App\Http\Controllers;
use Leomarriel\FaceDetector\FaceDetector;
use App\Models\Register;
use App\Models\PreRegister;
use Illuminate\Http\Request;
use App\Models\meetingCategory;
use App\Models\TimeSystem;
use App\Models\StudentOTPVerification;
use App\Models\visitorRegister;
use App\Models\PrevisitorRegister;
use Torann\GeoIP\Facades\GeoIP;

// use App\Helpers\CustomHelper;

use App\Helper\OTP_message;// call helper function here OTP_message
use Storage;
use Session;
use Auth;
use Carbon\Carbon;

class VisterController extends Controller
{


    public function index(){
        return view('Frontend.index');
    }

    public function WelcomePage()
    {
        return view('Thanku');
    }

    // **************************Visitor section another part

    public function  VisitorRegister(){
                
        return view('Frontend.VisitorRegister');
    }

    public function VisitorStore(request $request){
       
        $img = $request->image;
        $folderPath = 'uploads/New_Registration/' . date('d-m-y') . '-Visitor_Image/';

        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = $request->name.'-'.uniqid() . '.png';

        $NewRegister=new visitorRegister();
         $NewRegister->Name=$request->name;
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

        if ($status) {
            $mobileNumber = $request->Mobile;
            $name = $request->name;
            $customMessage = "$name Thank you for visiting";
            $message = "Dear Customer, your OTP for Registration on BachatCoins is $customMessage";
            
            $result = sendSmsAndRedirect($mobileNumber, $message);
            return $result;
        }
        else{
            return $status;
        }


       
        
        
//   id	register_id	studnet_id	name	Mobile	image	meeting	otp	
           return redirect()->route('front.thanku')->with('message','Thank You For Visiting Our Campus');
        }

//**********************Pre Visitor******************* */

        public function preVisitor()
        {
        //    return $previstorData = $request->session()->get('previstorData');

            $data= Session::get('previstorData');
            // return $data->Mobile;
            // die;
            $DirectMobile= $data->Mobile;
            $getExistingRecord= visitorRegister::where('Mobile',$data->Mobile)->first();   
            $getMeetingCategory=meetingCategory::latest('id')->get();
            // return view('Frontend.Register')
            if($getExistingRecord){
                return view('Frontend.VisitorPreRegister',compact('getExistingRecord','getMeetingCategory','DirectMobile'));

            }
            else
            {
                 return redirect()->back();
            }
    
        }
        public function preVisitorStore(request $request)
        {
        //    return $request->all();
        // $FindExistingRecord = visitorRegister::where('Mobile', $request->Mobile)->first();
        // if ($FindExistingRecord) {
            $img = $request->image;
            // $folderPath = date('d-m-y')."-Visitor_Image/";
            $folderPath = 'uploads/Pre_Registraion/' . date('d-m-y') . '-Visitor_Image/';
        
            
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = $request->name . '-' . uniqid() . '.png';
            // return  $folderPath.$fileName;
            $NewRegister = new PrevisitorRegister();
            $NewRegister->Name = $request->name;
            if ($request->message) {
                $NewRegister->meeting = $request->message;
            } else {
                $NewRegister->meeting = $request->Othermessage;
            }
            $NewRegister->mobile = $request->Mobile;
            $NewRegister->image =  $folderPath.$fileName;
        
            $file = $folderPath . $fileName;
            // Create the directory if it doesn't exist
            if (!file_exists(public_path($folderPath))) {
                mkdir(public_path($folderPath), 0777, true);
            }
            // Save the image to the specified path
             file_put_contents(public_path($file), $image_base64);
        
            $status = $NewRegister->save();
            if ($status) {
                $mobileNumber = $request->Mobile;
                $name = $request->name;
                $customMessage = "$name Thank you for visitings";
                $message = "Dear Customer, your OTP for Registration on BachatCoins is $customMessage";
                
                $result = sendSmsAndRedirect($mobileNumber, $message);
                return $result;
                

                // $customeMessage= "Thanku for visiting our campus";
                // // session(['otp' . $mobile => $otp]); // Store OTP in session with a unique key for each mobile number
                // $message = "Dear Customer your OTP for Registration on BachatCoins is $customeMessage";
                // $to =  $request->Mobile;

                // $content = http_build_query([
                // 'apikey' => '8PJkEksujUifEWVi4azGXA',
                // 'senderid' => 'SSEPLB',
                // 'channel' => 'trans',
                // 'DCS' => 0,
                // 'flashsms' => 0,
                // //  'username' => 'bachatcoins',
                // //  'password' => '123456',
                // 'number' => $to,
                // 'text' => $message,
                // 'route' => '08',

                // ]);
                // $apiUrl = 'http://182.18.162.128/api/mt/SendSMS?'.$content;

                // $ch = curl_init($apiUrl);

                // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                // curl_setopt($ch, CURLOPT_TIMEOUT, 30); // Optional: set a timeout
                // curl_setopt($ch, CURLOPT_HTTPGET, true);

                // $response = curl_exec($ch);

                // if (curl_errno($ch)) {
                // return 'cURL error: ' . curl_error($ch);
                // }
                // // elseif()
                // else {
                // // // {"ErrorCode":"000","ErrorMessage":"Done","JobId":"25287421","MessageData":[{"Number":"919889414137","MessageId":"sMbB8ElA9UmgvsO9n6re5g"}]}

                // // $responseDecoded = json_decode($response, true);
                // // if (isset($responseDecoded['ErrorCode']) && $responseDecoded['ErrorCode'] === '000') {

                // // }
                // //otp send thanku for visting our campuse
                // return redirect()->route('front.thanku')->with('message', 'Thank You For Visiting Our Campus');
            }}}
            
        
    // }

