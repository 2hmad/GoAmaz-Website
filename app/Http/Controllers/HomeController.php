<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use stdClass;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // $fetch = Http::withHeaders([
        //     'x-rapidapi-host' => 'amazon-products1.p.rapidapi.com',
        //     'x-rapidapi-key' => '16c0586a9bmsh8df7946184a37a7p15674fjsned2a41ade813'
        // ])->get('https://amazon-products1.p.rapidapi.com/offers', [
        //     'min_number' => '20',
        //     'country' => 'US',
        //     'type' => 'LIGHTNING_DEAL',
        //     'max_number' => '20'
        // ])->json();
        $fetch = Http::get('https://jsonplaceholder.typicode.com/posts')->json();
        foreach ($fetch as $value) {
            return $value['id'];
        }


        // $checkVisitor = DB::table('visitors')
        //     ->where([
        //         ['date', '=', date('Y-m-d')],
        //         ['ip', '=', $request->ip()]
        //     ])->get();
        // if ($checkVisitor->isEmpty()) {
        //     $updateVisitor = DB::table('visitors')->insert([
        //         'page' => URL::current(),
        //         'ip' => $request->ip(),
        //         'date' => date('Y-m-d')
        //     ]);
        // }

        // // Ads Carousel
        // $getAds = DB::table('ads')->get();
        // return view('home', compact('getAds', 'fetchOffers'));
    }
}
