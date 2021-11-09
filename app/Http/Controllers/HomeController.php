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
use Torann\GeoIP\Facades\GeoIP;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $getOffersOne = DB::table('offers')->inRandomOrder()->limit(10)->get();
        $getOffersTwo = DB::table('offers')->inRandomOrder()->limit(5)->get();
        $getOffersThree = DB::table('offers')->inRandomOrder()->limit(10)->get();
        $getOffersCarousel = DB::table('offers')->inRandomOrder()->limit(10)->get();
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
        return view('home', compact('getAds', 'getOffersOne', 'getOffersTwo', 'getOffersThree', 'getOffersCarousel'));
    }
}
