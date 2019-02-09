<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Member;
use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notifiable;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
        $this->middleware('guest:member');
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
            'title' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'othername' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showAdminRegisterForm()
    {
        return view('auth.adminRegister', ['url' => 'admin']);
    }

    public function showMemberRegisterForm()
    {
        return view('auth.register', ['url' => 'member']);
    }

    protected function createAdmin(Request $request)
    {
        $this->validator($request->all())->validate();
        $admin = Admin::create([
            'first_name' => $request['firstname'],
            'last_name' => $request['lastname'],
            'email' => $request['email'],
            'status' => $request['status'],
            'is_super' => $request['super'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('admin/login');
    }

    protected function createMember(Request $request)
    {
        $this->validator($request->all())->validate();
        $users_b = DB::table('members')->where('email', $request['email'])->get();

            $users_bC = count($users_b);

            if($users_bC < 1){

                $writer = Member::create([
                    'first_name' => $request['firstname'],
                    'last_name' => $request['lastname'],
                    'other_names' => $request['othername'],
                    'title' => $request['title'],
                    'phone' => $request['phone'],
                    'email' => $request['email'],
                    'status' => 'incomplete',
                    'password' => Hash::make($request['password']),
                    'passport' => 'dashboard/assets/images/avatar.png'
                ]);

                DB::table('members_activity')->insert([
                    'user_email' => $request['email'], 
                    'activity' => 'New Member Registration',
                    'description' => 'Thank you for joining Irorun Cooperative Multipurpose Empowerment Society.',
                    'icon' => 'fa fa-user-o',
                    'color' => 'bg1',
                ]);

                DB::table('next_of_kin')->insert([
                    'first_name' => $request['firstname'],
                    'last_name' => $request['lastname'],
                    'other_names' => $request['othername'],
                    'year_of_admission' => date("Y"),
                    'email' => $request['email']
                ]);

                DB::table('members_activity')->insert([
                    'user_email' => $request['email'], 
                    'activity' => 'Complete Registration',
                    'description' => 'Hi '.ucwords($request['firstname']).',Please complete your registration to access our products and services.',
                    'icon' => 'fa fa-edit',
                    'color' => 'bg2',
                ]);
                DB::table('settings')->insert([
                    'email' => $request['email'], 
                    'receive_mail_alerts' => true,
                    'receive_updates' => true,
                    'receive_campaign' => true,
                    'receive_newsletter' => true,
                ]);
                return redirect()->intended('login');
            }else {

                return back()->withErrors(['User with email already exists!!!']);

            }
    }
}
