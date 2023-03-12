<?php

namespace App\Exports;

use App\Models\StudentRegistration;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use PhpParser\Node\Scalar\String_;

class StudentRegistrationExportByFaculty implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function __construct(string $faculty, string $convocationName)
    {
        $this->faculty = $faculty;
        $this->convocationName = $convocationName;
    }

    public function view(): View
    {
        // TODO: Implement view() method.
        return view('studentRegistration.table', [
            'studentRegistrations' => StudentRegistration::query()
                ->where('convocationName',$this->convocationName)
                ->where('faculty', $this->faculty)
                ->get()
        ]);
    }
}
