<?php

namespace App\Http\Controllers;

use App\Mail\Confirm;
use App\Mail\SignUp;
use App\Models\EligibleStudent;
use App\Models\Report;
use App\Models\StudentRegistration;
use App\Models\VerifiedEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    //
    public function sendMail(){

        $name = 'Ishan';

        Mail:: to('jishanrandika@gmail.com')->send(new SignUp($name));



//        return view('welcome');
    }


    public function checkData(){
        session_start();

        $studentRegistrations = StudentRegistration::all();
        $eligibleStudents = EligibleStudent::all();
        $reports = Report::all();
        $student = EligibleStudent::where(
            'email', $_SESSION["email"])->get();
        return view('checkedData',compact('student','studentRegistrations','eligibleStudents','reports'));

    }

    public function sendConfirmedMail(Request $request){


//        $validator = Validator::make($request->all(), [
//            'email' => ['required', 'string', 'email', 'max:255','regex:/sab.ac.lk/'],
//        ]);
//
//        if ($validator->fails()) {
//            return redirect('verifyEmail')
//                ->withErrors($validator)
//                ->withInput();
//        }


        session_start();
        $id = 10;
        $_SESSION["user_id"] = $id;
//        $id = 14;
//        $_SESSION["user_id"] = $id;
        $_SESSION["email"] = $request->email;
        $stdEmail = $request->email;


        $verifiedEmails = VerifiedEmail::all();
        $eligibleStudents = EligibleStudent::all();

        foreach ($verifiedEmails as $mail){
            if($mail->email==$request->email){

                foreach ($eligibleStudents as $std){
                    if(($std->email==$request->email)&&($std->status=='Confirmed')){
                        return redirect()->route('eligibleStd')
                            ->with('success', 'You already confirmed the details');
//                        $studentRegistrations = StudentRegistration::all();
//                        $eligibleStudents = EligibleStudent::all();
//                        return view('eligibleStd',compact('eligibleStudents','studentRegistrations','stdEmail'));

                    }
                    if(($std->email==$request->email)&&($std->status=='Pending')){
                        return redirect()->route('checkData')
                            ->with('success','You already complete the email verification.');
                    }

//                    else{
//                        return redirect()->route('checkData')
//                            ->with('success','Student add successfully.');
////                        $studentRegistrations = StudentRegistration::all();
////                        $eligibleStudents = EligibleStudent::all();
////                        $student = EligibleStudent::where(
////                            'email', $request->email)->get();
////                        return view('checkedData',compact('student','studentRegistrations','eligibleStudents'));
//                    }
                }
//                $a=2;



            }
        }


//        if($a===1){
//            $data=new VerifiedEmail();
//            $data->email = $request->email;
//            $data->save();

//        session_start();

            $name = $request->email;

//        $_SESSION['sessionEmail'] = $request->email;

            Mail:: to($request->email)->send(new Confirm($name));



            return view('emailSentView');
//        }

    }
}
