<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Confirm;
use App\Models\EligibleStudent;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
//            strtoupper(trim(str_replace(' ', '', str_replace('/', '', $data['regNum'])))) => ['required', 'string', 'max:255','exists:eligible_students,regNum', 'unique:users'],
            'regNum' => ['required', 'string', 'max:255','exists:eligible_students,regNum', 'unique:users'],
            'name' => ['required', 'string', 'max:255','regex:/^([^0-9$#@!=^&*(){}+-]*)$/'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users','regex:/sab.ac.lk/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {


            Mail:: to($data['email'])->send(new Confirm('a'));

            return User::create([
//            'regNum' => strtoupper(trim($data['regNum'])),
//            'regNum' => strtoupper(trim(str_replace(' ', '', $data['regNum']))),
                'regNum' => strtoupper(trim(str_replace(' ', '', str_replace('/', '', $data['regNum'])))),
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);



    }
}
