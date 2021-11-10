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
    public function index(Request $request, $id)
    {
        if (Session::has('email')) {
            $check = DB::table('favorite')->where('email', '=', Session::get('email'))->where('product_id', '=', $id)->first();
        } else {
            $check = DB::table('favorite')->where('email', '=', $_SERVER['REMOTE_ADDR'])->where('product_id', '=', $id)->first();
        }
        $rates = DB::table('rating')->where('product', '=', $id)->orderBy('id', 'DESC')->get();
        $json = Http::withHeaders([
            'x-rapidapi-host' => 'amazon-products1.p.rapidapi.com',
            'x-rapidapi-key' => env('X_RAPIDAPI_KEY', null)
        ])->get('https://amazon-products1.p.rapidapi.com/product', [
            'country' => 'US',
            'asin' => "$id"
        ]);
        $json = json_decode($json, TRUE);

        if (DB::table('price_tracker')->where('date', '=', date('M Y'))->where('price', '=', $json['prices']['current_price'])->where('asin', '=', $id)->count() == 0) {
            DB::table('price_tracker')->insert([
                'asin' => $id,
                'price' => $json['prices']['current_price'],
                'date' => date('M Y')
            ]);
        }

        $jsonSa = Http::withHeaders([
            'x-rapidapi-host' => 'amazon-products1.p.rapidapi.com',
            'x-rapidapi-key' => env('X_RAPIDAPI_KEY', null)
        ])->get('https://amazon-products1.p.rapidapi.com/product', [
            'country' => 'SA',
            'asin' => "$id"
        ]);
        $jsonSa = json_decode($jsonSa, TRUE);

        $jsonAe = Http::withHeaders([
            'x-rapidapi-host' => 'amazon-products1.p.rapidapi.com',
            'x-rapidapi-key' => env('X_RAPIDAPI_KEY', null)
        ])->get('https://amazon-products1.p.rapidapi.com/product', [
            'country' => 'AE',
            'asin' => "$id"
        ]);
        $jsonAe = json_decode($jsonAe, TRUE);

        $jsonUk = Http::withHeaders([
            'x-rapidapi-host' => 'amazon-products1.p.rapidapi.com',
            'x-rapidapi-key' => env('X_RAPIDAPI_KEY', null)
        ])->get('https://amazon-products1.p.rapidapi.com/product', [
            'country' => 'UK',
            'asin' => "$id"
        ]);
        $jsonUk = json_decode($jsonUk, TRUE);

        $chart = DB::table('price_tracker')->where('asin', '=', $id)->orderBy('date', 'DESC')->get();

        // $myIp = $request->ip();
        $myIp = "154.180.89.205";
        $ip = Http::get("http://ip-api.com/json/$myIp?fields=country,countryCode,currency");
        $ip = json_decode($ip, TRUE);

        return view('product', compact('check', 'rates', 'json', 'jsonSa', 'jsonAe', 'jsonUk', 'chart', 'ip'));
    }
    public function addFavorite(Request $request, $id, $email)
    {
        $title = $request->input('title');
        $price = $request->input('price');
        $stars = $request->input('stars');
        $image = $request->input('image');
        DB::insert('insert into favorite (product_id, title, price, stars, image, email, date) values (?, ?, ?, ?, ?, ?, ?)', [$id, $title, $price, $stars, $image, $email, date('Y-m-d')]);
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
            DB::insert('insert into watchers (product, contact, price, currency) values (?, ?, ?, ?)', [$id, $request->input('email'), $request->input('price'), $request->input('currency')]);
            return redirect()->back()->with('watcher_added', 'Done');
        } elseif (!$request->has('send_email') && $request->has('send_phone')) {
            DB::insert('insert into watchers (product, phone, price, currency) values (?, ?, ?, ?)', [$id, $request->input('full-phone'), $request->input('price'), $request->input('currency')]);
            return redirect()->back()->with('watcher_added', 'Done');
        } elseif ($request->has('send_email') && $request->has('send_phone')) {
            DB::insert('insert into watchers (product, contact, phone, price, currency) values (?, ?, ?, ?, ?)', [$id, $request->input('email'), $request->input('full-phone'), $request->input('price'), $request->input('currency')]);
            return redirect()->back()->with('watcher_added', 'Done');
        } else {
            return redirect()->back()->with('watcher_fail', 'Please fill required fields');
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
