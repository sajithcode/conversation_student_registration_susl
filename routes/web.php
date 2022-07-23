<?php

use App\Models\eligible_students;
use App\Models\EligibleStudent;
use App\Models\StudentRegistration;
use App\Models\VCorRegComment;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/eligibleStd', function () {
//    session_start();
//
//    $stdEmail = $_SESSION["email"];
//
//    $studentRegistrations = StudentRegistration::all();
//    $eligibleStudents = EligibleStudent::all();
//    return view('eligibleStd',compact('eligibleStudents','studentRegistrations','stdEmail'));
//
//});

Route::get('/eligibleStd',[App\Http\Controllers\StudentRegistrationController::class, 'eligibleStd'])->name('eligibleStd');;
Route::get('/checkData',[App\Http\Controllers\MailController::class, 'checkData'])->name('checkData');;


Route::get('/check', function () {
    return view('check');
});

Route::get('/completeEmailVerify', function () {
    return view('completeEmailVerify');
});

Route::get('/emailSentView', function () {
    return view('emailSentView');
});

Route::get('/verifyEmail', function () {
    return view('verifyEmail');
});

Route::get('/checkedData', function () {
    return view('checkedData');
});


Route::post('emailGet/{email}', [App\Http\Controllers\EligibleStudentsController::class, 'emailGet'])->name('emailGet');




Route::get('/mail',[MailController::class, 'sendMail'])->name('mail');;
Route::post('/sendConfirmedMail',[MailController::class, 'sendConfirmedMail'])->name('sendConfirmedMail');;
Route::put('/statusConfirm',[App\Http\Controllers\EligibleStudentsController::class, 'statusConfirm'])->name('statusConfirm');;



Route::get('/completeEmailVerification',[App\Http\Controllers\EligibleStudentsController::class, 'completeEmailVerification'])->name('completeEmailVerification');;
Route::get('/getByEmail',[App\Http\Controllers\EligibleStudentsController::class, 'getByEmail'])->name('getByEmail');;
Route::get('/getByRegNum',[App\Http\Controllers\EligibleStudentsController::class, 'getByRegNum'])->name('getByRegNum');



Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\EligibleStudentsController::class, 'index'])->name('home');




//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::resource('eligibleStudents', \App\Http\Controllers\EligibleStudentsController::class);
Route::resource('studentRegistration', \App\Http\Controllers\StudentRegistrationController::class);
Route::resource('report', \App\Http\Controllers\ReportController::class);


//Route::get('/getPDF', [App\Http\Controllers\PDFController::class, 'download']);

Route::group(['middleware'=>'auth'], function () {
    Route::get('permissions-all-users',['middleware'=>'check-permission:user|admin|superadmin','uses'=>'HomeController@allUsers']);
    Route::get('permissions-admin-superadmin',['middleware'=>'check-permission:admin|superadmin','uses'=>'HomeController@adminSuperadmin']);
    Route::get('permissions-superadmin',['middleware'=>'check-permission:superadmin','uses'=>'HomeController@superadmin']);
});


Route::get('/edit-records','App\Http\Controllers\UserDetailsController@index');
Route::get('edit/{id}','App\Http\Controllers\UserDetailsController@show');
Route::post('edit/{id}','App\Http\Controllers\UserDetailsController@edit');
Route::get('delete/{id}','App\Http\Controllers\UserDetailsController@destroy');


//Route::post('/eligible_students/updateDetail',[\App\Http\Controllers\EligibleStudentsController0::class,'updateDetail'])->name('eligible_students.updateDetail');
Route::get('/import-users', [\App\Http\Controllers\EligibleStudentsController::class, 'importstudents'])->name('importstudents');
Route::post('/upload-users', [\App\Http\Controllers\EligibleStudentsController::class, 'uploadstudents'])->name('uploadstudents');

Route::get('/export', [\App\Http\Controllers\StudentRegistrationController::class, 'export'])->name('export');;
Route::get('/exportbyfaculty', [\App\Http\Controllers\StudentRegistrationController::class, 'exportbyfaculty'])->name('exportbyfaculty');;

Route::get('/forget-password', '\App\Http\Controllers\Auth\ForgotPasswordController@getEmail');
Route::post('/forget-password', '\App\Http\Controllers\Auth\ForgotPasswordController@postEmail');


Route::get('/reset-password/{token}', '\App\Http\Controllers\Auth\ResetPasswordController@showResetForm');
Route::post('/reset-password', '\App\Http\Controllers\Auth\ResetPasswordController@reset');

Route::get('/tab1',function (){
    return view('home');
});
Route::get('/tab2',function (){
    return view('home');
});
Route::get('/tab3',function (){
    return view('home');
});
