<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = DB::table('users')->where('email', '=', Session::get('email'))->first();
        return view('profile', compact('profile'));
    }
    public function updateInfo(Request $request) {
        $validator = Validator::make($request->all(), [
            'phone' => 'unique:users',
        ],[
            'phone.unique' => 'This phone already exist'
        ]);
        $update = Users::where('email', '=', Session::get('email'))->update([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'country' => $request->input('country'),
            'city' => $request->input('city')
        ]);
        if($update) {
            return redirect()->back();
        }
    }
    public function updatePassword(Request $request) {
        $validated = $request->validate([
            'password' => 'required|same:confirm_password|min:8',
            'confirm_password' => 'required'
        ],[
            'password.required' => 'Password Required',
            'password.same' => 'Password and confirm password not matching',
            'password.min' => 'Password is too short'
        ]);
        if($validated) {
            $update = Users::where('email', '=', Session::get('email'))->update([
                'password' => Hash::make($request->input('password'))
            ]);
            return redirect()->back()->with('success', '');
        } else {
            return redirect()->back()->with('error', '');
        }
    }
}
