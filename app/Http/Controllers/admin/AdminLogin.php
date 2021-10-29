<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminLogin extends Controller
{
    public function index()
    {
        if (session()->exists('admin-email')) {
            return redirect()->to('admin/dashboard');
        }
        return view('admin.index');
    }
    public function login(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $admin = DB::table('admins')->where('email', '=', $request->email)->first();
        if ($admin) {
            if (Hash::check($request->password, $admin->password)) {
                Session::put('admin-email', $request->email);
                return redirect()->to('admin/dashboard');
            } else {
                return redirect('admin/login')->with('error', "كلمة المرور غير صحيحة");
            }
        } else {
            return redirect("admin/login")->with('error', 'البيانات المدخلة غير صحيحة');
        }
    }
    public function logout() {
        Session::forget('admin-email');
        return redirect()->to('admin/login');
    }
}
