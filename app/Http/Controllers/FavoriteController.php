<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FavoriteController extends Controller
{
    public function index()
    {
        if (Session::has('email')) {
            $products = DB::table('favorite')->where('email', '=', Session::get('email'))->get();
        } else {
            $products = DB::table('favorite')->where('email', '=', $_SERVER['REMOTE_ADDR'])->get();
        }
        return view('favorite', compact('products'));
    }
}
