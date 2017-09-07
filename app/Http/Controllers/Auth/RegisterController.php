<?php

namespace App\Http\Controllers\Auth;

use App\Notifications\ConfirmMail;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    use Notifiable;

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/user/register-success';

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
            'name' => 'required|max:255',
            'phone' => 'required|max:10|unique:users',
            'province_city' => 'required',
            'location_type' => 'required',
            'house_number' => 'required',
            'road' => 'required',
            'sangkat' => 'required',
            'khan' => 'required',
            'direction_guide' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
       /* return User::create([
            '' => $data['name'],
            '' => $data['phone'],
            '' => $data['province_city'],
            '' => $data['location_type'],
            '' => $data['house_number'],
            '' => $data['road'],
            '' => $data['sangkat'],
            '' => $data['khan'],
            '' => $data['direction_guide'],
            '' => $data['email'],
            '' => bcrypt($data['password']),
        ]);*/

        $user = new User();

        $random_hash = bin2hex(random_bytes(32));

        $user->confirmed  = 0;
        $user->confirmation_code  = $random_hash;
        $user->name  = $data['name'];
        $user->phone  = $data['phone'];
        $user->province_city  = $data['province_city'];
        $user->location_type  = $data['location_type'];
        $user->house_number  = $data['house_number'];
        $user->road  = $data['road'];
        $user->sangkat  = $data['sangkat'];
        $user->khan  = $data['khan'];
        $user->direction_guide  = $data['direction_guide'];
        $user->email  = $data['email'];
        $user->password  = bcrypt($data['password']);

        if($user->save()) {

            $user->notify(new ConfirmMail($user));
        }
        return $user;

    }
}
