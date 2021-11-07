<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class FetchApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:offers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get offers from amazon products api every day';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $json = Http::withHeaders([
            'x-rapidapi-host' => 'amazon-products1.p.rapidapi.com',
            'x-rapidapi-key' => env('X_RAPIDAPI_KEY', null)
        ])->get('https://amazon-products1.p.rapidapi.com/offers', [
            'min_number' => '5',
            'country' => 'US',
            'max_number' => '40'
        ]);
        $json = json_decode($json, TRUE);
        foreach ($json['offers'] as $result) {
            $offers = DB::table('offers')->insert([
                'title' => $result['title'],
                'img' => $result['images'][0],
                'asin' => $result['asin'],
                'price' => $result['prices']['current_price'],
                'reviews' => $result['reviews']['stars']
            ]);
            $check_asin = DB::table('price_tracker')->where('asin', '=', $result['asin'])->where('date', '=', date('M Y'))->count();
            if ($check_asin == 0) {
                $tracking = DB::table('price_tracker')->insert([
                    'asin' => $result['asin'],
                    'price' => $result['prices']['current_price'],
                    'date' => date('M Y')
                ]);
            }
        }
    }
}
