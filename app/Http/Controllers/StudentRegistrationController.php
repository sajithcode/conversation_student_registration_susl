<?php

namespace App\Http\Controllers;

use App\Exports\StudentRegistrationExport;
use App\Exports\StudentRegistrationExportByFaculty;
use App\Mail\RegistrationUpdate;
use App\Models\Convocation;
use App\Models\EligibleStudent;
use App\Models\Faculty;
use App\Models\Price;
use App\Models\StudentRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class StudentRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session_start();

//        $stdEmail = $_SESSION["email"];
        $faculties = Faculty::all();
        $convocations = Convocation::all();
        $eligibleStudents = EligibleStudent::all();
        return view('studentRegistration.create',compact('eligibleStudents','faculties','convocations'));
    }


    public function eligibleStd()
    {
        session_start();

//        $stdEmail = $_SESSION["email"];

        $prices = Price::all();
        $studentRegistrations = StudentRegistration::all();
        $eligibleStudents = EligibleStudent::all();
        return view('eligibleStd',compact('eligibleStudents','studentRegistrations','prices'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'regNum' => ['required', 'string', 'max:255','unique:student_registrations'],
        ]);

        if ($validator->fails()) {
            return redirect('eligibleStd')
                ->withErrors($validator)
                ->withInput();
        }



        $pro=new StudentRegistration();
        $pro->nameWithInitial = $request->nameWithInitial;
        $pro->fullNameInEnglishBlock = $request->fullNameInEnglishBlock;
        $pro->fullNameInSinhala = $request->fullNameInSinhala;
        $pro->gender = $request->gender;

        $pro->nic = $request->nic;
        $pro->address = $request->address;
        $pro->mobileNumber = $request->mobileNumber;
        $pro->email = $request->email;

        $pro->faculty = $request->faculty;
        $pro->department = $request->department;

        $pro->degreeName = $request->degreeName;
        $pro->regNum = $request->regNum;
        $pro->indexNum = $request->indexNum;
        $pro->monthAndYearExamination = $request->monthAndYearExamination;

        $pro->degreeClass = $request->degreeClass;
        $pro->attendance = $request->attendance;
        $pro->nameVisitor1 = $request->nameVisitor1;
        $pro->nameVisitor2 = $request->nameVisitor2;

        $pro->nicVisitor1 = $request->nicVisitor1;
        $pro->nicVisitor2 = $request->nicVisitor2;
        $pro->signedDate = $request->signedDate;


        if($request->image){
            $file= $request->image;
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/images'), $filename);
            $pro->image=$filename;

        }

        session_start();
        $pro->convocationName = $_SESSION["convocationName"];

        $_SESSION["regStatus"]='Yes';
        $_SESSION["nameWithInitial"]=$request->nameWithInitial;
        $_SESSION["regNum"]=$request->regNum;


        $_SESSION["regPro"]=$pro;
//            $pro->save();



//        Redirect::away('https://employability-study.sociologicalnotes.com/student_form.php');
//        redirect('https://employability-study.sociologicalnotes.com/student_form.php');

//        return redirect('https://employability-study.sociologicalnotes.com/student_form.php');

//        return redirect('http://employability-study.sociologicalnotes.com/');




//        StudentRegistration::create($request->all());
        return redirect()->route('surveyView')
            ->with('success','Complete the Survey to Complete Registration.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentRegistration  $studentRegistration
     * @return \Illuminate\Http\Response
     */
    public function show(StudentRegistration $studentRegistration)
    {
        return view('studentRegistration.show',compact('studentRegistration'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentRegistration  $studentRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentRegistration $studentRegistration)
    {
        return view('studentRegistration.edit',compact('studentRegistration'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentRegistration  $studentRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentRegistration $studentRegistration)
    {

        if($request->image){

            $file= $request->image;
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/images'), $filename);
            session_start();
            $convocationName = $_SESSION["convocationName"];

            $studentRegistration->update([
                'nameWithInitial'=>$request->input('nameWithInitial'),
                'fullNameInEnglishBlock'=>$request->input('fullNameInEnglishBlock'),
                'fullNameInSinhala'=>$request->input('fullNameInSinhala'),
                'gender'=>$request->input('gender'),
                'nic'=>$request->input('nic'),
                'address'=>$request->input('address'),
                'mobileNumber'=>$request->input('mobileNumber'),
                'email'=>$request->input('email'),

                'faculty'=>$request->input('faculty'),
                'department'=>$request->input('department'),

                'degreeName'=>$request->input('degreeName'),
                'regNum'=>$request->input('regNum'),
                'indexNum'=>$request->input('indexNum'),
                'monthAndYearExamination'=>$request->input('monthAndYearExamination'),
//            'monthExamination'=>$request->input('monthExamination'),
//            'yearExamination'=>$request->input('yearExamination'),
                'degreeClass'=>$request->input('degreeClass'),
                'attendance'=>$request->input('attendance'),
                'nameVisitor1'=>$request->input('nameVisitor1'),
                'nameVisitor2'=>$request->input('nameVisitor2'),
                'nicVisitor1'=>$request->input('nicVisitor1'),
                'nicVisitor2'=>$request->input('nicVisitor2'),
                'convocationName'=>$convocationName,


                'image' => $filename,



                'signedDate'=>$request->input('signedDate'),

                'status' => 'Pending',
                'statusMessage' => 'none',
            ]);
        }else{

            $studentRegistration->update([
                'status' => $request->input('status'),
                'statusMessage' => $request->input('statusMessage'),
            ]);
            Mail:: to($request->email)->send(new RegistrationUpdate($request->input('status')));

            return redirect()->route('eligibleStudents.index')
                ->with('success','Registration updated successfully');
        }





        return redirect()->route('eligibleStd')
            ->with('success','Registration updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentRegistration  $studentRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentRegistration $studentRegistration)
    {
        //
    }

    public function export(Request $request)

    {
//        return Excel::download(new StudentRegistrationExport, 'Registered All Students.xlsx');
        return (new StudentRegistrationExport($request->input('convocationName')))->download('Registered All Students.xlsx');

    }

    public function exportbyfaculty(Request $request, StudentRegistration $studentRegistration)

    {
//        $filename= 'Registered in '+$request->input('faculty')+'.xlsx';

//        print $request->input('faculty');

        return (new StudentRegistrationExportByFaculty($request->input('faculty'),$request->input('convocationName')))->download('Registered in Faculty.xlsx');

//        return Excel::download(new StudentRegistrationExport, 'Registered Students.xlsx');
    }

}
