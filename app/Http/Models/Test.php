<?php
/**
 * Created by PhpStorm.
 * User: hkx
 * Date: 2019/8/9
 * Time: 5:12 PM
 */
namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Test extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'test';
    const USER_BANNER_TABLE = 'test';

    /**
     * 该模型是否被自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * 此模型的连接名称。
     *
     * @var string
     */
    protected $connection = '';


    /**
     * 此模型的主键名称。
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public function __construct()
    {

    }



    public static function get(){

        return DB::table(self::USER_BANNER_TABLE)->select(DB::raw('(price + pricetwo) as  newprice,id'))->orderBy('newprice','desc')->skip((1-1)*10)->take(10)->get()->toArray();

    }


    public static function getOne($lang){

         if($lang == 'ja'){
             $select = "price as p,id";
         }elseif($lang == 'en'){
             $select = "pricetwo as p,id";
         }else{
             $select = "pricethree as p,id";
         }
         $data = DB::table(self::USER_BANNER_TABLE)->select(DB::raw($select))->skip((1-1)*10)->take(10)->get()->toArray();

        return $data;
    }



}
