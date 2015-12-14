<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\login\DoLoginRequest;
use App\Jobs\login\DoLogin;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\View;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    protected $redirectPath = '/home';
    protected $loginPath = '/login';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function login()
    {
        return view('/login/login');
    }

    public function doLogin(DoLoginRequest $request)
    {
        try{
            $this->dispatch(new DoLogin($request));
        }catch (\Exception $e){
            return redirect()->back();
        }
       return view('layouts.master');
    }

    public function redirectToProvider($type)
    {
        return Socialite::driver($type)->redirect();
    }

    public function handleProviderCallback($type)
    {
        $user = Socialite::driver($type)->user();

        $exitingUser = User::where('email', $user->email)->first();
        //check user ada di database
        if ($exitingUser instanceof User)
        {
            //user ada
            auth()->LoginUsingId($exitingUser->id);

            return redirect('layouts.master');
        } else {
            $newUser = User::create([
                'name'      => $user->name,
                'username'  => $user->nickname,
                'password'  => str_random(6),
                'email'     => $user->email
            ]);

            auth()->loginUsingId($newUser->id);

            return redirect('layouts.master');
        }
    }

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
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
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/login/login');
    }
}
