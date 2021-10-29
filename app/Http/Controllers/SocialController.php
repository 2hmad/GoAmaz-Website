<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect($service) {
        return Socialite::driver($service)->redirect();
    }
    public function callback($service) {
        if($service == "facebook") {
            $user = Socialite::driver($service)->stateless()->user();
            $isUser = Users::where('fb_id', $user->id)->first();
            if($isUser) {
                Session::put('email', $user->email);
                return redirect('/');
            } else {
                if(Users::where('email', $user->email)->first()) {
                    $createUser = Users::where('email', $user->email)->update(['fb_id' => $user->id]);
                    Session::put('email', $user->email);
                    return redirect('/');
                } else {
                    $createUser = Users::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'fb_id' => $user->id,
                        'password' => Hash::make($user->name.'@'.$user->id)
                    ]);
                    Session::put('email', $user->email);
                    return redirect('/');
                }
            }
        } elseif ($service == "google") {
            $user = Socialite::driver($service)->stateless()->user();
            $isUser = Users::where('google_id', $user->getId())->first();
            if($isUser) {
                Session::put('email', $user->getEmail());
                return redirect('/');
            } else {
                if(Users::where('email', $user->getEmail())->first()) {
                    $createUser = Users::where('email', $user->getEmail())->update(['google_id' => $user->getId()]);
                    Session::put('email', $user->getEmail());
                    return redirect('/');
                } else {
                    $createUser = Users::create([
                        'name' => $user->getName(),
                        'email' => $user->getEmail(),
                        'google_id' => $user->getId(),
                        'password' => Hash::make($user->getName().'@'.$user->getId())
                    ]);
                    Session::put('email', $user->getEmail());
                    return redirect('/');
                }
            }
        }
    }
}
