<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use stdClass;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // $request = Http::get('https://fakestoreapi.com/products')->json();
        $checkVisitor = DB::table('visitors')
            ->where([
                ['date', '=', date('Y-m-d')],
                ['ip', '=', $request->ip()]
            ])->get();
        if ($checkVisitor->isEmpty()) {
            $updateVisitor = DB::table('visitors')->insert([
                'page' => URL::current(),
                'ip' => $request->ip(),
                'date' => date('Y-m-d')
            ]);
        }

        // Ads Carousel
        $getAds = DB::table('ads')->get();
        return view('home', compact('getAds'));
    }
}
