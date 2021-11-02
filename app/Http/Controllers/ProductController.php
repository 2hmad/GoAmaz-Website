<?php

namespace App\Http\Controllers;

use AshAllenDesign\LaravelExchangeRates\Classes\ExchangeRate;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use stdClass;

class ProductController extends Controller
{
    public function index($id)
    {
        if (Session::has('email')) {
            $check = DB::table('favorite')->where('email', '=', Session::get('email'))->where('product_id', '=', $id)->first();
        } else {
            $check = DB::table('favorite')->where('email', '=', $_SERVER['REMOTE_ADDR'])->where('product_id', '=', $id)->first();
        }
        $rates = DB::table('rating')->where('product', '=', $id)->orderBy('id', 'DESC')->get();
        return view('product', compact('check', 'rates'));
    }
    public function addFavorite($id, $email)
    {
        DB::insert('insert into favorite (product_id, email, date) values (?, ?, ?)', [$id, $email, date('Y-m-d')]);
        return redirect()->back();
    }
    public function deleteFavorite($id, $email)
    {
        DB::table('favorite')->where('product_id', $id)->where('email', $email)->delete();
        return redirect()->back();
    }
    public function addWatcher(Request $request, $id)
    {
        if ($request->has('send_email') && !$request->has('send_phone')) {
            DB::insert('insert into watchers (product, contact, currency) values (?, ?, ?)', [$id, $request->input('email'), $request->input('currency')]);
            return redirect()->back()->with('watcher_added', 'Done');
        } elseif (!$request->has('send_email') && $request->has('send_phone')) {
            DB::insert('insert into watchers (product, phone, currency) values (?, ?, ?)', [$id, $request->input('full-phone'), $request->input('currency')]);
            return redirect()->back()->with('watcher_added', 'Done');
        } elseif ($request->has('send_email') && $request->has('send_phone')) {
            DB::insert('insert into watchers (product, contact, phone, currency) values (?, ?, ?, ?)', [$id, $request->input('email'), $request->input('full-phone'), $request->input('currency')]);
            return redirect()->back()->with('watcher_added', 'Done');
        } else {
            return redirect()->back()->with('watcher_fail', 'Failed');
        }
    }
    public function store_rate(Request $request, $id, $author)
    {
        if (Crypt::decrypt("$author") == "") {
            DB::insert('insert into rating (product, author, rate, message, date) values (?, ?, ?, ?, ?)', [$id, "Anonymous User", $request->input('star'), $request->input('review'), date('Y-m-d')]);
            return redirect()->back();
        } else {
            $author = Crypt::decrypt($author);
            $checkRate = DB::table('rating')->where('author', '=', "$author")->where('product', '=', $id)->first();
            if ($checkRate == '') {
                DB::insert('insert into rating (product, author, rate, message, date) values (?, ?, ?, ?, ?)', [$id, $author, $request->input('star'), $request->input('review'), date('Y-m-d')]);
                return redirect()->back();
            } else {
                return redirect()->back();
            }
        }
    }
}
