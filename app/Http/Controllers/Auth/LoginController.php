<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Socialite;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider = null)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider = null)
    {
        $userSocial = Socialite::driver($provider)->user();
        $user = User::where('email', '=', $userSocial->getEmail())->first();
        
        if (! $user) { 
            $user = User::create([
                "{$provider}_id" => $userSocial->getId(),
                "name" => $userSocial->getName(),
                "email" => $userSocial->getEmail()
            ]);
        }

        Auth::login($user);
        
        return redirect('/');
    }
}
