<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected function authenticated()
    {
        if (Auth::user()->role_as == '1')
        {
            return redirect('dashboard')->with('message', 'Bienvenue sur votre tableau de board!');
        }
        elseif (Auth::user()->role_as == '0')
        {
            return redirect('/')->with('message', 'Vous êtes connectez avec succès !');
        }
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    // google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    //google callack
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $this->_registerOrLoginUser($user);
        return redirect('users')->with('message', 'Bienvenue sur votre tableau de board !');
        

    }
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    //google callack
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $this->_registerOrLoginUser($user);
        return redirect('users')->with('message', 'Bienvenue sur votre tableau de board !');
        

    }
    public function _registerOrLoginUser($data)
    {
        $user = User::where('email', $data->email)->first();
        if(!$user)
        {
            $user = new User();
            $user->name = $data->first_name;
            $user->last_name = $data->last_name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->phone = $data->phone;
            $user->avatar = $data->avatar;
            $user->save();
        }
        Auth::login($user);
    }
}
