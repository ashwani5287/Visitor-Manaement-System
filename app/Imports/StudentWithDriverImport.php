<?php

namespace App\Imports;

use App\Models\StudentWithDriver;
use Maatwebsite\Excel\Concerns\ToModel;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;
class StudentWithDriverImport implements ToModel
{

    protected $driver_id;

    public function __construct($driver_id)
    {
        $this->driver_id = $driver_id;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new StudentWithDriver([
            'Driver_id' => $this->driver_id,


            'name'   => $row[0],
            'stuFather' => $row[1],
            'fatherMobile'  => $row[2],
            'admissionNo'  => $row[3],
            'stusection'  => $row[4],
            'stuclass'  => $row[5], ]);



       
    }
}
