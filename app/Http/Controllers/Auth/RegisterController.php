<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Model\City;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

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
    protected $redirectTo = '/';

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'gender' => ['required', 'int'],
            // 'soc_status' => ['required', 'int'],
            // 'orientation' => ['required', 'int'],
            // 'birthday' => ['required', 'date'],
            // 'city_id' => ['required', 'int'],          
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
	public function verification($hash_code)
    {
		//echo $v_code;
		$user = User::where('confirmation_link', $hash_code)->first();
		if($user)
		{
			$user->is_verification = true;
			$user->confirmation_link = null;
			$user->save();
			return redirect()->route('home',['verifi_sucsess'=>"true"]);
		}
		else return redirect()->route('home',['verifi_error'=>"true"]);
    }
	
    public function showRegistrationForm()
    {       
        $info['gender']=User::$gender;
        $info['soc_status']=User::$soc_status;
        $info['orientation']=User::$orientation;
        $info['cities']=City::all();
        return view('auth.register',$info);
    }
    protected function create(array $data)
    {
        //dd(Hash::make($data['email']));
        if (!isset($data['gender']))
            $data['gender'] = 0;
        if (!isset($data['soc_status']))
            $data['soc_status'] = 0;
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'birthday' =>date("Y-m-d", strtotime($data['birthday'])),
            'city_id' => $data['city_id'],
            'gender_id' => $data['gender']=='on'?1:0,
            'orientation_id' => $data['orientation'],
            'soc_status_id' => $data['soc_status']=='on'?1:0,
            'confirmation_link' => md5($data['email'].bin2hex(random_bytes(32))),//Hash::make($data['email']),
        ]);
    }



    public function register(Request $request)
    {

        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //$this->guard()->login($user);
        \App\Jobs\SendMail::dispatch("emails.registration", $user->email, $user->name, $user->confirmation_link, "", "Подтвердите регистрацию")->onQueue('default');

        return $this->registered($request, $user)
            ?: redirect()->route('home',['post_register'=>"true"]);
    }
}
