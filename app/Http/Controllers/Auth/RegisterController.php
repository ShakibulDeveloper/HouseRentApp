<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

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
        // return Validator::make($data, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
      return abort(404);
    }

    function register_user(Request $request)
    {
      $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'custom_email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
        'custom_password' => ['required', 'string', 'min:8', 'required_with:confirm_password','same:password_confirmation'],
        'password_confirmation' => ['required', 'min:8'],
      ]);

      $user = new User;
      $user->email = $request->custom_email;
      $user->name = $request->name;
      $user->password = Hash::make($request->custom_password);
      $user->role = $request->role;
      $user->latitude =  $request->lat;
      $user->longitute =  $request->lon;
      $user->save();

      return back()->with('success', "registered successfully!");
    }
}
