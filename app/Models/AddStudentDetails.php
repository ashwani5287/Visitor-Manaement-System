<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddStudentDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'stuFather',
        'fatherMobile',
        'admissionNo',
        'stusection',
        'stuclass',
        // Add other fillable attributes here if needed
    ];
}
