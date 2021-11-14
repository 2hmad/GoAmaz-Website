<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OtherCardController extends Controller
{
    public function amazonSa($id)
    {
        $jsonSa = Http::withHeaders([
            'x-rapidapi-host' => 'amazon-products1.p.rapidapi.com',
            'x-rapidapi-key' => env('X_RAPIDAPI_KEY', null)
        ])->get('https://amazon-products1.p.rapidapi.com/product', [
            'country' => 'SA',
            'asin' => "$id"
        ]);
        $jsonSa = json_decode($jsonSa, TRUE);
        return $jsonSa;
    }
    public function amazonAe($id)
    {
        $jsonAe = Http::withHeaders([
            'x-rapidapi-host' => 'amazon-products1.p.rapidapi.com',
            'x-rapidapi-key' => env('X_RAPIDAPI_KEY', null)
        ])->get('https://amazon-products1.p.rapidapi.com/product', [
            'country' => 'AE',
            'asin' => "$id"
        ]);
        $jsonAe = json_decode($jsonAe, TRUE);
        return $jsonAe;
    }
    public function amazonUk($id)
    {
        $jsonUk = Http::withHeaders([
            'x-rapidapi-host' => 'amazon-products1.p.rapidapi.com',
            'x-rapidapi-key' => env('X_RAPIDAPI_KEY', null)
        ])->get('https://amazon-products1.p.rapidapi.com/product', [
            'country' => 'UK',
            'asin' => "$id"
        ]);
        $jsonUk = json_decode($jsonUk, TRUE);
        return $jsonUk;
    }
}
