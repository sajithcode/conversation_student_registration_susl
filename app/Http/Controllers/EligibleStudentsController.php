<?php

namespace App\Http\Controllers;

use App\Models\EligibleStudent;
use App\Models\StudentRegistration;
use App\Models\VerifiedEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel;
use App\Imports\StudentsImport;

class EligibleStudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();

//        $stdEmail = $_SESSION["email"];
        $allEligibleStudents = DB::select('
SELECT
eligible_students.id,
eligible_students.nameWithInitials,
eligible_students.regNum,
eligible_students.indexNum,
eligible_students.faculty,
eligible_students.department,
eligible_students.degreeName,
eligible_students.cloakIssueDate,
eligible_students.cloakReturnDate,
eligible_students.garlandReturnDate,
student_registrations.status

FROM eligible_students
LEFT JOIN student_registrations ON eligible_students.regNum=student_registrations.regNum;
');

        $registeredStudents = DB::select('
SELECT
student_registrations.id "sid",
eligible_students.id "eid",
eligible_students.nameWithInitials,
eligible_students.regNum,
eligible_students.indexNum,
eligible_students.faculty,
eligible_students.department,
eligible_students.degreeName,
eligible_students.cloakIssueDate,
eligible_students.cloakReturnDate,
eligible_students.garlandReturnDate,
student_registrations.status

FROM eligible_students
INNER JOIN student_registrations ON eligible_students.regNum=student_registrations.regNum;
');

        $registeredPendingStudents = DB::select('
SELECT
student_registrations.id "sid",
eligible_students.id "eid",
eligible_students.nameWithInitials,
eligible_students.regNum,
eligible_students.indexNum,
eligible_students.faculty,
eligible_students.department,
eligible_students.degreeName,
eligible_students.cloakIssueDate,
eligible_students.cloakReturnDate,
eligible_students.garlandReturnDate,
student_registrations.status

FROM eligible_students
INNER JOIN student_registrations ON eligible_students.regNum=student_registrations.regNum
WHERE student_registrations.status IN ("Pending")
');

        $registeredRejectStudents = DB::select('
SELECT
student_registrations.id "sid",
eligible_students.id "eid",
eligible_students.nameWithInitials,
eligible_students.regNum,
eligible_students.indexNum,
eligible_students.faculty,
eligible_students.department,
eligible_students.degreeName,
eligible_students.cloakIssueDate,
eligible_students.cloakReturnDate,
eligible_students.garlandReturnDate,
student_registrations.status

FROM eligible_students
INNER JOIN student_registrations ON eligible_students.regNum=student_registrations.regNum
WHERE student_registrations.status IN ("Reject")');

        $registeredAcceptStudents = DB::select('
SELECT
student_registrations.id "sid",
eligible_students.id "eid",
eligible_students.nameWithInitials,
eligible_students.regNum,
eligible_students.indexNum,
eligible_students.faculty,
eligible_students.department,
eligible_students.degreeName,
eligible_students.cloakIssueDate,
eligible_students.cloakReturnDate,
eligible_students.garlandReturnDate,
student_registrations.status

FROM eligible_students
INNER JOIN student_registrations ON eligible_students.regNum=student_registrations.regNum
WHERE student_registrations.status IN ("Accept")');



        $notRegisteredStudents = DB::select('
SELECT
eligible_students.id,
eligible_students.nameWithInitials,
eligible_students.regNum,
eligible_students.indexNum,
eligible_students.faculty,
eligible_students.department,
eligible_students.degreeName,
eligible_students.cloakIssueDate,
eligible_students.cloakReturnDate,
eligible_students.garlandReturnDate

FROM eligible_students
LEFT JOIN student_registrations ON eligible_students.regNum=student_registrations.regNum
WHERE student_registrations.regNum IS NULL
');

//        $studentRegistrations = StudentRegistration::all();
//        $eligibleStudents = EligibleStudent::all();

        return view('eligibleStudents.index',compact('registeredStudents','registeredPendingStudents','registeredRejectStudents','registeredAcceptStudents','notRegisteredStudents','allEligibleStudents'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eligibleStudents.create');
    }

//    public function show()
//    {
//           }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        EligibleStudent::create($request->all());
        return redirect()->route('eligibleStudents.index')
            ->with('success','Student add successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EligibleStudent  $eligibleStudent
     * @return \Illuminate\Http\Response
     */
    public function show(EligibleStudent $eligibleStudent)
    {
//        $studentRegistrations = StudentRegistration::all();
//        $eligibleStudents = EligibleStudent::all();
//        return view('eligibleStudents.show',compact('eligibleStudents','studentRegistrations'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EligibleStudent  $eligibleStudent
     * @return \Illuminate\Http\Response
     */
    public function edit(EligibleStudent $eligibleStudent)
    {
        return view('eligibleStudents.edit',compact('eligibleStudent'));

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EligibleStudent  $eligibleStudent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EligibleStudent $eligibleStudent)
    {
        if($request->input('regNum')) {
            $eligibleStudent->update([
                'nameWithInitials' => $request->input('nameWithInitials'),
//                'fullNameInEnglishBlock' => $request->input('fullNameInEnglishBlock'),
//                'fullNameInSinhala' => $request->input('fullNameInSinhala'),
                'gender' => $request->input('gender'),
//                  'email' => $request->input('email'),
                'degreeName' => $request->input('degreeName'),
                'regNum' => $request->input('regNum'),
                'indexNum' => $request->input('indexNum'),
//                'monthAndYearExamination' => $request->input('monthAndYearExamination'),
                'degreeClass' => $request->input('degreeClass'),
                'faculty' => $request->input('faculty'),
                'department' => $request->input('department'),

            ]);

            return redirect()->route('eligibleStudents.edit',$eligibleStudent->id)
                ->with('success', 'Successfully updated');

        }elseif (($request->input('cloakIssueDate'))){
            $eligibleStudent->update([
                'cloakIssueDate' => $request->input('cloakIssueDate'),
                'cloakReturnDate' => $request->input('cloakReturnDate'),
                'garlandReturnDate' => $request->input('garlandReturnDate'),
            ]);

            return redirect()->route('eligibleStudents.index')
                ->with('success', 'Successfully updated');
        }

        else{
            $eligibleStudent->update([
                'status'=>'Confirmed',
            ]);
            return redirect()->route('eligibleStd')
                ->with('success', 'Your data successfully confirmed');
//            $studentRegistrations = StudentRegistration::all();
//            $eligibleStudents = EligibleStudent::all();
//            return view('eligibleStudents.index',compact('eligibleStudents','studentRegistrations'));

//            return view('verifyDone');

        }

    }

    public function statusConfirm(Request $request, EligibleStudent $eligibleStudent)
    {
        $eligibleStudent->update([
            'status'=>'Confirmed',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EligibleStudent  $eligibleStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy(EligibleStudent $eligibleStudent)
    {
        //
        $eligibleStudent -> delete();
        return redirect()->route('eligibleStudents.index')
            ->with('success','Product deleted successfully');
    }

    public function importstudents()
    {
        return view('eligibleStudents.importstudents');
    }
    public function uploadstudents(Request $request)
    {
        \Maatwebsite\Excel\Facades\Excel::import(new StudentsImport, $request->file);

        return redirect()->route('eligibleStudents.index')->with('success', 'User Imported Successfully');
    }

    public function getByEmail(Request $request)
    {
        $studentRegistrations = StudentRegistration::all();
        $eligibleStudents = EligibleStudent::all();
        $student = EligibleStudent::where(
            'email', $request->email)->get();
        return view('checkedData',compact('student','studentRegistrations','eligibleStudents'));

    }


    public function completeEmailVerification(Request $request, EligibleStudent $eligibleStudent)
    {
//        $eligibleStudent->update([
//            'status'=>'Verified',
//        ]);

        $data=new VerifiedEmail();
        $data->email = $request->email;
        $data->save();


//        $studentRegistrations = StudentRegistration::all();
//        $eligibleStudents = EligibleStudent::all();
//        $student = EligibleStudent::where(
//            'email', $request->email)->get();
//        return view('checkedData',compact('student','studentRegistrations','eligibleStudents'));
        return redirect()->route('checkData')
            ->with('success','You already complete the email verification.');
    }


    public function getByRegNum(Request $request)
    {
        $studentRegistrations = StudentRegistration::all();
        $eligibleStudents = EligibleStudent::all();
        $student = EligibleStudent::where(
            'regNum', $request->regNum)->get();
        return view('checkedData',compact('student','studentRegistrations','eligibleStudents'));

    }

    public function emailGet(Request $request, $email){

        echo $email;
    }


}
