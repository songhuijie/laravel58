<?php
/**
 * Created by PhpStorm.
 * User: shj
 * Date: 2019/4/9
 * Time: 下午2:05
 */
namespace App\Libraries;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Predis\Client;

class Lib_make{

    public static function AllTotal($cache_key,$total){

        $num = Cache::get($cache_key);
        if(empty($num)){
            Cache::put($cache_key,$total,86400);
        }else{
            $all = self::addForMes($num,$total);
            Cache::put($cache_key,$all,86400);
        }
    }


    public static function RedisAllTotal($cache_key,$total){

        $redis = new Client();
        $num = $redis->get($cache_key);
        if(empty($num) || $num == 0){
            $redis->setex($cache_key,86400,(int)$total);
        }else{
            $all = self::addForMes($num,$total);
            $redis->setex($cache_key,86400,(int)$all);
        }
    }

    public static function addForMes($a,$b){
        return bcadd($a, $b, 4);
    }



}
