<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\StudentWithDriver;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentWithDriverImport;

use Hash;
class DriverDetailsController extends Controller
{
    public function driver(){
     $allDriver=Driver::latest('id')->get();
        return view('Backend.DriverDetails',compact('allDriver'));
    }
    public function AddDriver(Request $request){

        // driver document
        $file = $request->file('document');
        $documentPath = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('uploads/Driver_documents/Document'), $documentPath);
        // $user->profile_photo_path = $filename; 

        //for driver image
        $file = $request->file('driver_image');
        $driverImagePath = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('uploads/Driver_documents/Image'), $driverImagePath);
        // $user->driver_image = $filename; 
        
        // $documentPath='';
        // $driverImagePath='';
        $driver = new Driver();
        $driver->driver_ID = rand(111,9999);
        $driver->name = $request->name;
        $driver->dob = $request->age;
        $driver->gender = $request->gender;
        $driver->mobile = $request->mobile;
        $driver->alternate_mobile = $request->alternate_mobile;
        $driver->document_type =$request->document_type;
        $driver->document = $documentPath;// upload document
        $driver->address = $request->address;
        $driver->pin_code = $request->pin_code;
        $driver->driver_image = $driverImagePath; //upload driver image
        $driver->driver_vehicle_Number =$request->driver_vehicle_Number;
        $driver->vehicle_Color = $request->vehicle_Color;
        $driver->vehicle_Type = $request->vehicle_Type;
        // $driver->Driver_email = 'driver1@gmail.com';
        
        // Perform additional operations if necessary
        // For example, you might want to set a default value or log the creation process
        
        if ($driver->save()) {
        //    return "Record successfully saved";
        return redirect()->route('school.driver');
        } else {
        //    return "Handle the failure case";
        }
        
            return redirect()->route('school.driver');
        // return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    }
    public function DeleteDriver(request $request)
    {
        $DriverDetails= driver::where('id',$request->id)->first(); //"driver_ID": "7622",
        if ($DriverDetails) {
           $status= $DriverDetails->delete();
           if( $status)
           {
            return back();
           }
        }
        return $request->all();
    }
    public function updateDriver(Request $request)
    {
    //    return  $user = $request->all();

       $driver=Driver::where('id',$request->id)->first();

    //    if(!$request->hasFile('NewDriver_image')){
        // $driver->name = $request->name;
        // $driver->dob = $request->age;
        // $driver->gender = $request->gender;
        // $driver->mobile = $request->mobile;
        // $driver->alternate_mobile = $request->alternateMobile;
        // $driver->document_type =$request->documentType;
        // $driver->document = $request->Olddriver_document;// upload document
        // $driver->address = $request->address;
        // $driver->pin_code = $request->pinCode;
        // $driver->driver_image = $request->Olddriver_image; //upload driver image
        // $driver->driver_vehicle_Number =$request->Driver_VehicleNo;
        // $driver->vehicle_Color = $request->color;
        // $driver->vehicle_Type = $request->Vehicle_type;
        // $driver->save();
        // }
        if ($request->hasFile('NewDriver_image')) {
            $oldImagePath = public_path('uploads/Driver_documents/Image/' . $driver->driver_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }

                // Handle the new image upload
                $file = $request->file('NewDriver_image');
                $driverImagePath = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('uploads/Driver_documents/Image'), $driverImagePath);

                // Assign the new image path to the driver model
                $driver->driver_image = $driverImagePath;

            $driver->name = $request->name;
            $driver->dob = $request->age;
            $driver->gender = $request->gender;
            $driver->mobile = $request->mobile;
            $driver->alternate_mobile = $request->alternateMobile;
            $driver->document_type =$request->documentType;
            $driver->document = $request->Olddriver_document;// upload document
            $driver->address = $request->address;
            $driver->pin_code = $request->pinCode;
            // $driver->driver_image = $request->driverImagePath; //upload driver image
            $driver->driver_vehicle_Number =$request->Driver_VehicleNo;
            $driver->vehicle_Color = $request->color;
            $driver->vehicle_Type = $request->Vehicle_type;
            $driver->save();
        }

        elseif($request->hasFile('Newdoument')){
            $oldDocumentPath = public_path('uploads/Driver_documents/Document/' . $driver->document);
            if (file_exists($oldDocumentPath)) {
                unlink($oldDocumentPath);
            }

            // Handle the new image upload
            $file = $request->file('Newdoument');
            $oldDocumentPath = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads/Driver_documents/Document'), $oldDocumentPath);

            // Assign the new image path to the driver model
            $driver->document = $oldDocumentPath;

        $driver->name = $request->name;
        $driver->dob = $request->age;
        $driver->gender = $request->gender;
        $driver->mobile = $request->mobile;
        $driver->alternate_mobile = $request->alternateMobile;
        $driver->document_type =$request->documentType;
        // $driver->document = $request->Olddriver_document;// upload document
        $driver->address = $request->address;
        $driver->pin_code = $request->pinCode;
        $driver->driver_image = $request->Olddriver_image; //upload driver image
        $driver->driver_vehicle_Number =$request->Driver_VehicleNo;
        $driver->vehicle_Color = $request->color;
        $driver->vehicle_Type = $request->Vehicle_type;
        $driver->save();
        }

        else
        {
            $driver->name = $request->name;
        $driver->dob = $request->age;
        $driver->gender = $request->gender;
        $driver->mobile = $request->mobile;
        $driver->alternate_mobile = $request->alternateMobile;
        $driver->document_type =$request->documentType;
        $driver->document = $request->Olddriver_document;// upload document
        $driver->address = $request->address;
        $driver->pin_code = $request->pinCode;
        $driver->driver_image = $request->Olddriver_image; //upload driver image
        $driver->driver_vehicle_Number =$request->Driver_VehicleNo;
        $driver->vehicle_Color = $request->color;
        $driver->vehicle_Type = $request->Vehicle_type;
        $driver->save();
        }
         

          return redirect()->back()->with('message','Update successfully');

    }

    //Add Student With Driver section

    public function Student(){
       $DriverDetails= driver::latest('id')->get(); //"driver_ID": "7622",
       $StudentWithDriver=StudentWithDriver::latest('id')->get();
        return view('Backend.AddStudentWithDriver',compact('DriverDetails','StudentWithDriver'));
    }
    public function AddStudentWithDriver(request $request){

        $addstudent = StudentWithDriver::create([
            'Driver_id'=>$request->Driver_id,
            'name' => $request->input('Student_name'),
            'stuFather' => $request->input('father_name'),
            'fatherMobile' => $request->input('father_mobile'),
            'admissionNo' => $request->input('stuAdmission'),
            'stusection' => $request->input('stuSection'),
            'stuclass' => $request->input('stuClass'),
            'image' => $request->input('image'),
        ]);
        if($addstudent){
            return  redirect()->back();
        }
        else
        {
            return  redirect()->back(); 
        }
    
    }

    public function updateStudent(request $request){

        
        $studentDetails=StudentWithDriver::where('id',$request->detailsID)->update([
            // 'Driver_id'=>$request->Driver_id,
            'name' => $request->input('Student_name'),
            'stuFather' => $request->input('father_name'),
            'fatherMobile' => $request->input('father_mobile'),
            'admissionNo' => $request->input('stuAdmission'),
            'stusection' => $request->input('stuSection'),
            'stuclass' => $request->input('stuClass'),

        ]);
          if($studentDetails)
          {
            return redirect()->back()->with('message','Update Successfully');
          }

          return redirect()->back()->with('error','Not updated');
            // 'image' => $request->input('image'),
           
    }

    

    public function StudentDelete(request $request)
    {
        $StudentWithDriverDetails=$request->student_id;
        if($StudentWithDriverDetails)
        {
           $status= StudentWithDriver::where('id',$StudentWithDriverDetails)->first();
           if($status){
            $status->delete();
            return redirect()->back();
           }
           else
           {
            return redirect()->back();
           }
        }
        return redirect()->back();

    }
    public function importStudent(request $request){
            // return $request->all();
            if ($request->hasFile('student_data')) {
                try {
                    // Ensure 'driver_id' is provided in the request
                    $driver_id = $request->input('Driver_id');
                    // if (!$driver_id) {
                    //     return redirect()->back()->with('error', 'Driver ID is required.');
                    // }
                    // $driver_id = rand(111,9999); // Example driver ID

                    // Use the driver_id in the import
                    // $Excel=Excel::import(new StudentWithDriverImport, $request->file('student_data'));
                    Excel::import(new StudentWithDriverImport($driver_id), $request->file('student_data'));

                    // Excel::import(new StudentWithDriverImport($driver_id), $request->file('student_data'));
                    return redirect()->back()->with('message', 'Students imported successfully.');
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', 'There was an error importing the students: ' . $e->getMessage());
                }
            } else {
                return redirect()->back()->with('error', 'No file was uploaded.');
            }


            $driver_id = $request->input('driver_id'); // Get the driver_id
            Excel::import(new StudentWithDriverImport($driver_id), $request->file('student_data'));



        
        // if($request->file('student_data'))
        // {
    //      $insert=StudentWithDriver::create([
    //         'Driver_id'=>$request->Driver_id
    //     ]);
    //         $Excel=Excel::import(new StudentWithDriver, $request->file('student_data'));
    // // }
            
    //         return redirect()->back()->with('success', 'Students imported successfully.');
    }
    public function SendOTPAllDriver()
    {
        return "send otp";
    }

}

    

