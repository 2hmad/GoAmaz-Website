<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|min:8|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required',
            'agree' => 'required'
        ], [
            'name.required' => 'name required',
            'email.required' => 'email required',
            'email.email' => 'email format invalid',
            'email.unique:users' => 'email already exist',
            'phone.required' => 'phone required',
            'password.required' => 'password required',
            'password.min' => 'password is too short',
            'password.same' => 'password and confirm not match',
            'agree.required' => 'agree check required'
        ]);
        if ($validated) {
            DB::insert('insert into users (name, email, phone, password) values (?, ?, ?, ?)', [
                $request->input('name'),
                $request->input('email'),
                $request->input('phone'),
                Hash::make($request->input('password')),
            ]);
            return redirect('register')->with('success', 'created account');
        }
    }
}
