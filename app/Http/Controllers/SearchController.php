<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    public function index()
    {
        return view('search');
    }
    public function search(Request $request)
    {
        $json = Http::withHeaders([
            'x-rapidapi-host' => 'amazon-products1.p.rapidapi.com',
            'x-rapidapi-key' => env('X_RAPIDAPI_KEY', null)
        ])->get('https://amazon-products1.p.rapidapi.com/search', [
            'country' => 'US',
            'query' => $request->input('search'),
            'page' => '1'
        ]);
        $json = json_decode($json, TRUE);
        if (isset($json['message'])) {
            return redirect()->back();
        } else {
            return view('search', compact('json'));
        }
    }
}
