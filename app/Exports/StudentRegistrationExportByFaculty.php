<?php

namespace App\Exports;

use App\Models\StudentRegistration;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;

class StudentRegistrationExportByFaculty implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function __construct(string $faculty)
    {
        $this->faculty = $faculty;
    }

//    public function query()
//    {
//        return StudentRegistration::query()->where('faculty', $this->faculty);
//    }

//    public function collection()
//    {
//        return StudentRegistration::all();
//    }
    public function view(): View
    {
        // TODO: Implement view() method.
        return view('studentRegistration.table', [
            'studentRegistrations' => StudentRegistration::query()->where('faculty', $this->faculty)->get()
        ]);
    }
}
