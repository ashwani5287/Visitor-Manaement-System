<?php

namespace App\Imports;

use App\Models\AddStudentDetails;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (!AddStudentDetails::where('admissionNo', $row[3])->exists()) {
            
            return new AddStudentDetails([
            
                'name'   => $row[0],
                'stuFather' => $row[1],
                'fatherMobile'  => $row[2],
                'admissionNo'  => $row[3],
                'stusection'  => $row[4],
                'stuclass'  => $row[5], ]);
            }
       
            return null;

         
       
    }
}
