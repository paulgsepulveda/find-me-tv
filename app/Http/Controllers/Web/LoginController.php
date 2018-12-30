<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use App\User;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function redirect($account)
    {
        try {
            return Socialite::with($account)->redirect();
        } catch (\InvalidArgumentException $e){
            return redirect('/login');
        }
    }

    public function callback($account)
    {
        $socialUser = Socialite::with($account)->user();
        $user = User::where( 'provider_id', '=', $socialUser->id )
                    ->where( 'provider', '=', $account )
                    ->first();

        if( $user == null ){
            $newUser = new User();
    
            $newUser->name        = $socialUser->getName();
            $newUser->email       = $socialUser->getEmail() == '' ? '' : $socialUser->getEmail();
            $newUser->password    = '';
            $newUser->provider    = $account;
            $newUser->provider_id = $socialUser->getId();
            $newUser->save();
            $user = $newUser;
        }

        Auth::login( $user );
        return redirect('/personal');
    }
}
