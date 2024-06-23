<?php

namespace App\Http\Controllers;
use App\Models\AddStudentDetails;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\ValidationException;


use Illuminate\Http\Request;

class AddStudentController extends Controller
{
    public function details(){
        $StudentDetails=AddStudentDetails::latest('id')->get();
        return view('Backend.AddStudentDetails',compact('StudentDetails'));
    }

    public function admission(request $request){

        $validated = $request->validate([
            'Student_name' => 'required|max:255',
            'father_name' => 'required|max:255',
            'father_mobile' => 'required|max:15',
            'stuAdmission' => 'required|unique:add_student_details,admissionNo',
            'stuSection' => 'required|max:50',
            'stuClass' => 'required|max:50',
        ]);

        

        $addstudent = AddStudentDetails::create([
            'name' => $request->input('Student_name'),
            'stuFather' => $request->input('father_name'),
            'fatherMobile' => $request->input('father_mobile'),
            'admissionNo' => $request->input('stuAdmission'),
            'stusection' => $request->input('stuSection'),
            'stuclass' => $request->input('stuClass'),
        ]);
        if($addstudent){
            return back()->with('message', 'Success! student created');

            // return  redirect()->back();
        }
        else
        {
            return back()->with('message',  $validated);
        }
    }
    
    public function import(Request $request)
    {
    //   return  $request->all();
        // $request->validate([
        //     'file' => 'required|mimes:xlsx,xls',
        // ]);

    //   $Excel=  Excel::import(new AddStudentDetails, $request->file('file'));
    if($request->file('student_data')){
        $Excel=Excel::import(new StudentsImport, $request->file('student_data'));

        
        return redirect()->back()->with('message', 'Students imported successfully.');

    }
    else
    {
        return redirect()->back()->with('error', 'not imported.');

    }

    //   dd($Excel); 

    }


    
    public function DeleteStudents(request $request){
        $delete=AddStudentDetails::where('id',$request->id)->first();
        if($delete){
        $delete->delete();
        return back()->with('message', 'Deleted.');
                }
                else
                {
                    return redirect()->back()->with('error', 'not deleted.');
 
                }
       
    }

    public function UpdateStudents(request $request){
      
        $update=AddStudentDetails::where('id',$request->id)->update([
            'name' => $request->input('Student_name'),
            'stuFather' => $request->input('father_name'),
            'fatherMobile' => $request->input('father_mobile'),
            'admissionNo' => $request->input('stuAdmission'),
            'stusection' => $request->input('stuSection'),
            'stuclass' => $request->input('stuClass'),
        ]);
        if($update){
            return redirect()->back()->with('message', 'Updated Successfully.');
 
        }
        else
        {
            return redirect()->back()->with('error', 'not updated.');

        }

    //    return $request->all();
    }

   
  
}
