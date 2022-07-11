<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameWithInitial',
        'fullNameInEnglishBlock',
        'fullNameInSinhala',
        'gender',
        'nic',
        'address',
        'mobileNumber',
        'email',
        'degreeName',
        'regNum',
        'indexNum',

        'monthAndYearExamination',


        'degreeClass',
        'attendance',
        'nameVisitor1',
        'nameVisitor2',
        'nicVisitor1',
        'nicVisitor2',

        'image',

        'signedDate',



    ];
}
