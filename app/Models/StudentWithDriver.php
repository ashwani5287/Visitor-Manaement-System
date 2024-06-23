<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentWithDriver extends Model
{
    use HasFactory;

    protected $fillable=[
        'Driver_id',
       
        'name',
        'Student_name',
        'stuFather',
        'fatherMobile',
        'admissionNo',
        'stusection',
        'stuclass',
        // 'image' ,
    ];
}
