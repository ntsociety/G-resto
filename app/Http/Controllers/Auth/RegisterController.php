<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Notifications\AdminNewUserNotify;
use App\Notifications\UserNotification;
use App\Notifications\WelcomeSmsNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;

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
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required','string', 'max:255'],
            'phone' => ['required', 'numeric', 'digits:8'],
            'address' => ['string', 'max:255'],
            // 'avatar' => ['mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],[ 
            'email.unique' => 'Email D??j?? ??t?? pris',
            'password.min' => 'Le mot de passe doit comporter au moins 8 caract??res.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
            'password.required' => 'Il est requis de compl??ter ce champ',
            'name.required' => 'Il est requis de compl??ter ce champ',
            'name.string' => 'Le nom doit ??tre une cha??ne de caract??res .',
            'last_name.required' => 'Il est requis de compl??ter ce champ',
            'last_name.string' => 'Le pr??nom doit ??tre une cha??ne de caract??res .',
            'phone.required' => 'Il est requis de compl??ter ce champ',
            'phone.digits' => 'Le t??l??phone doit comporter 8 chiffres.',
            'phone.numeric' => 'Le t??l??phone doit ??tre un num??ro.',
            'address.string' => 'Le pr??nom doit ??tre une cha??ne de caract??res .',
            
            
        ]);

        // [
        //     'name.required' => 'Veillez donner votre Nom',
        //     'name.string' => 'le nom doit ??tre un caract??re',
        //     'last_name.required' => 'Veillez donner votre Pr??nom',
        //     'last_name.string' => 'le Pr??nom doit ??tre un caract??re',
        //     'phone.required' => 'Veillez donner votre T??l??phone',
        //     'phone.integer' => 'le num??ro doit ??tre des lettres',
        //     'phone.digits' => 'le num??ro doit ??tre ??gale ?? 8 Chiffres',
        //     'email.email' => 'Email invalide',
        //     'email.unique' => 'Email existe d??j??',
        //     'password.required' => 'Veillez donner votre mot de passe',
        //     'password.min' => 'Le mot de passe doit contenir au moins 8 ',
        // ]
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
        ]);
        // $file = $data['avatar'];
        // $avatarName=time().'_'.$file->getClientOriginalName();
        // $file->move('assets/profile/',$avatarName);
        // $user->avatar = $avatarName;
        // $user->save();

        event(new Registered($user));
        $isAdmin = User::where('role_as', '1')->get();

        $recap = ([
            'name' => $user->name,
        ]);
        // Notification::send($user, new UserNotification($user));
        // $user->notify(new WelcomeSmsNotification($user));
        // Notification::send($user, new WelcomeSmsNotification($user));
        Notification::send($isAdmin, new AdminNewUserNotify($recap));
        return $user;
    }
}
