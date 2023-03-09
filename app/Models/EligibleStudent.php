<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EligibleStudent extends Model
{
    use HasFactory;
    protected $fillable = [
        'nameWithInitials',
//        'fullNameInEnglishBlock',
//        'fullNameInSinhala',
        'gender',
//        'email',
        'degreeName',
        'regNum',
        'indexNum',
//        'monthAndYearExamination',
        'degreeClass',
        'faculty',
        'department',

        'cloakIssueDate',
        'cloakReturnDate',
        'garlandReturnDate',
        'convocationName',

        'status'

    ];
}
