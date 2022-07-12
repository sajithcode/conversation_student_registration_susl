<?php

namespace App\Exports;

use App\Models\StudentRegistration;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class StudentRegistrationExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
//    public function collection()
//    {
//        return StudentRegistration::all();
//    }

    public function view(): View
    {
        return view('studentRegistration.table', [
            'studentRegistrations' => StudentRegistration::all()
        ]);
    }
}
