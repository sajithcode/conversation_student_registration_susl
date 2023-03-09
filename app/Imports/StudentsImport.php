<?php

namespace App\Imports;

use App\Models\EligibleStudent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $eligibleStudent = new EligibleStudent([
            "nameWithInitials" => $row['name_with_initials'],
//            "fullNameInEnglishBlock" => $row['name_in_english_block'],
//            "fullNameInSinhala" => $row['name_in_sinhala'],
            "gender" => $row['gender'],
//            "email" => $row['email'],
            "degreeName" => $row['degree_name'],
            "regNum" => $row['reg_number'],
            "indexNum" => $row['index_number'],
//            "monthAndYearExamination" => $row['month_and_year_of_examination'],
            "degreeClass" => $row['degree_class'],


            "faculty" => $row['faculty'],
            "department" => $row['department'],
            "convocationName" => $row['convocation_name'],



        ]);

        // Delete Any Existing Role
//        DB::table('model_has_roles')->where('model_id',$user->id)->delete();

        // Assign Role To User
//        $user->assignRole($user->role_id);

        return $eligibleStudent;
    }
}
