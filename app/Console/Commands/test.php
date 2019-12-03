<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        //


        dd();
        dd(strtotime(date('Y-m-d',strtotime("+1 day"))));
        $test = \App\Http\Models\Test::get();

        dd($test);
        $str = 'teuliom3';
        $s = mb_convert_case($str, MB_CASE_UPPER, "UTF-8");
        dd($s,$str);
        $id = 22;
        dump(date("Y-m-d", strtotime("-1 day")));
        dump(date("Y-m-d"));
        $redis_key = 'movie_watch_'.date("Y-m-d").$id;
//        $movie_watch_key = Redis::del($redis_key);
//        dd('s');
        $movie_watch_key = Redis::get($redis_key);



        if($movie_watch_key == null){
            dump('空');
            $movie_watch_time = 5;
            Redis::setex($redis_key,86400,$movie_watch_time);
            $new_time = Redis::decr($redis_key);
        }elseif($movie_watch_key == 0){
            dump('观影次数已用完');
            $new_time = $movie_watch_key;
        }else{
            dump('存在 不用去重新生成');
            $new_time = Redis::decr($redis_key);
        }

        $time_remaining =Redis::ttl($redis_key);
        dd($new_time,$time_remaining);
    }
}
