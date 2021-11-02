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
        $delete = DB::table('posts')->delete();
        $restartId = DB::statement('ALTER TABLE posts AUTO_INCREMENT = 0;');
        if ($delete) {
            $fetch = Http::get('https://jsonplaceholder.typicode.com/posts')->json();
            foreach ($fetch as $value) {
                $posts = DB::insert('insert into posts (title, body) values (?, ?)', [$value['title'], $value['body']]);
            }
        }
    }
}
