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
            "regNum" => $row['reg_number'],
            "indexNum" => $row['index_number'],
            "faculty" => $row['faculty'],
            "department" => $row['department'],
            "degreeName" => $row['degree_name'],

        ]);

        // Delete Any Existing Role
//        DB::table('model_has_roles')->where('model_id',$user->id)->delete();

        // Assign Role To User
//        $user->assignRole($user->role_id);

        return $eligibleStudent;
    }
}
