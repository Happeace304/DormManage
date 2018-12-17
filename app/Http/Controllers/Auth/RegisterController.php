<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Model\Room;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
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
    //override form
    public function showRegistrationForm()
    {
        $room = Room::where('state',0)->get();

        return view('auth.register',compact('room'));
    }
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));



        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // Chỉ cho phép guest đăng ký
    public function __construct()
    {
//        $this->middleware('guest');
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
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'phone'=>['required','string', 'max:20'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   $adminRole= Auth::user()->role;
        $adminRole== 0?$role=1: $role=2 ;
        if($adminRole == 1)
        $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone'=> $data['phone'],
            'roomId'=>$data['roomId'],
            'address'=>$data['address'],
            'role'=> $role,
        ]);
            else $user= User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'phone'=> $data['phone'],
                'address'=>$data['address'],
                'role'=> $role,

            ]);
        if($user && $adminRole==1) {
            $room= Room::find($data['roomId']);
            $room->peopleCount = User::where('roomId',$data['roomId'])->count();
            if ($room->peopleCount == 4) $room->state=1;
            $room->save();
        }
        return $user;
    }
}
