<?php

namespace App\Http\Controllers;

use App\Exports\StudentRegistrationExport;
use App\Models\EligibleStudent;
use App\Models\StudentRegistration;
use Illuminate\Http\Request;
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
        $eligibleStudents = EligibleStudent::all();
        return view('studentRegistration.create',compact('eligibleStudents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {





        $pro=new StudentRegistration();
        $pro->nameWithInitial = $request->nameWithInitial;
        $pro->fullNameInEnglishBlock = $request->fullNameInEnglishBlock;
        $pro->fullNameInSinhala = $request->fullNameInSinhala;
        $pro->gender = $request->gender;

        $pro->nic = $request->nic;
        $pro->address = $request->address;
        $pro->mobileNumber = $request->mobileNumber;
        $pro->email = $request->email;

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

        $pro->save();


//        StudentRegistration::create($request->all());
        return redirect()->route('eligibleStudents.index')
            ->with('success','Registration successfully.');
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


            $studentRegistration->update([
                'nameWithInitial'=>$request->input('nameWithInitial'),
                'fullNameInEnglishBlock'=>$request->input('fullNameInEnglishBlock'),
                'fullNameInSinhala'=>$request->input('fullNameInSinhala'),
                'gender'=>$request->input('gender'),
                'nic'=>$request->input('nic'),
                'address'=>$request->input('address'),
                'mobileNumber'=>$request->input('mobileNumber'),
                'email'=>$request->input('email'),
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
        }





        return redirect()->route('eligibleStudents.index')
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

    public function export()
    {
        return Excel::download(new StudentRegistrationExport, 'Registered.xlsx');
    }

}
