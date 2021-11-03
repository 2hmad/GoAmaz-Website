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
        $delete = DB::table('offers')->delete();
        $restartId = DB::statement('ALTER TABLE offers AUTO_INCREMENT = 0');
        $json = Http::withHeaders([
            'x-rapidapi-host' => 'amazon-products1.p.rapidapi.com',
            'x-rapidapi-key' => env('X_RAPIDAPI_KEY', null)
        ])->get('https://amazon-products1.p.rapidapi.com/offers', [
            'min_number' => '5',
            'country' => 'US',
            'type' => 'LIGHTNING_DEAL',
            'max_number' => '40'
        ]);
        $json = json_decode($json, TRUE);
        foreach ($json['offers'] as $result) {
            $posts = DB::insert('insert into offers (title, img, asin, price, reviews) values (?, ?, ?, ?, ?)', [$result['title'], $result['images'][0], $result['asin'], $result['prices']['current_price'], $result['reviews']['stars']]);
        }
    }
}
