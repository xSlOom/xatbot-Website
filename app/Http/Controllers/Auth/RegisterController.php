<?php

namespace OceanProject\Http\Controllers\Auth;

use OceanProject\Models\User;
use OceanProject\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use OceanProject\Utilities\xat;

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
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validator = Validator::make($data, [
            'name'     => 'required|max:50|unique:users',
            'email'    => 'required|email|max:50|unique:users',
            'regname'  => 'required|max:50|unique:users',
            'xatid'    => 'required|max:50|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $validator->after(function($validator) use ($data) {
            if (!xat::isValidXatID($data['xatid'])) {
                $validator->errors()->add('xatid', 'The xatid is not valid!');
            } elseif (!xat::isXatIDExist($data['xatid'])) {
                $validator->errors()->add('xatid', 'The xatid does not exist!');
            }

            if (!xat::isValidRegname($data['regname'])) {
                $validator->errors()->add('regname', 'The regname is not valid!');
            } elseif (!xat::isRegnameExist($data['regname'])) {
                $validator->errors()->add('regname', 'The regname does not exist!');
            }
        });

        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  Request  $request
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'xatid'    => $data['xatid'],
            'regname'  => $data['regname'],
            'password' => bcrypt($data['password']),
            'ip'       => \Request::ip()
        ]);

        $user->attachRole(5);

        return $user;
    }
}
