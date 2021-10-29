<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        if (Session::has('email')) {
            return redirect()->to('profile');
        } else {
            return view('login');
        }
    }
    public function check(LoginRequest $request)
    {
        if (!$request->validated()) {
            return Redirect::back()->withErrors($request->validated());
        }
        $user = Users::where('email', '=', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('email', $user->email);
                return redirect()->to('/');
            } else {
                return redirect('login')->with('fail-password', "password incorrect");
            }
        } else {
            return redirect('login')->with('fail-email', "email not found");
        }
    }
    public function logout()
    {
        Session::forget('email');
        return redirect()->to('/');
    }
}
